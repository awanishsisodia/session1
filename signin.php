<?php
 session_start();
error_reporting(0);
include('includes/config.php');
//error_reporting(0);
if(isset($_POST['login']))
  {
 
    // Getting username/ email and password
     $uname=$_POST['username'];
    $password=$_POST['password'];
    // Fetch data from database on the basis of username/email and password
$sql =mysqli_query($con,"SELECT id,AdminUserName,AdminEmailId,AdminPassword FROM tblclient WHERE (AdminUserName='$uname' || AdminEmailId='$uname')");
 $num=mysqli_fetch_array($sql);
if($num>0)
{
$hashpassword=$num['AdminPassword'];  
//verifying Password
if (password_verify($password, $hashpassword)) {
$_SESSION['login']=$_POST['username'];
$_SESSION['id']=$num['id'];

    echo "<script type='text/javascript'> document.location = 'profile.php'; </script>";
  } else {
echo "<script>alert('Wrong Password');</script>";
 
  }
}
//if username or email not found in database
else{
echo "<script>alert('User not registered with us');
document.location = 'signin.php?msg=no';
</script>";
  }
 
}
?>
<!DOCTYPE html>
<html lang="zxx">
<head>
  <title>Saadiyah Beauty Salon | SignIn</title>
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
          <a href="#">Home</a>
          <span>/</span>
        </li>
        <li>SignIn</li>
      </ul>
    </div>
  </div>
  <!-- //short-->
  <!--contact -->
  <section class="contact  py-md-3 py-sm-3 py-3">
    <div class="container  py-md-4 py-sm-4 py-3">
	<?php if($_GET['msg']==='yes') { ?>
 		<div class="col-lg-12">
		<h5 class="text-center" style="color:green;">Thanks For Registraion Please Login</h5>
		</div>	  
	<?php } ?>	
      <div class="row mt-lg-5 mt-md-4 mt-3" id='divVZITab' tabindex="1">
	  

	  
        <!--//contact-map -->
        <div class="address_mail_footer_grids col-lg-5 col-md-6 p-0" id="my-content">
        <img src="images/s11.jpg" style="width: 100%;-webkit-transform: scaleX(-1);">
        </div>
        <!--contact-map -->
        <div class="col-lg-7 col-md-6 contact-form-txt">
 
		<ul class="nav nav-pills nav-fill">
		  <li class="nav-item signintab">
			<a  href="signin.php?msg=no" class="nav-link" >SignIn</a>
		  </li>
		  <li class="nav-item signuptab">
			<a href="signup.php" class="nav-link" > SignUp</a>
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
          <form action="signin.php" method="post">
            <div class="w3pvt-wls-contact-mid">
 
 
              <div class="form-group contact-forms">
                <input type="text" name="username" class="form-control" placeholder="Mobile" required="">
              </div>
               <div class="form-group contact-forms">
                <input type="text" name="password" class="form-control" placeholder="Password" required="">				
              </div>
			  
			  
              <button type="submit" name="login" class="btn sent-butnn">Login</button>
            </div>
          </form>
		   <a href="forgot-password.php"><span class="green-link">Forgot Password?</span></a>
        </div>
      </div>
    </div>
  </section>
  <!--//contact  -->
<?php include("includes/footer.php");?>
</body>
<script>

</script>
</html>