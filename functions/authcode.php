<?php

include_once '../config/dbcon.php'; 

session_start();

if(isset($_POST['register'])) 
{
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);


    // Checking Email already Registed....
    $check_email = "SELECT email FROM users WHERE email = '$email'";
    $check_email_result = mysqli_query($conn, $check_email);
    if(mysqli_num_rows($check_email_result) > 0)
    {
        $_SESSION['message'] = "Email already Registared...!";
        header('location: ../register.php');
    }
    else
    {
        if($password == $cpassword)
        {
            // insert User Data
            $query = "INSERT INTO users (name, email, phone, password) VALUES ('$name','$email','$phone','$password')";
            $result = mysqli_query($conn, $query);

            if($result)
            {
                $_SESSION['message'] = "Registration Successfull...!";
                header('location: ../login.php');
            }
            else
            {
                $_SESSION['message'] = "Something went Wrong...!";
                header('location: ../register.php');
            }
        }
        else
        {
            $_SESSION['message'] = "Password do not match!";
            header('location: ../register.php');
        }

    }

}


else if(isset($_POST['login']))
{
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $login_query = "SELECT * FROM users WHERE email = '$email' AND password = '$password' ";
    $result = mysqli_query($conn, $login_query);

    if($result)
    {
        $_SESSION['auth'] = true;

        $user_data = mysqli_fetch_array($result);
        $username = $user_data['name'];
        $useremail = $user_data['email'];

        $_SESSION['auth_user'] = [
            'name' => $username,
            'name' => $useremail
        ];

        $_SESSION['message'] = "Logged in Successfully...!";
        header('location: ../index.php');

    }
    else
    {
        $_SESSION['message'] = "Invalid Username & Password...!";
        header('location: ../login.php');
    }
}