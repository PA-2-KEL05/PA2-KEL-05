<!doctype html>
<!--[if gt IE 8]><!-->
<html class="no-js" lang="">
<!--<![endif]-->

<head>
     <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <title>Kerja Sama</title>
     <meta name="description" content="Ela Admin - HTML5 Admin Template">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
     <link rel="stylesheet" href="../../assets/css/cs-skin-elastic.css">
     <link rel="stylesheet" href="../../assets/css/lib/datatable/dataTables.bootstrap.min.css">
     <link rel="stylesheet" href="../../assets/css/style.css">
     <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
</head>

<body>
     <!-- Left Panel -->
     <?php include "dashboard.php"; ?>
     <!-- /#left-panel -->
     <!-- Right Panel -->
     <div id="right-panel" class="right-panel">
          <!-- Header-->
          <header id="header" class="header">
               <div class="top-left">
                    <div class="navbar-header">
                         <a class="navbar-brand" href="./">
                              <h4>D3 Teknologi Komputer</h4>
                         </a>
                         <!-- <a class="navbar-brand hidden" href="./"><img src="images/logo2.png" alt="Logo"></a> -->
                         <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
                    </div>
               </div>
               <div class="top-right">
                    <div class="header-menu">
                         <div class="header-left">
                              <button class="search-trigger"><i class="fa fa-search"></i></button>
                              <div class="form-inline">
                                   <form class="search-form">
                                        <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                                        <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                                   </form>
                              </div>
                         </div>
                         <div class="user-area dropdown float-right">
                              <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                   <img class="user-avatar rounded-circle" src="../../images/admin1.jpg" alt="User Avatar">
                              </a>
                              <div class="user-menu dropdown-menu">
                                   <a class="nav-link" href="#"><i class="fa fa-power -off"></i>Logout</a>
                              </div>
                         </div>
                    </div>
               </div>
          </header>
          <!-- /#header -->
          <!-- Content -->
          <div class="content">
               <!-- Animated -->
               <div class="animated fadeIn">
                    <!-- Widgets  -->
                    <div class="d-flex justify-content-end">
                         <button class="btn btn-success ml-5 pl-3" onclick="myFunction()">+ Tambah Data</button>
                    </div>
                    <div class="row">
                         <div class="content">
                              <div class="card">
                                   <div class="card-header">
                                        <strong class="card-title">Kerjasama</strong>
                                   </div>
                                   <div class="card-body">
                                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                             <thead>
                                                  <tr>
                                                       <th rowspan="2">No.</th>
                                                       <th rowspan="2">Lembaga Mitra</th>
                                                       <th class="text-center" colspan="3">Tingkat</th>
                                                  </tr>
                                                  <tr>
                                                       <th>Internasional</th>
                                                       <th>Internasional</th>
                                                       <th>Internasional</th>

                                                       <th rowspan="2">Judul Kegiatan Kerjasama</th>
                                                       <th rowspan="2">Manfaat bagi PS yang Diakreditasi</th>
                                                       <th rowspan="2">Waktu dan durasi</th>
                                                       <th rowspan="2">Bukti Kerjasama</th>
                                                       <th rowspan="2">Tahun Berakhirnya Kerjasama</th>
                                                  </tr>
                                             </thead>
                                             <tbody>
                                                  <?php
                                                       require "../../connect.php";
                                                       $query = "SELECT * FROM m_kerjsama_prodi
                                                       INNER JOIN r_tingkat ON  
                                                       m_kerjsama_prodi.tingkat = r_tingkat.id_tingkat
                                                       INNER JOIN r_tahun ON m_kerjsama_prodi.waktu = r_tahun.id_tahun AND m_kerjsama_prodi.waktu = r_tahun.id_tahun
                                                       ";
                                                       $sql = mysqli_query($connection,$query);
                                                  ?>
                                                  <tr> 
                                                       <?php 
                                                       $i = 1;
                                                       while($row = mysqli_fetch_assoc($sql)): ?>
                                                       <td><?php echo $i++; ?></td>
                                                       <td><?php echo $row['lembaga_mitra'];; ?></td>
                                                       <td><?php
                                                                 if($row['tingkat'] == 'Internasional'){
                                                                      echo "√";
                                                                 }
                                                       ?></td>
                                                       <td><?php  if($row['tingkat'] == 'Nasional'){
                                                                      echo "√";
                                                                 } ?></td>
                                                       <td><?php if($row['tingkat'] == 'Wilayah/Lokal'){
                                                                      echo "√";
                                                                 } ?></td>
                                                       <td><?php echo $row['judul_kerjasama'] ?></td>
                                                       <td><?php echo $row['manfaat'];?></td>
                                                       <td><?php echo $row['tahun']." & ".$row['durasi']."Tahun"; ?></td>
                                                       <td><?php echo $row['bukti_kerjasama']; ?></td>
                                                       <td><?php echo $row['tahun']; ?></td>
                                                  </tr>
                                                  <?php endwhile; ?>
                                             </tbody>
                                        </table>
                                   </div>
                                   <!-- .animated -->
                              </div><!-- .content -->

                              <!-- .animated -->
                         </div>
                         <!-- /.content -->
                         <div class="clearfix"></div>
                         <!-- Footer -->
                         <footer class="site-footer">
                              <div class="footer-inner bg-white">
                                   <div class="row">
                                        <div class="col-sm-6"> Copyright &copy; 2022 Kel 05 </div>
                                        <div class="col-sm-6 text-right"> Designed by <a href="https://colorlib.com">Kel 05</a>
                                        </div>
                                   </div>
                              </div>
                         </footer>
                         <!-- /.site-footer -->
                    </div>
                    <!-- /#right-panel -->
                    <!-- Scripts -->
                    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
                    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
                    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
                    <script src="../../assets/js/main.js"></script>
                    <script src="../../assets/js/lib/data-table/datatables.min.js"></script>
                    <script src="../../assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
                    <script src="../../assets/js/lib/data-table/dataTables.buttons.min.js"></script>
                    <script src="../../assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
                    <script src="../../assets/js/lib/data-table/jszip.min.js"></script>
                    <script src="../../assets/js/lib/data-table/vfs_fonts.js"></script>
                    <script src="../../assets/js/lib/data-table/buttons.html5.min.js"></script>
                    <script src="../../assets/js/lib/data-table/buttons.print.min.js"></script>
                    <script src="../../assets/js/lib/data-table/buttons.colVis.min.js"></script>
                    <script src="../../assets/js/init/datatables-init.js"></script>
                    <script type="text/javascript">
                         $(document).ready(function() {
                              $('#bootstrap-data-table-export').DataTable();
                         });
                    </script>
                    <script type="text/javascript">
                         $(document).ready(function() {
                              $('#bootstrap-data-table-export').DataTable();
                         });
                    </script>
                    <script>
                         function myFunction() {
                              location.replace("../buat_data/buat_data_kerjasama.php")
                         }
                    </script>
                    <!--Local Stuff-->
</body>

</html>