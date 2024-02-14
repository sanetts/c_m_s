<?php

session_start();


include('../settings/connection.php');



if (!isset($_POST['button'])) {
    echo "not";
    header("Location: ../login/login_view.php");
    exit();
}


$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM people WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();


if ($result->num_rows == 0) {
    $_SESSION['error_message'] = "User not registered or incorrect email";
    header("Location: ../login/login_view.php");
    exit();
}


$user = $result->fetch_assoc();


if (!password_verify($password, $user['passwd'])) {
    $_SESSION['error_message'] = "Incorrect password";
    header("Location: ../login_view.php");
    exit();
}


$_SESSION['user_id'] = $user['user_id']; 
$_SESSION['role_id'] = $user['rid']; 


header("Location: ../view/home.php");
exit();


$stmt->close();
$conn->close();
?>
