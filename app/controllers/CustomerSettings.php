<?php

class CustomerSettings extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        if(!isLoggedIn()){

            redirect('login');
        
        }
        $data = [
            'title' => 'eZolar Home',
        ];
        $this->view('Customer/Settings/settings', $data);

    }
}

?>