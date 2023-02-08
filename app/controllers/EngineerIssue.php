<?php
  define('__ROOT__', dirname(dirname(dirname(__FILE__))));
  // require_once(__ROOT__.'\app\helpers\session_helper.php');

  class EngineerIssue extends Controller {
    
    public function __construct(){ 
        $this->issueModel = $this->model('IssueModel');
    }
    
    public function index(){

      if(!isLoggedIn()){

        redirect('login');
      }

      $eng_info = $this->issueModel->getUser([$_SESSION['user_email']]);
      $_SESSION['row'] = $eng_info;
      $eng_Id = $eng_info -> userID;
      $rows  = $this->issueModel-> getAssignedProjects($eng_Id);
      $_SESSION['rows'] = $rows;
      $data = [
        'title' => 'eZolar Inquiry',
      ];
      $this->view('Engineer/report-issue', $data);
    }

    public function newIssue(){
      if(!isLoggedIn()){

        redirect('login');
      }
        $eng_info = $this->issueModel->getUser([$_SESSION['user_email']]);
        $UserID = $eng_info -> userID;
        $project_ID = $_POST['project-id'];
        $topic = $_POST['issue-topic'];
        $message = $_POST['issue-message'];
        
        
        $inputs = array($UserID,$project_ID,$topic,$message);
        $this->issueModel->addIssue($inputs);
        redirect('User/dashboard');

    }

  }