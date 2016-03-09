<?php

	echo "<table id=\"afficheerreur\">";
	echo "<tbody>
			<tr>
				<td>";
					if (isset($_GET['message']))
						echo $_GET['message'];
					else
						echo "&nbsp;";
	echo "	</td>
    		</tr>
    	   </tbody>
    	   </table>	";

?>