<?php

namespace App\Franchise\Services\LoginRegister;

use App\Franchise\Models\LoginRegister\FranchiseAuthModel;

class FranchiseAuthService
{
    protected $franchiseAuthModel;

    public function __construct()
    {
        $this->franchiseAuthModel = new FranchiseAuthModel();
    }

    public function createUser($phoneNumber, $email, $password, $firstName , $lastName)
    {
        $user= $this->franchiseAuthModel->createUser($phoneNumber, $email, $password, $firstName , $lastName);
        $session = session();

            $session->set([
                'email' => $user['email'],
                'first_name'  => $user['first_name'],
                'last_name'  => $user['first_name'],
                'id' => $user['id'],
            ]);

        return $user;
    }

    public function checkLogIn($email, $password)
    {
        $user = $this->franchiseAuthModel->getDataByMail($email);

    
        if (!$user) {

            return [
                "status" => "error",
                "message" => "Email not found"
            ];
        }

        if (password_verify($password,$user['password'])) {

            // CREATE SESSION
            $session = session();

            $session->set([
                'email' => $user['email'],
                'first_name'  => $user['first_name'],
                'last_name'  => $user['first_name'],
                'id' => $user['id'],
            ]);

            return [
                "status" => "success",
                "message" => "Login successful",
                "user" => $user
            ];
        }

        // WRONG PASSWORD
        return [
            "status" => "error",
            "code" => 401,
            "message" => "Invalid password"
        ];
    }
}