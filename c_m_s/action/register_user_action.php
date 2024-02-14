<?php
echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>';
include('../settings/connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $gender = $_POST["gender"];
    $familyRole = $_POST["family_role"];
    $dob = $_POST["d_o_b"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $re_password = $_POST["re_password"];
    echo $familyRole;


    if ($password !== $re_password) {
        echo '<script>';
        echo 'Swal.fire({
                    icon: "error",
                    title: "Passwords do not match!"
                }).then(function() {
                    window.location = "../login/register_view.php"; 
                });';
        echo '</script>';
        exit;
    }

    //  if ($password !== $re_password) {
    //     echo "we Passwords do not match!";
    //     exit;
    // }

    $hashed_password = password_hash($_POST["password"], PASSWORD_DEFAULT);
 
    $familyRoleQuery = "SELECT fid FROM Family_name WHERE fid = '$familyRole'";
    $familyRoleResult = $conn->query($familyRoleQuery);

 
    if ($familyRoleResult === FALSE) {
        echo "Error: " . $familyRoleQuery . "<br>" . $conn->error;
    } elseif ($familyRoleResult->num_rows > 0) {
        $familyRoleRow = $familyRoleResult->fetch_assoc();
        $fid = $familyRoleRow["fid"];

        $rid = 3; 
 
        $roleQuery = "SELECT rid FROM Role WHERE rid ='$familyRole'";
        $roleResult = $conn->query($roleQuery);

        if ($roleResult === FALSE) {
         echo $rid;
        } elseif 
        ($roleResult->num_rows > 0) {

            $roleRow = $roleResult->fetch_assoc();
            $rid = $roleRow["rid"];
           

            $sql = "INSERT INTO people (fname, lname, gender, dob, tel, email, passwd, fid, rid) 
                    VALUES ('$fname', '$lname', '$gender', '$dob', '$phone', '$email', '$hashed_password', '$fid', '$rid')";

            if ($conn->query($sql) === TRUE) {
                echo "Registration successful!";
                header("Location: ../login/login_view.php");
                exit;
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Error: Role not found.";
            echo "Error: " . $roleQuery . "<br>" . $conn->error;
        }


    } else {
        echo "Error: Family role not found.";
        echo "Error: " . $roleQuery . "<br>" . $conn->error;
    }
}


?>
