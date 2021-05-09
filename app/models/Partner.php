<?php


class Partner
{

    /**
     * Partner constructor.
     */
    public function __construct()
    {
        $this->db = new Database();
    }

    public function getPartners()
    {
        $this->db->query('SELECT * FROM partners');
        $result = $this->db->getAll();
        return $result;
    }
}