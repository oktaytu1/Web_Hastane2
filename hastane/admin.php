<!doctype html>
<html lang="tr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hastane Uygulaması</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body class="bg-secondary">



    <header>
        <div class="px-3 py-2 text-bg-dark">
          <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">

              <a href="" class="d-flex align-items-center my-2 my-lg-0 me-lg-auto text-white text-decoration-none">
              <!--  hastane ikonu   -->
              <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-hospital" viewBox="0 0 16 16">
                    <path d="M8.5 5.034v1.1l.953-.55.5.867L9 7l.953.55-.5.866-.953-.55v1.1h-1v-1.1l-.953.55-.5-.866L7 7l-.953-.55.5-.866.953.55v-1.1h1ZM13.25 9a.25.25 0 0 0-.25.25v.5c0 .138.112.25.25.25h.5a.25.25 0 0 0 .25-.25v-.5a.25.25 0 0 0-.25-.25h-.5ZM13 11.25a.25.25 0 0 1 .25-.25h.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-.5a.25.25 0 0 1-.25-.25v-.5Zm.25 1.75a.25.25 0 0 0-.25.25v.5c0 .138.112.25.25.25h.5a.25.25 0 0 0 .25-.25v-.5a.25.25 0 0 0-.25-.25h-.5Zm-11-4a.25.25 0 0 0-.25.25v.5c0 .138.112.25.25.25h.5A.25.25 0 0 0 3 9.75v-.5A.25.25 0 0 0 2.75 9h-.5Zm0 2a.25.25 0 0 0-.25.25v.5c0 .138.112.25.25.25h.5a.25.25 0 0 0 .25-.25v-.5a.25.25 0 0 0-.25-.25h-.5ZM2 13.25a.25.25 0 0 1 .25-.25h.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-.5a.25.25 0 0 1-.25-.25v-.5Z"/>
                    <path d="M5 1a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v1a1 1 0 0 1 1 1v4h3a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V8a1 1 0 0 1 1-1h3V3a1 1 0 0 1 1-1V1Zm2 14h2v-3H7v3Zm3 0h1V3H5v12h1v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3Zm0-14H6v1h4V1Zm2 7v7h3V8h-3Zm-8 7V8H1v7h3Z"/>
                  </svg>
                  <h5>Hastane</h5>
              </a>
          

              <ul class="nav col-12 col-lg-auto my-2 justify-content-center my-md-0 text-small">
                
                <li>
                  <!--  profil ikonu   -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                      </svg>
                  <!--     -->
                      <b>Admin</b>
                  <!--     -->
                </li>

              </ul>

            </div>
          </div>
        </div>

        <div class="px-3 py-2 border-bottom mb-3 bg-warning">
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
        session_start();

        
        if ($_SESSION["id"]=="1") //giris.php sayfasından id alarak mı girildi diye kontrol
        {
        
          //veriler çekiliyor
        include("kaynak/baglanti.php");



        if (isset($_POST["btn_unvan"]) ) 
        { 
          $kullanici_adi=$_POST['slct_unvan'];

          
          $bul="select id from kullanici where id=1";
          $kullanici_id=$baglanti->query($bul);
        }




        



          echo '
      <form action="admin.php" method="POST">
        <div class="row">
        

        <!--     -->
        <div class="col-lg-2 bg-light m-1">
        <div class="form-group">
        <label for="exampleFormControlSelect1">Kullanıcılar</label>

        <select class="form-control" id="exampleFormControlSelect1" name="slct_unvan">
        ';
        
        $bul="select * from kullanici";
        $kayit_kullanici=$baglanti->query($bul);
        
        if ($kayit_kullanici->num_rows>0) {
          //kullanıcı tablosunu dolduruyor
          while ($satir=$kayit_kullanici->fetch_assoc()) {
            echo '<option>'. $satir["unvan"]   .'</option>';
          }
        }
        $satir=$kayit_kullanici->fetch_assoc();
        echo '
        </select>
        <button type="submit" class="btn btn-primary" name="btn_unvan">Kullanıcıyı Çek</button>
<br>
        <label for="exampleFormControlInput1"></label>

        <input type="text" class="form-control" name="txt_doktorIlac" placeholder="kullanıcının adı" value="'.$kullanici_adi.'">

        </div>
      
      </div>
      <!--     -->




      <!--     -->
      <div class="col-lg-3 bg-light m-1">
      <div class="form-group">
      <label for="exampleFormControlSelect1">Doktorun İstediği İlaçlar</label>

      <select class="form-control" id="exampleFormControlSelect1">
      ';
      
      $bul="select * from doktor";
      $kayit_doktor=$baglanti->query($bul);

      if ($kayit_doktor->num_rows>0) {
        while ($satir=$kayit_doktor->fetch_assoc()) {
          echo '<option>'. $satir["ilac"]   .'</option>';
        }
      }
      echo '
      </select>

      </div>
    
    </div>
    <!--     -->





    
    <!--     -->
    <div class="col-lg-3 bg-light m-1">
    <div class="form-group">
    <label for="exampleFormControlSelect1">Eczacı Stoktaki İlaçlar</label>

    <select class="form-control" id="exampleFormControlSelect1">
    ';
    
    $bul="select * from eczaci";
    $kayit_eczaci=$baglanti->query($bul);
    
    if ($kayit_eczaci->num_rows>0) {
      while ($satir=$kayit_eczaci->fetch_assoc()) {
        echo '<option>'. $satir["ilac"]   .'</option>';
      }
    }
    echo '
    </select>

    </div>
  
  </div>
  <!--     -->





  
  <!--     -->
  <div class="col-lg-3 bg-light m-1">
  <div class="form-group">
  <label for="exampleFormControlSelect1">Hemşire Aldığı İlaçlar</label>

  <select class="form-control" id="exampleFormControlSelect1">
  ';
  
  $bul="select * from hemsire";
  $kayit_hemsire=$baglanti->query($bul);

  if ($kayit_hemsire->num_rows>0) {
    while ($satir=$kayit_hemsire->fetch_assoc()) {
      echo '<option>'. $satir["ilac"]   .'</option>';
    }
  }
  echo '
  </select>

  </div>

</div>
<!--     -->
        


      </div>
      </form>
      ';
          






        }
?>






      </div>

  </body>
</html>