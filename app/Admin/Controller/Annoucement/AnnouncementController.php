<?php

namespace App\Admin\Controller\Annoucement;

use App\Controllers\BaseController;
use App\Admin\Service\Announcement\AnnouncementService;




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

    // public function setAnnouncement($target_group_id,$Announcement_id){
    //     return $this->AnnouncementService->setAnnouncement($target_group_id,$Announcement_id);

    // }
    
}
