<?php


class Pages extends Controller
{

    /**
     * Pages constructor.
     */
    public function __construct()
    {
        $this->pagesModel = $this->model('Page');
    }

    public function index(){
        // echo 'index method is loaded<br>';
        $time = $this->pagesModel->getTime();
        $data = array(
            'title' => 'Welcome to Pages',
            'content' => $time
        );
        $this->view('pages/index', $data);
    }
}