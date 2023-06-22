<?php
session_start();
include '../koneksi.php';
//cek apakah sudah login
if (empty($_SESSION['login'])) {
  header("location:../login_mahasiswa.php");
}
?>

<!doctype html>
<html class="no-js h-100" lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Cetak Penilaian Instansi</title>
  <meta name="description" content="A high-quality &amp; free Bootstrap admin dashboard template pack that comes with lots of templates and components.">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" id="main-stylesheet" data-version="1.1.0" href="styles/shards-dashboards.1.1.0.min.css">
  <link rel="stylesheet" href="styles/extras.1.1.0.min.css">
  <link rel="shortcut icon" href="../assets/img/utm.png">
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <style>
    .card-registration .select-input.form-control[readonly]:not([disabled]) {
      font-size: 1rem;
      line-height: 2.15;
      padding-left: .75em;
      padding-right: .75em;
    }

    .card-registration .select-arrow {
      top: 13px;
    }
  </style>
</head>

<body>
  <div class="container">
    <h3 style="text-align: center;">Penilaian Pembimbing Lapangan</h3>
    <div style="margin-bottom: 25px;">
      <table>
        <tr>
          <td>Nama &nbsp</td>
          <td>: &nbsp</td>
          <?php
          $nim = $_SESSION['NIM'];
          $query2 = "SELECT * FROM mahasiswa WHERE NIM = '$nim'";
          $sql2 = mysqli_query($conn, $query2);
          $row = mysqli_fetch_array($sql2);
          ?>
          <td><?php echo $row['nama_mahasiswa'] ?></td>
        </tr>
        <tr>
          <td>NIM</td>
          <td>:</td>
          <td><?php echo $row['NIM'] ?></td>
        </tr>
      </table>
    </div>
    <!-- end nama dan nim mhs -->

    <!-- Default Light Table -->
    <div class="row">
      <div class="col">
        <div class="card card-small mb-4">
          <div class="card-body p-0 pb-3 text-center">
            <table class="table table-bordered">
              <thead class="bg-light">
                <tr>
                  <th scope="col" class="border-0">Kriteria</th>
                  <th scope="col" class="border-0">Bobot (%)</th>
                  <th scope="col" class="border-0">Nilai(0 – 100)</th>
                  <th scope="col" class="border-0">Nilai Huruf **)</th>
                </tr>
              </thead>
              <tbody style="text-align: left;">
                <tr>
                  <th colspan="4">Dari Perusahaan</th>
                </tr>
                <?php
                error_reporting(0);
                $nim = $_SESSION['NIM'];
                $query3 = "SELECT * FROM pembimbing_lapangan JOIN daftar_pembimbing ON pembimbing_lapangan.id_daftar_pembimbing=daftar_pembimbing.id_daftar_pembimbing JOIN monitoring_instansi ON daftar_pembimbing.id_daftar_pembimbing=monitoring_instansi.id_daftar_pembimbing JOIN penilaian_instansi ON monitoring_instansi.id_monitoring_instansi=penilaian_instansi.id_monitoring_instansi WHERE pembimbing_lapangan.NIM='$nim';";
                $sql3 = mysqli_query($conn, $query3);
                $row3 = mysqli_fetch_array($sql3);
                ?>
                <tr>
                  <td>Kemampuan menyelesaikan tugas</td>
                  <td style="text-align: center;">20</td>
                  <td style="text-align: center;"><?php echo $row3['kemampuan']; ?></td>
                  <?php
                  $nil_kemampuan = $row3['kemampuan'];
                  if ($nil_kemampuan > 0 && $nil_kemampuan <= 30) {
                    $hasil_nil_kemampuan = 'E';
                  } elseif ($nil_kemampuan > 30 && $nil_kemampuan <= 50) {
                    $hasil_nil_kemampuan = 'D';
                  } elseif ($nil_kemampuan > 50 && $nil_kemampuan <= 70) {
                    $hasil_nil_kemampuan = 'C';
                  } elseif ($nil_kemampuan > 70 && $nil_kemampuan <= 80) {
                    $hasil_nil_kemampuan = 'B';
                  } elseif ($nil_kemampuan > 80 && $nil_kemampuan <= 100) {
                    $hasil_nil_kemampuan = 'A';
                  }
                  ?>
                  <td style="text-align: center;"><?php echo $hasil_nil_kemampuan; ?></td>
                </tr>
                <tr>
                  <td>Tingkah laku/ sikap</td>
                  <td style="text-align: center;">10</td>
                  <td style="text-align: center;"><?php echo $row3['sikap']; ?></td>
                  <?php
                  $nil_sikap = $row3['sikap'];
                  if ($nil_sikap > 0 && $nil_sikap <= 30) {
                    $hasil_nil_sikap = 'E';
                  } elseif ($nil_sikap > 30 && $nil_sikap <= 50) {
                    $hasil_nil_sikap = 'D';
                  } elseif ($nil_sikap > 50 && $nil_sikap <= 70) {
                    $hasil_nil_sikap = 'C';
                  } elseif ($nil_sikap > 70 && $nil_sikap <= 80) {
                    $hasil_nil_sikap = 'B';
                  } elseif ($nil_sikap > 80 && $nil_sikap <= 100) {
                    $hasil_nil_sikap = 'A';
                  }
                  ?>
                  <td style="text-align: center;"><?php echo $hasil_nil_sikap; ?></td>
                </tr>
                <tr>
                  <td>Kedisiplinan</td>
                  <td style="text-align: center;">10</td>
                  <td style="text-align: center;"><?php echo $row3['kedisiplinan']; ?></td>
                  <?php
                  $nil_kedisiplinan = $row3['kedisiplinan'];
                  if ($nil_kedisiplinan > 0 && $nil_kedisiplinan <= 30) {
                    $hasil_nil_kedisiplinan = 'E';
                  } elseif ($nil_kedisiplinan > 30 && $nil_kedisiplinan <= 50) {
                    $hasil_nil_kedisiplinan = 'D';
                  } elseif ($nil_kedisiplinan > 50 && $nil_kedisiplinan <= 70) {
                    $hasil_nil_kedisiplinan = 'C';
                  } elseif ($nil_kedisiplinan > 70 && $nil_kedisiplinan <= 80) {
                    $hasil_nil_kedisiplinan = 'B';
                  } elseif ($nil_kedisiplinan > 80 && $nil_kedisiplinan <= 100) {
                    $hasil_nil_kedisiplinan = 'A';
                  }
                  ?>
                  <td style="text-align: center;"><?php echo $hasil_nil_sikap; ?></td>
                </tr>
                <tr style="text-align: center;">
                  <th colspan="3" style="text-align: center;">TOTAL</th>
                  <td>
                    <?php
                    $sumnilai = $nil_kemampuan + $nil_sikap + $nil_kedisiplinan;
                    echo $sumnilai;
                    $nilai = $sumnilai / 3;
                    $nilaifinal = number_format($nilai, 1, '.', '');
                    if ($nilai > 0 && $nilai <= 30) {
                      $nilai_huruf = 'E';
                    } elseif ($nilai > 30 && $nilai <= 50) {
                      $nilai_huruf = 'D';
                    } elseif ($nilai > 50 && $nilai <= 70) {
                      $nilai_huruf = 'C';
                    } elseif ($nilai > 70 && $nilai <= 80) {
                      $nilai_huruf = 'B';
                    } elseif ($nilai > 80 && $nilai <= 100) {
                      $nilai_huruf = 'A';
                    }
                    ?>
                  </td>
                </tr>
                <tr>
                  <th colspan="3" style="text-align: center;">NILAI HURUF***)</th>
                  <td style="text-align: center;"><?php echo $nilai_huruf; ?></td>
                </tr>
              </tbody>
            </table>
            <table class="table" style="text-align: left;">
              <tr>
                <td></td>
                <td style="width: 300px; padding: 3px;"><b>Nilai Sidang Kerja Praktek = <?php echo $nilaifinal; ?> </b> <br><br> Bangkalan, <?php echo date('d-m-Y', strtotime($row3['tanggal_penilaian_instansi'])); ?><br> Pembimbing Lapangan <br> <br> <br> <br> <br> <br> <b><?php echo $row3['nama_pembimbing_lapangan']; ?></b> <br> NIP. <?php echo $row3['NIP_pembimbing_lapangan'] ?></td>
              </tr>
            </table>

          </div>
        </div>
      </div>
    </div>
    <script>
      window.print();
    </script>
</body>

</html>