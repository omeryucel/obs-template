<?php session_start();

    include "includes/config.php"; 
  
    if(!empty($_SESSION["userName"])){
        header("Location: index.php");
    } 
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>Öğrenci Bilgi Sistemi | Login</title>

    <!-- Bootstrap CSS -->    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="css/elegant-icons-style.css" rel="stylesheet" />
    <link href="css/font-awesome.css" rel="stylesheet" />
    <!-- Custom styles -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <script src="js/jquery.js"></script>
</head>

  <body class="login-img3-body">

    <div class="container">

      <form class="login-form"  name="loginForm" id="loginForm" action="javascript:giris_yap();"  method="post">        
        <div class="login-wrap">
            <p class="login-img"><i class="icon_lock_alt"></i></p>
            <div class="input-group">
              <span class="input-group-addon"><i class="icon_profile"></i></span>
              <input type="text" class="form-control" name="userName" placeholder="TC Kimlik No" autofocus>
            </div>
            <div class="input-group">
                <span class="input-group-addon"><i class="icon_key_alt"></i></span>
                <input type="password" name="password" class="form-control" placeholder="Parolan">
            </div>
            <label class="checkbox"> 
                <span class="pull-right"> <a href="mailto:ufukdogan92@gmail.com"> Şifremi Unuttum?</a></span>
            </label>
            <button class="btn btn-primary btn-lg btn-block" type="submit">Giris</button>

            <div id="formMessage" class="alert alert-block alert-danger fade in">
                
            </div>

        </div>
      </form>

    </div>


  </body>

   <script type="text/javascript">
        $("#formMessage").hide();
        function giris_yap(){
            $(function(){
                var password = $("#password").val();
                var userName  = $("#userName").val();
                if(password == "" || userName == ""){
                    alert("asd");
                }else{ 
                    $.ajax({
                        url:"controller/login.php",
                        data:$("#loginForm").serialize(),
                        type:"post",
                        dataType:"json",
                        success:function(data){   
                            if(data.status == 0){
                                $("#formMessage").show(); 
                                $("#formMessage").css("margin-top","10px");
                                $("#formMessage").html(data.error);

                            } 
                            else {
                                window.location.reload(); 
                            }
                        }
                    });
                }//end if
            });//ready
        }
    </script>
</html>
