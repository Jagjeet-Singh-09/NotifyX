<?php

namespace App\Vendor\Controller\LoginRegister;

//use App\Vendor\Controllers\BaseController;
use App\Vendor\Service\LoginRegister\VendorAuthService;
use App\Validations\AdminValidations;
use App\Controllers\BaseController;



class VendorAuthController extends BaseController
{
    protected $vendorAuthService;
    protected $adminValidations;


    public function __construct()
    {
        $this->vendorAuthService = new VendorAuthService();
        $this->adminValidations = new AdminValidations();
    }



    public function createUser()
    {
        $users = $this->request->getJSON(true);
        $email = $users['email'];

        if (!$this->adminValidations->checkEmail($users['email'])) {
            return $this->response
                ->setStatusCode(400)
                ->setJSON([
                    'status' => 'error',
                    'message' => 'Please add Valid Email'
                ]);
        }

        
        $password = $users['password'];

        if (!$this->adminValidations->checkPassword($password)) {
            return $this->response
                ->setStatusCode(400)
                ->setJSON([
                    'status' => 'error',
                    'message' => 'Please add Valid Password'
                ]);
        }

        $phoneNumber = $users['phone'];
        if (!$this->adminValidations->checkMobileNumber($phoneNumber)) {
            return $this->response
                ->setStatusCode(400)
                ->setJSON([
                    'status' => 'error',
                    'message' => 'Please add Valid Phone Number'
                ]);
        }


        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $firstname = $users['first_name'];

        if (!$this->adminValidations->checkFirstName($firstname)) {
            return $this->response
                ->setStatusCode(400)
                ->setJSON([
                    'status' => 'error',
                    'message' => 'Please add Valid First Name'
                ]);
        }
        $lastname = $users['last_name'];

        if (!$this->adminValidations->checkLastName($lastname)) {
            return $this->response
                ->setStatusCode(400)
                ->setJSON([
                    'status' => 'error',
                    'message' => 'Please add Valid Last Name'
                ]);
        }
        $result = $this->vendorAuthService->createUser($phoneNumber, $email, $hashedPassword, $firstname, $lastname);



        
        if ($result) {

            return $this->response->setJSON([
                "status" => "success",
                "message" => "User registered successfully"
            ]);
        }

        return $this->response->setJSON([
            "status" => "error",
            "message" => "Registration failed"
        ]);
    }

     public function checkLogIn()
    {
        $users = $this->request->getJSON(true);
        $email = $users['email'];

        if (!$this->adminValidations->checkEmail($email)) {
            return $this->response
                ->setStatusCode(400)
                ->setJSON([
                    'status' => 'error',
                    'message' => 'Please add Valid First Name'
                ]);
        }

        
        $password = $users['password'];

        if (!$this->adminValidations->checkPassword($password)) {
            return $this->response
                ->setStatusCode(400)
                ->setJSON([
                    'status' => 'error',
                    'message' => 'Please add Valid First Name'
                ]);
        }

        $result = $this->vendorAuthService->checkLogIn($email, $password);
        if ($result['status'] == 'error') {

            return $this->response
                ->setStatusCode(401)
                ->setJSON($result);
        }

        // SUCCESS
        return $this->response
            ->setStatusCode(200)
            ->setJSON($result);
    }

}