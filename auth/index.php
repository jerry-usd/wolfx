
<?php

session_start();
if (isset($_SESSION['loggeduser'])) {
    header("Location: ../dashboard/user.html");
}

if (isset($_POST['signin'])) {
    
    $email= strtolower($_POST['email'])  ;
    $password= strtolower($_POST['password'])  ;

 $link=mysqli_connect('localhost','fibosvif_user','affilly01','fibosvif_hydra');
    
    $query2=mysqli_query($link,"SELECT * from login  where email='$email' and password='$password' ");
    $query1=mysqli_query($link,"SELECT * from login  where email='$email'  ");
  
   $res1=mysqli_num_rows($query1);
    $res2=mysqli_num_rows($query2);
  if ($res2==1) {
    if ($email=='admin@gmail.com') {
         $_SESSION['loggedadmin']=$email;
   header("Location: ../dashboard/index.html");
    }
    else {
        $_SESSION['loggeduser']=$email;
   header("Location: ../dashboard/user.html");
    }
  
 
   

  }

}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="../css/style.css">
<title>HydraFx| Auth</title>
     <link rel="icon" type="image/png" href="../images/logo.png" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/css/splide.min.css">
   <link rel="stylesheet" href="https://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css">
   <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css" />
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <script src="https://code.iconify.design/1/1.0.7/iconify.min.js"></script>
     <script src="js/jquery.min.js" type="text/javascript"></script>
    <script src="js/jquery.easing.js" type="text/javascript"></script>
    <script src="js/counter.min.js" type="text/javascript"></script>
    <script src="https://code.iconify.design/1/1.0.7/iconify.min.js"></script>
</head>
<body>
<div class="main">
	<div class="nnav">
          <div class="container-fluid">
            <div class="row p-0">
              <div class="col-sm-3 p-0 "><img src="../images/logo.png" height="150px" style="margin-left: 25px"></div>
              <div class="col-sm-6 p-0 nnav-list mt-5">
                
                <ul>
                  <li onclick="window.location='index.html';">Home</li>
                  <li onclick="window.location='services.html';">Services</li>
                  <li onclick="window.location='faq.html';">FAQ</li>
                  <li onclick="window.location='about.html';">About</li>
                  <li  onclick="window.location='index.html#footer';">Contact</li>
                </ul>
              </div>
              <div class="col-sm-3 p-0 " style="margin-top: 40px">
                <span class="iconify" data-icon="gg:profile" data-inline="false" style="color: #5485d0;" data-width="30" > </span> <span style="margin-left: 6px; cursor: pointer;" onclick="window.location='auth/index.html';">Login</span>
                <button class="btn btn-primary btn-lg" style="border-radius: 30px; margin-left: 30px; color: #fbfafb; font-size: 1em; background: #5485d0" onclick="window.location='https://t.me/Hydra_Fxfree';">Telegram <span class="iconify" data-icon="ph:telegram-logo" data-inline="false" style="color: #fbfafb;" data-width="20"></span></button>
              </div>
            </div>
          </div>
        </div>
        <div class="nav sticky-top">
          <div class="container-fluid">
            <div class="row p-0">
              <div class="col-3 mt-3" ><center><button style="background: transparent; border:transparent;"  data-bs-toggle="modal" data-bs-target="#exampleModalCenter"><span class="iconify" data-icon="heroicons-outline:menu-alt-4" data-inline="false" data-width="40"></span></button></center></div>
               <div class="col-6"><center><img src="../images/logo.png" height="70px"></center></div>
                <div class="col-3 mt-3"><center><a href="#" ><span class="iconify" data-icon="logos:telegram" data-inline="false" data-width="40"></span></a></center></div>

            </div>
          </div>
        </div>
        <div class="content" style="margin-bottom: 150px">
        	


<div class="container-fluid">
  <center><h4>Login Your Account</h4></center>
  <div class="row">
    <div class="col-sm-3"></div>
     <div class="col-sm-6" style="background: #f2f2f2; padding: 80px">
       
       <form method="post" action="">
         <div class="form-group mb-4">
           <label>Email</label>
           <input type="text" name="email" class="form-control" style="height: 60px">
            <?php
                  if(isset($_POST['signin'])){
            

if ($res2 == 0 && $res1== 0) {
                    ?>
 <small class="small-text" style="display: block; width: 100%; color: red" >Invalid Email </small>
                    <?php
                  }

                  }
                 
                  ?>
         </div>
         <div class="form-group">
           <label>Password</label>
           <input type="text" name="password" class="form-control" style="height: 60px">
            <?php
                  if(isset($_POST['signin'])){
            

if ($res2 == 0 && $res1== 1) {
                    ?>
 <small class="small-text" style="display: block; width: 100%; color: red" >Invalid Password </small>
                    <?php
                  }

                  }
                 
                  ?>
         </div>
         <center> <button class="btn btn-lg mt-5" type="submit" name="signin">Login</button>  </center>

       </div>
     </form>

 <div class="col-sm-3"></div>

  </div>
