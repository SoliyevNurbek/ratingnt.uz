<?php
    session_start();
    include_once 'config.php';
    if($_SESSION['rol']!='1'){
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
  
  <link rel="stylesheet" href="style.css">
  <title>🤖 Anonim Ovoz</title>
  <?include_once 'headlink2.php';?>
   
  </style>
</head>
<body>
  
  <section data-bs-version="5.1" class="menu menu2 cid-udp9et00ZR" once="menu" id="menu-5-udp9et00ZR">
	

    <nav class="navbar navbar-dropdown navbar-fixed-top navbar-expand-lg">
      <div class="container">
        <div class="navbar-brand">
          <span class="navbar-logo">
            <a href="#">
              <img src="assets/images/Student.jpg" alt="Mobirise Website Builder" style="height: 4.3rem;">
            </a>
          </span>
          <span class="navbar-caption-wrap"><a class="navbar-caption text-black display-4" href="#">Student</a></span>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-bs-toggle="collapse" data-target="#navbarSupportedContent" data-bs-target="#navbarSupportedContent" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <div class="hamburger">
            <span></span>
            <span></span>
          </div>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <?php
                  if(isset($_SESSION['login'])){
                  ?>
                  <div class="navbar-buttons mbr-section-btn">
            <a class="btn btn-secondary display-4" href="tanlash.php"><?=$_SESSION['login']?></a>
            <a class="btn btn-secondary display-4" href="students.php">Ortga</a>
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
    
    </p>

</p>

<section data-bs-version="5.1" class="features15 cid-udp9KONbIu" id="features015-2">

	<div class="container">
		<div class="row justify-content-center">
			<div class="col-12 content-head">
				<div class="mbr-section-head mb-5">
					<h4 class="mbr-section-title mbr-fonts-style align-center mb-0 display-2">
						<p>O'qituchilarga ovoz berishingiz mumkin   💥</p>
					</h4>
					
				</div>
			</div>
		</div>
        <?php
        $db = new Coder();
        $sql = $db->getdatas('Teacher',[],"1 ORDER BY baho   DESC");
        // print_r($sql);
        foreach($sql as $key=>$value):?>

        <form action="teachers-ball-options.php" method="post" class="mbr-form form-with-styler" data-form-title="Form Name" id="teachform">
            <div class="row" >
                <div class="item features-without-image col-12">
                <!--  clasni davomi col-lg-4 active -->
                    <div class="item-wrapper">
                        <div class="img-wrapper">
                            <img src="assets/images/teacherlike4.png">
                        </div>
                        <div class="card-box">
                            <h4 class="card-title mbr-fonts-style mb-0 display-7">
                                <strong><?=$value['ism'].' '.$value['familya']?></strong>
                            </h4>
                            <h5 class="card-text mbr-fonts-style mt-3 display-7">
                                <div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="5.<?=$value['id']?>.<?=$value['baho']?>.<?=$value['baho_sharh']?>" checked>
                                        <label class="form-check-label" for="exampleRadios1">
                                            5 baho 
                                            <textarea type="text" placeholder="Nega va qaysi fandan ?" name="radio5" data-form-field="textarea" class="form-control "></textarea>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="4.<?=$value['id']?>.<?=$value['baho']?>.<?=$value['baho_sharh']?>" checked>
                                        <label class="form-check-label" for="exampleRadios1">
                                            4 baho 
                                            <textarea type="text" placeholder="Nega va qaysi fandan ?" name="radio4"  data-form-field="textarea" class="form-control"></textarea>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="3.<?=$value['id']?>.<?=$value['baho']?>.<?=$value['baho_sharh']?>" checked>
                                        <label class="form-check-label" for="exampleRadios1">
                                            3 baho 
                                            <textarea type="text" placeholder="Nega va qaysi fandan ?" name="radio3" data-form-field="textarea" class="form-control"></textarea>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="2.<?=$value['id']?>.<?=$value['baho']?>.<?=$value['baho_sharh']?>" checked>
                                        <label class="form-check-label" for="exampleRadios1">
                                            2 baho 
                                            <textarea type="text" placeholder="Nega va qaysi fandan ?" name="radio2" data-form-field="textarea" class="form-control"></textarea>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="0.<?=$value['id']?>.<?=$value['baho']?>.<?=$value['baho_sharh']?>"  checked>
                                        <label class="form-check-label" for="exampleRadios1">
                                            0 baho 
                                            <textarea type="text" placeholder="Nega va qaysi fandan ?" name="radio0" data-form-field="textarea" class="form-control"></textarea>
                                        </label>
                                    </div>
                                    <button type="submit" class="btn btn-success">Ovoz berish</button>
                                    <!-- <button type="submit" class="btn btn-danger">Ovozni o'chirish</button> -->
                                </div>
                            </h5>
                        </div>
                    </div>
                </div>
            </div>
        </form>
		

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
  
  <script src="assets/js/js/jquery-3.6.0.min.js"></script>
  <script src="assets/js/js/sweetalert.min.js"></script>
    <script type="text/javascript">
    $('#teachform').submit(function(e){
    e.preventDefault();
    $.ajax({
                url:"teachers-ball-options.php",
                method:"POST",
                data:$(this).serialize(),
                success:function(data){
                    let obj = jQuery.parseJSON(data);
                    if (obj.xatolik == 0) {
                    	swal("Good !", obj.xabar, "success");
                        setTimeout(function(){
                            window.location.href='teachers-ball.php';
                        }, 1500);

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