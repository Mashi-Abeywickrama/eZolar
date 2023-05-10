<?php

class Reviews extends Controller {
    public function __construct(){ 
        $this->transactionModel = $this->model('TransactionModel');
        $this->userModel = $this->model('userModel');
        $this->projectModel = $this->model('projectModel');
        $this->reviewsModel = $this->model('reviewsModel');
    }
    
    public function index(){
        $count1 = count($this ->reviewsModel->selectReview(1));
        $count2 = count($this ->reviewsModel->selectReview(2));
        $count3 = count($this ->reviewsModel->selectReview(3));
        $count4 = count($this ->reviewsModel->selectReview(4));
        $count5 = count($this ->reviewsModel->selectReview(5));
        $reviews = $this ->reviewsModel->selectAllReview();
        $total = $count1 + $count2 + $count3 + $count4 + $count5;
        $average_total = $count1 + $count2*2 + $count3*3 + $count4*4 + $count5*5;
        $avg = round($average_total/$total,1);
      $data = [
        'title' => 'eZolar Reviews',
        'count1' => $count1,
        'count2' => $count2,
        'count3' => $count3,
        'count4' => $count4,
        'count5' => $count5,
        'total' => $total,
        'avg' => $avg,
        'review' => $reviews
      ];
      if(!isLoggedIn()){
      $this->view('Includes/header', $data);
        $this->view('Includes/navbar1', $data);
        $this->view('home', $data);
      }
    
        $this->view('Customer/ratings', $data);
    }
    
    public function add() {
        $customer_Id = $this->userModel->getUserID2([$_SESSION['user_email']]);
        $res = $this ->reviewsModel->addReview($customer_Id,$_POST['rating'],$_POST['comment']);
        if ($res) {
            redirect('reviews');
        }

    }
  }