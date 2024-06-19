<?php
include "connection.php";
if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];

    $sql = "UPDATE `new_user_crud` SET `first_name`='$first_name',`last_name`='$last_name',`email`='$email',`gender`='$gender' WHERE `id`='$id'";
    $result = mysqli_query($connect, $sql);
    if ($result) {
        $row_affected = mysqli_affected_rows($connect);
        echo "<script>alert('Database Updated and $row_affected rows affected.');</script>";
    } else {
        echo "<script>alert('Database not updated ! ');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit user</title>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Font Awesome cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
</head>

<body>
    <form action="edit_user.php" method="post">
        <div class="container-fluid bg-primary text-light text-center py-3">
            <h1 class="bg-primary text-light text-center">
                Attendance Management System
                <a href="index.php">
                    <span class="fa fa-home btn btn-primary float-end"></span>
                </a>
            </h1>
        </div>
        <br>
        <div class="container">
            <h2 class="text-dark text-center">Edit User</h2>
            <p class="text-muted text-center">
                Fill old and new information about user to change
            </p>
        </div>
        <br>
        <!-- PHP TO Fetch Data as inputs -->
        <?php

        // $id = $_Get[`id`];
        $sql = "SELECT * FROM `new_user_crud` WHERE id = '$_GET[id]'";
        $result = mysqli_query($connect, $sql);
        $row = mysqli_fetch_array($result);
        if (!$result) {
            echo "<script>alert('Could not Fetch ID Successfull');</script>";
        }
        ?>
        <div class="wrapper mx-5">
            <div class="row">
                <span class="col-12 col-lg-2 col-md-2 col-sm-12 col-xs-12">
                    <div class="input-group bg-alert">
                        <input type="text" class="form-control" id="id" name="id" value="<?php echo $row['id'] ?>">
                    </div>
                    <br>
                </span>
                <span class="col-12 col-lg-5 col-md-5 col-sm-12 col-xs-12">
                    <div class="input-group">
                        <input type="text" class="form-control" id="first_name" name="first_name" value="<?php echo $row['first_name'] ?>">
                    </div>
                    <br>
                </span>
                <span class="col-12 col-lg-5 col-md-5 col-sm-12 col-xs-12">
                    <div class="input-group">
                        <input type="text" class="form-control" id="last_name" name="last_name" value="<?php echo $row['last_name'] ?>">
                    </div>
                    <br>
                </span>
                <span class="col-12 col-lg-7 col-md-7 col-sm-12 col-xs-12">
                    <div class="input-group">
                        <input type="text" class="form-control" id="email" name="email" value="<?php echo $row['email'] ?>">
                    </div>
                    <br>
                </span>
                <span class="col-12 col-lg-5 col-md-5 col-sm-12 col-xs-12">
                    <div class="input-group">
                        <label for="gender" class="form-control-label me-3">Gender : </label>
                        <input type="radio" class="mx-2" name="gender" id="Male" value="Male" <?php echo $row['gender'] == 'Male' ? "checked" : ""; ?>>Male
                        <input type="radio" class="mx-2" name="gender" id="Female" value="Female" <?php echo $row['gender'] == 'Female' ? "checked" : ""; ?>>Female
                        <input type="radio" class="mx-2" name="gender" id="Others" value="Others" <?php echo $row['gender'] == 'Others' ? "checked" : ""; ?>>Others
                    </div>
                </span>
            </div>
        </div>
        <br><br>
        <div class="container text-center">
            <button onclick="going()" class="btn btn-success text-light text-center mx-5" name="submit">Update</button>
            <a href="index.php" class="btn btn-danger text-center mx-5">Cancel</a>
        </div>
    </form>
    <script>
        function going() {
            location.href = "C:/xampp/htdocs/Aditya/PHP(CRUD)/index.php";
        }
    </script>
</body>

</html>