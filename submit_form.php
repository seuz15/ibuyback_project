<?php
include_once "config.php";

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Escape user inputs for security
$last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
$first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
$middle_name = mysqli_real_escape_string($conn, $_POST['middle_name']);
$email_address = mysqli_real_escape_string($conn, $_POST['email_address']);
$user_name = mysqli_real_escape_string($conn, $_POST['user_name']);
$pass_word = mysqli_real_escape_string($conn, $_POST['pass_word']);
$birth_date = mysqli_real_escape_string($conn, $_POST['birth_date']);
$sex = mysqli_real_escape_string($conn, $_POST['sex']);
$terms_accepted = isset($_POST['terms_accepted']) ? 1 : 0;

// Insert data into the database
$sql = "INSERT INTO tbl_signupForm (lastName, firstName, middleName, emailAddress, userName, passWord, birthDate, seX, termsAccepted)
        VALUES ('$last_name', '$first_name', '$middle_name', '$email_address', '$user_name', '$pass_word', '$birth_date', '$sex', '$terms_accepted')";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
    header("Location: login.html");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
