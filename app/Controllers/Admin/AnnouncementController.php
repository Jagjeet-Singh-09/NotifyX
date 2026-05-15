<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Services\Admin\AnnouncementService;




class AnnouncementController extends BaseController
{
    protected $AnnouncementService;
    //protected $adminValidations;


    public function __construct()
    {
        $this->AnnouncementService = new AnnouncementService();
        //$this->adminValidations = new AdminValidations();
    }

    public function createAnnouncement()
    {
        $data = $this->request->getJSON(true);

        $id = session()->get('id');

        return $this->AnnouncementService->createAnnouncement($data, $id);

    }

    public function deleteAnnouncement($id){
        return $this->AnnouncementService->deleteAnnouncement($id);
        
        
    }

    public function getAllAnnouncement(){
        return $this->AnnouncementService->getAllAnnouncement();
    }

    public function editAnnouncement($id){
        $data = $this->request->getJSON(true);
        return $this->AnnouncementService->getAllAnnouncement();
    }

    public function updateAnnouncement(){
        $data = $this->request->getJSON(true);
        return $this->AnnouncementService->updateAnnouncement($data);

    }
}
