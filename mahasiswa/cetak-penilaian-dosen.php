<?php
session_start();
include '../koneksi.php';

//cek apakah sudah login
if (empty($_SESSION['login'])) {
  header("location:../login_mahasiswa.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Cetak Penilaian Dosen</title>
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
    <h3 style="text-align: center;">Penilaian Dosen Pembimbing</h3>
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
                  <th colspan="4">Dari Dosen Pembimbing</th>
                </tr>
                <?php
                error_reporting(0);
                $nim = $_SESSION['NIM'];
                $query3 = "SELECT * FROM dosen JOIN dosen_pembimbing ON dosen.NIP=dosen_pembimbing.NIP JOIN monitoring_dosen ON dosen_pembimbing.id_dosen_pembimbing=monitoring_dosen.id_dosen_pembimbing JOIN penilaian_dosen ON monitoring_dosen.id_monitoring_dosen=penilaian_dosen.id_monitoring_dosen WHERE dosen_pembimbing.NIM='$nim';";
                $sql3 = mysqli_query($conn, $query3);
                $row3 = mysqli_fetch_array($sql3);
                ?>
                <tr>
                  <td>Laporan</td>
                  <td style="text-align: center;">20</td>
                  <td style="text-align: center;"><?php echo $row3['nilai_laporan'] ?></td>
                  <?php
                  $nil_laporan = $row3['nilai_laporan'];
                  $nil_ujian = $row3['nilai_ujian_kerja_praktek'];
                  if ($nil_laporan > 0 && $nil_laporan <= 30) {
                    $hasil_nil_laporan = 'E';
                  } elseif ($nil_laporan > 30 && $nil_laporan <= 50) {
                    $hasil_nil_laporan = 'D';
                  } elseif ($nil_laporan > 50 && $nil_laporan <= 70) {
                    $hasil_nil_laporan = 'C';
                  } elseif ($nil_laporan > 70 && $nil_laporan <= 80) {
                    $hasil_nil_laporan = 'B';
                  } elseif ($nil_laporan > 80 && $nil_laporan <= 100) {
                    $hasil_nil_laporan = 'A';
                  }
                  ?>
                  <td style="text-align: center;"><?php echo $hasil_nil_laporan; ?></td>
                </tr>

                <tr>
                  <td>Ujian Kerja Praktek (Dari hasil ujian KP)</td>
                  <td style="text-align: center;">40</td>
                  <td style="text-align: center;"><?php echo $row3['nilai_ujian_kerja_praktek'] ?></td>
                  <?php
                  $nil_ujian = $row3['nilai_ujian_kerja_praktek'];
                  if ($nil_ujian > 0 && $nil_ujian <= 30) {
                    $hasil_nil_ujian = 'E';
                  } elseif ($nil_ujian > 30 && $nil_ujian <= 50) {
                    $hasil_nil_ujian = 'D';
                  } elseif ($nil_ujian > 50 && $nil_ujian <= 70) {
                    $hasil_nil_ujian = 'C';
                  } elseif ($nil_ujian > 70 && $nil_ujian <= 80) {
                    $hasil_nil_ujian = 'B';
                  } elseif ($nil_ujian > 80 && $nil_ujian <= 100) {
                    $hasil_nil_ujian = 'A';
                  }
                  ?>
                  <td style="text-align: center;"><?php echo $hasil_nil_ujian; ?></td>
                </tr>
                <tr style="text-align: center;">
                  <th colspan="3" style="text-align: center;">TOTAL</th>
                  <td style="text-align: center;">
                    <?php
                    $sumnilai = $nil_laporan + $nil_ujian;
                    echo $sumnilai;
                    $nilai = $sumnilai / 2;
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
                <td style="width: 300px; padding: 3px;"><b>Nilai Sidang Kerja Praktek = <?php echo $nilaifinal; ?> </b> <br><br> Bangkalan, <?php echo date('d-m-Y', strtotime($row3['tanggal_penilaian_dosen'])); ?><br> Dosen Pembimbing <br> <br> <br> <br> <br> <br> <b><?php echo $row3['nama_dosen']; ?></b> <br> NIP. <?php echo $row3['NIP']; ?> </td>
              </tr>
            </table>

          </div>
        </div>
      </div>
    </div>
  </div>
  <script>
    window.print();
  </script>
</body>

</html>