<?php

    class Shares extends Controller{
        protected function index(){
            $viewModel = new ShareModel();
            $this->returnView($viewModel->index(), true);
         }

         protected function add(){
             if(!isset($_SESSION['isLoggedIn'])){
                header("Location: ".ROOT_URL."shares");
             }
            $viewModel = new ShareModel();
            $this->returnView($viewModel->add(), true);
         }
    }