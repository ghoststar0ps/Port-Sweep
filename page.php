<?php

session_start();

define('IN_ADMIN', true);

 
require_once('header.php');

$permalink = Trim($_GET['permalink']); 

$query = mysqli_query($connection, "SELECT * FROM pages WHERE permalink='$permalink'");

if (mysqli_num_rows($query) > 0)

{

    $data = mysqli_fetch_array($query);

    

    $editID = $data['id'];

    $pagename = $data['pagename'];

    $permalink = $data['permalink'];

    $pagetitle = $data['pagetitle'];

    $pagedescription = $data['pagedescription'];

    $pagecontent = $data['pagecontent'];

} 
?>

 
	<div id="wrap" style="margin:70px 0 0 0">
	<div class="container">
		<div class="row">
			<div class="col-md-9">
				<h1><?php echo ucfirst($pagetitle); ?></h1>
		
				<hr /><br />

                

                <?php echo $pagecontent; ?>
	
			
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