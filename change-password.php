<?php
session_start();
include('includes/config.php');
error_reporting(0);
if(strlen($_SESSION['login'])==0)
  { 
header('location:index.php');
}
else{
if(isset($_POST['submit']))
{
//Current Password hashing 
$password=$_POST['password'];
$options = ['cost' => 12];
$hashedpass=password_hash($password, PASSWORD_BCRYPT, $options);
$adminid=$_SESSION['login'];
// new password hashing 
$newpassword=$_POST['newpassword'];
$newhashedpass=password_hash($newpassword, PASSWORD_BCRYPT, $options);

date_default_timezone_set('Asia/Kolkata');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );
$sql=mysqli_query($con,"SELECT AdminPassword FROM  tbladmin where AdminUserName='$adminid' || AdminEmailId='$adminid'");
$num=mysqli_fetch_array($sql);
if($num>0)
{
 $dbpassword=$num['AdminPassword'];

if (password_verify($password, $dbpassword)) {

 $con=mysqli_query($con,"update tbladmin set AdminPassword='$newhashedpass', updationDate='$currentTime' where AdminUserName='$adminid'");
$msg="Password Changed Successfully !!";
}
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
</head>
    <script type="text/javascript">
function valid()
{
if(document.chngpwd.password.value=="")
{
alert("Current Password Filed is Empty !!");
document.chngpwd.password.focus();
return false;
}
else if(document.chngpwd.newpassword.value=="")
{
alert("New Password Filed is Empty !!");
document.chngpwd.newpassword.focus();
return false;
}
else if(document.chngpwd.confirmpassword.value=="")
{
alert("Confirm Password Filed is Empty !!");
document.chngpwd.confirmpassword.focus();
return false;
}
else if(document.chngpwd.newpassword.value!= document.chngpwd.confirmpassword.value)
{
alert("Password and Confirm Password Field do not match  !!");
document.chngpwd.confirmpassword.focus();
return false;
}
return true;
}
</script>
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
 
      <div class="row mt-lg-5 mt-md-4 mt-3">
        <!--//contact-map -->

        <div class="address_mail_footer_grids col-lg-2 col-md-6 p-0" style="background: #000;">
		<ul class="nav nav-pills nav-fill" style="border-bottom: solid 1px #fff;">
		  <li class="nav-item signintab text-left">
			<a  href="profile.php" class="nav-link" ><i class="fa fa-universal-access" aria-hidden="true"></i> Profile</a>
		  </li>	 
		</ul>
		<ul class="nav nav-pills nav-fill" style="border-bottom: solid 1px #fff;">
		  <li class="nav-item signintab text-left">
			<a  href="change-password.php" class="nav-link" ><i class="fa fa-universal-access" aria-hidden="true"></i> Change Password</a>
		  </li>	 
		</ul>		
		
		<ul class="nav nav-pills nav-fill" style="border-bottom: solid 1px #fff;">
		  <li class="nav-item signintab text-left">
			<a  href="logout.php" class="nav-link" ><i class="fa fa-trash" aria-hidden="true"></i> Logout</a>
		  </li>	 
		</ul>		
		<ul class="nav nav-pills nav-fill" style="border-bottom: solid 1px #fff;">
		  <li class="nav-item signintab text-left">
			<a  href="delete-accout.php" class="nav-link" onclick="return confirm('Do you reaaly want to delete ?')"><i class="fa fa-sign-out" aria-hidden="true"></i> Delete Acount</a>
		  </li>	 
		</ul>		
        </div>
        <!--contact-map -->
        <div class="col-lg-10 col-md-6 contact-form-txt">
		<div class="row">
		<div class="col-sm-12">  
		<!---Success Message--->  
		<?php if($msg){ ?>
		<div class="alert alert-success" role="alert">
		<strong>Well done!</strong> <?php echo htmlentities($msg);?>
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
			<a  href="profile.php" class="nav-link text-uppercase" >Change Password</a>
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
</style>
<?php
$vendorid=$_SESSION['id'];
$query=mysqli_query($con,"select * from tblclient where tblclient.id='$vendorid'");
while($row=mysqli_fetch_array($query))
{
?>		
          <form action="change-password.php" name="chngpwd" method="post" onSubmit="return valid();">
            <div class="w3pvt-wls-contact-mid">
              <div class="form-group contact-forms">
			    <label class="text-uppercase font-weight-bold">Current Password</label>
                <input type="text" class="form-control" value="" name="password" required>
              </div>
              <div class="form-group contact-forms">
			    <label class="text-uppercase font-weight-bold">New Password</label>
                <input type="text" class="form-control" value="" name="newpassword" required>
              </div>
              <div class="form-group contact-forms">
			  <label class="text-uppercase font-weight-bold">Confirm Password</label>
               <input type="text" class="form-control" value="" name="confirmpassword" required>
              </div>
			  
 

			  
              <button type="submit" name="submit" class="btn sent-butnn">UPDATE</button>
            </div>
          </form>
<?php } ?>		   
        </div>
      </div>
    </div>
  </section>
  <!--//contact  -->
<?php include("includes/footer.php");?>
</body>

</html>
<?php } ?>