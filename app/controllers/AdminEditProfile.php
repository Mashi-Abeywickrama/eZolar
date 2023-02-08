<?php
define('__ROOT__', dirname(dirname(dirname(__FILE__))));
require_once(__ROOT__.'/app/helpers/session_helper.php');
  class AdminEditProfile extends Controller {
    public function __construct(){
        $this->adminEditProfileModel = $this->model('AdminEditProfileModel');
    }

    public function index(){

        if (!isLoggedIn()){
            redirect('login');
        }

        $user_Id = $this->adminEditProfileModel->getUserID([$_SESSION['user_email']]);
        $rows  = $this->adminEditProfileModel-> getProfile($user_Id);
        $_SESSION['rows'] = $rows;
        $data = [
            'title' => 'ezolar Edit Profile',
        ];
        $this->view('Admin/editMyProfile', $data);

    }

    public function editProfile(){
        $name = $_POST['name'];
        $bio = $_POST['bio'];
        $telno = $_POST['telno'];
        $user_Id = $this->adminEditProfileModel->getUserID([$_SESSION['user_email']]);

        $inputs = array($name,$bio,$telno,$user_Id);
        $this->adminEditProfileModel->editProfile($inputs);

    }

  }
  ?>