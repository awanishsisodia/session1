<?php
include('includes/config.php');
error_reporting(0);

if(isset($_POST['submit']))
{
$email=$_POST['email'];
$mobile=$_POST['mobile'];
$options = ['cost' => 12]; 
$newpassword=$_POST['password'];
$newhashedpass=password_hash($newpassword, PASSWORD_BCRYPT, $options);

$query=mysqli_query($con,"update tblclient set AdminPassword='$newhashedpass' where AdminUserName='$mobile' AND  AdminEmailId='$email'");

if($query)
{
$msg="Password Changed Successfully !!";
} 
 
else
{
$error="Old Password not match !!";
}
}


?>
<!DOCTYPE html>
<html lang="zxx">
<head>
  <title>Saadiyah Beauty Salon | Contact</title>
  <!--meta tags -->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="keywords" content="" />
  <script>
    addEventListener("load", function () {
      setTimeout(hideURLbar, 0);
    }, false);

    function hideURLbar() {
      window.scrollTo(0, 1);
    }
  </script>
  <!--//meta tags ends here-->
  <!--booststrap-->
  <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all">
  <!--//booststrap end-->
  <!-- font-awesome icons -->
  <link href="css/font-awesome.min.css" rel="stylesheet">
  <!-- //font-awesome icons -->
  <!--stylesheets-->
  <link href="css/style.css" rel='stylesheet' type='text/css' media="all">
  <!--//stylesheets-->
  <link href="//fonts.googleapis.com/css?family=Playfair+Display:400,700,900" rel="stylesheet">
  <link href="//fonts.googleapis.com/css?family=Source+Sans+Pro:400,600" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
</head>

<body>
  <!-- banner -->
  <div class="header-outs inner_page-banner " id="home">
    <!-- header -->
    <?php include("includes/header.php");?>
    <!-- //header -->
  </div>
  <!-- banner -->
  <!-- short -->
  <div class="using-border py-3">
    <div class="inner_breadcrumb  ml-4">
      <ul class="short_ls">
        <li>
          <a href="index.php">Home</a>
          <span>/</span>
        </li>
        <li>SignUp</li>
      </ul>
    </div>
  </div>
  <!-- //short-->
  <!--contact -->
  <section class="contact  py-md-3 py-sm-3 py-3">
    <div class="container  py-md-4 py-sm-4 py-3">
      <div class="row mt-lg-5 mt-md-4 mt-3" id='divVZITab' tabindex="1">
	  

	  
        <!--//contact-map -->
        <div class="address_mail_footer_grids col-lg-5 col-md-6 p-0" id="my-content">
        <img src="images/s11.jpg" style="width: 100%;-webkit-transform: scaleX(-1);">
        </div>
        <!--contact-map -->
        <div class="col-lg-7 col-md-6 contact-form-txt">
		<div class="row">
		<div class="col-sm-12">  
		<!---Success Message--->  
		<?php if($msg){ ?>
		<div class="alert alert-success" role="alert">
		<strong>Well done!</strong> <?php echo htmlentities($msg);?> <a href="signin.php?msg=no">Login Now</a>
		</div>
		<?php } ?>

		<!---Error Message--->
		<?php if($error){ ?>
		<div class="alert alert-danger" role="alert">
		<strong>Oh snap!</strong> <?php echo htmlentities($error);?></div>
		<?php } ?>


		</div>
		</div> 
		<ul class="nav nav-pills nav-fill">
		  <li class="nav-item signintab">
            <a  href="#" class="nav-link" >Forgot Password </a>
		  </li>	 
		</ul>
		<hr>		
<style>
.signuptab{
    background: #525252;
    color: #fff;
}
.signintab{
    background: #000;
    color: #fff;
}

a.nav-link {
    color: #fff;
    font-weight: 600;
}

@media screen and (min-width: 0px) and (max-width: 800px) {
  #my-content { display: none; }  /* show it on small screens */
}
</style>		
          <form action="forgot-password.php" method="post">
            <div class="w3pvt-wls-contact-mid">
 
 
              <div class="form-group contact-forms">
                <input type="email" name="email" class="form-control" placeholder="Email ID" required="">
              </div>
               <div class="form-group contact-forms">
                <input type="text" name="mobile" class="form-control" placeholder="Mobile No" required="">				
              </div>
               <div class="form-group contact-forms">
                <input type="text" name="password" class="form-control" id="password" placeholder="New Password" required="">				
              </div>
			  
               <div class="form-group contact-forms">
                <input type="password" class="form-control" name="confirm_password" id="confirm_password" />
                <span id='message'></span>			
              </div>
			  
              <button type="submit" name="submit" class="btn sent-butnn">Genrate Password</button>
            </div>
          </form>
		    
        </div>
      </div>
    </div>
  </section>
  <!--//contact  -->
<?php include("includes/footer.php");?>
</body>
<script>
$('#password, #confirm_password').on('keyup', function () {
  if ($('#password').val() == $('#confirm_password').val()) {
    $('#message').html('Password Matching').css('color', 'green');
  } else 
    $('#message').html('Password Not Matching').css('color', 'red');
});
</script>
</html>