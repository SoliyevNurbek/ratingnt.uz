<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Register</title>
</head>
<body>
    <form action="reg.php" method="post" id="regform">
        <div class="box">
            <div class="container">
                <div class="top">
                    <span>Ro'yhatdan o'tasizmi ?</span>
                    <header>Register</header>
                </div>

                <div class="input-field">
                    <input type="text" class="input" placeholder="Ism" id="" name="ism" >
                    <i class='bx bx-user' ></i>
                </div>

                <div class="input-field">
                    <input type="text" class="input" placeholder="Familya" id="" name="fam" >
                    <i class='bx bx-user' ></i>
                </div>

                <div class="input-field">
                    <input type="text" class="input" placeholder="Phone number" id="" name="phone">
                    <i class='bx bx-phone' ></i>
                </div>

                <div class="input-field">
                    <input type="text" class="input" placeholder="Username" id="lgn" name="login" >
                    <i class='bx bx-user' ></i>
                    
                </div>
               <p id="helpblock" style="color: red;font-size: 15px; display:none; margin-top: 0; margin-left: 20px;"></p>

                <div class="input-field">
                    <input type="Password" class="input" placeholder="Password" id="pw1" name="password">
                    <i class='bx bx-lock-alt'></i>
                </div>

                <div class="input-field">
                    <input type="Password" class="input" placeholder="Comfirm Password" id="pw2">
                    <i class='bx bx-lock-alt'></i>
                </div>
                <p id="paroltek" style="color: red;font-size: 15px; display:none; margin-top: 0; margin-left: 20px;"></p>

                <div class="input-field">
                    <input type="submit" class="submit" value="Register" id="">
                </div>
                <div class="two-col">
                    <div class="one">
                    <input type="checkbox" name="" id="check">
                    <label for="check"> Meni eslaysizmi</label>
                    </div>
                    <div class="two">
                        <label><a href="../login/index.php">Accountingiz bormi?</a></label>
                    </div>
                </div>
            </div>
        </div>  
    </form>
    <script src="../../assets/js/js/jquery-3.6.0.min.js"></script>
	<script src="../../assets/js/js/sweetalert.min.js"></script>
    <script type="text/javascript">
		$("#lgn").on("keyup", function() {
  			let l = $(this).val();
  			$.ajax({
  				url:"check-login.php",
  				method:"POST",
  				data:{
  					login:l,
  				},
  				success:function(data) {
  					let obj = jQuery.parseJSON(data);
  					if(obj.xatolik!=0){
  						$('#helpblock').css('display','block');
  						$('#helpblock').html(obj.xabar);
  					}
  					else{
  						$('#helpblock').css('display','none');
  					}
  				},
  				error:function(xhr) {
  					alert('No internet');
  				}
  			})
		});
		$('#regform').submit(function(e) {
			e.preventDefault();

			let p1 = $('#pw1').val();
			let p2 = $('#pw2').val();
        
			if(p1!=p2){
                $('#paroltek').css('display','block');
				$('#paroltek').html('Parollar mos emas');
				$('#pas1').addClass('qizil');
				$('#pas2').addClass('qizil');
				return 0;
			}
			$.ajax({
                url:"reg.php",
                method:"POST",
                data:$('#regform').serialize(),
                success:function(data){
                	console.log(data);
                    let obj = jQuery.parseJSON(data);
                    if (obj.xatolik == 0) {
                    	swal("Good job!", obj.xabar, "success");
                        setTimeout(function(){
                            window.location.href='../../index.php';
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
			// console.log('salom');
		})
    </script>
</body>
</html>
    
	
	