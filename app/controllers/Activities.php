<?php


class Activities extends Controller
{

    /**
     * Activities constructor.
     */
    public function __construct()
    {
        $this->activityModel = $this->model('Activity');
    }

    public function index()
    {
        $activities = $this->activityModel->getActivities();
        $data = array(
            'title' => 'Teenused',
            'activities' => $activities
        );
        $this->view('activities/index', $data);
    }

    public function show($id)
    {
        $partners = $this->activityModel->getPartners($id);
        $activity = $this->activityModel->getActivity($id);
        $data = array(
            'activity' => $activity,
            'partners' => $partners
        );
        $this->view('activities/show', $data);
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = array(
                'name' => trim($_POST['name']),
                'name_err' => ''
            );
            if (empty($data['name'])) {
                $data['name_err'] = 'Palun lisa teenuse nimetus';
            }
            if (empty($data['name_err'])) {
                if ($this->activityModel->addActivity($data)) {
                    header('Location: ' . URLROOT . '/activities/index');
                }
            } else {
                $this->view('activities/add', $data);
            }
        } else {
            $data = array();
            $this->view('activities/add', $data);
        }
    }
}
