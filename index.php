<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Login</title>
    <link rel="stylesheet" href="design/auth.css">
</head>
<body>
    <section>
        <div>
            <div>
                <div>
                    <h1>Form Login</h1>
                    <b>Selamat datang kembali!.</b> 

                    <form action="function/login.php" method="post">
                        <br />

                        <label for="Email">Email</label> <br />
                        <input type="email" name="email" required />
                        <br /><br />

                        <label for="">Password</label> <br />
                        <input type="password" name="password" required /> <br />

                        <br />

                        <button type="submit" name="login">
                            Login
                        </button>

                        <br /> <br />
                        <?php echo htmlspecialchars("belum punya akun? ") ?> <a href='register.php'>Daftar disini!</a>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>
</html>