<?php
session_start();
require('Connection.php');


// Signin Code Starts from here
if (isset($_POST['signin'])) {
    $sql = "SELECT * FROM `registered_users` WHERE `username`='$_POST[username_email]' OR `email`='$_POST[username_email]'";

    // $sql = "SELECT * FROM `registered_users` WHERE `email`='$_POST[username_email]'";
    $result = mysqli_query($conn, $sql);

    if ($result) {

        if (mysqli_num_rows($result) == 1) {
            $result_fetch = mysqli_fetch_assoc($result);
            if (password_verify($_POST['password'], $result_fetch['password'])) {
                // if password mathches then if block gets executed
                // echo "correct";
                $_SESSION['logged_in'] = true;
                $_SESSION['username'] = $result_fetch['username'];

                // This under given below queries are just implemented for getting user information in user profile "Starts".
                // $justfetchingdata = "SELECT `fullname`, `username`, `email`, `password`, `datetime` FROM `registered_users` WHERE `username`='$_POST[username_email]' OR `email`='$_POST[username_email]'";
                // $justfetchingdataresult = mysqli_query($conn, $justfetchingdata);
                // $justfetchingdataresult_fetchadi = mysqli_fetch_assoc($justfetchingdataresult);
                // $_SESSION['userfullname'] = $justfetchingdataresult_fetchadi['fullname'];
                // $_SESSION['accountcreated'] = $justfetchingdataresult_fetchadi['date'];
                // This above given below queries are just implemented for getting user information in user profile "Ends". 


                echo "
                <script>
                    // alert('Correct Password ! ');
                    window.location.href = 'index.php';
                    </script>";
            } else {
                // if password does not mathches then if block doesn't gets executed
                echo "
                <script>
                    alert('Incorrect Password ! ');
                    window.location.href = 'index.php';
                    </script>";
            }
        } else {
            echo "
            <script>
                alert('Email or Username not Registered ! ');
                window.location.href = 'index.php';
            </script>";
        }
    } else {
        echo "
        <script>
            alert('$result_fetch[username_email] - Email or Username not Registered ! ');
            window.location.href = 'index.php';
        </script>";
    }
}
// Signin Code Ends at here



// Signup Code Starts from here
if (isset($_POST['signup'])) {
    $sql = "SELECT * FROM `registered_users` WHERE `username`='$_POST[username]' or `email`='$_POST[email]'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            // Either username oe email has already been registered 
            $result_fetch = mysqli_fetch_assoc($result);

            if ($result_fetch['username'] == $_POST['username']) {
                // if the username is already registered(taken) then this error will be occured
                echo "
                <script>alert('$result_fetch[username] - Username already taken ! ');
                    window.location.href = 'index.php';
                </script>";
            } else {
                // if the email is already registered(taken) then this error will be occured.

                // Here, there is no need of passing any query as (mysqli_num_rows($result)>0), 
                // So either username or email is taken earlier & then we passed a query for checking existing username.

                // If there is no existing username then it's but obvious that the email has already taken
                // So we will not pass the query again just like how we passed it at the time of fetching username.  

                echo "
                <script>alert('$result_fetch[email] - E-mail already taken ! ');
                    window.location.href = 'index.php';
                </script>";
            }
        } else {
            // it will be executed if there is no records or the username or email is not taken previously.

            // Now we will provide an algorithm to our password here Password_BCRYPT 
            // is an algorithm in Password_hash that is blowfish hash algorithm.

            $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
            $query = "INSERT INTO `registered_users`(`fullname`, `username`, `email`, `password`, `Address`,`datetime`) VALUES ('$_POST[fullname]','$_POST[username]','$_POST[email]','$password','$_POST[Address]', current_timestamp())";
            if (mysqli_query($conn, $query)) {
                // if data is inserted successfully
                echo "
                <script>alert('Registration Successfully');
                window.location.href = 'index.php';
                </script>";
            } else {
                // if data is not inserted successfully (failed)
                echo "
                <script>alert('Registration Unsuccessfull');
                    window.location.href = 'index.php';
                </script>";
            }
        }
    } else {
        echo "
        <script>alert('Cannot Run Query');
            window.location.href = 'index.php';
        </script>";
    }
}
// Signup Code Ends at Here
