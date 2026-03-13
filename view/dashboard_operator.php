<?php 
include_once '../service/connect.php';
session_start();

if (!$_SESSION['isLogin'] == true) {
    header("location: ../index.php");
}

function e($string) {
    return htmlspecialchars(trim(strip_tags($string)), ENT_QUOTES, 'UTF-8');
}

$res = $sql->query("SELECT * FROM barang");
$total_user = $res->num_rows;

$username = $_SESSION['username'];
$id = 1;


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
    <title>Operator Dashboard - UKOM</title>
    <link rel="stylesheet" href="../design/style.css">
</head>
<body>

    <div class="wrapper">
        <aside class="sidebar">
            <div class="brand">
                <div class="logo"></div>
                <span>OP-Space</span>
            </div>
            <nav class="menu">
                <a href="#" class="active">Dashboard</a>
                <a href="#">Data Barang</a>
                <a href="#">Transaksi</a>
                <a href="#">Riwayat</a>
            </nav>
            <div class="user-info">
                <p>Logged as:</p>
                <strong><?= e($username) ?></strong>
                <form action="" method="post">
                    <button name="Logout" class="btn-logout">Logout</button>
                </form>
            </div>
        </aside>

        <main class="main-panel">
            <header class="top-bar">
                <h2>Overview Dashboard</h2>
                <div class="date"><?= date('l, d M Y') ?></div>
            </header>

            <section class="grid-stats">
                <div class="stat-box gradient-1">
                    <p>Total Barang</p>
                    <h3><?= $total_user ?></h3>
                </div>
                <div class="stat-box gradient-2">
                    <p>Pending Task</p>
                    <h3>12</h3>
                </div>
                <div class="stat-box gradient-3">
                    <p>Completed</p>
                    <h3>156</h3>
                </div>
            </section>

            <section class="table-section">
                <div class="table-card">
                    <h3>Data Aktivitas Terbaru</h3>
                    <table>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Barang</th>
                                <th>Jenis Barang</th>
                                <th>Harga Barang</th>
                                <th>Stok Barang</th>
                                <th>Status</th>
                                <th>Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($res as $r): ?>
                            <tr>
                                <td><?= $id++ ?></td>
                                <td><?= $r['nama_barang'] ?></td>
                                <td><?= $r['kategori'] ?></td>
                                <td><?= $r['harga'] ?></td>
                                <td><?= $r['stok'] ?></td>
                                <td><span class="badge success">Success</span></td>
                                <td><?= $r['created_at'] ?></td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </section>
        </main>
    </div>

</body>
</html>