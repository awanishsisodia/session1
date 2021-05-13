<?php 
include('includes/config.php');	
?>

<?php
if(isset($_POST['submit'])){ 
$age= mysqli_real_escape_string($con,$_POST['age']);
$gender= mysqli_real_escape_string($con,$_POST['gender']); 
$client_name= mysqli_real_escape_string($con,$_POST['client_name']);
$email= mysqli_real_escape_string($con,$_POST['email']);
$contact= mysqli_real_escape_string($con,$_POST['contact']);
$newpassword=mysqli_real_escape_string($con,$_POST['password']);
$options = ['cost' => 12];
$newhashedpass=password_hash($newpassword, PASSWORD_BCRYPT, $options);
 
 
 
$query=mysqli_query($con,"insert tblclient(`AdminUserName`,AdminEmailId,AdminPassword,AdminContact,AdminName,AdminAge,AdminGender) values('$contact','$email','$newhashedpass','$contact','$client_name','$age','$gender')");

if($query)
{
 echo "<script type='text/javascript'> document.location = 'signin.php?msg=yes'; </script>";
}
else{
$error="Something went wrong . Please try again.";    
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
 
      <div class="row mt-lg-5 mt-md-4 mt-3">
        <!--//contact-map -->

        <div class="address_mail_footer_grids col-lg-5 col-md-6 p-0" id="my-content">
        <img src="images/s11.jpg" style="width: 100%;-webkit-transform: scaleX(-1);">
        </div>
        <!--contact-map -->
        <div class="col-lg-7 col-md-6 contact-form-txt">
 
		<ul class="nav nav-pills nav-fill">

		  <li class="nav-item signintab">
			<a href="signin.php?msg=no" class="nav-link" >SignIn</a>
		  </li>	
		  <li class="nav-item signuptab">
			<a  href="signup.php" class="nav-link" >SignUp</a>
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
 
.contact-forms input, .contact-forms textarea {
    margin-bottom: 0px!important;
} 
</style>		
          <form action="signup.php" method="post" class="needs-validation" novalidate>
            <div class="w3pvt-wls-contact-mid">
 
              <div class="form-group contact-forms">
			    <label class="form-label" for="validationCustom01"><b>Name</b></label>
                <input type="text"  name="client_name" maxlength="50" class="form-control" placeholder="Name" required="" id="validationCustom01">
				<span class="invalid-feedback">Enter Your Name Please</span>
			  </div>
              <div class="form-group contact-forms">
			    <label><b>Email ID</b></label>
                <input type="email" name="email" class="form-control" placeholder="email" required="">
				<span class="invalid-feedback">Enter Your Email Please</span>
              </div>
              <div class="form-group contact-forms">
			    <label><b>Mobile No</b></label>
                <input type="text" name="contact" id="title" class="form-control" placeholder="contact" required="" >
				<span class="invalid-feedback">Enter Your Mobile No Please</span>
              </div>
			  
			  
              <div class="form-group contact-forms">
			    <label><b>Gender</b></label>
                <select class="form-control" name="gender" >
				<option selected="true" disabled="disabled">Select Gender</option>
				<option>Male</option>
				<option>Female</option>
				</select>
              </div>			  
			  
              <div class="form-group contact-forms">
			    <label><b>Age</b></label>
                <input type="text" name="age" class="form-control" placeholder="AGE" required="">
				<span class="invalid-feedback">Enter Your Age Please</span>
              </div>			  
			  
              <div class="form-group contact-forms" >
			    <label><b>Password</b></label>
                <input type="password" name="password" class="form-control" placeholder="Password" required="">
              </div>
              <button type="submit" name="submit" class="btn sent-butnn">SignUp</button>
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
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function () {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })
})()
</script>
</html>