<?php
session_start();

if(!(isset($_SESSION['user']))){
  header("location:../login/form-login.php");
}
include '../connect.php';

$query = "SELECT kode_mapel, t_guru.mapel, alokasi_waktu, semester, nama_guru, jurusan, kelas
          FROM t_mapel LEFT JOIN t_guru USING (kode_guru)
          ORDER BY mapel";

$result = mysqli_query ($connect, $query);
$num = mysqli_num_rows ($result);
 ?>
 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title></title>
     <link rel="stylesheet" type="text/css" href="css/style1.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   </head>
   <body>
     <!-- HEADER -->
     <div id="header">
         <span id="open" style="font-size:35px;cursor:pointer;padding-left: 200px;margin-top:-5px;" onclick="openNav()">&#9776; </span>


             <form class="example" action="search.php" method="get">
                   <button type="submit"><i class="fa fa-search cari"></i></button>
                     <input id="cari" type="search" name="cari" placeholder="Masukkan pencarian...">

             <select class="pilihan" name="kategori" id="pilihan">
               <option>Pilih Kategori :</option>
               <option value="mapel">Mata Pelajaran</option>
               <option value="nama_guru">Nama Guru</option>
               <option value="alokasi_waktu">Alokasi Waktu</option>
               <option value="semester">Semester</option>
             </select>

     </form>
     <form class="example1" action="short.php" method="get">
        <button style="float:right; height:46px;margin-top:-26px;margin-right:10px;background-color: #2196F3;color:white;" type="submit"><b>Short</b></button>
         <select class="pilihan" style="height:45px;float:right;margin-top:-26px;margin-right:10px;" name="urut">
         <option disabled selected>Pilih Kategori</option>
         <option value="kode_mapel">Kode Mapel</option>
         <option value="mapel">Mata pelajaran</option>
         <option value="alokasi_waktu">Alokasi Waktu</option>
         <option value="semester">Semester</option>
         <option value="nama_guru">Guru Pengajar</option>
       </select>
       <p id="judul" style="float:right;padding-right:70px;font-size:30px;margin-top:-23px;margin-bottom:0;transition:0.5s;">
         Data Matapelajaran </p>
     </form>
   </div>
   <div class="dropdown">
   <input type="image" src="gambar/journalist.png" width="60px" height="60px" class="ikon dropbtn" alt="Logout" name="dropdown" onclick="myFunction()" value="">
   <div id="myDropdown" class="dropdown-content">
     <a href="../login/logout.php" class="fa fa-sign-out"> Sign Out</a>
   </div>
   </div>

   <!-- SIDENAV -->
      <div id="mySidenav" class="sidenav">
        <img src="gambar/pakdhe1.jpg"  class="avatar" alt="Avatarmu">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <div class="sidenav2">
        <p> <i class="fa fa-briefcase"></i> Designer</p>
        <p> <i class="fa fa-home"></i> Malang, IDN</p>
         <p> <i class="fa fa-envelope"></i> andika@gmail.com</p>
          <p> <i class="fa fa-phone"></i> 080301 </p>
        </div>
        <hr>
        <div class="namadata">
        <p><i class="fa fa-asterisk"></i> <b>Data</b></p>
        <a href="../t_guru/read.php" style="margin-top:10px;font-size:25px;">Data Guru</a>
          <a href="../t_mapel/read.php" class="active" style="margin-top:10px;font-size:25px;">Matapelajaran</a>
      </div>
    </div>


            <!-- TABLE -->
      <div id="main">
        <div class="headtab"></div>
        <div class="box-login-title">
          <div class="fa fa-plus-square" style="padding-left:20px;padding-top:8px;font-size:20px;color:black;"></div>
          <h3 id="myBtn" style="padding-left:50px;margin-top:-27px;cursor:pointer;font-size:23px;">Tambah Data</h3>
    </div>
          <table class="customers">
       <tr>
          <th style="width:5%;text-align:center;">No.</th>
         <th id="customers1">Kode Mapel</th>
         <th id="customers2">Mata Pelajaran</th>
         <th id="customers3">Alokasi Waktu</th>
         <th id="customers4">Semester</th>
         <th id="customers7">Jurusan</th>
         <th id="customers8">Kelas</th>
         <th id="customers5">Guru Pengajar</th>
         <th colspan="2" id="customers6">Aksi</th>
       </tr>


       <?php
      if($num >0)
      {
      $no = 1;
      while ($data = mysqli_fetch_assoc($result)) {?>
        <tr>
          <td><?php echo $no; ?></td>
          <td><?php echo $data['kode_mapel'] ?></td>
          <td><?php echo $data['mapel'] ?></td>
          <td><?php echo $data['alokasi_waktu'] ?></td>
          <td><?php echo $data['semester']; ?></td>
          <td><?php echo $data['jurusan'] ?></td>
          <td><?php echo $data['kelas']; ?></td>
          <td>
          <?php if ($data['nama_guru'] !=NULL)
          {echo $data['nama_guru'];}
          else {echo "-";}
          ?>
          </td>
          <td>
            <a href="form-update.php?kode_mapel=<?php echo $data['kode_mapel']; ?>"><p class='fa fa-edit' style='font-size:20px;color:purple;padding:0;'></p></a>
          </td>
          <td>
            <a href="delete.php?kode_mapel=<?php echo $data['kode_mapel']; ?>" onclick="return confirm('Anda yakin ingin menghapus data?')"> <p class='fa fa-times' style='font-size:20px;padding:0;color:purple;'></p></a>
          </td>
        </tr>
        <?php
        $no++;
          }
       }
      else {
        echo "<tr> <td coldspan='3'> Tidak ada data </td></tr> ";
      }
      ?>

     </table>
     </div>

     <div id="myModal" class="modal">
       <div class="modal-content" style="background-color: #ecf0f1;">
         <div class="modal-header">
       <span style="margin-right:20px;margin-top:-10px;" class="close">&times;</span>
       <?php

       include '../connect.php';

       $query ="SELECT kode_guru, nama_guru FROM t_guru";
       $result = mysqli_query ($connect, $query);

        ?>
       <form  action="create.php" method="post">
         <h1 style="font-size: 40px;text-align:center;padding-left:30px;">Create Data</h1>
         <input type="text" class="inputmodal1" name="kode_mapel" id="kode_mapel" placeholder="Kode Matapelajaran" required>
         <input type="text" class="inputmodal" name="alokasi_waktu" id="alokasi_waktu" placeholder="Alokasi Waktu" required>
         <input type="text" class="inputmodal" name="semester" id="semester" placeholder="Semester" required>
         <select class="inputmodal" name="kode_guru" id="kode_guru">
           <option disabled selected value="-">Pilih Salah Satu Guru Pengajar</option>
           <option value="NULL">Tidak ada pengajar</option>
           <?php
            while ($data = mysqli_fetch_assoc($result)) {
              ?>
            <option value=" <?php echo $data['kode_guru']; ?>">
              <?php echo $data['nama_guru']; ?>
            </option>
            <?php
            }
            ?>
         </select>
         <br>
         <input class="submitmodal" type="submit" name="btnSimpan" value="Submit" >
       </form>
