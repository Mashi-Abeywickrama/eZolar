<?php

  class Login extends Controller {
    public function __construct(){ 
    }
    
    public function index(){
      $data = [
        'title' => 'eZolar Login',
      ];
     
      $this->view('Includes/header', $data);
      $this->view('Includes/footer', $data);
      $this->view('Includes/navbar1', $data);
      $this->view('Authentication/login', $data);
    }
    public function forgotpassword(){
      $data = [
        'title' => 'eZolar Login',
      ];
      $this->view('Authentication/forgotPassword', $data); 
    }

  }