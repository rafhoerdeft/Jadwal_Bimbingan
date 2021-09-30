<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>Landing Page</title>
  <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url('assets/img/apple-icon.webp'); ?>">
  <link rel="icon" type="image/png" sizes="96x96" href="<?php echo base_url('assets/img/favicon.webp'); ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/material-icons.css'); ?>" />
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/vendor/font-awesome/css/font-awesome.min.css'); ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/material-kit.css?v=2.0.4');?>"/>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/jquery.dataTables.min.css'); ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/plugins/jqueryui/jquery-ui.min.css'); ?>">
  <style type="text/css">
    .toast { opacity: 1 !important; }
  </style>  
</head>
<body class="landing-page sidebar-collapse">
  <nav class="navbar navbar-transparent navbar-color-on-scroll fixed-top navbar-expand-lg" color-on-scroll="100" id="sectionsNav">
    <div class="container">
      <!-- <div class="navbar-translate"><a class="navbar-brand" href="#">Aplikasi Antrian Bimbingan Skripsi</a></div> -->
      <div class="collapse navbar-collapse">
        <ul class="navbar-nav ml-auto"> </ul>
        <div class="collapse navbar-collapse">
          <ul class="navbar-nav ml-auto">
           
            <!-- <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url('Dosen'); ?>"><i class="material-icons"></i>Dosen</a>
            </li> -->
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url('JadwalDosen'); ?>"><i class="material-icons">schedule</i>Jadwal Dosen</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url('Login'); ?>"><i class="material-icons">boo</i>Login Dosen</a>
            </li>

          </ul>
        </div>
      </div>
  </nav>
  <div class="page-header header-filter" data-parallax="true" style="background-image: url('<?php echo base_url('assets/img/logofeb.png'); ?>')">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center" style="margin-bottom: 60px;">

          <h1 style="font-weight: bold;">
            Aplikasi Antrian Bimbingan Skripsi <br>
            Fakultas Ekonomi dan Bisnis
          </h1>

          <h4>
          <?php
            $hari = date('D');
            switch ($hari) {
              case 'Sun':
                $hari = "Minggu";
              break;
           
              case 'Mon':     
                $hari = "Senin";
              break;
           
              case 'Tue':
                $hari = "Selasa";
              break;
           
              case 'Wed':
                $hari = "Rabu";
              break;
           
              case 'Thu':
                $hari = "Kamis";
              break;
           
              case 'Fri':
                $hari = "Jumat";
              break;
           
              case 'Sat':
                $hari = "Sabtu";
              break;
              
              default:
                $hari = "";   
              break;
            }
            $tanggal = date('d');
            $bulan = date('n');
            switch ($bulan) {
              case 1:
                $bulan = "Januari";
              break;

              case 2:
                $bulan = "Februari";
              break;

              case 3:
                $bulan = "Maret";
              break;

              case 4:
                $bulan = "April";
              break;

              case 5:
                $bulan = "Mei";
              break;

              case 6:
                $bulan = "Juni";
              break;

              case 7:
                $bulan = "Juli";
              break;

              case 8:
                $bulan = "Agustus";
              break;

              case 9:
                $bulan = "September";
              break;

              case 10:
                $bulan = "Oktober";
              break;

              case 11:
                $bulan = "November";
              break;

              case 12:
                $bulan = "Desember";
              break;
              
              default:
                $bulan = "";   
              break;
            }

            $tahun = date('Y');
            echo $hari . ", ". $tanggal . " " . $bulan . " " . $tahun;
          ?>
          </h4> 

        </div>


        <div class="col-md-12 text-center" style="margin-top: 40px;"><a href="<?php echo base_url('Daftar'); ?>" class="btn btn-danger btn-raised btn-lg">Daftar</a></div>
      </div>
    </div>
  </div>

  <div class="main main-raised" style="margin-top: 0.5%;">

    <div class="container">
      <div class="section">
        <div class="row">
          <div class="col-md-8 ml-auto mr-auto text-center">
            <h2 class="title">Jadwal Bimbingan Dosen Hari Ini</h2>
            <!-- <h5 class="description">Informasi singkat tentang bagaimana cara menggunakan Aplikasi Antrian Bimbingan Skripsi</h5>  -->
          </div>
        </div>
        
        <div class="panel">
          <div class="panel-body">
            <table class="table" id="doctor-table" style="width: 100%;">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Dosen</th>
                  <!-- <th>Tanggal</th> -->
                  <th>Jam</th>
                  <!-- <th>Quota</th> -->
                  <!-- <th>Mendaftar</th> -->
                  <th>Detail Antrian</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                  $i = 1;
                  if($jadwalGroup){
                    foreach ($jadwalGroup as $value) {
                      $id = encode($value['id_dosen']);
                ?>
                      <tr>
                        <td>
                          <?php echo $i++; ?>
                        </td>
                        <td>
                          <?= ucwords($value['nama_dosen']); ?>
                        </td>

                        <!-- <td>
                          <?php  
                            foreach ($jadwal as $jdwl) { 
                              if ($value['id_dosen'] == $jdwl['id_dosen']) { 
                          ?>
                                <?= date('d m Y', strtotime($jdwl['tgl_pertama']))." s/d ".date('d m Y', strtotime($jdwl['tgl_terakhir'])) ?>
                                <br>
                          <?php }} ?>
                        </td> -->
                        
                        <td>
                          <?php  
                            foreach ($jadwal as $jdwl) { 
                              if ($value['id_dosen'] == $jdwl['id_dosen']) { 
                          ?>
                                <?= date('H:i', strtotime($jdwl['jam_pertama']))." s/d ".date('H:i', strtotime($jdwl['jam_terakhir'])) ?>
                                <br>
                          <?php }} ?>
                        </td>

                        <!-- <td>
                          <?= $value['quota'] ?>
                        </td>

                        <td>
                          <?= $value['jml_daftar'] ?>
                        </td> -->

                        <td>
                          <button id="detail_antrian" data-id="<?= $value['id_jadwal'] ?>" onclick="detailAntrian(this)" class="btn btn-sm btn-warning">
                            <span class="fa fa-search"></span>
                          </button>
                        </td>
                      </tr>
                <?php
                    }
                  }
                ?>
              </tbody>
            </table>
          </div>
        </div>

      </div>
    </div>
  </div>

  <div class="main main-raised" style="margin-top: 20px;">

    <div class="container">
      <div class="section">

        <div class="row">
          <div class="col-md-8 ml-auto mr-auto text-center">
            <h2 class="title">Petunjuk Penggunaan Aplikasi</h2>
            <h5 class="description">Informasi singkat tentang bagaimana cara menggunakan Aplikasi Antrian Bimbingan Skripsi</h5> 
          </div>
        </div>

        <div class="info info-horizontal" style="margin-top: -50px;">
          <div class="icon icon-danger">
            <i class="material-icons">edit</i>
          </div>
          <div class="description">
            <h4 class="info-title">Daftar</h4>
            <p>Pada bagian halaman atas, klik tombol <i><a href="#">Daftar</a></i>, lalu isi form biodata anda dengan lengkap dan benar.</p>
          </div>
        </div>

        <!-- <div class="info info-horizontal" style="margin-top: -80px;">
          <div class="icon icon-primary">
            <i class="material-icons">people</i>
          </div>
          <div class="description">
            <h4 class="info-title">Lihat daftar dosen</h4>
            <p>Pada bagian menu di pojok kanan atas, klik tombol <i><a href="<?php echo base_url('JadwalDosen'); ?>">Dosen</a></i>, untuk melihat siapa saja dosen pembimbing.</p>
          </div>
        </div> -->

        <div class="info info-horizontal" style="margin-top: -80px;">
          <div class="icon icon-warning">
            <i class="material-icons">schedule</i>
          </div>
          <div class="description">
            <h4 class="info-title">Lihat jadwal dosen</h4>
            <p>Pada bagian menu di pojok kanan atas, klik tombol <i><a href="<?php echo base_url('JadwalDosen'); ?>">Jadwal</a></i>, untuk melihat siapa saja dosen yang siap membimbing.</p>
          </div>
        </div>
        
      </div>
    </div>

    <!-- <div class="section section-contacts">
      <div class="row">
        <div class="col-md-8 ml-auto mr-auto">
          <h2 class="text-center title">Kontak kami</h2>
          <h4 class="text-center description">Punya pertanyaan tentang aplikasi? Tanyakan kepada kami!<br>Anda juga dapat mengirim saran atau kritik disini</h4>
          <form class="contact-form" method="POST" action="<?php echo base_url('LandingPage/insertMessage'); ?>">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label class="bmd-label-floating">Nama lengkap</label>
                  <input type="text" name="nama" class="form-control" required="">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="bmd-label-floating">Alamat surel</label>
                  <input type="email" name="email" class="form-control" required="">
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="exampleMessage" class="bmd-label-floating">Pesan, kritik, atau saran</label>
              <textarea type="text" name="pesan" class="form-control" rows="4" id="exampleMessage" required=""></textarea>
            </div>
            <div class="row">
              <div class="col-md-4 ml-auto mr-auto text-center">
                <button class="btn btn-primary btn-raised">Kirim</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div> -->
  </div>

  <div class="modal fade" id="modal_detail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Daftar Antrian Bimbingan Hari Ini</h5>
          
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>

        </div>

        <div class="modal-body">

          <span style="font-weight: bold">
            Keterangan:
          </span>

          <table>
            <tr>
              <td>
                <div style="width: 20px; height: 20px; background-color: red"></div>
              </td>
              <td>:</td>
              <td>Segera hubungi/temui Dosen Pembimbing</td>
            </tr>

            <tr>
              <td>
                <div style="width: 20px; height: 20px; background-color: green"></div>
              </td>
              <td>:</td>
              <td>Bersiap-siap temui Dosen Pembimbing</td>
            </tr>

            <!-- <tr>
              <td>
                <div style="width: 20px; height: 20px; background-color: orange"></div>
              </td>
              <td>:</td>
              <td>Antrian dilewati. Segera hubungi Dosen Pembimbing</td>
            </tr> -->
          </table>

          <table id="tbl_antrian" class="table">
            <thead>
              <tr>
                <th>#</th>
                <th>No. Antrian</th>
                <th>Nama Mahasiswa</th>
                <th>NPM</th>
              </tr>
            </thead>
            <tbody id="data_mhs">
              <tr>
                <td>1</td>
                <td>1</td>
                <td>1</td>
                <td>1</td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="modal-footer">
          <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
        </div>
      </div>
    </div>
  </div>

  <footer class="footer footer-default">
    <div class="container">
      <nav class="float-left">
        <ul>
          <li><a href="<?php echo base_url('TentangAplikasi'); ?>">Tentang Aplikasi</a></li>
          
        </ul>
      </nav>
     
  </footer>
  <script type="text/javascript" src="<?php echo base_url('assets/js/core/jquery.min.js'); ?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/js/core/popper.min.js'); ?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/js/core/bootstrap-material-design.min.js'); ?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/js/plugins/nouislider.min.js'); ?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/js/material-kit.js?v=2.0.4'); ?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/vendor/toastr/toastr.min.js'); ?>"></script>

  <!-- <script type="text/javascript">
    //edit
    function xxx(){
      var 
    }
  </script> -->

  <script type="text/javascript">
    function detailAntrian(data) {
      var id_jadwal = $(data).data('id'); 
      // alert(id_jadwal);
      
      $.post("<?= base_url().'LandingPage/getDataAntrianJdwl' ?>", {id_jadwal:id_jadwal}, function(result){
        var dt = JSON.parse(result);

        if (dt.response) {
          // console.log(dt.data);
          var tbl = '';
          var first = 0;
          for (var i = 0; i < dt.data.length; i++) {
            var no = i+1;
            var style = '';

            if (dt.data[i].status == 2) {
                style = 'color: orange; font-weight: bold';

                if (i==first) {
                  first++;
                }
            }

            if (i==first) {
              style = 'color: red; font-weight: bold';
            } else if (i==first+1) {
              style = 'color: green; font-weight: bold';
            }


            tbl += '<tr style="'+style+'">'+
                          '<td>'+no+'</td>'+
                          '<td>'+dt.data[i].antrian+'</td>'+
                          '<td>'+dt.data[i].nama_mhs+'</td>'+
                          '<td>'+dt.data[i].nim+'</td>'+
                        '</tr>';
            
          } 

          $('#tbl_antrian #data_mhs').html(tbl);
          $('#modal_detail').modal('show');
        } else {
          alert('Detail antrian kosong!');
        }
        
      });
    }
    // $(document).ready(function() {
    //   $('#detail_antrian').click(function(e) { 
        

    //   });
    // });
  </script>

  <script type="text/javascript">
    var getUrl = window.location;
    var base_url = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];
    $(document).ready(function() {
      checkAntrian();
      setInterval(function() {
        checkAntrian();
      }, 10000);
    });

    function checkAntrian() {
      $.ajax({
        url: base_url + "/getAntrian",
        type: "POST",
        dataType: 'json',
        success: function(result) {
          var hasil = result.sisa_antrian * 10;
          $("#sisa-antrian-ini").text(result.sisa_antrian);
          $("#antrian-ini").text(result.list[0].antrian);
          $("#waktu-tunggu-ini").text(hasil + " Menit");
          console.log(result.sisa_antrian);
        },
        error: function(jqXHR, textStatus, errorThrown) {}
      });
    }
  </script>
  <script type="text/javascript">
  <?php
  if ($this
      ->session
      ->flashdata('success'))
    {
  ?>
  toastr.options = {
    "closeButton": false,
    "debug": false,
    "newestOnTop": false,
    "progressBar": false,
    "positionClass": "toast-bottom-right",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
  }
  Command: toastr["success"]("<?php echo $this
        ->session
        ->flashdata('success'); ?>")
  <?php
  } ?>
  <?php
  if ($this
      ->session
      ->flashdata('error'))
    {
  ?>
  toastr.options = {
    "closeButton": false,
    "debug": false,
    "newestOnTop": false,
    "progressBar": false,
    "positionClass": "toast-bottom-right",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
  }
  Command: toastr["error"]("<?php echo $this
        ->session
        ->flashdata('error'); ?>")
  <?php
  } ?>
  </script>
</body>
</html>