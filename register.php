<?php session_start();
include "db_conn.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Access the form data using the 'name' attribute
    $uname = $_POST['uname'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
}
$sql = "SELECT * FROM users WHERE user_name='$uname'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) === 0) {
    if ($password == $confirmPassword) {
        $sql = "INSERT INTO users (user_name, password) VALUES ('$uname', '$password')";
        $result = mysqli_query($conn, $sql);
        header("Location: index.html");
        exit();
    }    
}
else {
    alert("Username exist");
    exit();
}
function alert($msg) {
    echo "<script type='text/javascript'>alert('$msg');
    window.location.href = 'register.html';
</script>";
}