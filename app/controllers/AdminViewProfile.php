<?php
define('__ROOT__', dirname(dirname(dirname(__FILE__))));
require_once(__ROOT__.'\app\helpers\session_helper.php');

  class AdminViewProfile extends Controller {
    public function __construct(){
        $this->adminViewProfileModel = $this->model('AdminViewProfileModel');
    }
    
    public function index(){

        if (!isLoggedIn()){
            redirect('login');
        }


        $user_Id = $this->adminViewProfileModel->getUserID([$_SESSION['user_email']]);
        $rows  = $this->adminViewProfileModel-> getProfile($user_Id);
        $_SESSION['rows'] = $rows;
        $data = [
            'title' => 'ezolar Admin Profile',
        ];
        $this->view('Admin/myProfile', $data);


    }

  }
  ?>