<?php
    require_once('./config/contentoperation.php');
    $db = new contentoperations();

    if(isset($_GET['U_ID']))
    {
        global $db;        
        $id = $_GET['U_ID'];
        $db->delete_record($id);
        if($db->delete_record($id))
        {
            $db->set_message('<div class="alert alert-danger"> Post Deleted! </div>');
                header("Location: post.php");
        }
        else
        {
            $db->set_message('<div class="alert alert-danger"> Failed! </div>');

        }
    }

?>