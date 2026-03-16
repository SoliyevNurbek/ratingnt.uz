
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <title>Login</title>
</head>
<body>
    <form action="tizimga-kirish.php" method="post" id="loginform">
        <div class="box">
            <div class="container">
                <div class="top">
                    <span>Accountingiz bormi?</span>
                    <header>Login</header>
                </div>
                <div class="input-field">
                    <input type="text" class="input" placeholder="Username" id="" name="login">
                    <i class='bx bx-user' ></i>
                </div>
                <div class="input-field">
                    <input type="Password" class="input" placeholder="Password" id="psd" name="parol">
                    <i class='bx bx-lock-alt'></i>
                </div>
                <div class="input-field">
                    <input type="submit" class="submit" value="Login" id="">
                </div>
                <div class="two-col">
                    <div class="one">
                    <input type="checkbox" name="" id="check">
                    <label for="check"> Meni eslaysizmi</label>
                    </div>
                    <div class="two">
                        <label><a href="../register/index.php">Parolni unutdingizmi?</a></label>
                    </div>
                </div>
            </div>
        </div>  
    </form>
    <script src="../../assets/js/js/jquery-3.6.0.min.js"></script>
	<script src="../../assets/js/js/sweetalert.min.js"></script>
    <script type="text/javascript">
            $('#loginform').submit(function(e){
                e.preventDefault();
                $.ajax({
                    url:'tizimga-kirish.php',
                    method:"POST",
                    data:$(this).serialize(),
                    success:function(data){
                        // console.log(data);
                        let obj = jQuery.parseJSON(data);
                        // console.log(obj);
                        if(obj.xatolik==0){
                            swal("Good job!", obj.xabar, "success");
                            setTimeout(function() {
                                window.location.href='../../index.php';
                            }, 2000);
                        }
                        else{
                            swal("Xatolik!", obj.xabar, "error");
                            $('#psd').val('');
                        }
                    },
                    error:function(){
                        alert("Internetingizda muammo bor qaytadan urinib ko'ring!");
                    }
                });
            })
    </script>
</body>
</html>