<!DOCTYPE html>
<html>
<head>
	<title>T-Dorm | Telkom University Dormitory</title>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

	<link rel="stylesheet" type="text/css" href="../../css/style-dashboard.css">
  <link rel="stylesheet" type="text/css" href="../../css/style.css">
  
	<link rel="shortcut icon" href="../../img/fav.png">
  
</head>
<body>


<!-- HEADER DAN NAVBAR -->
    <nav>
      <ul>
        <a class="teks" href="index.php"  data-0="line-height:90px;" data-300="line-height:50px;">T-Dorm</a>
        

              <!-- PROFILE -->
        <li class="profile">
           <a href="#" style="color: #d2d6dd;"><p style="font-size: 18px; text-align: center">Aditya</p></a>

            <ul>
              <li><a href="#">Profile</a></li>
              <li><a href="#">Settings</a></li>
              <li><a href="#">Log Out</a></li>
            </ul>

        </li>


              <!-- END OF PROFILE -->

        <li style="margin-right: 20px;"><a href="#">Hubungi Kami</a></li>
        <li><a href="#">Bantuan</a></li>
      </ul>
    </nav>
<!-- END OF NAV BAR -->

  <!-- KONTEN -->
    <!-- SIDEBAR -->

  <div class="sidebar" style="height:220%;" >
    <h3 style="text-align: center; margin: 20px 0 20px 0;">Helpdesk Dashboard</h3>

    <ul>
      <li><a href="index.php">Riwayat<i class="material-icons" style="float: right;">expand_more</i></a>
          <ul>
            <li><a href="index.php">Cek In/Out kamar</a></li>
            <li><a href="riwayat-jemuran.php">Kunci Jemuran</a></li>
            <li><a href="riwayat-tamu.php">Tamu</a></li>
          </ul>
      </li>

      <li><a href="data-mhs.php">Mahasiswa</a></li>
      <li><a href="#">Tentang</a></li>
    </ul>
  </div>
    <!-- END OF SIDEBAR -->

    <!-- KONTEN UTAMA -->
  <div style="margin-left: 15%; margin-top:50px; ">
    <h2 align="center" style="margin-bottom:30px;">Data mahasiswa</h2>
    
    <!-- TABLE FORM RIWAYAT -->
        <table class="mhs">

          <tr>
            <th>No.</th>
            <th>Nama Mahasiswa</th>
            <th>Tempat, tanggal lahir</th>
            <th>Agama</th>
            <th>NIM</th>
            <th>Jurusan</th>
            <th>No. Hp</th>
            <th>E-mail</th>
            <th>Jenis kelamin</th>
            <th>Golongan darah</th>
            <th>Alamat asal</th>
            <th>No. Kamar</th>
            <th>Edit</th>
            <th>Delete</th>
          </tr>

          <?php 
            include("../../koneksi.php");

            $halaman = 10;
            $page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
            $mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
            $query = "SELECT * FROM mhs";
            $result = mysqli_query($connect, $query);
            $total = mysqli_num_rows($result);
            $pages = ceil($total/$halaman);
            $sqlQuery = mysqli_query($connect, "SELECT * FROM mhs ORDER BY kamar ASC LIMIT $mulai , $halaman"  );
                    $no = $mulai+1;
                    while($data = mysqli_fetch_array($sqlQuery)){ 
                      echo '<tr>';
                        echo '<td>'.$no.'</td>';  //menampilkan nomor urut
                        echo '<td>'.$data['nama'].'</td>';                 
                        echo '<td>'.$data['ttl'].'</td>';  
                        echo '<td>'.$data['agama'].'</td>';                   
                        echo '<td>'.$data['nim'].'</td>';
                        echo '<td>'.$data['jurusan'].'</td>';
                        echo '<td>'.$data['nohp'].'</td>'; 
                        echo '<td>'.$data['email'].'</td>';                 
                        echo '<td>'.$data['jeniskelamin'].'</td>';  
                        echo '<td>'.$data['goldar'].'</td>';                   
                        echo '<td>'.$data['alamat_asal'].'</td>';
                        echo '<td>'.$data['kamar'].'</td>';


                        echo '<td class="material"><a href="edit-data-mhs.php?nim='.$data['nim'].'"><i class="material-icons">edit</i></a></td>';
                        echo '<td class="material"><a href="hapus-data-mhs.php?nim='.$data['nim'].'" onclick="return confirm(\'Yakin?\')onclick="return confirm(\'Yakin?\')><i class="material-icons">delete</i></a></td>';



                    echo "</tr>";                            
                      $no++;
                    }              
              mysqli_close($connect);
          ?>
        </table>

        <div class="pagination">
          <?php echo "<a href='data-mhs.php?halaman=".($page-1)."'> <<< </a>"; ?>
            <?php for ($i=1; $i<=$pages ; $i++){ ?>
                <a href="?halaman=<?php echo $i; ?>"><?php echo $i; ?></a>
          <?php } ?>
          <?php echo "<a href='data-mhs.php?halaman=".($page+1)."'> >>> </a>"; ?>
            
          </div>
  </div>


  <!-- 	FOOTER -->
	<!-- <footer>
  <br/>
		<p>&copy Copyright 2017 T-Dorm</p>
	</footer>	 -->





</body>
</html>