<?php
    session_start();

    require_once('./config/operation.php');
    require_once('./config/authlogin.php');
    require_once('./config/contentoperation.php');

    class dbconfig
    {
        public $connection;
        
        public function __construct()
        {
            $this->db_connect();
        }
        
        public function db_connect()
        {
            $this->connection = mysqli_connect('localhost','root','','miniblog');
            if(mysqli_connect_error())
            {
                die(" Connect failed! ");
            }
        }

        public function check($a)
        {
            $return = mysqli_real_escape_string($this->connection,$a);    

            return $return;
        }
    }
    
  


?>