<?php


class Partners extends Controller
{

    /**
     * Partners constructor.
     */
    public function __construct()
    {
        $this->partnerModel = $this->model('Partner');
    }

    public function index()
    {
        // echo 'index method is loaded<br>';
        $partners = $this->partnerModel->getPatners();
        $data = array(
            'title' => 'Koostööpartnerid',
            'partners' => $partners
        );
        $this->view('partners/index', $data);
    }

    public function show($id)
    {
        $partner = $this->partnerModel->getPartner($id);
        $partner_activity = $this->partnerModel->getPartnerActivity($id);
        $data = array(
            'partner' => $partner,
            'activity' => $partner_activity
        );
        $this->view('partners/show', $data);
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = array(
                'name' => trim($_POST['name']),
                'name_err' => '',
                'reg_nr' => trim($_POST['reg_nr']),
                'reg_nr_err' => '',
                'email' => trim($_POST['email']),
                'email_err' => '',
                'phone' => trim($_POST['phone']),
                'phone_err' => '',
                'act' => trim($_POST['act']),
                'act_err' => '',
                'loc' => trim($_POST['loc']),
                'loc_err' => ''
            );
            if (empty($data['name'])) {
                $data['name_err'] = 'Palun lisa partneri nimi';
            }
            if (empty($data['reg_nr'])) {
                $data['reg_nr_err'] = 'Palun lisa registiri number';
            }
            if (empty($data['email'])) {
                $data['email_err'] = 'Palun lisa email';
            }
            if (empty($data['phone'])) {
                $data['phone_err'] = 'Palun lisa telefoninumber';
            }
            if (empty($data['act'])) {
                $data['act_err'] = 'Palun lisa tegevuse number';
            }
            if (empty($data['loc'])) {
                $data['loc_err'] = 'Palun lisa asukoht';
            }
            if (empty($data['name_err']) and empty($data['reg_nr_err']) and empty($data['email_err']) and empty($data['phone_err']) and empty($data['act_err']) and empty($data['loc_err'])) {
                if ($this->partnerModel->addPartners($data)) {
                    header('Location: ' . URLROOT . '/partners/index');
                } else {
                    $this->view('partners/add', $data);
                }
            }
        } else {
            $data = array();
            $this->view('partners/add', $data);
        }

    }
}