<?php

include_once '../service/connect.php';

function aman($string)
{
    return htmlspecialchars(trim(strip_tags($string)));
}

if (isset($_POST['login'])) {
    $email = aman($_POST['email']);
    $username = aman($_POST['username']);
    $password = aman($_POST['password']);

    $que = "INSERT INTO user (email, username, password, role) VALUES ('$email', '$username', '$password', 'operator')";

    try {
        if ($sql->query($que)) {
            session_start(); 
            $_SESSION['role'] = 'operator';

            echo '<script>
                window.alert("Berhasil register!");
                window.location.href = "../index.php";
            </script>';
        } else {
            echo '<script>
                window.alert("error 500", 500);
                window.location.href = "../register.php";
            </script>';
        }
    } catch (mysqli_sql_exception $e) {
            echo '<script>
                window.alert("username / email duplicate");
                window.location.href = "../register.php";
            </script>';
    }
}