</div>
 </div>
   </div>
   </body>
 </html>


 <script>
 function openNav() {
     document.getElementById("mySidenav").style.width = "280px";
     document.getElementById("main").style.marginLeft = "315px";
     document.getElementById("header").style.marginLeft = "0";
     document.getElementById("judul").style.marginRight = "0";
 }
 function closeNav() {
     document.getElementById("mySidenav").style.width = "0";
     document.getElementById("main").style.marginLeft= "50px";
     document.getElementById("header").style.marginLeft = "-160px";
     document.getElementById("judul").style.marginRight = "220px";
 }


 // SCRIPT MODAL
 var modal = document.getElementById('myModal');
 var btn = document.getElementById("myBtn");
 var span = document.getElementsByClassName("close")[0];
 btn.onclick = function() {
     modal.style.display = "block";
 }
 span.onclick = function() {
     modal.style.display = "none";
 }
 window.onclick = function(event) {
     if (event.target == modal) {
         modal.style.display = "none";
     }
 }

 // SCRIPT IMAGE dropdown
 /* When the user clicks on the button,
 toggle between hiding and showing the dropdown content */
 function myFunction() {
     document.getElementById("myDropdown").classList.toggle("show");
 }

 // Close the dropdown if the user clicks outside of it
 window.onclick = function(event) {
   if (!event.target.matches('.dropbtn')) {

     var dropdowns = document.getElementsByClassName("dropdown-content");
     var i;
     for (i = 0; i < dropdowns.length; i++) {
       var openDropdown = dropdowns[i];
       if (openDropdown.classList.contains('show')) {
         openDropdown.classList.remove('show');
       }
     }
   }
 }
 </script>
