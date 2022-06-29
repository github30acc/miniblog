<?php
    require_once('./config/dbconfig.php');
    $db = new dbconfig();

    class authlogin extends dbconfig
    {
        public function login()
        {
            global $db;
            if(isset($_POST['login']))
            {
                $user = $db->check($_POST['user']);
                $password = $db->check($_POST['password']);
                
                if(!empty($user) && !empty($password))
                {
                    
                    $query = "SELECT * FROM user WHERE user = '$user' and `password` ='$password'";
                    $result = mysqli_query($db->connection,$query);
                    if(mysqli_num_rows($result) > 0)
                    {
                        while($data = mysqli_fetch_assoc($result))
                        {
                              $_SESSION["id"] = $data['id']; 
                        }
                        
                        $_SESSION["user"] = $user;
                        $_SESSION["password"] = $password;
                        header("Location: post.php");
                    }
                    else
                    {
                        echo '<div class="alert alert-danger"> User or Password is Incorrect! </div>';

                    }
           






                        // if($this->select_user($user,$password))
                        // {
                        //     echo '<div class="alert alert-success"> Registration Success! </div>';
                        // }
                        // else
                        // {
                        //     echo '<div class="alert alert-danger"> Failed! </div>';
                        // }
                }
                else
                {
                    echo '<div class="alert alert-danger"> All Fields Required! </div>';
                }        
                        
            }
        }

        // function select_user($a,$b)
        // {
        //     global $db;
        //     // $query = "insert into user (user,email,password) values('$a','$b')";
        //     $query = "SELECT * FROM user WHERE user = '$a' and `password` ='$b'";
        //     $result = mysqli_query($db->connection,$query);

        //     if(!empty($result))
        //     {
        //         return false;
        //     }
        //     else
        //     {
        //         return true;

        //     }
        // }
    }




?>