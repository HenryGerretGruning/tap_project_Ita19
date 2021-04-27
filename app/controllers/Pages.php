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

        $data = array(
            'title' => 'Welcome to Pages',
            'content' => 'content of the page');
        $this->view('pages/index', $data);
    }
}