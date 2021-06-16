<?php


class Partner
{
    private $db;

    /**
     * Partner constructor.
     */
    public function __construct()
    {
        $this->db = new Database();
    }

    public function getPatners()
    {
        $this->db->query('SELECT *,
                                partners.name as partner_name,
                                activity.name as partner_activity,
                                partners.id as partner_id
                                FROM partners 
                                INNER JOIN activity ON partners.activity = activity.id');
        $result = $this->db->getAll();
        return $result;
    }

    public function getPartner($id)
    {
        $this->db->query('SELECT *, 
                                partners.name as partner_name, 
                                activity.name as partner_activity, 
                                partners.id as partner_id
                                FROM partners 
                                INNER JOIN activity 
                                ON partners.activity = activity.id 
                                INNER JOIN activity_details
                                ON activity.id = activity_details.id
                                WHERE partners.id=:id
                                ');
        $this->db->bind('id', $id);
        $result = $this->db->getOne();
        return $result;
    }

    public function getPartnerActivity($id)
    {
        $this->db->query('SELECT *,
                                activity_details.name as activity_name
                                FROM activity_details 
                                INNER JOIN partner_activity 
                                ON partner_activity.activity_details_id = activity_details.id 
                                WHERE partner_activity.partner_id=:id
                                ');
        $this->db->bind('id', $id);
        $result = $this->db->getAll();
        return $result;
    }

    public function addPartners($data)
    {
        $this->db->query('INSERT INTO partners SET name=:name, reg_nr=:reg_nr, email=:email, phone=:phone, activity=:activity, location=:location');
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':reg_nr', $data['reg_nr']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':phone', $data['phone']);
        $this->db->bind(':activity', $data['act']);
        $this->db->bind(':location', $data['loc']);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}