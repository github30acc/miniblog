<?php
    require_once('./config/dbconfig.php');
    $db = new contentoperations();
    $id = $_GET['U_ID'];
    $result = $db->get_post($id);
    $data = mysqli_fetch_assoc($result);
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
                        <a class="nav-link active" href="#">Logout</a>
                    </li>
                </ul>
            </form>
        </div>
    </nav>

    <div class="container">
        <h5 class="text-center">UPDATE THE POST</h5>
        <div class="row">
            <div class="col-lg-10 m-auto">
                <div class="card">

                    <div class="card-body">
                        <form method="POST" autocomplete="off">
                            <?php
                                $db->update();
                            ?>
                            <input type="text" class="form-control" name="id" value="<?php echo $data['id']; ?>" hidden>
                            <div class="mb-3 mt-3">
                                <label class="form-label">Enter New Title</label>
                                <input type="text" class="form-control" name="title"
                                    value="<?php echo $data['title']; ?>">
                            </div>
                            <div class="mb-3 mt-3">
                                <label class="form-label">Enter New Content</label>
                                <textarea class="form-control" name="content"><?php echo $data['content']; ?></textarea>
                            </div>
                            <button name="editpost" class="btn btn-primary">Update Post</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>

    </div>
</body>

</html>