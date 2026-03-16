<?error_reporting(0);?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <link rel="shortcut icon" href="assets/images/logo-black.png" type="image/x-icon">
  <title>User-fikrlar</title>
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
                  session_start();
                  if(isset($_SESSION['login'])){
                  ?>
                  <div class="navbar-buttons mbr-section-btn">
            <a class="btn btn-secondary display-4" href="tanlash.php"><?=$_SESSION['login']?></a>
            <a class="btn btn-secondary display-4" href="user.php">Ortga</a>
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
			<div class="col-12 content-head">
				<div class="mbr-section-head mb-5">
					<h4 class="mbr-section-title mbr-fonts-style align-center mb-0 display-2">
						<strong>Sharhlar</strong>
					</h4>
					
				</div>
			</div>
		</div>
		<div class="row" id="t">
            <?php
                include_once 'config.php';
                $db = new Coder();
                $sql =$db -> getdatas('fikrlar',[],'1');
                if(!$sql){
                  echo "<h1>Sharhlar yo'q !</h1>";
                }
                foreach($sql as $key=>$value):
            ?>
			<div class="item features-without-image col-12 col-lg-4 active">
				<div class="item-wrapper">
					<div class="img-wrapper">
						<img src="uploads/<?=$value['rasm']?>"  >
					</div>
					<div class="card-box">
						<h5 class="card-text mbr-fonts-style mt-3 display-7">
							<div><?=$value['matn']?></div>
						</h5>
            <button class="delete" id="<?=$value['id']?>" style="border: 1px; color:red;">🚮 O'chirish</button>
					</div>
				</div>
			</div>
              <?endforeach;?>   
		</div>
	</div>
</section>





<script src="assets/js/js/jquery-3.6.0.min.js"></script>
	<script src="assets/js/js/sweetalert.min.js"></script>

  <script src="assets/web/assets/jquery/jquery.min.js"></script>
  <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/smoothscroll/smooth-scroll.js"></script>
  <script src="assets/ytplayer/index.js"></script>
  <script src="assets/dropdown/js/navbar-dropdown.js"></script>
  <script src="assets/masonry/masonry.pkgd.min.js"></script>
  <script src="assets/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="assets/theme/js/script.js"></script>
  
  <script type="text/javascript">
		$('.delete').click(function() {
			let id = $(this).attr("id");
			swal({
		        title: "Ishonchingiz komilmi?",
		        text: "O'chirilgandan so'ng tiklab bo'lmaydi.",
		        icon: "warning",
		        buttons: {
		          cancel: "Yo'q!",
		          catch: {
		            text: "Ha roziman!",
		            value: "qabul",
		          },
		        },
		        //dangerMode: true,
		    })
		    .then((willDelete) => {
		        if (willDelete == "qabul") {
		          $.ajax({
		            url: "delete-fikr.php",
		            type: "GET",
		            data: {
		              id:id,
		            },
		            success:function(data){
		              var obj = jQuery.parseJSON(data);
		              if(obj.xatolik==0){
		              	$('#t'+id).remove();
		              	swal("Barakalla",obj.xabar,"success");
		              }
		              else{
		              	swal("Xatolik",obj.xabar,"error");
		              }
		            },
		            error:function(xhr){
		              alert("Kechirasiz internetdan uzilish ro'y berdi. Iltimos tekshirib qaytadan urining");
		            },            
		          });
		          
		        } else {
		          swal("Bekor qilindi!");
		        }
		    });
		})
</script>
  
</body>
</html>