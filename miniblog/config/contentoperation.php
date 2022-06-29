<?php
    require_once('./config/dbconfig.php');
    $db = new dbconfig();

    class contentoperations extends dbconfig
    {
        public function store_content()
        {
            global $db;
            if(isset($_POST['createpost']))
            {
                $title = $db->check($_POST['title']);
                $content = $db->check($_POST['content']);
                
                if($title && $content)
                {
                    if($this->insert_content($title,$content))
                    {
    
                        echo '<div class="alert alert-success"> Created New Post! </div>';
                    }
                    else
                    {
                        echo '<div class="alert alert-danger"> Failed! </div>';
                    }
                }
                else
                {
                    echo '<div class="alert alert-danger"> All Fields Required! </div>';
                }                  
            }


           

        }


        public function update()
        {
            global $db;

                 if(isset($_POST['editpost']))
            {
                $id = $db->check($_POST['id']);
                $title = $db->check($_POST['title']);
                $content = $db->check($_POST['content']);

                if($this->edit_content($id, $title, $content))
                {
                        $this->set_message('<div class="alert alert-success"> Post Updated! </div>');
                        header("Location: post.php");
                }
                else
                {
                         $this->set_message('<div class="alert alert-danger"> Failed! </div>');

                }
            }
        }



        public function set_message($msg)
        {
            if(!empty($msg))
            {
                $_SESSION['Message'] = $msg;
            }
            else
            {
                $msg;
            }
        }

        
        public function dis_message()
        {
            if(isset($_SESSION['Message']))
            {
                echo $_SESSION['Message'];
                unset($_SESSION['Message']);
            }
        }



         public function get_post($id)
        {
            global $db;
            $query = "SELECT * FROM post WHERE id = '$id' ";
            $data = mysqli_query($db->connection,$query);
            return $data;
        }
        
        function insert_content($a,$b)
        {
            global $db;
            $userid = $_SESSION["id"];
            $query = "insert into post (id_user,title,content) values('$userid','$a','$b')";
            $result = mysqli_query($db->connection,$query);

            if($result)
            {
                return true;
            }
            else
            {
                return false;
            }
        }


         function edit_content($a,$b,$c)
        {
            global $db;
            $query = "UPDATE post SET title = '$b', content = '$c' WHERE id = '$a' ";

            // $query = "insert into post (id_user,title,content) values('$a','$b','$c')";
            $result = mysqli_query($db->connection,$query);

            if($result)
            {
                return true;
            }
            else
            {
                return false;
            }
        }


        public function view_post()
        {
            global $db;
            $id = $_SESSION['id'];
            $query = "SELECT * FROM post WHERE id_user = '$id' ";
            $result = mysqli_query($db->connection,$query);
            return $result;
        }

        public function delete_record($id)
        {
            global $db;
            $query = "DELETE from post WHERE id = '$id' ";
            $result = mysqli_query($db->connection,$query);
            if($result)
            {
                return true;
            }
            else
            {
                return false;
            }
            
        }

    }




?>