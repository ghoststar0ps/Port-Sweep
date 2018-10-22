<?php
if (!defined('IN_ADMIN')) die("Hacking attempt");

?>


<footer class="footer">
  <div class="container">
    <div class="row">
      <p class="text-center">Copyright &copy; <?php echo date("Y"); ?> <a href="/"><?php echo $domain_name; ?></a> All rights reserved.</p>


<p class="text-center">
<?php
		  
			$query = "SELECT * FROM pages"; 
			
			$result = mysqli_query($connection, $query);
			$numResults = mysqli_num_rows($result);
			$counter = 0;
			while($row = mysqli_fetch_array($result)) {
				$permalink = Trim($row['permalink']);
				$pagename = Trim($row['pagename']);
				echo '<a href="page/'.$permalink.'/">'.$pagename.'</a>';
				if( $counter == $numResults-1){ 


				}else{ //-- Okay, this isn't the last row 

					echo ' <span class="separator">|</span> ';

				}
				$counter++;
			}
	
?>

</p>
    </div>
  </div>
</footer>


<script src="<?php echo $theme_path; ?>js/bootstrap.min.js" type="text/javascript"></script>



<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript">stLight.options({publisher: "76b07b50-f8cd-4614-a982-768ae89704e9", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>



</body>

</html>