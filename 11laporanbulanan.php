<?php
session_start();
if(!isset($_SESSION["USERNAME_PEG"]))
{    
    header("Location:8loginpegawai.php");    
}
$pengunjung=$_SESSION['USERNAME_PEG'];

 include("connection.php");

//  MariaDB [sigah2]> select year(TGL_PEMBAYARAN) AS TGL,CABANG,NOMOR_NOTA,sum(TOTAL_AKHIR) AS TOTAL from pembayaran join reservasi using(ID_RESERVASI) join CABANG USING(ID_CABANG) where CABANG LIKE "Yogyakarta" group by TGL;

 
  // bukan dari form pencairan
  // siapkan query untuk menampilkan seluruh data dari tabel pembayaran
  $query5  = "SELECT (SELECT SUM(TOTAL_AKHIR) FROM pembayaran join reservasi using(id_reservasi) where id_jenis_tamu = 2 and month(tgl_pembayaran) = 1) as GRUP,
                (SELECT SUM(TOTAL_AKHIR) FROM pembayaran join reservasi using(id_reservasi) where id_jenis_tamu = 1 and month(tgl_pembayaran) = 1) as PERSONAL,
                 SUM(TOTAL_AKHIR) AS TOTAL FROM pembayaran WHERE month(tgl_pembayaran) = 1 ";
  $query6  = "SELECT (SELECT SUM(TOTAL_AKHIR) FROM pembayaran join reservasi using(id_reservasi) where id_jenis_tamu = 2 and month(tgl_pembayaran) = 2) as GRUP,
                (SELECT SUM(TOTAL_AKHIR) FROM pembayaran join reservasi using(id_reservasi) where id_jenis_tamu = 1 and month(tgl_pembayaran) = 2) as PERSONAL,
                SUM(TOTAL_AKHIR) AS TOTAL FROM pembayaran WHERE month(tgl_pembayaran) = 2 ";
  $query7  = "SELECT (SELECT SUM(TOTAL_AKHIR) FROM pembayaran join reservasi using(id_reservasi) where id_jenis_tamu = 2 and month(tgl_pembayaran) = 3) as GRUP,
                (SELECT SUM(TOTAL_AKHIR) FROM pembayaran join reservasi using(id_reservasi) where id_jenis_tamu = 1 and month(tgl_pembayaran) = 3) as PERSONAL,
                SUM(TOTAL_AKHIR) AS TOTAL FROM pembayaran WHERE month(tgl_pembayaran) = 3 ";
  $query8  = "SELECT (SELECT SUM(TOTAL_AKHIR) FROM pembayaran join reservasi using(id_reservasi) where id_jenis_tamu = 2 and month(tgl_pembayaran) = 4) as GRUP,
                (SELECT SUM(TOTAL_AKHIR) FROM pembayaran join reservasi using(id_reservasi) where id_jenis_tamu = 1 and month(tgl_pembayaran) = 4) as PERSONAL,
                SUM(TOTAL_AKHIR) AS TOTAL FROM pembayaran WHERE month(tgl_pembayaran) = 4 ";

  $query9  = "SELECT (SELECT SUM(TOTAL_AKHIR) FROM pembayaran join reservasi using(id_reservasi) where id_jenis_tamu = 2 and month(tgl_pembayaran) = 5) as GRUP,
                (SELECT SUM(TOTAL_AKHIR) FROM pembayaran join reservasi using(id_reservasi) where id_jenis_tamu = 1 and month(tgl_pembayaran) = 5) as PERSONAL,
                SUM(TOTAL_AKHIR) AS TOTAL FROM pembayaran WHERE month(tgl_pembayaran) = 5 ";
  $query10  = "SELECT (SELECT SUM(TOTAL_AKHIR) FROM pembayaran join reservasi using(id_reservasi) where id_jenis_tamu = 2 and month(tgl_pembayaran) = 6) as GRUP,
                (SELECT SUM(TOTAL_AKHIR) FROM pembayaran join reservasi using(id_reservasi) where id_jenis_tamu = 1 and month(tgl_pembayaran) = 6) as PERSONAL,
                SUM(TOTAL_AKHIR) AS TOTAL FROM pembayaran WHERE month(tgl_pembayaran) = 6 ";
  $query11  = "SELECT (SELECT SUM(TOTAL_AKHIR) FROM pembayaran join reservasi using(id_reservasi) where id_jenis_tamu = 2 and month(tgl_pembayaran) = 7) as GRUP,
                (SELECT SUM(TOTAL_AKHIR) FROM pembayaran join reservasi using(id_reservasi) where id_jenis_tamu = 1 and month(tgl_pembayaran) = 7) as PERSONAL,
                SUM(TOTAL_AKHIR) AS TOTAL FROM pembayaran WHERE month(tgl_pembayaran) = 7 ";
  $query12  = "SELECT (SELECT SUM(TOTAL_AKHIR) FROM pembayaran join reservasi using(id_reservasi) where id_jenis_tamu = 2 and month(tgl_pembayaran) = 8) as GRUP,
                (SELECT SUM(TOTAL_AKHIR) FROM pembayaran join reservasi using(id_reservasi) where id_jenis_tamu = 1 and month(tgl_pembayaran) = 8) as PERSONAL,
                SUM(TOTAL_AKHIR) AS TOTAL FROM pembayaran WHERE month(tgl_pembayaran) = 8 ";

  $query13  = "SELECT (SELECT SUM(TOTAL_AKHIR) FROM pembayaran join reservasi using(id_reservasi) where id_jenis_tamu = 2 and month(tgl_pembayaran) = 9) as GRUP,
                (SELECT SUM(TOTAL_AKHIR) FROM pembayaran join reservasi using(id_reservasi) where id_jenis_tamu = 1 and month(tgl_pembayaran) = 9) as PERSONAL,
                SUM(TOTAL_AKHIR) AS TOTAL FROM pembayaran WHERE month(tgl_pembayaran) = 9 ";
  $query14  = "SELECT (SELECT SUM(TOTAL_AKHIR) FROM pembayaran join reservasi using(id_reservasi) where id_jenis_tamu = 2 and month(tgl_pembayaran) = 10) as GRUP,
                (SELECT SUM(TOTAL_AKHIR) FROM pembayaran join reservasi using(id_reservasi) where id_jenis_tamu = 1 and month(tgl_pembayaran) = 10) as PERSONAL,
                SUM(TOTAL_AKHIR) AS TOTAL FROM pembayaran WHERE month(tgl_pembayaran) = 10 ";
  $query15  = "SELECT (SELECT SUM(TOTAL_AKHIR) FROM pembayaran join reservasi using(id_reservasi) where id_jenis_tamu = 2 and month(tgl_pembayaran) = 11) as GRUP,
                (SELECT SUM(TOTAL_AKHIR) FROM pembayaran join reservasi using(id_reservasi) where id_jenis_tamu = 1 and month(tgl_pembayaran) = 11) as PERSONAL,
                SUM(TOTAL_AKHIR) AS TOTAL FROM pembayaran WHERE month(tgl_pembayaran) = 11 ";
  $query16  = "SELECT (SELECT SUM(TOTAL_AKHIR) FROM pembayaran join reservasi using(id_reservasi) where id_jenis_tamu = 2 and month(tgl_pembayaran) = 12) as GRUP,
                (SELECT SUM(TOTAL_AKHIR) FROM pembayaran join reservasi using(id_reservasi) where id_jenis_tamu = 1 and month(tgl_pembayaran) = 12) as PERSONAL,
                SUM(TOTAL_AKHIR) AS TOTAL FROM pembayaran WHERE month(tgl_pembayaran) = 12 ";




   
  

