<?php
 
$server_ip= $_POST['server']; 
$port = $_POST['port'];
$server_ip = gethostbyname($server_ip);
$status = array();

if (empty($_POST["server"]) || empty($_POST['port']) || !filter_var($server_ip, FILTER_VALIDATE_IP) )
                        {
                         echo "<li>
<div class=\"tool-result-div\">
<div class=\"tool-result-header\">
Result:     $server_ip

</div>
<div class='table-responsive'>

<table class='table table-striped which' width='100%'' cellspacing='10px'>
<tbody>
<tr class='answerRow'>
Invalid Hostname
</tr>
</tbody></table></div></div></li>
";
                        }
                        
                        elseif (!(is_numeric($port)))
                        {
                            echo "<div class=\"tool-result-div\"><div class=\"tool-result-header\"><b>Entered data is not a Port number</b></div>";
                        }
                       
                        else
                        {

 

        if($pf = @fsockopen($_POST['server'], $port, $err, $err_string, 1)) {
            $status = true;
            fclose($pf);
        } else {
            $status = false;
        }
    
 

 echo "<li>
<div class=\"tool-result-div\">
<div class=\"tool-result-header\">

Result:     $server_ip


</div>
<div class='table-responsive'>

<table class='table table-striped which' width='100%'' cellspacing='10px'>
<tbody>


";

        $prot = getservbyport($port,"tcp");
		
		 echo "<tr class='answerRow'>";
if($status) {
            echo "<td class='row_port1'><img width=\"16\" align=\"absmiddle\" height=\"16\" src=\"assets/img/available.png\"> $prot ($port)
			</td>
<td class='row_port2'>
			 <span class=\"label label-success\"> Success </span></td><td class='row_port3'>Port $port on $server_ip is open!</td>";
        }
		else {
            echo "
			<td class='row_port1'><img width=\"16\" align=\"absmiddle\" height=\"16\" src=\"assets/img/taken.png\"> $prot ($port)
			</td>
<td class='row_port2'>
			 <span class=\"label label-danger\"> Not Available </span></td><td class='row_port3'>Port $port on $server_ip is closed!</td>";
        }
echo "
</tr>
";    
    
	echo "
</tbody>
</table>


</div>

</div></li>";
}
?>