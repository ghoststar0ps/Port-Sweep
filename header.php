<?php

if (!defined('IN_ADMIN')) die("Hacking attempt");
 
define('D_S',DIRECTORY_SEPARATOR);
define('ROOT_DIR', realpath(dirname(__FILE__)) .D_S);
define('INCLUDE_DIR', ROOT_DIR .'include'.D_S);

define('VERSION','1.0');


$theme_path = 'assets/';

require(ROOT_DIR.'config.php');
require(INCLUDE_DIR.'application.php');

//Database Connection

$connection = dbConncet($dbHost,$dbUser,$dbPass,$dbName);


$query =  "SELECT * FROM site_config";

$result = mysqli_query($connection,$query);

        

while($row = mysqli_fetch_array($result)) {

    $title = Trim($row['title']);

    $description= Trim($row['description']);

    $keyword = Trim($row['keyword']);

    $contact_email = Trim($row['email']);

	
	$verify_code =  Trim($row['verify_code']);

	$domain_name =  Trim($row['domain_name']);


}



$lang = INCLUDE_DIR.'lang_en.php';

require_once($lang);





?>

<!DOCTYPE html>

<html>

    <head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
	

      <base href="/" />      

        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <meta http-equiv="Content-Language" content="en" />

        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <!-- Meta Data-->

        <title><?php if(isset($title)) { echo $title; } ?></title>

              
        <meta name="description" content="<?php echo $description; ?>" />

<meta name="keywords" content="<?php echo $keyword; ?>" />
        <?php echo html_entity_decode($verify_code); ?>


		<link href="<?php echo $theme_path; ?>css/bootstrap.min.css" rel="stylesheet">
		
		
		<link href="<?php echo $theme_path; ?>css/font-awesome.min.css" rel="stylesheet" />

		<script type="text/javascript" src="<?php echo $theme_path; ?>js/bootstrap.min.js"></script>
		
				<link href="<?php echo $theme_path; ?>css/style.css" rel="stylesheet">


        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

<script src="<?php echo $theme_path; ?>js/script.js" type="text/javascript"></script>



</head>



<body>   

<header class="navbar navbar-inverse navbar-fixed-top bs-docs-nav" role="banner">
  <div class="container">
    
	<div class="navbar-header">
      <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/" title="Home">
      <img src="/assets/img/seotools.png" alt="Port checker" class="logoimg"> <?php echo $lang['1']; ?>
	  </a>
    </div>
	
	
    <nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">
      <ul class="nav navbar-nav">        
	
      </ul>
      <ul class="nav navbar-nav navbar-right">
 <li>
         <a href="/"><span class="glyphicon glyphicon-home"></span> <?php echo $lang['20']; ?> </a>

                        </li>
		 <li>
          <a href="contact.php"><span class="glyphicon glyphicon-envelope"></span> <?php echo $lang['2']; ?></a>
        </li>
      </ul>

    </nav>

  </div>
</header>
