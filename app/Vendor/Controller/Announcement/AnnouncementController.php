<?php

namespace App\Vendor\Controller\Announcement;

//use App\Vendor\Controllers\BaseController;
use App\Vendor\Service\Announcement\AnnouncementService;
use App\Validations\AdminValidations;
use App\Controllers\BaseController;



class AnnouncementController extends BaseController
{
    protected $announcementService;
    //protected $adminValidations;


    public function __construct()
    {
        $this->announcementService = new AnnouncementService();
        //$this->adminValidations = new AdminValidations();
    }

    public function getAllAnnouncement(){
        $data= $this->announcementService->getAllAnnouncement();
        return $this->response
            ->setStatusCode(200)
            ->setJSON($data);
    }

}