<!doctype html>
<html lang="tr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hastane Uygulaması</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>



    <header>
        <div class="px-3 py-2 text-bg-dark">
          <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
              <a href="" class="d-flex align-items-center my-2 my-lg-0 me-lg-auto text-white text-decoration-none">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-hospital" viewBox="0 0 16 16">
                    <path d="M8.5 5.034v1.1l.953-.55.5.867L9 7l.953.55-.5.866-.953-.55v1.1h-1v-1.1l-.953.55-.5-.866L7 7l-.953-.55.5-.866.953.55v-1.1h1ZM13.25 9a.25.25 0 0 0-.25.25v.5c0 .138.112.25.25.25h.5a.25.25 0 0 0 .25-.25v-.5a.25.25 0 0 0-.25-.25h-.5ZM13 11.25a.25.25 0 0 1 .25-.25h.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-.5a.25.25 0 0 1-.25-.25v-.5Zm.25 1.75a.25.25 0 0 0-.25.25v.5c0 .138.112.25.25.25h.5a.25.25 0 0 0 .25-.25v-.5a.25.25 0 0 0-.25-.25h-.5Zm-11-4a.25.25 0 0 0-.25.25v.5c0 .138.112.25.25.25h.5A.25.25 0 0 0 3 9.75v-.5A.25.25 0 0 0 2.75 9h-.5Zm0 2a.25.25 0 0 0-.25.25v.5c0 .138.112.25.25.25h.5a.25.25 0 0 0 .25-.25v-.5a.25.25 0 0 0-.25-.25h-.5ZM2 13.25a.25.25 0 0 1 .25-.25h.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-.5a.25.25 0 0 1-.25-.25v-.5Z"/>
                    <path d="M5 1a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v1a1 1 0 0 1 1 1v4h3a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V8a1 1 0 0 1 1-1h3V3a1 1 0 0 1 1-1V1Zm2 14h2v-3H7v3Zm3 0h1V3H5v12h1v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3Zm0-14H6v1h4V1Zm2 7v7h3V8h-3Zm-8 7V8H1v7h3Z"/>
                  </svg>
                  <h5>Hastane</h5>
              </a>
              
              <ul class="nav col-12 col-lg-auto my-2 justify-content-center my-md-0 text-small">
                
                <li>
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                      </svg>
    


            <?php 
            
            include("kaynak/baglanti.php");
            session_start();

            //Hangi giriş yapıldıysa onun adı
            echo ''.$_SESSION["unvan"].'';






            //tabloların verileri
            if ($_SESSION["unvan"]=="doktor") {
              $bul="select ilac from doktor";
              $kayit=$baglanti->query($bul);
            }
            else if ($_SESSION["unvan"]=="eczaci") {
              $bul="select ilac from eczaci";
              $bulUst="select ilac from doktor";
              $kayit=$baglanti->query($bul);
              $kayitUst=$baglanti->query($bulUst);
            }
            else if ($_SESSION["unvan"]=="hemsire") {
              $bul="select ilac from hemsire";
              $bulUst="select ilac from eczaci";
              $kayit=$baglanti->query($bul);
              $kayitUst=$baglanti->query($bulUst);
            }




            if (isset($_POST["btn_doktorIlac"]) ) 
	{ 
    //doktor ilaç istediğinde
		$ilac=$_POST["txt_doktorIlac"];

	  $kaydet="INSERT INTO doktor (ilac) VALUES ('$ilac')";
	  $calistir=mysqli_query($baglanti,$kaydet);

	  mysqli_close($baglanti);
		
    header("location:anaSayfa.php");
    
	}



  if (isset($_POST["btn_eczaciIlac"]) ) 
	{ 
    //eczacı butonu
		$ilac=$_POST["txt_eczaciIlac"];

	  $sil="delete from doktor where ilac='$ilac'";
	  $calistir=mysqli_query($baglanti,$sil);

    $kaydet="INSERT INTO eczaci (ilac) VALUES ('$ilac')";
	  $calistir=mysqli_query($baglanti,$kaydet);

	  mysqli_close($baglanti);
    header("location:anaSayfa.php");
	}




  if (isset($_POST["btn_hemsireIlac"]) ) 
	{ 
    //hemsire butonu
		$ilac=$_POST["txt_hemsireIlac"];

	  $sil="delete from eczaci where ilac='$ilac'";
	  $calistir=mysqli_query($baglanti,$sil);

    $kaydet="INSERT INTO hemsire (ilac) VALUES ('$ilac')";
	  $calistir=mysqli_query($baglanti,$kaydet);

	  mysqli_close($baglanti);
    header("location:anaSayfa.php");
	}



