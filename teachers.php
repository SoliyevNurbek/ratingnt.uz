<?php
    session_start();
    if($_SESSION['rol']!=2){
        header("Location: index.php");
    }

    include_once 'config.php';

?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <link rel="shortcut icon" href="assets/images/logo-black.png" type="image/x-icon">
  <title>O'qituvchi</title>
  <?include_once 'headlink2.php';?>
  
  
  
  
</head>
<body>
  
  <section data-bs-version="5.1" class="menu menu2 cid-udp9et00ZR" once="menu" id="menu-5-udp9et00ZR">
	

    <nav class="navbar navbar-dropdown navbar-fixed-top navbar-expand-lg">
      <div class="container">
        <div class="navbar-brand">
          <span class="navbar-logo">
            <a href="#">
              <img src="assets/images/teacher.jpg" alt="Mobirise Website Builder" style="height: 4.3rem;">
            </a>
          </span>
          <span class="navbar-caption-wrap"><a class="navbar-caption text-black display-4" href="#">O'qituvchi</a></span>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-bs-toggle="collapse" data-target="#navbarSupportedContent" data-bs-target="#navbarSupportedContent" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <div class="hamburger">
            <span></span>
            <span></span>
          </div>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav nav-dropdown" data-app-modern-menu="true">
            <li class="nav-item">
              <a class="nav-link link text-blue display-4" href="teacher-news.php">Yangilik qo'shish</a>
            </li>
          </ul>
          <?php
                  if(isset($_SESSION['login'])){
                  ?>
                  <div class="navbar-buttons mbr-section-btn">
            <a class="btn btn-secondary display-4" href="Index.php"><?=$_SESSION['login']?></a>
            <a class="btn btn-secondary display-4" href="index.php">Bosh sahifa</a>
            <a class="btn btn-secondary display-4" href="loginout.php">Accountdan chiqish</a>

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
						<strong>O'qituvchi bo'limiga xush kelibsiz !</strong>
					</h4>
          <h4 class="mbr-section-title mbr-fonts-style align-center mb-0 display-2">
						<p>To'liq ma'lumotlaringizni to'ldirasizmi ?</p>
					</h4>
				</div>
			</div>
		</div>
        <div class="row ">
			<div class="item features-without-image col-12 col-lg-4 active">
				<div class="item-wrapper">
        <form action="teacher-big.php" method="post" id="bigform">
        <div class="box">
            <div class="container">
                <div class="top">
                    <header>Xususiy ma'lumotlar</header>
                </div>

                <div class="input-field">
                    <input type="text" class="input" placeholder="Sharifi" id="" name="sharif" >
                    <i class='bx bx-user' ></i>
                </div>

                <div class="input-field">
                    <input type="text" class="input" placeholder="Tu'gilgan sana" id="" name="sana" >
                    <i class='bx bx-user' ></i>
                </div>

                <div class="input-field">
                    <input type="text" class="input" placeholder="Ilmiy darajasi" id="" name="daraja" >
                    <i class='bx bx-user' ></i>
                </div>

                <div class="input-field">
                    <input type="text" class="input" placeholder="Chet el tajribasi" id="" name="chettajriba">
                    <i class='bx bx-user' ></i>
                </div>

                <div class="input-field">
                    <input type="text" class="input" placeholder="SHu oydagi dars soati" id="lgn" name="darssoat" >
                    <i class='bx bx-user' ></i>
                    
                </div>

                <div class="input-field">
                    <input type="number" class="input" placeholder="Maqolalari soni" id="lgn" name="maqola_son" >
                    <i class='bx bx-user' ></i>
                    
                </div>

                <div class="input-field">
                    <input type="submit" class="submit" value="Yuborish" id="">
                </div>
            </div>
        </div>  
					</div>
				</div>
			</div>
		</div>
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
  <script src="assets/js/js/jquery-3.6.0.min.js"></script>
  <script src="assets/js/js/sweetalert.min.js"></script>
 <script type="text/javascript">
    $('#bigform').submit(function(e){
    e.preventDefault();
    $.ajax({
                url:"teacher-big.php",
                method:"POST",
                data:$('#bigform').serialize(),
                success:function(data){
                    let obj = jQuery.parseJSON(data);
                    if (obj.xatolik == 0) {
                    	swal("Good !", obj.xabar, "success");
                        setTimeout(function(){
                            window.location.href='teachers.php';
                        }, 2000);
                    }
                    else{ 
                      swal("XATOLIK!", obj.xabar, "error");
                    }
                },
                eror:function(){
                    alert('Xatolik ro`y berdi!');
                }
            });
          })
  </script>

</body>
</html>