?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Advanced form elements</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="asset/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="asset/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="asset/bower_components/Ionicons/css/ionicons.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="asset/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="asset/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="asset/plugins/iCheck/all.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="asset/bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="asset/plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="asset/bower_components/select2/dist/css/select2.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="asset/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="asset/dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <style>
   img {
     width: 300px;
     height: 200px;
     border: 0px solid #253996;
     padding: 10px;
   }
</style>
</head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Tampil Data </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="asset/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="asset/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="asset/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="asset/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="asset/dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <?php
include("navbar1.php");
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tampil Laporan Bulanan
      </h1>
      <ol class="breadcrumb">        
        <li><a href="#">Home</a></li>
        <li class="active">Tampil Laporan Bulanan</li>
      </ol>
    </section>
    <!-- //table -->
    
        <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Total Pendapatan Bulanan Dalam Table</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
              <div class="row"><div class="col-sm-6"><div class="dataTables_length" id="example1_length">
              
              </div></div><div class="col-sm-6">
              
              </div></div><div class="row"><div class="col-sm-12"><table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                <thead>
                <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 182px;">
				BULAN</th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 224px;">
                GRUP</th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 156px;">
                PERSONAL</th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 156px;">				
				TOTAL</th><th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 156px;">				
				
                </thead>
                <?php                 
                  $result5 = mysqli_query($link, $query5);
                  $result6 = mysqli_query($link, $query6);
                  $result7 = mysqli_query($link, $query7);
                  $result8 = mysqli_query($link, $query8);

                  $result9 = mysqli_query($link, $query9);
                  $result10 = mysqli_query($link, $query10);
                  $result11 = mysqli_query($link, $query11);
                  $result12 = mysqli_query($link, $query12);
                  
                  $result13 = mysqli_query($link, $query13);
                  $result14 = mysqli_query($link, $query14);
                  $result15 = mysqli_query($link, $query15);
                  $result16 = mysqli_query($link, $query16);
                  
            
                ?>
                <tbody>           
                                
                <tr role="row" class="odd">
                  <td class="sorting_1">Januari</td>
                  <td>
                  <?php $data = mysqli_fetch_assoc($result5);
                  echo"Rp.";
                  echo"$data[GRUP]";
                  $_GRUP5="$data[GRUP]";                  
                  echo"<td>Rp. ";
                  echo"$data[PERSONAL]</td>";
                  $_PERSONAL5="$data[PERSONAL]";
                  echo"<td>Rp.";
                  echo"$data[TOTAL]</td>";
                  $_TOTAL5="$data[TOTAL]";
                  ?>
                  </td>   

                <tr role="row" class="odd">
                  <td class="sorting_1">Februari</td>
                  <td>
                  <?php $data = mysqli_fetch_assoc($result6);
                  echo"Rp.";
                  echo"$data[GRUP]";
                  $_GRUP6="$data[GRUP]";                  
                  echo"<td>Rp. ";
                  echo"$data[PERSONAL]</td>";
                  $_PERSONAL6="$data[PERSONAL]";
                  echo"<td>Rp.";
                  echo"$data[TOTAL]</td>";
                  $_TOTAL6="$data[TOTAL]";
                  ?>
                  </td>               
                  
                </tr><tr role="row" class="even">
                  <td class="sorting_1">Maret</td>
                  <td>
                  <?php $data = mysqli_fetch_assoc($result7);
                  echo"Rp.";
                  echo"$data[GRUP]";
                  $_GRUP7="$data[GRUP]";                  
                  echo"<td>Rp. ";
                  echo"$data[PERSONAL]</td>";
                  $_PERSONAL7="$data[PERSONAL]";
                  echo"<td>Rp.";
                  echo"$data[TOTAL]</td>";
                  $_TOTAL7="$data[TOTAL]";
                  ?>
                  </td>  
                      
                </tr><tr role="row" class="even">
                  <td class="sorting_1">April</td>
                  <td>
                  <?php $data = mysqli_fetch_assoc($result8);                  
                  echo"Rp.";
                  echo"$data[GRUP]";
                  $_GRUP8="$data[GRUP]";                  
                  echo"<td>Rp. ";
                  echo"$data[PERSONAL]</td>";
                  $_PERSONAL8="$data[PERSONAL]";
                  echo"<td>Rp.";
                  echo"$data[TOTAL]</td>";
                  $_TOTAL8="$data[TOTAL]";
                  ?>
                  </td>

                <tr role="row" class="odd">
                  <td class="sorting_1">Mei</td>
                  <td>
                  <?php $data = mysqli_fetch_assoc($result9);
                  echo"Rp.";
                  echo"$data[GRUP]";
                  $_GRUP9="$data[GRUP]";                  
                  echo"<td>Rp. ";
                  echo"$data[PERSONAL]</td>";
                  $_PERSONAL9="$data[PERSONAL]";
                  echo"<td>Rp.";
                  echo"$data[TOTAL]</td>";
                  $_TOTAL9="$data[TOTAL]";
                  ?>
                  </td>   

                <tr role="row" class="odd">
                  <td class="sorting_1">Juni</td>
                  <td>
                  <?php $data = mysqli_fetch_assoc($result10);
                  echo"Rp.";
                  echo"$data[GRUP]";
                  $_GRUP10="$data[GRUP]";                  
                  echo"<td>Rp. ";
                  echo"$data[PERSONAL]</td>";
                  $_PERSONAL10="$data[PERSONAL]";
                  echo"<td>Rp.";
                  echo"$data[TOTAL]</td>";
                  $_TOTAL10="$data[TOTAL]";
                  ?>
                  </td>               
                  
                </tr><tr role="row" class="even">
                  <td class="sorting_1">Juli</td>
                  <td>
                  <?php $data = mysqli_fetch_assoc($result11);
                  echo"Rp.";
                  echo"$data[GRUP]";
                  $_GRUP11="$data[GRUP]";                  
                  echo"<td>Rp. ";
                  echo"$data[PERSONAL]</td>";
                  $_PERSONAL11="$data[PERSONAL]";
                  echo"<td>Rp.";
                  echo"$data[TOTAL]</td>";
                  $_TOTAL11="$data[TOTAL]";
                  ?>
                  </td>  
                      
                </tr><tr role="row" class="even">
                  <td class="sorting_1">Agustus</td>
                  <td>
                  <?php $data = mysqli_fetch_assoc($result12);                  
                  echo"Rp.";
                  echo"$data[GRUP]";
                  $_GRUP12="$data[GRUP]";                  
                  echo"<td>Rp. ";
                  echo"$data[PERSONAL]</td>";
                  $_PERSONAL12="$data[PERSONAL]";
                  echo"<td>Rp.";
                  echo"$data[TOTAL]</td>";
                  $_TOTAL12="$data[TOTAL]";
                  ?>
                  </td>

                  <tr role="row" class="odd">
                  <td class="sorting_1">September</td>
                  <td>
                  <?php $data = mysqli_fetch_assoc($result13);
                  echo"Rp.";
                  echo"$data[GRUP]";
                  $_GRUP13="$data[GRUP]";                  
                  echo"<td>Rp. ";
                  echo"$data[PERSONAL]</td>";
                  $_PERSONAL13="$data[PERSONAL]";
                  echo"<td>Rp.";
                  echo"$data[TOTAL]</td>";
                  $_TOTAL13="$data[TOTAL]";
                  ?>
                  </td>   

                <tr role="row" class="odd">
                  <td class="sorting_1">Oktober</td>
                  <td>
                  <?php $data = mysqli_fetch_assoc($result14);
                  echo"Rp.";
                  echo"$data[GRUP]";
                  $_GRUP14="$data[GRUP]";                  
                  echo"<td>Rp. ";
                  echo"$data[PERSONAL]</td>";
                  $_PERSONAL14="$data[PERSONAL]";
                  echo"<td>Rp.";
                  echo"$data[TOTAL]</td>";
                  $_TOTAL14="$data[TOTAL]";
                  ?>
                  </td>               
                  
                </tr><tr role="row" class="even">
                  <td class="sorting_1">November</td>
                  <td>
                  <?php $data = mysqli_fetch_assoc($result15);
                  echo"Rp.";
                  echo"$data[GRUP]";
                  $_GRUP15="$data[GRUP]";                  
                  echo"<td>Rp. ";
                  echo"$data[PERSONAL]</td>";
                  $_PERSONAL15="$data[PERSONAL]";
                  echo"<td>Rp.";
                  echo"$data[TOTAL]</td>";
                  $_TOTAL15="$data[TOTAL]";
                  ?>
                  </td>  
                      
                </tr><tr role="row" class="even">
                  <td class="sorting_1">Desember</td>
                  <td>
                  <?php $data = mysqli_fetch_assoc($result16);                  
                  echo"Rp.";
                  echo"$data[GRUP]";
                  $_GRUP16="$data[GRUP]";                  
                  echo"<td>Rp. ";
                  echo"$data[PERSONAL]</td>";
                  $_PERSONAL16="$data[PERSONAL]";
                  echo"<td>Rp.";
                  echo"$data[TOTAL]</td>";
                  $_TOTAL16="$data[TOTAL]";
                  ?>
                  </td>  

                  
                </tr></tbody>                
              </table></div></div><div class="row"><div class="col-sm-5"></div><div class="col-sm-7"><div class="dataTables_paginate paging_simple_numbers" id="example1_paginate"><ul class="pagination"><li class="paginate_button previous disabled" id="example1_previous"><a href="#" aria-controls="example1" data-dt-idx="0" tabindex="0">Previous</a></li><li class="paginate_button active">
              <a href="#" aria-controls="example1" data-dt-idx="1" tabindex="0">1</a>
              </li><li class="paginate_button ">
              
              </ul></div></div></div></div>
            </div>
            <!-- /.box-body -->
          </div>
   

    <!-- Main content -->
    <section class="content">   
    <div class="row">
        <div class="col-xs-12">
          <div class="box">
          <div class="box box-primary">
            <div class="box-header with-border">
              <i class="fa fa-bar-chart-o"></i>

              <h3 class="box-title">Bar Chart</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <div id="bar-chart" style="height: 300px; padding: 0px; position: relative;">
              <canvas class="flot-base" width="659" height="300" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 659px; height: 300px;"></canvas>
              <div class="flot-text" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; font-size: smaller; color: rgb(84, 84, 84);">
              <div class="flot-x-axis flot-x1-axis xAxis x1Axis" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px;">
              <div class="flot-tick-label tickLabel" style="position: absolute; max-width: 131px; top: 283px; left: 30px; text-align: center;">Januari</div>
              <div class="flot-tick-label tickLabel" style="position: absolute; max-width: 131px; top: 283px; left: 130px; text-align: center;">Februari</div>
              <div class="flot-tick-label tickLabel" style="position: absolute; max-width: 131px; top: 283px; left: 230px; text-align: center;">Maret</div>
              <div class="flot-tick-label tickLabel" style="position: absolute; max-width: 131px; top: 283px; left: 330px; text-align: center;">April</div>

              <div class="flot-tick-label tickLabel" style="position: absolute; max-width: 131px; top: 283px; left: 430px; text-align: center;">Mei</div>
              <div class="flot-tick-label tickLabel" style="position: absolute; max-width: 131px; top: 283px; left: 530px; text-align: center;">Juni</div>
              <div class="flot-tick-label tickLabel" style="position: absolute; max-width: 131px; top: 283px; left: 630px; text-align: center;">Juli</div>
              <div class="flot-tick-label tickLabel" style="position: absolute; max-width: 131px; top: 283px; left: 730px; text-align: center;">Agustus</div>

              <div class="flot-tick-label tickLabel" style="position: absolute; max-width: 131px; top: 283px; left: 830px; text-align: center;">September</div>
              <div class="flot-tick-label tickLabel" style="position: absolute; max-width: 131px; top: 283px; left: 930px; text-align: center;">Oktober</div>
              <div class="flot-tick-label tickLabel" style="position: absolute; max-width: 131px; top: 283px; left: 1030px; text-align: center;">November</div>
              <div class="flot-tick-label tickLabel" style="position: absolute; max-width: 131px; top: 283px; left: 1130px; text-align: center;">Desember</div>

              </div><div class="flot-y-axis flot-y1-axis yAxis y1Axis" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px;">
              <div class="flot-tick-label tickLabel" style="position: absolute; top: 270px; left: 7px; text-align: right;">0</div>
              <div class="flot-tick-label tickLabel" style="position: absolute; top: 203px; left: 7px; text-align: right;">5</div>
              <div class="flot-tick-label tickLabel" style="position: absolute; top: 135px; left: 1px; text-align: right;">10</div>
              <div class="flot-tick-label tickLabel" style="position: absolute; top: 68px; left: 1px; text-align: right;">15</div>              
              </div></div><canvas class="flot-overlay" width="659" height="300" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 659px; height: 300px;"></canvas></div>
            </div>
            <!-- /.box-body-->
          </div>
          </div>
          <!-- /.box -->
        </div>
      </div>
     

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1
    </div>
    SIGAH 2018
  </footer>

  


  <!-- jQuery 3 -->
  <script src="asset/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="asset/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="asset/bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- InputMask -->
