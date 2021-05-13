<?php
session_start();
include('includes/config.php');
error_reporting(0);
if(strlen($_SESSION['login'])==0)
  { 
header('location:index.php');
}
else{
    ?>
 

<?php
if(isset($_POST['update']))
{
echo $catid=$_SESSION['id'];

$client_name=$_POST['client_name'];
$email=$_POST['email'];
$contact=$_POST['contact'];
$age= mysqli_real_escape_string($con,$_POST['age']);
$gender= mysqli_real_escape_string($con,$_POST['gender']); 
$AdminAddress= mysqli_real_escape_string($con,$_POST['AdminAddress']); 

$query=mysqli_query($con,"Update  
tblclient set 
AdminUserName='$contact',
AdminEmailId='$email',
AdminContact='$contact',
AdminAge='$age',
AdminGender='$gender',
AdminAddress='$AdminAddress',
AdminName='$client_name'
where id='$catid'");
 
if($query)
{
$msg="Profile Updated successfully ";
}
else{
$error="Something went wrong . Please try again.";    
}

}
?>

<!DOCTYPE html>
<html lang="zxx">
<head>
  <title>Saadiyah Beauty Salon | Profile</title>
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
        <li>Profile</li>
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
			<a  href="profile.php" class="nav-link text-uppercase" >Profile</a>
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
          <form action="profile.php" method="post">
            <div class="w3pvt-wls-contact-mid">
              <div class="form-group contact-forms">
			    <label class="text-uppercase font-weight-bold">Name</label>
                <input type="text" name="client_name" class="form-control" placeholder="Name" value="<?php echo $row['AdminName'];?>">
              </div>
              <div class="form-group contact-forms">
			    <label class="text-uppercase font-weight-bold">Email ID</label>
                <input type="email" name="email" class="form-control" placeholder="email" value="<?php echo $row['AdminEmailId'];?>">
              </div>
              <div class="form-group contact-forms">
			  <label class="text-uppercase font-weight-bold">Mobile No</label>
                <input type="text" name="contact" class="form-control" placeholder="contact" value="<?php echo $row['AdminContact'];?>">
              </div>
			  
              <div class="form-group contact-forms">
			   <label class="text-uppercase font-weight-bold">Gender</label>
                <select class="form-control" name="gender" >
				<option><?php echo $row['AdminGender'];?></option>
				<option>Male</option>
				<option>Female</option>
				</select>
              </div>			  
			  
              <div class="form-group contact-forms">
			  <label class="text-uppercase font-weight-bold">AGE</label>
                <input type="text" name="age" class="form-control" placeholder="AGE" value="<?php echo $row['AdminAge'];?>">
              </div>			  

              <div class="form-group contact-forms">
			  <label class="text-uppercase font-weight-bold">Address</label>
                <input type="text" name="AdminAddress" class="form-control" placeholder="Address" value="<?php echo $row['AdminAddress'];?>">
              </div>

			  
              <button type="submit" name="update" class="btn sent-butnn">UPDATE</button>
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