<?php
    require_once('./config/dbconfig.php');
    $db = new contentoperations();
    $result = $db->view_post();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Miniblog</title>
</head>

<body>
    <nav class="navbar navbar-expand-sm bg-primary navbar-dark">
        <div class="container-fluid">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" href="#">MiniBlog</a>
                </li>

            </ul>
            <form class="d-flex">
                <ul class="navbar-nav">
                    <li class="nav-item" id="r">
                        <a class="nav-link active" href="#">Hi! <?php echo $_SESSION["user"]; ?></a>
                    </li>
                    <li class="nav-item" id="r">
                        <a class="nav-link active" href="post.php">Home</a>
                    </li>
                    <li class="nav-item" id="r">
                        <a class="nav-link active" href="logout.php">Logout</a>
                    </li>
                </ul>
            </form>
        </div>
    </nav>

    <div class="container mt-3">
        <div class="row">

            <div class="col-lg-8 m-auto">


                <?php
                        $db->dis_message();

                        $db->dis_message();
                        
                    while($data = mysqli_fetch_assoc($result))
                    {
                ?>

                <div class="card">
                    <div class="card-header">
                        <?php echo $data['title']  ?>
                    </div>
                    <div class="card-body">
                        <?php echo $data['content']  ?>
                        <br>
                        <?php 

                        $date=date_create($data['dt']);

                     
                        $datetime = date_format($date, 'dS');
                        $datetime2 = date_format($date, 'F Y G:i:s A');
                        
                        echo 'Date: '.$datetime. ' of ' .$datetime2;  ?>

                    </div>
                    <div class="card-footer">
                        <a href="delete.php?U_ID=<?php echo $data['id'] ?>" class="btn btn-danger btn-sm">DELETE</a>
                        <a href="edit_post.php?U_ID=<?php echo $data['id'] ?>" class="btn btn-warning btn-sm">EDIT</a>

                    </div>

                </div>
                <br>

                <?php
                    }
                ?>


                <div class="card">
                    <div class="card-body">
                        <a href="createpost.php" class="btn btn-primary btn-sm">CREATE NEW POST</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>

</html>