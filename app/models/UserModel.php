<?php

namespace prabutama\e_learning\models;

use prabutama\e_learning\Database;
use PDO;
use PDOException;

class UserModel
{
    private $db;
    private $table = 'users';

    public function __construct()
    {
        $this->db = new Database();
    }
    public function register($data)
    {

        $query = "INSERT INTO users 
                    VALUES 
                    ('', :name, :email, :role, :password)";
        $this->db->query($query);
        $this->db->bind('name', $data['name']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('role', $data['role']);
        $this->db->bind('password', $data['password']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function getUserByEmail($email, $password)
    {
        $query = "SELECT * FROM $this->table WHERE email = :email AND password = :password LIMIT 1";
        $this->db->query($query);
        $this->db->bind(':email', $email);
        $this->db->bind(':password', $password);
        return $this->db->single();
    }

    public function getDosenCount()
    {
        $query = "SELECT COUNT(*) AS dosen_count FROM $this->table WHERE role = 'dosen'";
        $this->db->query($query);
        return $this->db->single();
    }

    public function getMahasiswaCount()
    {
        $query = "SELECT COUNT(*) AS mahasiswa_count FROM $this->table WHERE role = 'mahasiswa'";
        $this->db->query($query);
        return $this->db->single(); 
    }
}
