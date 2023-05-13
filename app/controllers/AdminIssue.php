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
      $_SESSION['rows'] = array('read'=>[],'unread'=>[],'resolved'=>[]);

      foreach ($issues as $item){
        if ($item->isRead == 0 && $item->isResolved == 0){
          $_SESSION['rows']['unread'][] = $item;
        } else if ($item->isRead == 1 && $item->isResolved == 0) {
          $_SESSION['rows']['read'][] = $item;
        }else if ($item->isRead == 1 && $item->isResolved == 1){
          $_SESSION['rows']['resolved'][] = $item; 
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

    public function resolveIssue($IssueID){
      if(!isLoggedIn()){
        redirect('login');
      }
      $issue = $this->issueModel->resolveIssue($IssueID);
      redirect('AdminIssue');

    }

  }