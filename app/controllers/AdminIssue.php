<?php
  define('__ROOT__', dirname(dirname(dirname(__FILE__))));
  // require_once(__ROOT__.'\app\helpers\session_helper.php');

  class AdminIssue extends Controller {
    
    public function __construct(){ 
        $this->issueModel = $this->model('IssueModel');
    }
    
    public function index(){

      if(!isLoggedIn()){

        redirect('login');
      }

      $issues = $this->issueModel->getAllIssues();
      $_SESSION['rows'] = array('read'=>[],'unread'=>[]);

      foreach ($issues as $item){
        if ($item->isRead == 0){
          $_SESSION['rows']['unread'][] = $item;
        } else {
          $_SESSION['rows']['read'][] = $item;
        }
      }
      $data = [
        'title' => 'eZolar Reported Issues',
      ];
      $this->view('Admin/view-issues', $data);
    }

    public function viewIssue($IssueID){
      if(!isLoggedIn()){

        redirect('login');
      }
      $issue = $this->issueModel->getIssueDeatils($IssueID);
      $_SESSION['row'] = $issue;
      $this->issueModel->markIssueRead($IssueID);
      $data = [
        'title' => 'eZolar View Issue Details',
      ];
      $this->view('Admin/view-issue-details', $data);
        

    }

  }