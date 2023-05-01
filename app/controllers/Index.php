<?php

class Index extends Controller {
    public function __construct(){ 
    }
    
    public function index(){
      $data = [
        'title' => 'eZolar Home',
      ];
      if(!isLoggedIn()){
      $this->view('Includes/header', $data);
        $this->view('Includes/navbar1', $data);
        $this->view('home', $data);
      }
     
      // $this->view('Includes/header', $data);
      $this->view('Customer/navbar', $data);
      $this->view('Contractor/projectDetails', $data);
      // $this->view('home', $data);
    }
    public function home(){
      $data = [
        'title' => 'eZolar Home',
      ];
      if(!isLoggedIn()){
      $this->view('Includes/header', $data);
        $this->view('Includes/navbar1', $data);
        $this->view('home', $data);
      }
     
      // $this->view('Includes/header', $data);
      $this->view('Customer/navbar', $data);
      $this->view('Includes/navbar', $data);
      $this->view('home', $data);
    }
    

    public function about(){
      $data = [
        'title' => 'eZolar about',
      ];
      if(!isLoggedIn()){
        $this->view('Includes/header', $data);
        $this->view('Includes/navbar1', $data);
        $this->view('about', $data);
        $this->view('Includes/footer1', $data);

      } else {
        $this->view('Customer/navbar', $data);
        $this->view('Includes/navbar', $data);
        $this->view('about', $data);
        $this->view('Includes/footer1', $data);
      }
    }

    public function contact(){
      $data = [
        'title' => 'eZolar Contact',
      ];
      if(!isLoggedIn()){
        $this->view('Includes/header', $data);
        $this->view('Includes/navbar1', $data);
        $this->view('contact', $data);
        $this->view('Includes/footer1', $data);
      } else {

        $this->view('Customer/navbar', $data);
      $this->view('Includes/navbar', $data);
      $this->view('contact', $data);
      $this->view('Includes/footer1', $data);
    }
    }
  }