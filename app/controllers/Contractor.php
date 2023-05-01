<?php
  define('__ROOT__', dirname(dirname(dirname(__FILE__))));

class Contractor extends Controller
{
    public function __construct()
    {
      $this->projectModel = $this->model('ProjectModel');
    }
    public function index(){

        if(!isLoggedIn()){
  
          redirect('login');
        }
        $data = [
          'title' => 'eZolar My Schedule',
        ];
        $this->view('Contractor/dashboard', $data);
      }
  
    public function reportIssue()
    {
        $data = [
            'title' => 'eZolar Login',
        ];

        $this->view('Contractor/reportissue', $data);
    }
    public function ongoingprojects()
    {
        $data = [
            'title' => 'eZolar Login',
        ];
        $this->view('Contractor/acceptedProjects', $data);
    }
    public function projectrequests()
    {
      $rows = $this->projectModel->getContractorProjects($this->projectModel->getUserID([$_SESSION['user_email']]));

      
        $data = [
            'title' => 'eZolar Login',
            'project' => $rows,
        ];
        $this->view('Contractor/projectRequests', $data);
    }
    public function completedprojects()
    {
        $data = [
            'title' => 'eZolar Login',
        ];
        $this->view('Contractor/completedProjects', $data);
    }
    public function schedule(){
        $data = [
            'title' => 'eZolar Login',
        ];
        $this->view('Contractor/schedule', $data);
    }

}