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
        $sql = "SELECT id FROM vendors";
        $vendors = $this->db->query($sql)->getResultArray();

        // Franchise IDs
        $sql2 = "SELECT id FROM franchise";
        $franchise = $this->db->query($sql2)->getResultArray();

        // Convert multidimensional array to simple array
        $allVendorId = array_column($vendors, 'id');
        $allFranchiseId = array_column($franchise, 'id');

        // Merge both arrays
        $allUsers = array_merge($allVendorId, $allFranchiseId);

        // Convert array to JSON/string before storing
        $allUsersJson = json_encode($allUsers);
        $vendorsJson = json_encode($allVendorId);
        $franchiseJson = json_encode($allFranchiseId);

        // Insert All Users
        $sql3 = "INSERT INTO target_group (id, group_name, group_members_id)
                 VALUES (?, ?, ?)";

        $result = $this->db->query($sql3, [1, "All Users", $allUsersJson]);

        if (!$result) {
            return false;
        }

        // Insert All Vendors
        $result2 = $this->db->query($sql3, [2, "All Vendor", $vendorsJson]);

        if (!$result2) {
            return false;
        }

        // Insert All Franchise
        $result3 = $this->db->query($sql3, [3, "All Franchise", $franchiseJson]);

        if (!$result3) {
            return false;
        }

        return true;
    }
}