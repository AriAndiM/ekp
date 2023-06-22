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
  <title>Edit Nlai | Pembimbing Lapangan</title>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="description" content="A high-quality &amp; free Bootstrap admin dashboard template pack that comes with lots of templates and components.">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" id="main-stylesheet" data-version="1.1.0" href="styles/shards-dashboards.1.1.0.min.css">
  <link rel="stylesheet" href="styles/extras.1.1.0.min.css">
  <link rel="shortcut icon" href="../assets/img/utm.png">
  <script async defer src="https://buttons.github.io/buttons.js"></script>
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
              <a class="nav-link active " href="penilaian.php">
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
          <nav class="navbar align-items-stretch navbar-light flex-md-nowrap p-0">
            <nav class="nav">
              <a href="#" class="nav-link nav-link-icon toggle-sidebar d-md-inline d-lg-none text-center border-left" data-toggle="collapse" data-target=".header-navbar" aria-expanded="false" aria-controls="header-navbar">
                <i class="material-icons">&#xE5D2;</i>
              </a>
            </nav>
          </nav>
        </div>
        <!-- / .main-navbar -->
        <div class="main-content-container container-fluid px-4">
          <!-- Page Header -->
          <div class="page-header row no-gutters py-4">
            <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
              <span class="text-uppercase page-subtitle">Kerja Praktek Teknik Informatika UTM</span>
              <h3 class="page-title">Penilaian</h3>

            </div>
          </div>
          <!-- End Page Header -->
          <!-- Penilaian -->
          <div class="card mb-3">
            <div class="card-body">
              <h3 class="mb-2">KETERANGAN</h3>
              <table class="table table-striped">
                <thead class="table-dark">
                  <th>Kategori</th>
                  <th>Deskripsi</th>
                </thead>
                <tr>
                  <td>Kemampuan Menyelesaikan Tugas</td>
                  <td>Penilaian kemampuan menyelesaikan tugas meliputi ketepatan mahasiswa kerja praktek dalam menyelesaikan tugas atau dalam menyelesaikan suatu permasalahan.</td>
                </tr>
                <tr>
                  <td>Attitude</td>
                  <td>Penilaian attitude yaitu sikap mahasiswa kerja praktek terhadap orang lain berupa cara berkomunikasi dengan orang lain, kejujuran, dan sikapnya terhadap orang lain.</td>
                </tr>
                <tr>
                  <td>Kedisiplinan</td>
                  <td>Penilaian kedisiplinan yaitu berupa kedisiplinan waktu yang meliputi disiplin bekerja, disiplin menyelesaikan tugas dan lain-lain.</td>
                </tr>
              </table>
            </div>
          </div>

          <div class="card">
            <div class="card-body">
              <h3>PENILAIAN</h3>
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
              <form action="action-edit-nilai.php" method="POST">
                <?php
                $NIM = $_GET['NIM'];
                $query = "SELECT * FROM mahasiswa WHERE NIM = $NIM";
                $sql = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_array($sql)) { ?>
                  <input type="hidden" value="<?php echo $row['NIM'] ?>" name="NIM">
                <?php } ?>
                <?php
                $query = "SELECT * FROM monitoring_instansi WHERE id_monitoring_instansi = (SELECT id_monitoring_instansi FROM penilaian_instansi WHERE NIM=$NIM) LIMIT 1";
                $sql = mysqli_query($conn, $query);
                $row = mysqli_fetch_array(($sql))
                ?>
                <input type="hidden" value="<?php echo $row['id_monitoring_instansi'] ?>" name="id_monitoring_instansi">
                <div>
                  <?php
                  $NIM = $_GET['NIM'];
                  $sql = mysqli_query($conn, "SELECT * FROM penilaian_instansi WHERE NIM = $NIM");
                  $row = mysqli_fetch_array($sql);
                  ?>
                  <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Tanggal Penilaian</label>
                    <input type="date" class="form-control mb-3" id="exampleFormControlInput1" name="tanggal_penilaian_instansi" required>

                    <label for="exampleFormControlInput1" class="form-label">Kemampuan Menyelesaikan Tugas</label>
                    <input type="number" class="form-control mb-3" id="exampleFormControlInput1" value="<?php echo $row["kemampuan"] ?>" name="kemampuan" required>

                    <label for="exampleFormControlInput1" class="form-label">Attitude</label>
                    <input type="number" class="form-control mb-3" id="exampleFormControlInput1" value="<?php echo $row["sikap"] ?>" name="sikap" required>

                    <label for="exampleFormControlInput1" class="form-label">Kedisiplinan</label>
                    <input type="number" class="form-control mb-3" id="exampleFormControlInput1" value="<?php echo $row["kedisiplinan"] ?>" name="kedisiplinan" required>

                    <button type="submit" class="btn btn-outline-primary">Submit</button>
                    <a href="lihatnilai.php?NIM=<?php echo $row['NIM'] ?>" class="btn btn-outline-warning">Batal</a>
                  </div>
              </form>
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
  <script src="scripts/app/app-blog-overview.1.1.0.js"></script>

</body>

</html>