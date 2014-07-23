<?php

require_once dirname(__FILE__) . '/config.php';

class db_connection {

    public function open_connect() {
        $config = new config();
        $db_host = $config->get_db_host();
        $db_user = $config->get_db_user();
        $db_pass = $config->get_db_pass();
        $db_name = $config->get_db_name();
        $con = new mysqli($db_host, $db_user, $db_pass, $db_name) or die("Can't connect to database");
        return $con;
    }

    public function close_connect($con) {
        mysqli_close($con);
    }

}
