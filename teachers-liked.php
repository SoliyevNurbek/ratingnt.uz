<?php
    session_start();
    include_once 'config.php';
    if($_SESSION['rol']!='3' and $_SESSION['rol']!='2' and $_SESSION['rol']!='1'){
        header("Location: index.php");
    }
    include_once 'config.php';
    $db = new coder();

?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <link rel="shortcut icon" href="assets/images/logo-black.png" type="image/x-icon">
  <title>Eng yaxshilari</title>
  <?include_once 'headlink2.php';?>
  
</head>
<body>
  
  <section data-bs-version="5.1" class="menu menu2 cid-udp9et00ZR" once="menu" id="menu-5-udp9et00ZR">
	

    <nav class="navbar navbar-dropdown navbar-fixed-top navbar-expand-lg">
      <div class="container">
        <div class="navbar-brand">
          <span class="navbar-logo">
            <a href="#">
              <img src="assets/images/navyashilkichik.png" style="height: 4.3rem;">
            </a>
          </span>
          <span class="navbar-caption-wrap"><a class="navbar-caption text-black display-4" href="#">Rating-N-T</a></span> 
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-bs-toggle="collapse" data-target="#navbarSupportedContent" data-bs-target="#navbarSupportedContent" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <div class="hamburger">
            <span></span>
            <span></span>
          </div>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav nav-dropdown" data-app-modern-menu="true">
          </ul>
          <?php
                  session_start();
                  if(isset($_SESSION['login'])){
                  ?>
                  <div class="navbar-buttons mbr-section-btn">
            <a class="btn btn-secondary display-4" href="tanlash.php"><?=$_SESSION['login']?></a>
            <a class="btn btn-secondary display-4" href="teachers-echo.php">Ortga</a>
          </div>
                  <?}else{
                  ?>
          <div class="navbar-buttons mbr-section-btn">
            <a class="btn btn-secondary display-4" href="login/login/index.php">Login in</a>
          </div>
                  <?}?>
        </div>
      </div>
    </nav>
  </section>


<section data-bs-version="5.1" class="features15 cid-udp9KONbIu" id="features015-2">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-12 content-center">
				<div class="mbr-section-head mb-5">
					<h4 class="mbr-section-title mbr-fonts-style align-center mb-0 display-2">
						<strong>Eng yaxshi o'qituvchilarimiz ovozlarini kuzating !</strong>
					</h4>
				</div>
			</div>
		</div>            

    <?php
      $sql = $db -> getdatas('Teacher',[],"1 ORDER BY baho   DESC");
      $i=1;
      foreach($sql as $key=>$value):
    ?>
      <div class="row" >
            <div class="item features-without-image col-12">
                  <!--  clasni davomi col-lg-4 active -->
                      <div class="item-wrapper">
                          <div class="img-wrapper">
                              <img src="assets/images/teacherlike2.jfif">
                          </div>
                          <div class="card-box">
                              <h4 class="card-title mbr-fonts-style mb-0 display-7">
                                  <strong><?=$i.'. '.$value['ism'].' '.$value['familya']?></strong>
                              </h4>
                              <h5 class="card-text mbr-fonts-style mt-3 display-7">
                                  <div>
                                      <p>Maqolalari soni <?=$value['maqola_son']?></p>
                                      <p>Baholari yi'gindisi <?=$value['baho']?> </p>
                                  </div>
                              </h5>
                          </div>
                      </div>
                  </div>
              </div>
          <?php
          $i+=1;
          ?>
      </div>
    <?endforeach?>
	</div>
</section>







  <script src="assets/web/assets/jquery/jquery.min.js"></script>
  <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/smoothscroll/smooth-scroll.js"></script>
  <script src="assets/ytplayer/index.js"></script>
  <script src="assets/dropdown/js/navbar-dropdown.js"></script>
  <script src="assets/masonry/masonry.pkgd.min.js"></script>
  <script src="assets/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="assets/theme/js/script.js"></script>
  
  
  
</body>
</html>