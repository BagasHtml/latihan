<?php 
include_once '../service/connect.php';
session_start();

if (!isset($_SESSION['isLogin']) || $_SESSION['isLogin'] !== true) {
    header("location: ../index.php");
    exit();
}

if ($_SESSION['role'] !== 'admin') {
    header("location: dashboard_operator.php");
    exit();
}

$que = "SELECT * FROM user";
$result = $sql->query($que);
$user = $result->num_rows;

function e($string)
{
    return htmlspecialchars(trim(strip_tags($string)));
}

$username = $_SESSION['username'];

if (isset($_POST['Logout'])) {
    session_unset();
    session_destroy();
    header("location: ../index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - UKOM</title>
    <link rel="stylesheet" href="../design/style.css">
</head>
<body>

    <div class="container">
        <nav class="sidebar">
            <h2>AdminPanel</h2>
            <ul>
                <li><a href="#" class="active">Dashboard</a></li>
                <li><a href="#">Data User</a></li>
                <li><a href="#">Laporan</a></li>
                <li><a href="#">Settings</a></li>
                <form action="dashboard.php" method="post">
                <li><button type="submit" name="Logout">
                    Logout
                </button></li>
                </form>
            </ul>
        </nav>

        <main class="content">
            <header>
                <h1>Welcome Back, <?= e($username) ?></h1>
                <p>Hari ini: 14 Maret 2026</p>
            </header>

            <section class="cards">
                <div class="card">
                    <h3>Total Users</h3>
                    <p class="number"><?= $user ?></p>
                </div>
                <div class="card">
                    <h3>Active Sessions</h3>
                    <p class="number">42</p>
                </div>
                <div class="card">
                    <h3>New Reports</h3>
                    <p class="number">5</p>
                </div>
            </section>

            <section class="table-container">
                <h3>Recent Activity</h3>
                <table>
                    <thead>
                        <tr>
                            <th>User</th>
                            <th>Status</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($result as $u): ?>
                        <tr>
                            <td><?= $u['username'] ?></td>
                            <td><span class="status online"><?= $u['role'] ?></span></td>
                            <td><?= $u['email'] ?></td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </section>
        </main>
    </div>

</body>
</html>