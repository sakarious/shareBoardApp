<?php

    class UserModel extends Model{
        public function register(){
            //Insert User to Database
            $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            if(isset($post['submit'])){
                if(empty($post['name']) || !empty($post['email']) || !empty($post['password'])){
                    Message::setMsg("All fields must be filled", 'error');
                }


                if(!empty($post['name']) && !empty($post['email']) && !empty($post['password'])){
                    
                    //assign to variables

                    $name = $post['name'];
                    $email = $post['email'];
                    $password = md5($post['password']);

                    echo "<h3> Your name is " . $name. "<br> Your email is " .$email. "<br> Your password is " .$password. ".</h3>";

                    //Insert to DB
                    $this->query("INSERT INTO users (name, email, password) VALUES (:name, :email, :password)");

                    $this->bind(':name', $name);
                    $this->bind(':email', $email);
                    $this->bind(':password', $password);

                    $this->execute();

                    if($this->lastInsertId()){
                        //take to home
                        header("Location: " .ROOT_URL."users/login");
                    }
                }
            }
        }

        public function login(){
            //sanitize input
            $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            //check if sign in button is hitted
            if(isset($post['submit'])){
                if(!empty($post['email']) && !empty($post['password'])){
                    $email = $post['email'];
                    $password = md5($post['password']);

                    //Compare login
                    $this->query("SELECT * FROM users WHERE email = :email AND password = :password");
                    $this->bind(":email", $email);
                    $this->bind(":password", $password);

                    $row = $this->single();

                    if($row){
                        $_SESSION['isLoggedIn'] = true;
                        // $_SESSION['userData'] = [
                        //     "id" => $row['id'],
                        //     "name" => $row['name'],
                        //     "email" => $row['email']
                        // ];
                        $_SESSION['id'] = $row['id'];
                        $_SESSION['name'] = $row['name'];
                        $_SESSION['email'] = $row['email'];
                        header("Location: " .ROOT_URL."shares");
                    } else {
                        Message::setMsg('Incorrect Username or password', 'error');
                    }
                }
            }
        }
    }