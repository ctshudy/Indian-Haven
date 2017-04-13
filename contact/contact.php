<?php

    require_once "recaptchalib.php";
	
	// your secret key
$secret = "6Lcr5RcUAAAAAGH7TqruDgHO-qpQeSYjiwg3AqJc";
 
// empty response
$response = null;
 
// check secret key
$reCaptcha = new ReCaptcha($secret);

// if submitted check response
if ($_POST["g-recaptcha-response"]) {
    $response = $reCaptcha->verifyResponse(
        $_SERVER["REMOTE_ADDR"],
        $_POST["g-recaptcha-response"]
    );
}
	

	if (isset($_POST["submit"])) {
		$name = $_POST['name'];
		$email = $_POST['email'];
		$message = $_POST['message'];
		$from = 'Website Form'; 
		$to = 'ctshudy@embcomputing.com'; 
		$subject = 'New Website Email Form Submission';
		
		$body ="From: $name\n E-Mail: $email\n Message:\n $message";
		// Check if name has been entered
		if (!$_POST['name']) {
			$errName = 'Please enter your name';
		}
		
		// Check if email has been entered and is valid
		if (!$_POST['email'] || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
			$errEmail = 'Please enter a valid email address';
		}
		
		//Check if message has been entered
		if (!$_POST['message']) {
			$errMessage = 'Please enter your message';
		}
		
		
		
		
// If there are no errors, send the email
if (!$errName && !$errEmail && !$errMessage && !$errHuman && !$errCAPTCHA) {
	if (mail ($to, $subject, $body, $from)) {
	    if (response != null && $response->success) {
			$result='<div class="alert alert-success">Thank You! We will be in touch shortly.</div>';
		}else{
		    $errMessage = 'Please fill out the CAPTCHA...';
		}
	
	} else {
		$result='<div class="alert alert-danger">Sorry there was an error. Please make sure you complete the CAPTCHA.</div>';
	}
}
	}
?>
<html lang="en">
    <head>
        <title>Indian Haven</title>
        <meta charset="utf-8">
        <meta name="viewport" content="initial-scale=1.0">
        <meta name="description" content="TODO">
        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>


        <link rel="stylesheet" href="/css/style.css">

        <link rel="icon" type="image/x-icon" href="#" />
    </head>
    
  
 <body>
    <!-- Navigation -->
    <nav class="navbar navbar-toggleable-md navbar-light bg-faded navbar-right ">
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="#">Indian Haven</a>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-item nav-link"        href="../">Home</a>
          <a class="nav-item nav-link"        href="../facilities">Facilities</a>
          <a class="nav-item nav-link"        href="../services">Services</a>
          <a class="nav-item nav-link"        href="../news">News & Events</a>
          <a class="nav-item nav-link"        href="../testimonials">Testimonials</a>
          <a class="nav-item nav-link active" href="#">Contact</a>

        </div>
      </div>
    </nav>
    <!-- END Navigation -->

<!-- Page Content -->
       <div class="container" >
    
        <img class="img-fluid" src="http://www.placehold.it/1900x500" style="margin-top: 15px; margin-bottom: 15px;">

    <div class="row">
         <div class="col-md-6">
             <div class="text-center"><h3 style="background-color: #F5F5F5; height: auto; padding: 10px;" class="text-danger">Contact Us</h1></div>

            <div class="well well-sm">
                <form class="form-horizontal" role="form" method="post" action="contact.php">
                	<div class="form-group">
                		<label for="name" class="col-sm-2 control-label">Name</label>
                		<div class="col-sm-10">
                			<input type="text" class="form-control" id="name" name="name" placeholder="First & Last Name" value="<?php echo htmlspecialchars($_POST['name']); ?>">
                			<?php echo "<p class='text-danger'>$errName</p>";?>
                		</div>
                	</div>
                	<div class="form-group">
                		<label for="email" class="col-sm-2 control-label">Email</label>
                		<div class="col-sm-10">
                			<input type="email" class="form-control" id="email" name="email" placeholder="example@domain.com" value="<?php echo htmlspecialchars($_POST['email']); ?>">
                			<?php echo "<p class='text-danger'>$errEmail</p>";?>
                		</div>
                	</div>
                	<div class="form-group">
                		<label for="message" class="col-sm-2 control-label">Message</label>
                		<div class="col-sm-10">
                			<textarea class="form-control" rows="4" name="message"><?php echo htmlspecialchars($_POST['message']);?></textarea>
                			<?php echo "<p class='text-danger'>$errMessage</p>";?>
                		</div>
                	</div>
                	<div class="form-group">
                		<label for="human" class="col-sm-2 control-label"></label>
                		<div class="col-sm-10">
                			<div class="g-recaptcha" data-sitekey="6Lcr5RcUAAAAAGIaWK1VRV1Gt_SPAYawzJ3V4VtB"></div>
                			 <?php echo "<p class='text-danger'>$errCAPTCHA</p>";?>
                		</div>
                	</div>
                		<div class="col-sm-6 col-sm-offset-3 center centered">
                			<input id="submit" name="submit" type="submit" value="Send" class="btn btn-red btn-lg">
                		</div>
                	<div class="form-group">
                		<div class="col-sm-10 col-sm-offset-2">
                			<?php echo $result; ?>	
                		</div>
                	</div>
                </form>
            </div>
      </div>
        
        
        <div class="col-md-6 well-lg">
                <div class="text-center"><h3 style="background-color: #F5F5F5; height: auto; padding: 10px;" class="text-danger">Contact Information</h1></div>
                    <div class="panel-body text-left">
                        <p><span class="bold">Address:</span> 1675 Saltsburg Avenue, Indiana, PA 15701</p>
                        <p><span class="bold">Phone:</span> (724) 465-3900</p>
                        <p><span class="bold">Fax:</span>(724) 465-2013</p>
                        
                        <span class="bold">Administrator: </span><span>Kim Cobaugh</span><br/>
                        <a href= "mailto:kimberly_cobaugh@indianhaven.com">kimberly_cobaugh@indianhaven.com</a><br/><br/>

                        <span class="bold">Admissions: </span><span>John Bradley</span><br/>
                        <a href= "mailto:john_bradley@indianhaven.com">john_bradley@indianhaven.com</a><br/><br/>

                        <span class="bold">Business Office: </span><span>Jacob Guiher</span><br/>
                        <a href= "mailto:jacob_guiher@indianhaven.com">jacob_guiher@indianhaven.com</a><br/><br/>

                        <span class="bold">HR / Employment: </span><span>Emily Frankowski</span><br/>
                        <a href= "mailto:emily_frankowski@indianhaven.com">emily_frankowski@indianhaven.com</a><br/>
                    </div>
            </div>
            
            
            </div>
            
            <div class="embed-responsive embed-responsive-16by9" style ="margin-bottom: 30px; width: 100% !important;">
            <div class"shadow"></div>
            <iframe class="shadow col-lg-12 col-md-12 col-sm-12 embed-responsive-item" src="https://www.google.com/maps/d/u/0/embed?mid=1BqY6_XJslVC0U_l2mAMYi8jsXbo"></iframe>
            </div>
</div>


      <footer class="footer container-fluid shadow">
        
        <div class="row" style="margin-top: 30px;">
            <div class="col-md-12 text-center">
                <p>Copyright &copy; 2017. Indian Haven.  All rights reserved.</p>
                <a class="footerText" href="http://www.embcomputing.com"><p>Website Designed By EMB Computing</p></a>
            </div>
        </div><!-- /.row -->
        
    </footer>




</body>    
</html>