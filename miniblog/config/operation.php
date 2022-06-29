<?php

    require_once('./config/dbconfig.php');
    $db = new dbconfig();

    class operations extends dbconfig
    {
        public function store_user()
        {
            global $db;
            if(isset($_POST['register']))
            {
                $user = $db->check($_POST['user']);
                $email = $db->check($_POST['email']);
                $password = $db->check($_POST['password']);
                $conpassword = $db->check($_POST['conpassword']);
                
                if($user && $email && $password && $conpassword)
                {

                     global $db;
                    $query = "SELECT * FROM user WHERE user = '$user' and `password` ='$password'";
                    $result = mysqli_query($db->connection,$query);
                    if(mysqli_num_rows($result) > 0)
                    {
                        echo '<div class="alert alert-danger"> User and Email Already Taken! </div>';
                    }
                    else
                    {
                           if($password == $conpassword )
                            {
                                if($this->insert_user($user,$email,$password))
                                {
                                    echo '<div class="alert alert-success"> Registration Success! </div>';
                                }
                                else
                                {
                                    echo '<div class="alert alert-danger"> Failed! </div>';
                                }
                            }
                            else
                            {
                                echo '<div class="alert alert-danger"> Password not Match! </div>';
                            }
                    }
                }
                else
                {
                    echo '<div class="alert alert-danger"> All Fields Required! </div>';
                }        
 
            }
        }

        function insert_user($a,$b,$c)
        {
            global $db;
            $query = "insert into user (user,email,password) values('$a','$b','$c')";
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
            $query = "SELECT * FROM post";
            $result = mysqli_query($db->connection,$query);
            return $result;
        }

        public function get_post($id)
        {
            global $db;
            $query = "SELECT * FROM post WHERE id = '$id' ";
            $data = mysqli_query($db->connection,$query);
            return $data;
        }



        
    }




?>