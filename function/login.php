<?php

session_start();
include_once '../service/connect.php';

function aman($string)
{
    return htmlspecialchars(trim($string));
}

if (isset($_POST['login'])) {
    $email = aman($_POST['email']);
    $password = aman($_POST['password']);

    $que = "SELECT * FROM user WHERE email = '$email' AND password = '$password'";
    $result = $sql->query($que);

    try {
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            $_SESSION['username'] = $row['username'];
            $_SESSION['isLogin'] = true;
            $_SESSION['role'] = $row['role'];

            echo '<script>
                window.alert("Berhasil login");
                window.location.href = "../view/dashboard.php";
            </script>';
        } else {
            echo '<script>
                window.alert("gagal login. pastikan email atau password sesuai");
                window.location.href = "../index.php";
            </script>';
        }
    } catch (mysqli_sql_exception $e) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo '<script>
                window.alert("upss, sepertinya anda mengisi bukan email disini!");
                window.location.href = "index.php";
            </script>';
        }
    }
}