</div>
     
        </div>
           <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="background: #5485d0; color: #fbfafb;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Menu</h5>
        <button type="button" class="close" style="background: transparent; border:transparent;" data-bs-dismiss="modal" aria-label="Close">
          <span class="iconify" data-icon="ic:sharp-cancel" data-inline="false" style="color: #fbfafb;" data-width="40"></span>
        </button>
      </div>
      <div class="modal-body">
       <center>
         <p class="jumbo-title2" style="font-weight: bold;" onclick="window.location='index.html';">HOME</p>
          <p class="jumbo-title2" style="font-weight: bold;" onclick="window.location='services.html';">SERVICES</p>
           <p class="jumbo-title2" style="font-weight: bold;" onclick="window.location='faq.html';">FAQ</p>
            <p class="jumbo-title2" style="font-weight: bold;" onclick="window.location='about.html';">ABOUT</p>
             <p class="jumbo-title2" style="font-weight: bold;" onclick="window.location='index.html#footer';">CONTACT</p>
              <p class="jumbo-title2" style="font-weight: bold;" onclick="window.location='auth/index.html';">LOGIN <span class="iconify" data-icon="bx:bxs-right-arrow-circle" data-inline="false" style="color: #fbfafb;" data-width="20"></span></p>
       </center>
      </div>
      
    </div>
  </div>
</div>  
       
        <div class="container footer" id="footer">
          
          <div class="row">
            <div class="col-sm-4" style="padding: 20px">
              <div class="mb-5"><img src="../images/logo.png" height="80px"></div>
              <div class="mb-3" ><span><a href="../terms.html" style="color: #5485D0; text-decoration: none;">Terms and Conditions</a> | <a href="privacy.html" style="color: #5485D0; text-decoration: none;">Privacy policy</a></span></div>
              <div class=""><a href="../fraud.html"  style="color: #5485D0; text-decoration: none;">fraud Warning /</a>Warning against illegal third party signal providers.</div>
            </div>
            <div class="col-sm-4 mt-4" style="padding: 20px">
              <center>
               <div class="mb-5"><center><span class="iconify" data-icon="fa-brands:facebook" style="margin-right: 20px; color: #5485D0" data-width="40px"  data-inline="false"></span><span class="iconify" data-icon="ant-design:instagram-filled" style="margin-right: 20px; color: #5485D0" data-width="40px" data-inline="false"></span><span onclick="window.location='https://t.me/Hydra_Fxfree';" class="iconify" data-icon="bi:telegram"  style="margin-right: 20px; color: #5485D0" data-width="40px" data-inline="false"></span></center></div>
              <div class="mb-3" ><span><a href="#" style="color: black; text-decoration: none; font-weight: bolder;">Subscribe to Latest News </a></span></div>
              <div class=""><input type="text" name="" height="70px" class="df" style="margin-right: 10px; height: 50px"><a href="" class="btn btn-lg"  style="color: white; text-decoration: none; background-color: #5485D0; border-radius:0px ">suscribe</a></div></center>
            </div>
            <div class="col-sm-4 mt-4 bas" style="padding: 20px">
              <div class="mb-5"><button class="btn btn-lg bass" style="float: right;" onclick="window.location='https://t.me/Hydra_Fxfree';">Telegram</button></div>
              <div class="mb-3 mar0" style="text-align: right; margin-top: 100px"><span class="iconify" data-icon="gg:danger" data-inline="false" style="color: red;"></span> Risk Warning</div>
              <div class="" style="text-align: right;">Your capital is at risk.<br>

Please check our  <a href="../risk.html"  style="color: #5485D0; text-decoration: none;">Risk Disclosure.</a></div>
            </div>
            <div class="col-sm-12 mt-5"><p style="text-align: center;">copyright 2021 HydraFx</p></div>
          </div>
        </div>
</div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>
</html>