?>
<!--     -->

            
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="px-3 py-2 border-bottom mb-3">
          <div class="container d-flex flex-wrap justify-content-end">
    
            <div class="text-end">

            <!--  giris.html sayfasına yönlendirecek   -->
            <form action="giris.php">
              <button type="submit" class="btn btn-primary" name="btn_cikis">Çıkış Yap</button>
            </form>
            <!--     -->

            </div>
          </div>
        </div>
      </header>




  
        <div class="container marketing mt-5 ">

        <?php 
        //doktor girişi yapıldığında sayfa içeriği
          if($_SESSION["unvan"]=="doktor")
          {
            echo '
          <div class="row">
            <div class="col-lg-6 bg-light">
              
        <form action="anaSayfa.php" method="POST">
          <div class="form-group">

          <!--  ilacı isteme kısmı  -->

            <label for="exampleFormControlInput1">İlacı İste</label>
            <input type="text" class="form-control" name="txt_doktorIlac" placeholder="İlaç Adı Girin">

            <button class="w-50 py-2 mb-2 btn btn-outline-dark rounded-1" type="submit" name="btn_doktorIlac">İlacı İste</button>

          </div>
            </div>



            <div class="col-lg-6">
          <div class="form-group">
            <label for="exampleFormControlSelect1">İstenmiş İlaçlar</label>



            <!--  veri tabanındaki ilaçları tabloda gösteriyor  -->
            <select class="form-control" id="exampleFormControlSelect1">
            ';
            if ($kayit->num_rows>0) {
              while ($satir=$kayit->fetch_assoc()) {
                echo '<option>'. $satir["ilac"]   .'</option>';
              }
            }
            echo '
            </select>





          </div>
        </form>
            </div>
  
        </div>

        ';
      }
      
        //eczaci girişi yapıldığında sayfa içeriği
        if($_SESSION["unvan"]=="eczaci")
        {
          echo '
        <div class="row">
          <div class="col-lg-4 bg-light">
            


      <form action="anaSayfa.php" method="POST">
        <div class="form-group">
          <label for="exampleFormControlInput1">İlacı Stokta Göster</label>
          <input type="text" class="form-control" id="exampleFormControlInput1" name="txt_eczaciIlac" placeholder="İlaç Adı Girin">

          <button class="w-50 py-2 mb-2 btn btn-outline-dark rounded-1" type="submit" name="btn_eczaciIlac">İlacı Stokta Göster</button>

        </div>
          </div>
          <div class="col-lg-4 ">
            
        <div class="form-group">

          <label for="exampleFormControlSelect1">Doktorun İstediği İlaçlar</label>



          <select class="form-control" id="exampleFormControlSelect1" name="taskOption">
          ';
          if ($kayitUst->num_rows>0) {
            $i=1;
            while ($satir=$kayitUst->fetch_assoc()) {
              echo '<option value="deger'.$i.'">'. $satir["ilac"]   .'</option>';
            }
          }
          echo '

          </select>
          <!--   tablodan çekme kodunu yapamadım
          <button class="w-50 py-2 mb-2 btn btn-outline-dark rounded-1" type="btn_eczaciTablodanCek">İlaç İsmini Al</button>
          -->
        </div>
        
          </div>
          
          <div class="col-lg-4 bg-light">
            
        <div class="form-group">

          <label for="exampleFormControlSelect1">Stoktaki İlaçlar</label>

          <select class="form-control" id="exampleFormControlSelect1">
          ';
          if ($kayit->num_rows>0) {
            while ($satir=$kayit->fetch_assoc()) {
              echo '<option>'. $satir["ilac"]   .'</option>';
            }
          }
          echo '
          </select>
        </div>
        
          </div>
          
      </form>
      </div>
      ';
    }

    
        //hemsire girişi yapıldığında sayfa içeriği
        if($_SESSION["unvan"]=="hemsire")
        {
          echo '
        
          <div class="row ">
          <div class="col-lg-4 bg-light">
            
      <form  action="anaSayfa.php" method="POST">
        <div class="form-group">
          <label for="exampleFormControlInput1">İlacı Al</label>
          <input type="text" class="form-control" id="exampleFormControlInput1" name="txt_hemsireIlac" placeholder="İlaç Adı Girin">

          <button class="w-50 py-2 mb-2 btn btn-outline-dark rounded-1" name="btn_hemsireIlac" type="submit">İlacı Al</button>

        </div>
          </div>
          <div class="col-lg-4">
            
        <div class="form-group">

          <label for="exampleFormControlSelect1">Stoktaki İlaçlar</label>

          <select class="form-control" id="exampleFormControlSelect1">

          ';
          if ($kayitUst->num_rows>0) {
            while ($satir=$kayitUst->fetch_assoc()) {
              echo '<option>'. $satir["ilac"]   .'</option>';
            }
          }
          echo '

          </select>
        </div>
        
          </div>
          
          <div class="col-lg-4 bg-light">
            
        <div class="form-group">

          <label for="exampleFormControlSelect1">Alınmış İlaçlar</label>

          <select class="form-control" id="exampleFormControlSelect1">

          ';
          if ($kayit->num_rows>0) {
            while ($satir=$kayit->fetch_assoc()) {
              echo '<option>'. $satir["ilac"]   .'</option>';
            }
          }
          echo '

          </select>
        </div>
        
          </div>
          
      </form>
      </div>
      ';
    }
?>
      </div>







  </body>
</html>