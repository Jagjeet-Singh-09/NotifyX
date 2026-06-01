<?php

namespace App\Franchise\Models\Announcement;

use Config\Database;

class AnnouncementModel
{
    protected $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function getAllAnnouncement($id)
    {
        $currentDateAndTime = date("Y-m-d H:i:s");
        


        $sql1 = "SELECT *
             FROM announcements as a
             LEFT JOIN target_group as  tg
             ON a.target_group_id = tg.id
             WHERE starting_datetime <= ?
             AND ending_datetime >= ?";

        $data = $this->db->query($sql1, [
            $currentDateAndTime,
            $currentDateAndTime
        ])->getResultArray();

        

        $result = [];

        foreach ($data as $announcement) {
            $inclusions = json_decode($announcement['inclusions'],true);

            $exclusions = json_decode($announcement['exclusions'],true);


            if ($announcement['group_no'] == 2 && !in_array($id, $exclusions) ) {

                $result[] = $announcement;
            }else if ($announcement['group_no'] == 3 && !in_array($id, $exclusions) ) {

                $result[] = $announcement;
            }
             else if ($announcement['group_no'] == 0) {

                if (in_array($id, $inclusions) && !in_array($id, $exclusions)
                ) {

                    $result[] = $announcement;
                }
            }
        }

        return $result;
    }
}
