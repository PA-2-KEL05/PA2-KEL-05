<?php

require "../connect.php";

?>

<!doctype html>
<!--[if gt IE 8]><!-->
<html class="no-js" lang="">
<!--<![endif]-->

<head>
     <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <title>Data Penelitian Dosen</title>
     <meta name="description" content="Ela Admin - HTML5 Admin Template">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
     <link rel="stylesheet" href="../assets/css/cs-skin-elastic.css">
     <link rel="stylesheet" href="../assets/css/lib/datatable/dataTables.bootstrap.min.css">
     <link rel="stylesheet" href="../assets/css/style.css">
     <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

</head>

<body>
     <!-- Left Panel -->
     <?php include "dashboard.php"; ?>
     </aside>
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
                                   <img class="user-avatar rounded-circle" src="../images/admin1.jpg" alt="User Avatar">
                              </a>
                              <div class="user-menu dropdown-menu">
                                   <a class="nav-link" href="../"><i class="fa fa-power -off"></i>Logout</a>
                              </div>
                         </div>
                    </div>
               </div>
          </header>
          <!-- /#header -->
          <!-- Content -->
          <div class="content">
               <?php
          if (isset($_GET['aksi']) == "hapus" ) : ?>
                    <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                         <span class="badge badge-pill badge-success">Success</span>
                         <span class="ml-4">Data berhasil dihapus</span>
                         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                         </button>
                    </div>
               <?php endif; ?>
               <!-- Animated -->
               <div class="animated fadeIn">
                    <!-- Widgets  -->
                    <div class="row">
                         <div class="content">
                              <div class="d-flex justify-content-end">
                                   <button class="btn btn-success ml-5 pl-3" onclick="myFunction()">+ Tambah Data</button>
                              </div>
                              <div class="card-header mt-3">
                                   <strong class="card-title">Data Penelitian Dosen</strong>
                              </div>
                              <div class="card-body">
                                   <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                        <thead>
                                             <tr>
                                                  <th>No.</th>
                                                  <th>Nama Dosen</th>
                                                  <th>Tahun</th>
                                                  <th>Judul Penelitian</th>
                                                  <th>Sumber Pembiayaan</th>
                                                  <th>Edit</th>
                                                  <th>Hapus</th>
                                             </tr>
                                        </thead>
                                        <tbody>
                                             <?php $i = 1;
                                             $sql = "SELECT * FROM m_penelitian";
                                             $data = mysqli_query($connection,$sql);
                                             while ($row = mysqli_fetch_assoc($data)) :
                                                  $id_dosen = $row['id_dosen'];
                                                  $id_tahun = $row['tahun_ajaran'];
                                                  $pembiayaan = $row['id_pembiayaan'];
                                                  $sql =  mysqli_query($connection, "SELECT * FROM m_dosen WHERE id_dosen = '$id_dosen'");
                                                  $data1 = mysqli_fetch_assoc($sql);
                                                  $sql2 =  mysqli_query($connection, "SELECT * FROM r_tahun WHERE id_tahun = '$id_tahun'");
                                                  $data2 = mysqli_fetch_assoc($sql2);
                                                  $sql3 =  mysqli_query($connection, "SELECT * FROM m_pembiayaan WHERE id_pembiayaan = '$pembiayaan'");
                                                  $data3 = mysqli_fetch_assoc($sql3);
                                             ?>
                                                  <tr>
                                                       <td><?php echo $i; ?>.</td>
                                                       <td><?php echo $data1['nama_dosen']; ?></td>
                                                       </td>
                                                       <td><?php echo $data2['tahun']; ?></td>
                                                       <!-- <td><?php //echo $row['jenis_peneltian']; ?> <br> -->
                                                       </td>
                                                       <td><?php echo $row['judul_penelitian']; ?><br>
                                                       </td>
                                                       </td>
                                                       <td><?php echo $data3['sumber_pembiyaan']; ?><br>
                                                       </td>
                                                       <td><a href="ubah/hapus_peneltian.php?id-penelitian=<?php echo $row['id_penelitian']; ?>"><button class="btn btn-warning">Edit</button></td>
                                                       <td><a href="hapus/hapus_peneltian.php?id-penelitian=<?php echo $row['id_penelitian']; ?>"><button class="btn btn-danger">Hapus</button></td>
                                                       </td>
                                                  </tr>
                                                  </tr>
                                             <?php $i++;
                                             endwhile; ?>
                                        </tbody>
                                   </table>
                              </div>
                              <!-- .animated -->
                         </div><!-- .content -->
                    </div>

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
          <script src="../assets/js/main.js"></script>
          <script src="../assets/js/lib/data-table/datatables.min.js"></script>
          <script src="../assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
          <script src="../assets/js/lib/data-table/dataTables.buttons.min.js"></script>
          <script src="../assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
          <script src="../assets/js/lib/data-table/jszip.min.js"></script>
          <script src="../assets/js/lib/data-table/vfs_fonts.js"></script>
          <script src="../assets/js/lib/data-table/buttons.html5.min.js"></script>
          <script src="../assets/js/lib/data-table/buttons.print.min.js"></script>
          <script src="../assets/js/lib/data-table/buttons.colVis.min.js"></script>
          <script src="../assets/js/init/datatables-init.js"></script>
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
                    location.replace("buat_data_penelitian.php")
               }
          </script>
          <!--Local Stuff-->
</body>

</html>