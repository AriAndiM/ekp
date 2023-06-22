<?php
session_start();
include '../koneksi.php';
//cek apakah sudah login
if (empty($_SESSION['login'])) {
  header("location:../login_instansi.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Nilai | Pembimbing Lapangan</title>
  <meta name="description" content="A high-quality &amp; free Bootstrap admin dashboard template pack that comes with lots of templates and components.">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" id="main-stylesheet" data-version="1.1.0" href="styles/shards-dashboards.1.1.0.min.css">
  <link rel="stylesheet" href="styles/extras.1.1.0.min.css">
  <link rel="shortcut icon" href="../assets/img/utm.png">
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/quill/1.3.6/quill.snow.css">
</head>

<body>
  <div class="container-fluid">
    <div class="row">
      <!-- Main Sidebar -->
      <aside class="main-sidebar col-12 col-md-3 col-lg-2 px-0">
        <div class="main-navbar">
          <nav class="navbar align-items-stretch navbar-light bg-white flex-md-nowrap border-bottom p-0">
            <a class="navbar-brand w-100 mr-0" href="profil.php" style="line-height: 25px;">
              <div class="d-table m-auto">
                <img class="user-avatar rounded-circle mr-2" src="../assets/img/user2.png" alt="User Avatar">
                <?php
                $nama_pembimbing_lapangan = $_SESSION['nama_pembimbing_lapangan'];
                $query = "SELECT * FROM daftar_pembimbing WHERE nama_pembimbing_lapangan = '$nama_pembimbing_lapangan'";
                $sql = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_array($sql)) {
                ?>
                  <span class="d-none d-md-inline-block" style="color: black; font-size:medium;"><?php echo $row['nama_pembimbing_lapangan'] ?></span>
                <?php
                  $id = $row['id_daftar_pembimbing'];
                }
                $id_daftar_pembimbing = $id;
                ?>
              </div>
            </a>
            <a class="toggle-sidebar d-sm-inline d-md-none d-lg-none">
              <i class="material-icons">&#xE5C4;</i>
            </a>
          </nav>
        </div>
        <div class="nav-wrapper">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link" href="home.php">
                <i class="material-icons">home</i>
                <span>Dashboard</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="daftarMHS.php">
                <i class="material-icons">list</i>
                <span>Daftar Mahasiswa</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="monitoring.php">
                <i class="material-icons">monitor</i>
                <span>Monitoring</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="penilaian.php">
                <i class="material-icons">credit_score</i>
                <span>Penilaian</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="../logout.php">
                <i class="material-icons">logout</i>
                <span>Log Out</span>
              </a>
            </li>
          </ul>
        </div>
      </aside>
      <!-- End Main Sidebar -->
    </div>
  </div>
  <div class="container-fluid">
    <div class="row">
      <main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
        <div class="main-navbar sticky-top bg-white">
          <!-- Main Navbar -->
          <div class="main-navbar sticky-top bg-white">
            <!-- Main Navbar -->
            <nav class="navbar align-items-stretch navbar-light flex-md-nowrap p-0">
              <nav class="nav">
                <a href="#" class="nav-link nav-link-icon toggle-sidebar d-md-inline d-lg-none text-center border-left" data-toggle="collapse" data-target=".header-navbar" aria-expanded="false" aria-controls="header-navbar">
                  <i class="material-icons">&#xE5D2;</i>
                </a>
              </nav>
            </nav>
          </div>
        </div>
        <!-- / .main-navbar -->
        <div class="main-content-container container-fluid px-4">
          <!-- Page Header -->
          <div class="page-header row no-gutters py-4">
            <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
              <span class="text-uppercase page-subtitle">Kerja Praktek Teknik Informatika UTM</span>
              <h3 class="page-title">Nilai Pembimbing Lapangan</h3>
            </div>
          </div>
          <div class="container">
            <div class="card">
              <div class="card-body">
                <?php
                $NIM = $_GET['NIM'];
                $query = "SELECT * FROM mahasiswa WHERE NIM = $NIM";
                $sql = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_array($sql)) { ?>
                  <div class="d-none d-md-inline-block mb-4" style="color: black; font-size:medium;">
                    <h6>Nama : <?php echo $row['nama_mahasiswa'] ?></h6>
                    <h6>NIM : <?php echo $row['NIM'] ?></h6>
                  </div>
                <?php } ?>
                <?php
                $querycek = "SELECT * FROM penilaian_instansi WHERE NIM = $NIM";
                $sqlcek = mysqli_query($conn, $querycek);
                $row = mysqli_num_rows($sqlcek);
                if ($row == 0) { ?>
                  <h6 style="color: red;">*Nilai belum di inputkan, nilai kosong</h6>
                  <table class="table table-striped" style="text-align: center;">
                    <thead class="table-dark">
                      <th>No</th>
                      <th>Kategori</th>
                      <th>Nilai</th>
                    </thead>
                    <tbody>
                      <tr>
                        <td>1</td>
                        <td>Kemampuan</td>
                        <td></td>
                      </tr>
                      <tr>
                        <td>2</td>
                        <td>Sikap</td>
                        <td></td>
                      </tr>
                      <tr>
                        <td>3</td>
                        <td>Kedisiplinan</td>
                        <td></td>
                      </tr>
                    </tbody>
                  </table>
                  <?php
                  $query4 = "SELECT * FROM mahasiswa JOIN pembimbing_lapangan ON mahasiswa.NIM=pembimbing_lapangan.NIM WHERE id_daftar_pembimbing='$id';";
                  $sql4 = mysqli_query($conn, $query4);
                  $row4 = mysqli_fetch_array($sql4) ?>
                  <a href="nilai.php?NIM=<?php echo $row4['NIM'] ?>" class="btn btn-outline-success rounded submit px-3">Beri Nilai</a>
                <?php } else { ?>
                  <table class="table table-striped" style="text-align: center;">
                    <thead class="table-dark">
                      <th>No</th>
                      <th>Kategori</th>
                      <th>Nilai</th>
                    </thead>
                    <tbody>
                      <?php
                      $NIM = $_GET['NIM'];
                      // $query4 = "SELECT * FROM `monitoring_instansi` JOIN daftar_pembimbing USING(id_daftar_pembimbing) JOIN pembimbing_lapangan USING (id_daftar_pembimbing) JOIN mahasiswa USING(NIM) WHERE NIM = $NIM ORDER BY monitoring_instansi.tanggal_monitoring_instansi DESC;";
                      $query4 = "SELECT * FROM penilaian_instansi WHERE NIM = $NIM";
                      $sql4 = mysqli_query($conn, $query4);
                      $i = 1;
                      $row4 = mysqli_fetch_array($sql4) ?>
                      <tr>
                        <td><?php echo $i++; ?></td>
                        <td>Kemampuan</td>
                        <td><?php echo $row4['kemampuan']; ?></td>
                      </tr>
                      <tr>
                        <td><?php echo $i++; ?></td>
                        <td>Sikap</td>
                        <td><?php echo $row4['sikap']; ?></td>
                      </tr>
                      <tr>
                        <td><?php echo $i++; ?></td>
                        <td>Kedisiplinan</td>
                        <td><?php echo $row4['kedisiplinan']; ?></td>
                      </tr>
                    </tbody>
                  </table>
                  <a href="edit-nilai.php?NIM=<?php echo $NIM ?>" class="btn btn-outline-secondary rounded submit">Edit nilai</a>
                <?php } ?>
              </div>
            </div>
          </div>
        </div>
    </div>
    <?php
    include "footer.php";
    ?>
    </main>
  </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
  <script src="https://unpkg.com/shards-ui@latest/dist/js/shards.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Sharrre/2.0.1/jquery.sharrre.min.js"></script>
  <script src="scripts/extras.1.1.0.min.js"></script>
  <script src="scripts/shards-dashboards.1.1.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/quill/1.3.6/quill.min.js"></script>
  <script src="scripts/app/app-blog-new-post.1.1.0.js"></script>
</body>

</html>