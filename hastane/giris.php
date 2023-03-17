<?php
include("kaynak/baglanti.php");

if (isset($_POST["submit"]) ) 
{ 
	$unvan=$_POST["unvan"];

	if ($unvan=="") {
		echo '<div >Gerekli Alanları Boş Bırakmayınız!</div>';
	}
	else{
	$secim="SELECT * FROM kullanici WHERE unvan='$unvan'";
	$calistir=mysqli_query($baglanti,$secim);
	$kayitSayisi=mysqli_num_rows($calistir);


	if ($kayitSayisi>0) {
		session_start();

    $ilgiliKayit=mysqli_fetch_assoc($calistir);
    $_SESSION["id"]=$ilgiliKayit["id"];

    if($ilgiliKayit["id"]==1)//admin mi diye kontrol ediyor
    {
      header("location:admin.php");
    }

    else
    {//admin değilse 
		  $ilgiliKayit=mysqli_fetch_assoc($calistir);
		  $_SESSION["unvan"]=$unvan;
      header("location:anaSayfa.php");
      
    }



	}
	else{
		echo '<div>Böyle Bir Kullanıcı bulunamadı!</div>';
	}


	mysqli_close($baglanti);
	}
}






else if(isset($_POST["submit1"]))
{
  session_start();
  $_SESSION["unvan"]="doktor";
  header("location:anaSayfa.php");
}

else if(isset($_POST["submit2"]))
{
  session_start();
  $_SESSION["unvan"]="eczaci";
  header("location:anaSayfa.php");
}
else if(isset($_POST["submit3"]))
{
  session_start();
  $_SESSION["unvan"]="hemsire";
  header("location:anaSayfa.php");
}
?>










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
        <div class="modal modal-signin position-static d-block bg-secondary py-5" tabindex="-1" role="dialog" id="modalSignin">
            <div class="modal-dialog" role="document">
              <div class="modal-content rounded-4 shadow">
                <div class="modal-header p-5 pb-4 border-bottom-0">
                  
                  <h1 class="fw-bold mb-0 fs-2">Giriş Yap</h1>
                  <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-hospital" viewBox="0 0 16 16">
                    <path d="M8.5 5.034v1.1l.953-.55.5.867L9 7l.953.55-.5.866-.953-.55v1.1h-1v-1.1l-.953.55-.5-.866L7 7l-.953-.55.5-.866.953.55v-1.1h1ZM13.25 9a.25.25 0 0 0-.25.25v.5c0 .138.112.25.25.25h.5a.25.25 0 0 0 .25-.25v-.5a.25.25 0 0 0-.25-.25h-.5ZM13 11.25a.25.25 0 0 1 .25-.25h.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-.5a.25.25 0 0 1-.25-.25v-.5Zm.25 1.75a.25.25 0 0 0-.25.25v.5c0 .138.112.25.25.25h.5a.25.25 0 0 0 .25-.25v-.5a.25.25 0 0 0-.25-.25h-.5Zm-11-4a.25.25 0 0 0-.25.25v.5c0 .138.112.25.25.25h.5A.25.25 0 0 0 3 9.75v-.5A.25.25 0 0 0 2.75 9h-.5Zm0 2a.25.25 0 0 0-.25.25v.5c0 .138.112.25.25.25h.5a.25.25 0 0 0 .25-.25v-.5a.25.25 0 0 0-.25-.25h-.5ZM2 13.25a.25.25 0 0 1 .25-.25h.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-.5a.25.25 0 0 1-.25-.25v-.5Z"/>
                    <path d="M5 1a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v1a1 1 0 0 1 1 1v4h3a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V8a1 1 0 0 1 1-1h3V3a1 1 0 0 1 1-1V1Zm2 14h2v-3H7v3Zm3 0h1V3H5v12h1v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3Zm0-14H6v1h4V1Zm2 7v7h3V8h-3Zm-8 7V8H1v7h3Z"/>
                  </svg>
                </div>
          
                <div class="modal-body p-5 pt-0">
                  <form class="" action="giris.php" method="POST">
                    <div class="form-floating mb-3">
                      <input name="unvan" type="text" class="form-control rounded-3" id="floatingInput" placeholder="Kullanıcı Adı">
                      <label for="floatingInput">Kullanıcı Adı</label>
                    </div>
                    <button class="w-100 mb-2 btn btn-lg rounded-3 btn-primary" type="submit" name="submit">Giriş Yap</button>
                    
                    <hr class="my-4">
                    <h2 class="fs-5 fw-bold mb-3">Hızlı Giriş</h2>

                    <!--  buradan aşağısı: kullanıcı adı girmek yerine direkt giriş için   -->

                    <button class="w-100 py-2 mb-2 btn btn-outline-dark rounded-3" type="submit" name="submit1">
                      Doktor
                    </button>
                    <button class="w-100 py-2 mb-2 btn btn-outline-dark rounded-3" type="submit" name="submit2">
                      Eczacı
                    </button>
                    <button class="w-100 py-2 mb-2 btn btn-outline-dark rounded-3" type="submit" name="submit3">
                      Hemşire
                    </button>
                  </form>
                </div>
              </div>
            </div>
          </div>
      </header>











  </body>
</html>