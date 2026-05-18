<?php

namespace App\Admin\Model\Announcement;

use Config\Database;

class AnnouncementModel
{
    protected $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function createAnnouncement($data,$id){
        $sql="Insert into announcements (title, description,starting_datetime, ending_datetime, admin_id) values(?,?,?,?,?)";
        return $this->db->query($sql, [
            $data['title'],
            $data['description'],
            $data['starting_datetime'],
            $data['ending_datetime'],
            $id
        ]);
        
    }

    public function deleteAnnouncement($id){
        $sql="delete from announcements where id = ?";
        return $this->db->query($sql, [$id]);
        
    }

     public function getAllAnnouncement(){
        $sql="select * from announcements";
        $query = $this->db->query($sql);
        return $query->getResultArray();
    }    

    public function updateAnnouncement($data)
{

    $sql = "SELECT * FROM announcements WHERE id = ?";

    $query = $this->db->query($sql, [$data['id']]);

    $oldData = $query->getRowArray();

    $title = ($data['title'] ?? null) ? $data['title']: $oldData['title'];

    $starting_datetime = ($data['starting_datetime'] ?? null) ? $data['starting_datetime'] : $oldData['starting_datetime'];

    $ending_datetime = ($data['ending_datetime'] ?? null) ? $data['ending_datetime']: $oldData['ending_datetime'];


    $sql = "
        UPDATE announcements
        SET title = ?,
            starting_datetime = ?,
            ending_datetime = ?
        WHERE id = ?
    ";

    $this->db->query($sql, [
        $title,
        $starting_datetime,
        $ending_datetime,
        $data['id']
    ]);

    return true;
}

}