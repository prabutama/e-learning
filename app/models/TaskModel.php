<?php

namespace prabutama\e_learning\models;

use prabutama\e_learning\Database;
use PDO;

class TaskModel
{
    private $db;
    private $table = 'tasks';

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllTasksWithUserName()
    {
        $this->db->query('SELECT tasks.id, tasks.filename, tasks.nilai, users.name AS username 
                      FROM tasks 
                      JOIN users ON tasks.user_id = users.id 
                      WHERE tasks.nilai > 0');
        return $this->db->resultSet();
    }

    public function getAllTasksWithUserNameNoNilai()
    {
        $this->db->query('SELECT tasks.id, tasks.filename, tasks.nilai, users.name AS username 
                      FROM tasks 
                      JOIN users ON tasks.user_id = users.id 
                      WHERE tasks.nilai = 0');
        return $this->db->resultSet();
    }

    public function uploadFile($file)
    {
        session_start();
        $user_id = $_SESSION['user_id'];

        if (isset($file) && $file['error'] === UPLOAD_ERR_OK) {
            $uploadDir = 'tasks/';
            $fileName = basename($file['name']);
            $fileTmpName = $file['tmp_name'];
            $fileType = $file['type'];
            $filePath = $uploadDir . $fileName;

            if (move_uploaded_file($fileTmpName, $filePath)) {
                $query = "INSERT INTO " . $this->table . " (user_id, filename, type, path) VALUES (:user_id, :filename, :type, :path)";
                $this->db->query($query);
                $this->db->bind(':user_id', $user_id);
                $this->db->bind(':filename', $fileName);
                $this->db->bind(':type', $fileType);
                $this->db->bind(':path', $filePath);
                $this->db->execute();
                return $this->db->rowCount();
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    // TaskModel.php
    public function updateTask($id, $nilai)
    {
        $query = "UPDATE $this->table SET nilai = :nilai WHERE id = :id";
        $this->db->query($query);
        $this->db->bind(':id', $id);
        $this->db->bind(':nilai', $nilai);
        return $this->db->execute();
    }
}
