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
            return ApiResponseHelper::apiResponseHandler("Insertation failed","Announcement not Fetched",null,400);
        }
        return ApiResponseHelper::apiResponseHandler("Insertation Successfully",$res,200);
    
    
    }

     public function deleteAnnouncement($id){
        $res=$this->AnnouncementModel->deleteAnnouncement($id);
        if(!$res){
            return ApiResponseHelper::apiResponseHandler("Deletation failed","Announcement not Fetched",null,400);
        }
        return ApiResponseHelper::apiResponseHandler("Deletation Successfully",$res,200);
    
    }

    public function getAllAnnouncement(){
        $res = $this->AnnouncementModel->getAllAnnouncement();
        if(!$res){
            return ApiResponseHelper::apiResponseHandler("Not data found","Announcement not Fetched",null,400);
        }
        return ApiResponseHelper::apiResponseHandler("Data Fetched Successfully",$res,200);
    }    

     public function updateAnnouncement($data){

        $res = $this->AnnouncementModel->updateAnnouncement($data);
        if(!$res){
            return ApiResponseHelper::apiResponseHandler("Data not updating","Data not updating",null,400);
        }
        return ApiResponseHelper::apiResponseHandler("Data updating Successfully",$res,200);


    }

}