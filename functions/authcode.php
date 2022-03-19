<?php

include_once '../config/dbcon.php'; 
include_once 'myFunctions.php';


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
        redirect("../register.php", "Email already Registared...!");
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
                redirect("../login.php", "Registration Successfull...!");
            }
            else
            {
                redirect("../register.php", "Something went Wrong...!");
            }
        }
        else
        {
            redirect("../register.php", "Password do not match!");            
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
        $role_as = $user_data['role_as'];
        
        $_SESSION['auth_user'] = [
            'name' => $username,
            'name' => $useremail
        ];

        $_SESSION['role_as'] = $role_as;

        if($role_as == 1)
        {
            redirect("../admin/index.php", "Welcome to Dashboard...!");
        }
        else
        {
            redirect("../index.php", "Logged in Successfully...!");
        }

    }
    else
    {
        redirect("../login.php", "Invalid Username & Password...!");
    }
}