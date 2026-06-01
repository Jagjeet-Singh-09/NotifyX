<?php

namespace App\Franchise\Services\Announcement;

use App\Franchise\Models\Announcement\AnnouncementModel;
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