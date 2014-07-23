<?php

class config {

    private $db_name = 'linavenf_ecommerce';
    private $db_host = 'localhost';
    private $db_user = 'linavenf_ecommer';
    private $db_pass = '0ekle4iens0aqdr';

    public function get_db_name() {
        return $this->db_name;
    }

    public function get_db_host() {
        return $this->db_host;
    }

    public function get_db_user() {
        return $this->db_user;
    }

    public function get_db_pass() {
        return $this->db_pass;
    }

}
