<?php

namespace App\Admin\Controller\Groups;

use App\Controllers\BaseController;
use App\Admin\Service\Groups\GroupService;




class GroupController extends BaseController
{
    protected $groupService;
    //protected $adminValidations;


    public function __construct()
    {
        $this->groupService = new GroupService();
        //$this->adminValidations = new AdminValidations();
    }

    public function createPreDefinedGroups(){
        $this->groupService->createPreDefinedGroups();
    }

    

}