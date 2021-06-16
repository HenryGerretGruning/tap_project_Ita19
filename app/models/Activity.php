<?php


class Activity
{
    private $db;

    /**
     * Activity constructor.
     */
    public function __construct()
    {
        $this->db = new Database();
    }

    public function getActivities()
    {
        $this->db->query('SELECT * FROM activity');
        $result = $this->db->getAll();
        return $result;
    }

    public function getPartners($id)
    {
        $this->db->query('SELECT *, 
                                partners.name as partner_name, 
                                activity.name as partner_activity, 
                                partners.id as partner_id
                                FROM activity 
                                INNER JOIN partners
                                ON partners.activity = activity.id
                                WHERE activity.id=:id
                                ');
        $this->db->bind('id', $id);
        $result = $this->db->getAll();
        return $result;
    }

    public function getActivity($id)
    {
        $this->db->query('SELECT * FROM activity WHERE id=:id');
        $this->db->bind('id', $id);
        $result = $this->db->getOne();
        return $result;
    }

    public function addActivity($data)
    {
        $this->db->query('INSERT INTO activity SET name=:name');
        $this->db->bind('name', $data['name']);
        $result = $this->db->execute();
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}