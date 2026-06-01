<?php

namespace App\Admin\Service\Groups;
use App\Helpers\ApiResponseHelper;
use App\Admin\Model\Groups\GroupModel;

class GroupService
{
    protected $groupModel;

    public function __construct()
    {
        $this->groupModel = new GroupModel();
    }

    public function createPreDefinedGroups(){
        $result = $this->groupModel->createPreDefinedGroups();
        return true;
        

    }

}
