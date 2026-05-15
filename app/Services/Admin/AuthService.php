<?php

namespace App\Services\Admin;

use App\Models\Admin\AuthModel;

class AuthService
{
    protected $AuthModel;

    public function __construct()
    {
        $this->AuthModel = new AuthModel();
    }

    public function createUser($phoneNumber, $email, $password, $firstName , $lastName)
    {
        $user= $this->AuthModel->createUser($phoneNumber, $email, $password, $firstName , $lastName);
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
        $user = $this->AuthModel->getDataByMail($email);

    
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