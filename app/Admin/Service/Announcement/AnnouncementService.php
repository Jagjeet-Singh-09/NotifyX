<?php

namespace App\Admin\Service\Announcement;
use App\Helpers\ApiResponseHelper;
use App\Admin\Model\Announcement\AnnouncementModel;

class AnnouncementService
{
    protected $AnnouncementModel;

    public function __construct()
    {
        $this->AnnouncementModel = new AnnouncementModel();
    }

    public function createAnnouncement($data,$id){
        $res = $this->AnnouncementModel->createAnnouncement($data,$id);
        if(!$res){
            return ApiResponseHelper::apiError("Insertation failed","Announcement not Fetched");
        }
        return ApiResponseHelper::apiSuccess("Insertation Successfully",$res);
    
    
    }

     public function deleteAnnouncement($id){
        $res=$this->AnnouncementModel->deleteAnnouncement($id);
        if(!$res){
            return ApiResponseHelper::apiError("Deletation failed","Announcement not Fetched");
        }
        return ApiResponseHelper::apiSuccess("Deletation Successfully",$res);
    
    }

    public function getAllAnnouncement(){
        $res = $this->AnnouncementModel->getAllAnnouncement();
        if(!$res){
            return ApiResponseHelper::apiError("Not data found","Announcement not Fetched");
        }
        return ApiResponseHelper::apiSuccess("Data Fetched Successfully",$res);
    }    

     public function updateAnnouncement($data){

        $res = $this->AnnouncementModel->updateAnnouncement($data);
        if(!$res){
            return ApiResponseHelper::apiError("Data not updating","Data not updating");
        }
        return ApiResponseHelper::apiSuccess("Data updating Successfully",$res);


    }

}