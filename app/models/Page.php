<?php


class Page
{
    private $db;

    /**
     * Page constructor.
     */
    public function __construct()
    {
        $this->db = new Database();
    }

    public function getTime(){
        $sql = 'SELECT NOW()';
        $this->db->query($sql);
        $result = $this->db->getAll();
        return $result;
    }
}