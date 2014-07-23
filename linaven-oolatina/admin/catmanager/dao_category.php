<?php

require_once dirname(__FILE__) . '/db_connection.php';

class dao_category {

    /**
     * 
     * @return array of all category
     */
    public function get_all() {
        $db = new db_connection();
        $con = $db->open_connect();

        $query = "SELECT * FROM tbl_category";
        $result = mysqli_query($con, $query) or die('Failed ' . mysqli_error());
        $list = array();
        while ($row = mysqli_fetch_array($result)) {
            array_push($list, $row);
        }

        $db->close_connect($con);
        return $list;
    }

    /**
     * 
     * @param type $cat_id
     * @param type $cat_name
     * @return boolean
     */
    public function check($cat_name) {
        $db = new db_connection();
        $con = $db->open_connect();

        $query = "SELECT * FROM tbl_category WHERE cat_name = '" . $cat_name . "' ";
        $result = mysqli_query($con, $query) or die('Failed ' . mysqli_error());
        if (mysqli_fetch_array($result) == TRUE) {
            $db->close_connect($con);
            return TRUE;
        } else {
            $db->close_connect($con);
            return FALSE;
        }
    }

    public function get_by_id($cat_id) {
        $db = new db_connection();
        $con = $db->open_connect();

        $query = "SELECT * FROM tbl_category WHERE cat_id = " . $cat_id;
        $result = mysqli_query($con, $query) or die('Failed ' . mysqli_error());
        $row = mysqli_fetch_array($result);
        
        $db->close_connect($con);
        return $row;
    }

    /**
     * 
     * @param type $cat_name
     * @param type $parent_id
     * @return TRUE: insert success
     * @return FALSE: insert failed
     */
    public function insert($cat_name, $parent_id) {
        $db = new db_connection();
        $con = $db->open_connect();

        if ($this->check($cat_name)) {
            $db->close_connect($con);
            return FALSE;
        }
        $query = "INSERT INTO tbl_category(cat_name, parent_id) VALUES ('" . $cat_name . "', " . $parent_id . ")";
        mysqli_query($con, $query) or die('Insert Failed! : ' . mysqli_error());
        $db->close_connect($con);
        return TRUE;
    }

    /**
     * 
     * @param type $cat_id
     * @param type $cat_name
     * @param type $parent_id
     * @return boolean
     */
    public function edit($cat_id, $cat_name, $parent_id) {
        $db = new db_connection();
        $con = $db->open_connect();

        $check_query = "SELECT * FROM tbl_category WHERE cat_id != " . $cat_id . " AND cat_name = '" . $cat_name . "'";
        $result = mysqli_query($con, $check_query) or die('Failed query!');
        $row = mysqli_fetch_array($result);
        if (!empty($row)) {
            return -1;
        }
        if($cat_id == $parent_id){
            return 0;
        }

        $query = "UPDATE tbl_category SET cat_name = '" . $cat_name . "', parent_id = " . $parent_id . " WHERE cat_id = " . $cat_id;
        mysqli_query($con, $query) or die('Update Failed! : ' . mysqli_error());
        $db->close_connect($con);
        return 1;
    }

    /**
     * 
     * @param type $cat_id
     * @return array parent of Cat ID input
     */
    public function get_children($cat_id){
        $db = new db_connection();
        $con = $db->open_connect();

        $query = "SELECT * FROM tbl_category WHERE parent_id = " . $cat_id;
        $result = mysqli_query($con, $query) or die('Select Failed! : ' . mysqli_error());
        $list_children = array();
        while ($row = mysqli_fetch_array($result)) {
            array_push($list_children, $row);
        }

        $db->close_connect($con);
        return $list_children;
    }
    
    public function delete_basic($cat_id) {
        $db = new db_connection();
        $con = $db->open_connect();

        $query = "DELETE FROM tbl_category WHERE cat_id = " . $cat_id;
        mysqli_query($con, $query) or die('Update Failed! : ' . mysqli_error());

        $db->close_connect($con);
    }
    
    public function delete($cat_id) {
        $db = new db_connection();
        $con = $db->open_connect();

        $children = $this->get_children($cat_id);
        foreach ($children as $child):
            $list_child = $this->get_children($child['cat_id']);
            if (empty($list_child)) :
                $this->delete_basic($child['cat_id']);
            else :
                $this->delete($child['cat_id']);
            endif;
        endforeach;
        
        $this->delete_basic($cat_id);
        
        $db->close_connect($con);
        return TRUE;
    }

    public function get_name($cat_id) {
        $db = new db_connection();
        $con = $db->open_connect();

        if ($cat_id == -1) {
            return "NULL";
        }
        $query = "SELECT * FROM tbl_category WHERE cat_id = " . $cat_id;
        $result = mysqli_query($con, $query) or die('Failed ' . mysqli_error());
        $row = mysqli_fetch_array($result);
        
        $db->close_connect($con);
        return $row['cat_name'];
    }
}
