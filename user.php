<?php 
    session_start();
    if($_SESSION['rol']!=3){
        header("Location: login/register/index.php");
    }
    require_once __DIR__ . '/config.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_FILES['rasm']['name'])) {
        $allow_type = ['png', 'jpg', 'gif', 'svg'];
        $fileName = $_FILES['rasm']['name'];
        $ex = explode('.', $fileName);
        $exct = strtolower($ex[count($ex) - 1]);

        if (in_array($exct, $allow_type, true)) {
            $safeFileName = 'user_' . time() . '_' . preg_replace('/[^a-zA-Z0-9._-]/', '', $fileName);
            move_uploaded_file($_FILES['rasm']['tmp_name'], 'uploads/' . $safeFileName);

            $db = db();
            $sql = $db->insert('fikrlar', ['matn' => $_POST['matn'], 'rasm' => $safeFileName]);

            $ret = [];

            if ($sql) {
                $ret += ['xatolik' => 0, 'xabar' => 'Muvaffaqiyatli yozildi!'];
            } else {
                $ret += ['xatolik' => 1, 'xabar' => 'Yozilmadi'];
            }

            echo json_encode($ret);
            exit;
        }

        echo 'taqiqlangan format';
        exit;
    }
?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <link rel="shortcut icon" href="assets/images/logo-black.png" type="image/x-icon">
  <title>User</title>
  <?include_once 'headlink2.php';?>
  
</head>
<body>
  
  <section data-bs-version="5.1" class="menu menu2 cid-udp9et00ZR" once="menu" id="menu-5-udp9et00ZR">
	

	<nav class="navbar navbar-dropdown navbar-fixed-top navbar-expand-lg">
		<div class="container">
			<div class="navbar-brand">
				<span class="navbar-logo">
					<a href="#">
						<img src="assets/images/user2.png" alt="Mobirise Website Builder" style="height: 4.3rem;">
					</a>
				</span>
				<span class="navbar-caption-wrap"><a class="navbar-caption text-black display-4" href="#">Foydalanuvchi</a></span>
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
						<a class="nav-link link text-blue display-4" href="user-fikrlar.php">Barcha fikrlarim</a>
					</li>
				</ul>
				<?php
                if(isset($_SESSION['login'])){
                ?>
                <div class="navbar-buttons mbr-section-btn">
					<a class="btn btn-secondary display-4" href="tanlash.php"><?=$_SESSION['login']?></a>
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
<p>
</p>
<p>
 </p>
<section data-bs-version="5.1" class="features03 cid-udp9et2njS" id="features-5-udp9et2njS">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 content-head">
                <div class="mbr-section-head mb-5">
                    <h4 class="mbr-section-title mbr-fonts-style align-center mb-0 display-2">
                        <strong>Tizimimiz haqida fikrlaringiz!</strong>
                    </h4>
                    
                </div>
            </div>
        </div>
        <form action="user.php" method="post" enctype="multipart/form-data" id="fikrform">
            <div class="row justify-content-center">
                <div class="item features-image col-12 col-md-6 col-lg-4 active">
                    <div class="item-wrapper">
                        <div class="item-img mb-3">
                            <input type="file" name='rasm' accept=".png, .jpg, .svg" id="rasmid">
                        </div>
                        <div class="item-content align-left">
                            <h5 class="item-title mbr-fonts-style mt-0 mb-2 display-5">
                                <textarea name="matn" id="textid"></textarea>
                            </h5>
                        <div class="mbr-section-btn item-footer">
                            <button type="submit" class="btn item-btn btn-secondary display-7">
                                Yuborish
                            </button>
                        </div>
                     </div>
                </div>
             </div>
        </form>
        
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
    <!-- <script type="text/javascript">
        $('#fikrform').submit(function(e){
            console.log("salom");
            e.preventDefault();
            $.ajax({
                url:'upload-fikr.php',
                method:"POST",
                data:$(this).serialize(),
                success:function(data){
                	console.log(data);
                    let obj = jQuery.parseJSON(data);
                    console.log(obj);
                    if(obj.xatolik==0){
                        swal("Good job!", obj.xabar, "success");
                        $('#textid').val('');
                        $('#rasmid').val('');
                        setTimeout(function() {
                            window.location.href='user.php';
                        }, 2000);
                    }
                    else{
                        swal("Xatolik!", obj.xabar, "error");
                        
                    }
                },
                error:function(){
                    alert("Internetingizda muammo bor qaytadan urinib ko'ring!");
                }
            });
        });
    </script> -->
</body>
</html>
