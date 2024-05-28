<?php

namespace prabutama\e_learning\Controller;

use prabutama\e_learning\models\UserModel;
use prabutama\e_learning\models\TaskModel;


class DashboardController
{
    private $taskModel;
    private $UserModel;
    public function __construct()
    {
        $this->taskModel = new TaskModel();
        $this->UserModel = new UserModel();
    }
    public function index()
    {
        $dosen = $this->UserModel->getDosenCount();
        $mahasiswa = $this->UserModel->getMahasiswaCount();
        $this->view('dashboard', ['dosen' => $dosen['dosen_count'], 'mahasiswa' => $mahasiswa['mahasiswa_count']]);
    }
    public function tugas() {
        $tasks = $this->taskModel->getAllTasksWithUserName();
        $tasksNoNilai = $this->taskModel->getAllTasksWithUserNameNoNilai();
        $this->view('tugas', [
            'tasks' => $tasks, 
            'tasksNoNilai' => $tasksNoNilai 
        ]);
    }


    public function uploadFile()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['file'])) {
            $taskModel = new TaskModel();
            $result = $taskModel->uploadFile($_FILES['file']);
            if ($result) {
                echo "berhasil";
                $this->redirect('/dashboard/tugas');
            } else {
                echo "gagal";
                $this->redirect('/dashboard/tugas');
            }
        } else {
            echo "No file uploaded";
        }
    }

    // DashboardController.php
    public function updateTask()
    {
        session_start();
        if (!isset($_SESSION['login']) || $_SESSION['role'] !== 'dosen') {
            echo "Anda tidak memiliki izin untuk melakukan ini";
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['task_id']) && isset($_POST['nilai'])) {
            $task_id = $_POST['task_id'];
            $nilai = $_POST['nilai'];
            $result = $this->taskModel->updateTask($task_id, $nilai);
            $this->redirect('/dashboard/tugas');
        }
    }



    public function view($view, $data = [])
    {
        extract($data);
        $view = "../app/view/$view.php";
        require_once "../app/view/layouts/main.php";
    }

    public function redirect($url)
    {
        header("Location: " . $url);
        exit();
    }
}
