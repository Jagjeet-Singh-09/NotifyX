<?php

namespace App\Vendor\Service\Announcement;

use App\Vendor\Model\Announcement\AnnouncementModel;
use App\Admin\Controller\Groups\GroupController;

class AnnouncementService
{
    protected $AnnouncementModel;
    protected $groupController;

    public function __construct()
    {
        $this->AnnouncementModel = new AnnouncementModel();
        $this->groupController=new GroupController();

    }

    public function getAllAnnouncement(){
        $id = session()->get('id');
        $data = $this->AnnouncementModel->getAllAnnouncement($id);
        return $data;
    }
}