<?php
define('__ROOT__', dirname(dirname(dirname(__FILE__))));
require_once(__ROOT__ . '/app/helpers/session_helper.php');

class Statistics extends Controller
{
    public function __construct()
    {
        $this->StatisticsModel = $this->model('statisticsModel');
    }

    public function index()
    {




    }

    public function salesPerMonth(){
        if (!isLoggedIn()) {
            redirect('login');
        }

        $data = $this->StatisticsModel->salesPerMonth();
//        $labels = array('January','February','March','April','May','June','July','August','September','October','November','December');
        $_SESSION['data'] = $data;
//        $_SESSION['labels'] = $labels;
        $data = [
            'title' => 'ezolar employee details',
        ];

        $this->view('Admin/statistics', $data);
    }

}
