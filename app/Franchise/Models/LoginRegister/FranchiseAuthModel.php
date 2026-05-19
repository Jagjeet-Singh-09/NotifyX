<?php

namespace App\Franchise\Models\LoginRegister;

use Config\Database;

class FranchiseAuthModel
{
    protected $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function createUser($phoneNumber, $email, $password, $firstName, $lastName)
    {

        $sql = "INSERT INTO franchise 
                (phone, email, password, first_name, last_name)
                VALUES (?, ?, ?, ?, ?)";

        $query=$this->db->query($sql, [
            $phoneNumber,
            $email,
            $password,
            $firstName,
            $lastName,
        ]);

         $userId = $this->db->insertID();

        // FETCH USER DATA
        $sql3 = "SELECT * FROM franchise WHERE id = ?";

        $query = $this->db->query($sql3, [$userId]);

        return $query->getRowArray();
    }

    public function getDataByMail($email)
    {
        $sql = "SELECT * FROM franchise WHERE email = ?";

        $query = $this->db->query($sql, [$email]);

        return $query->getRowArray();
    }
}