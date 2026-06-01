<?php

namespace App\Admin\Model\Groups;

use Config\Database;

class GroupModel
{
    protected $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function createPreDefinedGroups()
    {
        // Vendors IDs
        $sql = "SELECT id FROM vendors where role = 1";
        $vendors = $this->db->query($sql)->getResultArray();

        // Franchise IDs
        $sql2 = "SELECT id FROM vendors where role = 2";
        $franchise = $this->db->query($sql2)->getResultArray();

        $sql3 = "SELECT id FROM vendors";
        $allVendors = $this->db->query($sql3)->getResultArray();


        // Convert multidimensional array to simple array
        $allVendorId = array_column($vendors, 'id');
        $allFranchiseId = array_column($franchise, 'id');
        $allVendorsId = array_column($allVendors, 'id');


        // Convert array to JSON/string before storing
        $allVendorsJson = json_encode($allVendorsId);
        $vendorsJson = json_encode($allVendorId);
        $franchiseJson = json_encode($allFranchiseId);

        // Insert All Users
        $sql3 = "UPDATE target_group SET group_name = ?, group_members_id = ? WHERE id = ?;";

        $result = $this->db->query($sql3, ["All Users", $allVendorsJson,1]);

        if (!$result) {
            return false;
        }

        // Insert All Vendors
        $result2 = $this->db->query($sql3, ["All Vendor", $vendorsJson, 2]);

        if (!$result2) {
            return false;
        }

        // Insert All Franchise
        $result3 = $this->db->query($sql3, ["All Franchise", $franchiseJson, 3]);

        if (!$result3) {
            return false;
        }

        return true;
    }
}