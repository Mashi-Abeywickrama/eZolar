<?php

class Index extends Controller {
    public function __construct(){ 
    }
    
    public function index(){
      $data = [
        'title' => 'eZolar',
      ];
     
      $this->view('Includes/header', $data);
      $this->view('Includes/footer', $data);
      $this->view('Includes/navbar', $data);
      // $this->view('Customer/inquiry', $data);
      $this->view('Authentication/login', $data);
    }

    public function about(){
      $data = [
        'title' => 'About Us'
      ];

      $this->view('pages/about', $data);
    }

    public function contact(){
      $data = [
        'title' => 'About Us'
      ];

      $this->view('pages/contact', $data);
    }
  }