<?php
  define('__ROOT__', dirname(dirname(dirname(__FILE__))));

class Contractor extends Controller
{
    public function __construct()
    {
    }

    public function reportIssue()
    {
        $data = [
            'title' => 'eZolar Login',
        ];

        $this->view('Contractor/reportissue', $data);
    }
    public function assignedProjects()
    {
        $data = [
            'title' => 'eZolar Login',
        ];
        $this->view('Contractor/assignedProjects', $data);
    }
}