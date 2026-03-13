<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Register</title>
    <link rel="stylesheet" href="design/auth.css">
</head>
<body>
    <section>
        <div>
            <div>
                <div>
                    <h1>Form Register</h1>
                    <b>Silahkan masukan sesuai format yang ada</b> 

                    <form action="function/register.php" method="post">
                        <br />

                        <label for="Email">Email</label> <br />
                        <input type="email" name="email" required />

                        <br /><br />

                        <label for="">Username</label> <br />
                        <input type="text" name="username" required />

                        <br /><br />

                        <label for="">Password</label> <br />
                        <input type="password" name="password" required /> <br />

                        <br />

                        <button type="submit" name="login">
                            Register
                        </button>

                        <br /> <br />
                        <?php echo htmlspecialchars("Sudah punya akun? ") ?> <a href='index.php'>Login disini!</a>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>
</html>