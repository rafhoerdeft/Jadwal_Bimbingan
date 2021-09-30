<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>Dosen</title>
  <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url('assets/img/apple-icon.webp'); ?>">
  <link rel="icon" type="image/png" sizes="96x96" href="<?php echo base_url('assets/img/favicon.webp'); ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/material-icons.css'); ?>" />
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/vendor/font-awesome/css/font-awesome.min.css'); ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/material-kit.css?v=2.0.4');?>"/>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/jquery.dataTables.min.css'); ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/plugins/jqueryui/jquery-ui.min.css'); ?>">
  <style type="text/css">
  tr { text-align: center; }
  </style>
</head>
<body class="landing-page sidebar-collapse">
  <nav class="navbar fixed-top navbar-expand-lg bg-warning" id="sectionsNav">
    <div class="container">
      <div class="navbar-translate"> <a class="title">Aplikasi Antrian Bimbingan</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> <span class="navbar-toggler-icon"></span> <span class="navbar-toggler-icon"></span> </button>
      </div>
      <div class="col-md-2" align="right">
        			<a href="<?php echo base_url('Dosen/tambahDosen'); ?>" class="btn btn-raised btn-primary"><span class="fa fa-plus" style="margin-right: 10px;"></span>Tambah</a>
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
            <h2 class="text-center title">Dosen</h2>
            <h4 class="text-center description" style="margin-bottom: 40px;">Berikut adalah </h4>
          
            <div class="panel">
              <div class="panel-body">
                <table class="table" id="doctor-table" style="width: 100%;">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>ID</th>
                      <th>Mahasiswa</th>
                      <th>Antrian</th>
                      <!-- <th style="text-align: center;">Opsi</th> -->
                      <!-- <th>Jam</th>
                      <th>Detail</th> -->
                    </tr>
                  </thead>
               
                  <tbody>
                    <?php 
                    $i = 1;
                    if($dosen){
                      foreach ($dosen as $value) {
                        $encrypted_string = $this->encrypt->encode($value['id']);
                        $id = str_replace(array('+', '/', '='), array('-', '_', '~'), $encrypted_string);
                        ?>
                        <tr>
                          <td>
                            <?php echo $i++; ?>
                          </td>
                          <td>
                            <?php echo $value['id']; ?>
                          </td>
                          <td>
                            <?php echo $value['mahasiswa']; ?>
                            </td>
                          <td>
                            <?php echo $value['antrian']; ?>
                            </td>                          
                           <!-- <td>
                                                    <!-- <div class="table-data-feature">
                                                        <a href="<?php echo base_url('dosen/edit/'.$value["id"]) ?>" class="item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">
                                                            <i class="zmdi zmdi-edit"></i>
                                                        </a>
                                                        <a href="<?php echo base_url('dosen/hapus/'.$value["id"]) ?>" class="item" data-toggle="tooltip" data-placement="top" title="" onClick="if (confirm('Konfirmasi penghapusan?')){return true;}else{event.stopPropagation(); event.preventDefault();};" data-original-title="Delete">
                                                             <i class="zmdi zmdi-delete"></i>
                                                        </a>
                                                    </div>
                                                </td> --> -->
                         
                          <!-- <td align="center">
                          <a href="<?php echo base_url('Dosen/hapus/'.$id); ?>" class="btn btn-sm btn-danger"><span class="fa fa-trash"></span></a>
                          </td> -->
                          
                          <!-- <td>
                            <a href="" data-toggle="modal" data-target="#modal" class="btn btn-sm btn-warning"><span class="fa fa-search"></span></a>
                          </td> -->
                          <!-- <td>
                            <?php echo convertDay($value['hari_pertama'])." s/d ".convertDay($value['hari_terakhir']); ?>
                          </td>
                          <td>
                            <?php echo $value['jam_pertama']." s/d ".$value['jam_terakhir']; ?>
                          </td>
                          <td>
                            <a href="" data-toggle="modal" data-target="#modal" class="btn btn-sm btn-warning"><span class="fa fa-search"></span></a>
                          </td> -->
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
  <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

        </div>
        <!-- <div class="modal-footer">
          <button type="button" class="btn btn-primary">Save changes</button>
        </div> -->
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
</body>
</html>