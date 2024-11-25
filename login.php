<?php session_start();
include "db_conn.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Access the form data using the 'name' attribute
        $uname = $_POST['uname'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM users WHERE user_name='$uname' AND password='$password'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) === 1) {
                header("Location: home.html");
                exit();
        }
        else{
        alert("Wrong Username Or Password");
        exit();
    }}
    function alert($msg) {
        echo "<script type='text/javascript'>alert('$msg');
        window.location.href = 'index.html';
    </script>";
    }