<?php
    require_once('./config/dbconfig.php');
    $db = new contentoperations();
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

    <div class="container">
        <h5 class="text-center">CREATE A POST</h5>
        <div class="row">
            <div class="col-lg-10 m-auto">
                <div class="card">

                    <div class="card-body">
                        <form method="POST" autocomplete="off">
                            <?php
                                $db->store_content();
                            ?>
                            <div class="mb-3 mt-3">
                                <label class="form-label">Enter Title</label>
                                <input type="text" class="form-control" name="title">
                            </div>
                            <div class="mb-3 mt-3">
                                <label class="form-label">Enter Content</label>
                                <textarea class="form-control" name="content"></textarea>
                            </div>
                            <button name="createpost" class="btn btn-primary">Create Post</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>

    </div>
</body>

</html>