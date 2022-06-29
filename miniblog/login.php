<?php
    require_once('./config/dbconfig.php');
    $db = new authlogin();
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

<style>
#r {
    position: absolute;
    right: 8px;
}
</style>

<body>

    <nav class="navbar navbar-expand-sm bg-primary navbar-dark">
        <div class="container-fluid">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" href="#">MiniBlog</a>
                </li>
                <li class="nav-item" id="r">
                    <a class="nav-link active" href="#">Login</a>
                </li>
            </ul>
        </div>
    </nav>

    <?php
        
    ?>
    <div class="container">
        <h5 class="text-center">Login</h5>
        <div class="row">
            <div class="col-lg-5 m-auto">
                <div class="card">
                    <div class="card-body">
                        <form method="POST">
                            <?php
                                $db->login();
                            ?>
                            <div class="mb-3 mt-3">
                                <label class="form-label">Enter Username</label>
                                <input type="text" class="form-control" name="user" require="require">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Enter Password</label>
                                <input type="password" class="form-control" name="password" require>
                            </div>
                            <button name="login" class="btn btn-primary">Login</button>
                            <a href="index.php" class="btn btn-primary">Register</a>

                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>

</html>