<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>Daftar</title>
  <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url('assets/img/apple-icon.webp'); ?>">
  <link rel="icon" type="image/png" sizes="96x96" href="<?php echo base_url('assets/img/favicon.webp'); ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/material-icons.css'); ?>" />
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/vendor/font-awesome/css/font-awesome.min.css'); ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/material-kit.css?v=2.0.4');?>"/>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/jquery.dataTables.min.css'); ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/plugins/jqueryui/jquery-ui.min.css'); ?>">
</head>
<body class="landing-page sidebar-collapse">
  <nav class="navbar  fixed-top navbar-expand-lg bg-rose" id="sectionsNav">
    <div class="container">
      <div class="navbar-translate"> <a class="title">Aplikasi Antrian Bimbingan</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> <span class="navbar-toggler-icon"></span> <span class="navbar-toggler-icon"></span> </button>
      </div>
      <div class="collapse navbar-collapse">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url(''); ?>"> <i class="material-icons">arrow_back</i> Kembali </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="main main-raised" style="margin-top: 0.5%;">
    <div class="container">
      <div class="section section-contacts">
        <div class="row">
          <div class="col-md-8 ml-auto mr-auto">
            <h2 class="text-center title">Daftar Antrian</h2>
            <h4 class="text-center description">Untuk mendapatkan nomor antrian, mohon untuk mengisi form dibawah ini. Pastikan biodata diisi dengan benar.</h4>
            <form class="contact-form" method="POST" action="<?= base_url('Daftar/insertDaftar'); ?>">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">Nama lengkap</label>
                    <input type="text" name="nama" class="form-control" required=""></div>
                  </div>
                </div>
                
                <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">NPM</label>
                    <input type="text" name="nim" class="form-control" required=""></div>
                  </div>
                </div>
                
                <div class="row">
                <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Jenis Bimbingan</label>
                          <select name="topik_bimbingan" class="form-control" required="">
                            <option value="topik_bimbingan">Judul Skripsi</option>
                            <option value="BAB 1">BAB 1</option>
                            <option value="BAB 2">BAB 2</option>
                            <option value="BAB 3">BAB 3</option>
                            <option value="BAB 4">BAB 4</option>
                            <option value="BAB 5">BAB 5</option>
                          </select>
                      </div>
                </div>  
                </div>  

              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">DOSEN</label>
                      <select name="id_user" class="form-control" required="" onchange="selectDosen(this)">
                        <option disabled="" selected="" value="">-- Pilih Dosen Pembimbing --</option>
                        <?php foreach ($user as $value) { ?>
                          <option value="<?= $value['id_user']; ?>"><?= ucwords($value['nama']); ?></option>
                        <?php }; ?>
                      </select>
                    </div>
                  </div>
                </div>

                <div>
                  <table id="tbl_jadwal" style="display: none; width: 100%" border="1" padding="20" class="table-stripped table-hover">
                    <thead>
                      <tr style="text-align: center;">
                        <th>No.</th>
                        <th>Tanggal</th>
                        <th>Waktu</th>
                        <th>Sisa Quota</th>
                        <th>Opsi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              
                <br>
                <div class="row">
                  <div class="col-md-4 ml-auto mr-auto text-center">
                    <button class="btn btn-rose btn-raised" id="btn_daftar" disabled="" >Daftar</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <footer class="footer footer-default">
      <div class="container">
        <nav class="float-left">
          <ul>
            <li> <a href="<?php echo base_url('TentangAplikasi'); ?>">Tentang Aplikasi</a> </li>
           
          </ul>
        </nav>
        
      </footer>
      <script type="text/javascript" src="<?php echo base_url('assets/js/core/jquery.min.js'); ?>"></script>
      <script type="text/javascript" src="<?php echo base_url('assets/js/core/popper.min.js'); ?>"></script>
      <script type="text/javascript" src="<?php echo base_url('assets/js/core/bootstrap-material-design.min.js'); ?>"></script>
      <script type="text/javascript" src="<?php echo base_url('assets/js/material-kit.js?v=2.0.4'); ?>"></script>
      <script type="text/javascript" src="<?php echo base_url('assets/plugins/jqueryui/jquery-ui.min.js'); ?>"></script>  
      <script type="text/javascript" src="<?php echo base_url('assets/js/jquery.dataTables.min.js'); ?>"></script>
      <script type="text/javascript" src="<?php echo base_url('assets/js/custom.js'); ?>"></script>

      <script type="text/javascript">
        function selectDosen(data) {
          var id = $(data).val();

          if (id != '' || id != null) {
            $.post("<?= base_url().'C_Daftar/selectJadwalDosen' ?>", {id:id}, function(result) {
              var dt = JSON.parse(result);

              if (dt.response) {
                // console.log(dt.data);
                var row = '';
                for (var i = 0; i < dt.data.length; i++) {
                  let numb = i + 1;
                  let sisa = dt.data[i].quota - dt.data[i].jml_daftar;
                  row +=  '<tr>'+
                            '<td align="center">'+numb+'</td>'+
                            '<td align="center">'+formatTgl(dt.data[i].tgl_pertama)+'</td>'+
                            '<td align="center">'+dt.data[i].jam_pertama+' s/d '+dt.data[i].jam_terakhir+'</td>'+
                            '<td align="center">'+sisa+'</td>';

                  if (sisa == 0) {
                    row +=    '<td align="center">X</td>'+
                            '</tr>';
                  } else {
                    row +=    '<td align="center"><input onclick="activeBtn()" type="radio" name="id_jadwal" value="'+dt.data[i].id_jadwal+'"></td>'+
                            '</tr>';
                  }
                            
                }

                

                $('#tbl_jadwal tbody').html(row);
                $('#tbl_jadwal').css('display', '');
                // $('#btn_daftar').attr('disabled',false);

              } else {
                alert('Tidak ada jadwal bimbingan!');
                $('#tbl_jadwal tbody').html('');
                $('#tbl_jadwal').css('display', 'none');
                $('#btn_daftar').attr('disabled',true);
              }
            });
          } 
        }

        function activeBtn(argument) {
          $('#btn_daftar').attr('disabled',false);
        }
      </script>

      <script type="text/javascript">
        function nama_bulan(bln) {

            var bulan = [
                'Januari',
                'Februari',
                'Maret',
                'April',
                'Mei',
                'Juni',
                'Juli',
                'Agustus',
                'September',
                'Oktober',
                'November',
                'Desember'
            ];

            return bulan[bln];
        }

        function addZero(n){
          if(n <= 9){
            return "0" + n;
          }

          return n
        }

        function formatTgl(data='') {
          var date = new Date(data);
          var tgl = addZero(date.getDate());
          var bln = addZero(date.getMonth() + 1);
          var thn = date.getFullYear();
           return tgl+'-'+bln+'-'+thn;
        }
      </script>

    </body>
    </html>