<script src="asset/plugins/input-mask/jquery.inputmask.js"></script>
<script src="asset/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="asset/plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->
<script src="asset/bower_components/moment/min/moment.min.js"></script>
<script src="asset/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="asset/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- bootstrap color picker -->
<script src="asset/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="asset/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- SlimScroll -->
<script src="asset/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="asset/plugins/iCheck/icheck.min.js"></script>
<!-- FastClick -->
<script src="asset/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="asset/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="asset/dist/js/demo.js"></script>
<!-- Page script -->
<!-- FLOT CHARTS -->
<script src="asset/bower_components/Flot/jquery.flot.js"></script>
<!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
<script src="asset/bower_components/Flot/jquery.flot.resize.js"></script>
<!-- FLOT PIE PLUGIN - also used to draw donut charts -->
<script src="asset/bower_components/Flot/jquery.flot.pie.js"></script>
<!-- FLOT CATEGORIES PLUGIN - Used to draw bar charts -->
<script src="asset/bower_components/Flot/jquery.flot.categories.js"></script>
<!-- Page script -->
<script>
 $(function () {
    /*
     * Flot Interactive Chart
     * -----------------------
     */
    // We use an inline data source in the example, usually data would
    // be fetched from a server
    var data = [], totalPoints = 100

    function getRandomData() {

      if (data.length > 0)
        data = data.slice(1)

      // Do a random walk
      while (data.length < totalPoints) {

        var prev = data.length > 0 ? data[data.length - 1] : 50,
            y    = prev + Math.random() * 10 - 5

        if (y < 0) {
          y = 0
        } else if (y > 100) {
          y = 100
        }

        data.push(y)
      }

      // Zip the generated y values with the x values
      var res = []
      for (var i = 0; i < data.length; ++i) {
        res.push([i, data[i]])
      }

      return res
    }

    var interactive_plot = $.plot('#interactive', [getRandomData()], {
      grid  : {
        borderColor: '#f3f3f3',
        borderWidth: 1,
        tickColor  : '#f3f3f3'
      },
      series: {
        shadowSize: 0, // Drawing is faster without shadows
        color     : '#3c8dbc'
      },
      lines : {
        fill : true, //Converts the line chart to area chart
        color: '#3c8dbc'
      },
      yaxis : {
        min : 0,
        max : 100,
        show: true
      },
      xaxis : {
        show: true
      }
    })

    var updateInterval = 500 //Fetch data ever x milliseconds
    var realtime       = 'on' //If == to on then fetch data every x seconds. else stop fetching
    function update() {

      interactive_plot.setData([getRandomData()])

      // Since the axes don't change, we don't need to call plot.setupGrid()
      interactive_plot.draw()
      if (realtime === 'on')
        setTimeout(update, updateInterval)
    }

    //INITIALIZE REALTIME DATA FETCHING
    if (realtime === 'on') {
      update()
    }
    //REALTIME TOGGLE
    $('#realtime .btn').click(function () {
      if ($(this).data('toggle') === 'on') {
        realtime = 'on'
      }
      else {
        realtime = 'off'
      }
      update()
    })
    /*
     * END INTERACTIVE CHART
     */

    /*
     * LINE CHART
     * ----------
     */
    //LINE randomly generated data

    var sin = [], cos = []
    for (var i = 0; i < 14; i += 0.5) {
      sin.push([i, Math.sin(i)])
      cos.push([i, Math.cos(i)])
    }
    var line_data1 = {
      data : sin,
      color: '#3c8dbc'
    }
    var line_data2 = {
      data : cos,
      color: '#00c0ef'
    }
    $.plot('#line-chart', [line_data1, line_data2], {
      grid  : {
        hoverable  : true,
        borderColor: '#f3f3f3',
        borderWidth: 1,
        tickColor  : '#f3f3f3'
      },
      series: {
        shadowSize: 0,
        lines     : {
          show: true
        },
        points    : {
          show: true
        }
      },
      lines : {
        fill : false,
        color: ['#3c8dbc', '#f56954']
      },
      yaxis : {
        show: true
      },
      xaxis : {
        show: true
      }
    })
    //Initialize tooltip on hover
    $('<div class="tooltip-inner" id="line-chart-tooltip"></div>').css({
      position: 'absolute',
      display : 'none',
      opacity : 0.8
    }).appendTo('body')
    $('#line-chart').bind('plothover', function (event, pos, item) {

      if (item) {
        var x = item.datapoint[0].toFixed(2),
            y = item.datapoint[1].toFixed(2)

        $('#line-chart-tooltip').html(item.series.label + ' of ' + x + ' = ' + y)
          .css({ top: item.pageY + 5, left: item.pageX + 5 })
          .fadeIn(200)
      } else {
        $('#line-chart-tooltip').hide()
      }

    })
    /* END LINE CHART */

    /*
     * FULL WIDTH STATIC AREA CHART
     * -----------------
     */
    var areaData = [[2, 88.0], [3, 93.3], [4, 102.0], [5, 108.5], [6, 115.7], [7, 115.6],
      [8, 124.6], [9, 130.3], [10, 134.3], [11, 141.4], [12, 146.5], [13, 151.7], [14, 159.9],
      [15, 165.4], [16, 167.8], [17, 168.7], [18, 169.5], [19, 168.0]]
    $.plot('#area-chart', [areaData], {
      grid  : {
        borderWidth: 0
      },
      series: {
        shadowSize: 0, // Drawing is faster without shadows
        color     : '#00c0ef'
      },
      lines : {
        fill: true //Converts the line chart to area chart
      },
      yaxis : {
        show: false
      },
      xaxis : {
        show: false
      }
    })

    /* END AREA CHART */

    /*
     * BAR CHART
     * ---------
     */
    var a5="<?php Print($_TOTAL5); ?>";
    var a6="<?php Print($_TOTAL6); ?>";
    var a7="<?php Print($_TOTAL7); ?>";
    var a8="<?php Print($_TOTAL8); ?>";
    var a9="<?php Print($_TOTAL9); ?>";
    var a10="<?php Print($_TOTAL10); ?>";
    var a11="<?php Print($_TOTAL11); ?>";
    var a12="<?php Print($_TOTAL12); ?>";
    var a13="<?php Print($_TOTAL13); ?>";
    var a14="<?php Print($_TOTAL14); ?>";
    var a15="<?php Print($_TOTAL15); ?>";
    var a16="<?php Print($_TOTAL16); ?>";
    
    //var a51="<?php Print($_PERSONAL5); ?>";
    //var a52="<?php Print($_GRUP5); ?>";

    var bar_data = {
      data : [['Januari', a5], ['Februari', a6], ['Maret', a7], ['April', a8],['Mei', a9], ['Juni', a10], ['Juli', a11], ['Agustus', a12],['September', a13], ['Oktober', a14], ['November', a15], ['Desember', a16] ], 
      color: '#3c8dbc'
    }
    $.plot('#bar-chart', [bar_data], {
      grid  : {
        borderWidth: 1,
        borderColor: '#f3f3f3',
        tickColor  : '#f3f3f3'
      },
      series: {
        bars: {
          show    : true,
          barWidth: 0.5,
          align   : 'center'
        }
      },
      xaxis : {
        mode      : 'categories',
        tickLength: 0
      }
    })
    /* END BAR CHART */

    /*
     * DONUT CHART
     * -----------
     */

    var donutData = [
      { label: 'Series2', data: 30, color: '#3c8dbc' },
      { label: 'Series3', data: 20, color: '#0073b7' },
      { label: 'Series4', data: 50, color: '#00c0ef' }
    ]
    $.plot('#donut-chart', donutData, {
      series: {
        pie: {
          show       : true,
          radius     : 1,
          innerRadius: 0.5,
          label      : {
            show     : true,
            radius   : 2 / 3,
            formatter: labelFormatter,
            threshold: 0.1
          }

        }
      },
      legend: {
        show: false
      }
    })
    /*
     * END DONUT CHART
     */

  })

  /*
   * Custom Label formatter
   * ----------------------
   */
  function labelFormatter(label, series) {
    return '<div style="font-size:13px; text-align:center; padding:2px; color: #fff; font-weight: 600;">'
      + label
      + '<br>'
      + Math.round(series.percent) + '%</div>'
  }
//date time picker script
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Date picker
    $('#datepicker').datepicker({
       
      autoclose: true
    })
       //Date picker2
       $('#datepicker2').datepicker({
       
       autoclose: true
     })

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    //Timepicker
    $('.timepicker').timepicker({
      showInputs: false
    })
  })
</script>
</body>
</html>



