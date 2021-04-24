<?php

    class ShareModel extends Model{
        public function Index(){
            $this->query('SELECT * FROM shares ORDER BY date_created DESC');
            $rows = $this->resultset();
            return $rows;
        }

        public function add(){
            //Sanitize post array

            $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            if(isset($post['submit'])){

                if(empty($post['title']) || !empty($post['link']) || !empty($post['body'])){
                    Message::setMsg("All fields must be filled", 'error');
                }
                //Insert to database
                if(!empty($post['title']) && !empty($post['body']) && !empty($post['link'])){
                    $title = $post['title'];
                    $body = $post['body'];
                    $link = $post['link'];

                    echo '<h1> Your post title is ' . $title . ', your post content is ' . $body . ' and your link is ' . $link. '</h1>';

                    $this->query("INSERT INTO shares (title,body, link, user_id) VALUES (:title, :body, :link, :user_id) ");

                    $this->bind(":title", $title);
                    $this->bind(":body", $body);
                    $this->bind(":link", $link);
                    $this->bind(":user_id", 1);

                    $this->execute();

                    if($this->lastInsertId()){
                        //redirect
                        header("Location: " .ROOT_URL."shares");
                    }
                }
            }
            return;
        }
    }