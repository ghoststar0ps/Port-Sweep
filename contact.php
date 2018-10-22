<?php

session_start();

define('IN_ADMIN', true);
 
require_once('header.php');




//If the form is submitted
if(isset($_POST['submit'])) {



//Check to make sure that the name field is not empty
if(trim($_POST['name']) == '') {
$hasError = true;
} else {
$name = trim($_POST['name']);
}

//Check to make sure sure that a valid email address is submitted
if(trim($_POST['email']) == '') {
$hasError = true;
}else {
$email = trim($_POST['email']);
}


//Check to make sure that the subject field is not empty
if(trim($_POST['subject']) == '') {
$hasError = true;
} else {
$subject = trim($_POST['subject']);
}


//Check to make sure comments were entered
if(trim($_POST['message']) == '') {
$hasError = true;
} else {
if(function_exists('stripslashes')) {
$comments = stripslashes(trim($_POST['message']));
} else {
$comments = trim($_POST['message']);
}
}

//If there is no error, send the email
if(!isset($hasError)) {
	
			//Email information
            $query = "SELECT * FROM site_config WHERE id='1'";
            $result = mysqli_query($connection, $query);
            
            while ($row = mysqli_fetch_array($result))
            {
                $email_site = Trim($row['email']);
            }

			$email_message = '';
			
            $email_to = $email_site;
 
			$email_subject = "Message sent form '$email'";			
			
			$email_message .= "Name: ".Trim($name)."\n";
 		 
			$email_message .= "Email: ".Trim($email)."\n";
		 
			$email_message .= "Subject: ".Trim($subject)."\n";
		 
			$email_message .= "Message: ".Trim($comments)."\n";

            // SQL Insert
			$userDate = date('m/d/Y h:i:sA');
			
            $query = "INSERT INTO contact (name,email,subject,message,date,viewed) value ('$name','$email','$subject','$comments','$userDate','no')";

            mysqli_query($connection, $query);
		 
			// create email headers
			 
			$headers = 'From: '.$email."\r\n".
			 
			'Reply-To: '.$email."\r\n" .
			 
			'X-Mailer: PHP/' . phpversion();
			 
			@mail($email_to, $email_subject, $email_message, $headers); 
			$emailSent = true;
}
}

?>

	
<div id="wrap" style="margin:70px 0 0 0">
	<div class="container">
		<div class="row">
			<div class="col-md-9">
				<h1 class="page-header text-center">Contact Us</h1>
			
				<form class="form-horizontal" role="form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" id="contactform">

				<?php if(isset($hasError)) { //If errors are found ?>
				<div class="alert alert-danger text-center" role="alert">
						<?php echo $lang['235']; ?>
				</div>
				<?php } ?>
				
				<?php if(isset($emailSent) && $emailSent == true) { //If email is sent ?>
				<div class="alert alert-success text-center" role="alert">
						<?php echo $lang['236']; ?>
				</div>

				<?php } ?>

					<div class="form-group">
						<label for="name" class="col-sm-2 control-label">Name</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="name" name="name" placeholder="First & Last Name" >
						</div>
					</div>
					<div class="form-group">
						<label for="email" class="col-sm-2 control-label">Email</label>
						<div class="col-sm-10">
							<input type="email" class="form-control" id="email" name="email" placeholder="example@domain.com" >
						</div>
					</div>

					<div class="form-group">
						<label for="subject" class="col-sm-2 control-label">Subject</label>
						<div class="col-sm-10">
							<input type="subject" class="form-control" id="subject" name="subject" placeholder="subject" >
						</div>
					</div>

					<div class="form-group">
						<label for="message" class="col-sm-2 control-label">Message</label>
						<div class="col-sm-10">
							<textarea class="form-control" rows="4" name="message" placeholder="message"></textarea>
						</div>
					</div>
					
					<div class="form-group">
						<div class="col-sm-10 col-sm-offset-2">
							<input id="submit" name="submit" type="submit" value="Send" class="btn btn-primary">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-10 col-sm-offset-2">
						<?php
						if(isset($error)){
							echo $error;
						}?>
					<br />
						</div>
					</div>
				</form> 
				

<br></br>
				</div>
			

			<?php 

            require_once("sidebar.php"); 

            ?>
		</div>
	</div>
</div>
<?php
require_once('footer.php');
?>