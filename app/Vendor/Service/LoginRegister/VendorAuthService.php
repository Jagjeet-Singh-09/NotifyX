<?php

namespace App\Vendor\Service\LoginRegister;

use App\Vendor\Model\LoginRegister\VendorAuthModel;
use App\Admin\Controller\Groups\GroupController;

class VendorAuthService
{
    protected $vendorAuthModel;
    protected $groupController;

    public function __construct()
    {
        $this->vendorAuthModel = new VendorAuthModel();
        $this->groupController=new GroupController();

    }

    public function createUser($phoneNumber, $email, $password, $firstName , $lastName)
    {
        $user= $this->vendorAuthModel->createUser($phoneNumber, $email, $password, $firstName , $lastName);
        $session = session();

            $session->set([
                'email' => $user['email'],
                'first_name'  => $user['first_name'],
                'last_name'  => $user['first_name'],
                'id' => $user['id'],
            ]);

        //$this->groupController->createPreDefinedGroups();

        return $user;
    }

    public function checkLogIn($email, $password)
    {
        $user = $this->vendorAuthModel->getDataByMail($email);

    
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