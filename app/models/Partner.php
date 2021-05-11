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
        $this->db->query('SELECT *, activity.name as partner_activity FROM partners JOIN activity on partners.activity=activity.id');
        $result = $this->db->getAll();
        return $result;
    }
}