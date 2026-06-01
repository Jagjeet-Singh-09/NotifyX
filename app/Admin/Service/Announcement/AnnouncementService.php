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
        $result = $this->AnnouncementModel->createAnnouncement($data,$id);
        
        if($result === "inclusionError"){
            return ApiResponseHelper::apiResponseHandler("Please Add group_no = 0 if you want to use inclusions option",null,400);
        }
         if($result === "UnknownGroup"){
            return ApiResponseHelper::apiResponseHandler("Please Add a valid group number",null,400);
        }

        if(!$result){
            return ApiResponseHelper::apiResponseHandler("Insertation failed",null,400);
        }
        
        //$this->setAnnouncement($data['target_group_id'],$announcement_id);
        return ApiResponseHelper::apiResponseHandler("Insertation Successfully",$result,200);
    
    
    }

     public function deleteAnnouncement($id){
        $res=$this->AnnouncementModel->deleteAnnouncement($id);
        if(!$res){
            return ApiResponseHelper::apiResponseHandler("Deletation failed",null,400);
        }
        return ApiResponseHelper::apiResponseHandler("Deletation Successfully",$res,200);
    
    }

    public function getAllAnnouncement(){
        $res = $this->AnnouncementModel->getAllAnnouncement();
        if(!$res){
            return ApiResponseHelper::apiResponseHandler("Not data found",null,400);
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

    // public function setAnnouncement($target_group_id,$Announcement_id){
    //     return $this->AnnouncementModel->setAnnouncement($target_group_id,$Announcement_id);
    // }

}