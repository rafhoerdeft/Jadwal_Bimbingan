<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>Jadwal Dosen</title>
  <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url('assets/img/apple-icon.webp'); ?>">
  <link rel="icon" type="image/png" sizes="96x96" href="<?php echo base_url('assets/img/favicon.webp'); ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/material-icons.css'); ?>" />
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/vendor/font-awesome/css/font-awesome.min.css'); ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/material-kit.css?v=2.0.4');?>"/>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/jquery.dataTables.min.css'); ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/plugins/jqueryui/jquery-ui.min.css'); ?>">
  <style type="text/css">
  /*tr { text-align: center; }*/
  </style>
</head>

<body class="landing-page sidebar-collapse">
  <nav class="navbar fixed-top navbar-expand-lg bg-warning" id="sectionsNav">
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
          <div class="col-md-12">
            <h2 class="text-center title">Jadwal Dosen</h2>
            <h4 class="text-center description" style="margin-bottom: 40px;">Berikut adalah daftar jadwal dosen yang membuka bimbingan</h4>
            <div class="panel">
              <div class="panel-body">
                <table class="table" id="doctor-table" style="width: 100%;">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Dosen</th>
                  <th>Tanggal</th>
                  <th>Jam</th>
                  <th style="text-align: center">Quota Antrian</th>
                  <th style="text-align: center">Mendaftar</th>
                  <th style="text-align: center">Detail Antrian</th>
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
                          <?= $i++; ?>
                        </td>
                        <td>
                          <?= ucwords($value['nama_dosen']); ?>
                        </td>

                        <td>
                          <?php  
                            foreach ($jadwal as $jdwl) { 
                              if ($value['id_dosen'] == $jdwl['id_dosen']) { 
                          ?>
                                <?//= date('d M Y', strtotime($jdwl['tgl_pertama']))." s/d ".date('d M Y', strtotime($jdwl['tgl_terakhir'])) ?>
                                <div class="row">
                                  <div class="col-md-12" style="height: 40px">
                                    <?= date('d M Y', strtotime($jdwl['tgl_pertama'])) ?>
                                  </div>
                                </div>
                                
                          <?php }} ?>
                        </td>
                        
                        <td>
                          <?php  
                            foreach ($jadwal as $jdwl) { 
                              if ($value['id_dosen'] == $jdwl['id_dosen']) { 
                          ?>
                                <div class="row">
                                  <div class="col-md-12" style="height: 40px">
                                    <?= date('H:i', strtotime($jdwl['jam_pertama']))." s/d ".date('H:i', strtotime($jdwl['jam_terakhir'])) ?>
                                  </div>
                                </div>

                          <?php }} ?>
                        </td>

                        <td align="center">
                          <?php  
                            foreach ($jadwal as $jdwl) { 
                              if ($value['id_dosen'] == $jdwl['id_dosen']) { 
                          ?>

                                <div class="row">
                                  <div class="col-md-12" style="height: 40px">
                                    <?= $jdwl['quota'] ?>
                                  </div>
                                </div>

                          <?php }} ?>
                        </td>

                        <td align="center">
                          <?php  
                            foreach ($jadwal as $jdwl) { 
                              if ($value['id_dosen'] == $jdwl['id_dosen']) { 
                          ?>

                                <div class="row">
                                  <div class="col-md-12" style="height: 40px">
                                    <?= $jdwl['jml_daftar'] ?>
                                  </div>
                                </div>

                          <?php }} ?>
                        </td>

                        <td align="center">
                          <?php  
                            foreach ($jadwal as $jdwl) { 
                              if ($value['id_dosen'] == $jdwl['id_dosen']) { 
                          ?>

                                <div class="row">
                                  <div class="col-md-12" style="height: 40px;">
                                    <button id="detail_antrian" data-id="<?= $jdwl['id_jadwal'] ?>" onclick="detailAntrian(this)" class="btn btn-sm btn-warning" style="margin-top: -3px">
                                      <span class="fa fa-search"></span>
                                    </button>
                                  </div>
                                </div>

                          <?php }} ?>
                          
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
    </div>
  </div>
  
  <div class="modal fade" id="modal_detail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Daftar Antrian Bimbingan</h5>
          
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>

        </div>

        <div class="modal-body">

          <!-- <span style="font-weight: bold">
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

            <tr>
              <td>
                <div style="width: 20px; height: 20px; background-color: orange"></div>
              </td>
              <td>:</td>
              <td>Antrian dilewati. Segera hubungi Dosen Pembimbing</td>
            </tr>
          </table>  
          <hr> -->
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
  <!-- <script type="text/javascript" src="<?php echo base_url('assets/js/custom.js'); ?>"></script> -->

  <script type="text/javascript">
    $('#doctor-table').dataTable();
  </script>

  <script type="text/javascript">
    function detailAntrian(data) {
      var id_jadwal = $(data).data('id'); 
      // alert(id_jadwal);
      
      $.post("<?= base_url().'C_MainMenu/getDataAntrian' ?>", {id_jadwal:id_jadwal}, function(result){
        var dt = JSON.parse(result);

        if (dt.response) {
          // console.log(dt.data);
          var tbl = '';
          var first = 0;
          for (var i = 0; i < dt.data.length; i++) {
            var no = i+1;
            var style = '';

            tbl += '<tr style="'+style+'">'+
                          '<td>'+no+'</td>'+
                          '<td>'+dt.data[i].antrian+'</td>'+
                          '<td>'+dt.data[i].nama_mhs+'</td>'+
                          '<td>'+dt.data[i].nim+'</td>'+
                        '</tr>';
            
          } 

          $('#tbl_antrian').DataTable().destroy();
          $('#tbl_antrian #data_mhs').html(tbl);
          $('#tbl_antrian').DataTable().draw();
          $('#modal_detail').modal('show');
        } else {
          alert('Detail antrian kosong!')
        }
        
      });
    }
    // $(document).ready(function() {
    //   $('#detail_antrian').click(function(e) { 
        

    //   });
    // });
  </script>

</body>
</html>