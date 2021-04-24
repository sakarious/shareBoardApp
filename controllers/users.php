<?php

    class Users extends Controller{
        protected function register(){
            $viewModel  = new UserModel();
            $this->returnView($viewModel->register(), true);
        }

        protected function login(){
            $viewModel  = new UserModel();
            $this->returnView($viewModel->login(), true);
        }

        protected function logout(){
            unset($_SESSION[isLoggedIn]);
            unset($_SESSION['id']);
            unset($_SESSION['name']);
            unset($_SESSION['email']);
            session_destroy();

            //Redirect to Login
            header("Location: " .ROOT_URL);
        }
        
    }