

<html>
<head>
<title><?php echo $_SERVER['SERVER_NAME'] ?> : server facts</title>
<style type="text/css"><!--
                a:link    {color:#990000;text-decoration:none;}
                a:visited {color:#990000;text-decoration:none;}
                a:hover   {color:#990000;text-decoration:none;}
                --></style>
</head>


<?php

    function formatBytes($bytes)
    {
        $s = array('B', 'KB', 'MB', 'GB', 'TB', 'PB');
        $e = floor(log($bytes)/log(1024));
        return sprintf('%.2f '.$s[$e], ($bytes/pow(1024, floor($e))));
    }

function dirSize($directory) {
    $size = 0;
    foreach(new RecursiveIteratorIterator(new RecursiveDirectoryIterator($directory)) as $file){
        $size+=$file->getSize();
    }
    return $size;
}

?>


<body bgcolor="#FFFFFF" marginwidth="0" marginheight="0">
<table width="100%" height="100%"><tr><td width="100%" height="100%" align="center" valign="center">
<table width="250" border="0" cellpadding="3" cellspacing="0" bgcolor="#000000"><tr><td valign="top" align="center">
<table width="100%" border="0" cellpadding="3" cellspacing="0" bgcolor="#FFFFFF"><tr><td valign="top" align="center">
<table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
<tr>
<td valign="top" colspan="2">
<font face="Arial">
<font size="5"><b>Server Facts</b></font><br>
<font size="2">Serving Size Approx. 1 Website</font><br>
<font size="2">Servings Per Container About 2
</font>
</font>
</td>
</tr>
<tr><td bgcolor="#000000" colspan="2" style="width: 1px; height:8px"></td></tr>

	<tr>
		<td valign="top" colspan="2">
			<font face="Arial" size="2"><b>Amount Per Serving</b></font>
		</td>
	</tr>

	<tr><td bgcolor="#000000" colspan="2" style="width: 1px; height:1px"></td></tr>

	<tr>
		<td valign="top" align="left" colspan="2">
			<font face="Arial" size="2">Calories <?php echo formatBytes(dirSize("/var/www/"));?>
</td></tr>
	<tr>	<td valign="top" align="left">
			<font face="Arial" size="2">Daily Allowance  <?php echo formatBytes(disk_total_space("/"));?>
</font>


</font>
		</td>
	</tr>

	<tr><td bgcolor="#000000" colspan="2"style="width: 1px; height:5px"></td></tr>

	<tr>
		<td valign="top" align="right" colspan="2">
			<font face="Arial" size="2"><b>% Daily Value*</b></font>
		</td>
	</tr>

	<tr><td bgcolor="#000000" colspan="2"style="width: 1px; height:1px"></td></tr>
		<?php
			$fh = fopen('/proc/meminfo', 'r');
			$mem = array();
			while($line = fgets($fh)) {
    				array_push($mem, explode(":", $line));
			}
			fclose($fh);
 			$totalmemory = preg_replace('/\D/', '', $mem[0][1]);
			$freememory =  preg_replace('/\D/', '', $mem[1][1]); 
			$availmemory = preg_replace('/\D/', '', $mem[2][1]);
                        $totalswap = preg_replace('/\D/', '', $mem[14][1]);
                        $freeswap = preg_replace('/\D/', '', $mem[15][1]);
                        $usedswap = preg_replace('/\D/', '', $mem[5][1]);
		?>
	<tr>
		<td valign="top" align="left">
			<font face="Arial" size="2"><b>Total Memory</b>&nbsp; &nbsp; <?php echo formatBytes($totalmemory*1024);?></font>
		</td>
		<td valign="top" align="right">
			<font face="Arial" size="2">100%</font>
		</td>
	</tr>

	<tr><td bgcolor="#000000" colspan="2"style="width: 1px; height:1px"></td></tr>

	<tr>
		<td valign="top" align="left">
			<font face="Arial" size="2">&nbsp; &nbsp;  &nbsp; Free  Memory &nbsp;<?php echo formatBytes($freememory*1024);?></font>
		</td>
		<td valign="top" align="right">
			<font face="Arial" size="2"><?php echo round($freememory *100 / $totalmemory, 2)."%";?></font>
		</td>
	</tr>

	<tr><td bgcolor="#000000" colspan="2"style="width: 1px; height:1px"></td></tr>

	<tr>
		<td valign="top" align="left">
			<font face="Arial" size="2">&nbsp; &nbsp; &nbsp; Memory Avail <?php echo formatBytes($availmemory*1024);?></font>
		</td>
		<td valign="top" align="right">
			<font face="Arial" size="2"><?php echo round($availmemory *100 / $totalmemory, 2)."%";?></font>
		</td>
	</tr>

	<tr><td bgcolor="#000000" colspan="2"style="width: 1px; height:1px"></td></tr>

	<tr>
		<td valign="top" align="left">
			<font face="Arial" size="2"><b>Total Swap</b>   &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;<?php echo formatBytes($totalswap*1024);?> </font>
		</td>
		<td valign="top" align="right">
			<font face="Arial" size="2">100%</font>
		</td>
	</tr>

	<tr><td bgcolor="#000000" colspan="2"style="width: 1px; height:1px"></td></tr>

	<tr>
		<td valign="top" align="left">
			<font face="Arial" size="2">&nbsp; &nbsp; Used Swap   &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;<?php echo formatBytes($usedswap*1024);?></font>
		</td>
		<td valign="top" align="right">
			<font face="Arial" size="2"><?php echo round($usedswap*100 / $totalswap, 2)."%";?></font>
		</td>
	</tr>

	<tr><td bgcolor="#000000" colspan="2"style="width: 1px; height:1px"></td></tr>

	<tr>
		<td valign="top" align="left">
			<font face="Arial" size="2">&nbsp; &nbsp; Free Swap  &nbsp; &nbsp;  &nbsp;<?php echo formatBytes($freeswap*1024);?></font>
		</td>
		<td valign="top" align="right">
			<font face="Arial" size="2"><?php echo round($freeswap*100 / $totalswap, 2)."%";?></font>
		</td>
	</tr>

	<tr><td bgcolor="#000000" colspan="2"style="width: 1px; height:1px"></td></tr>

	<tr>
		<td valign="top" align="left">
			<font face="Arial" size="2"><b>Active Users</b>   &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;<?php $usernum =  exec('who |cut -c 1-9 |sort -u |wc -l'); echo $usernum; ?></font>
		</td>
		<td valign="top" align="right">
			<font face="Arial" size="2"><?php $users = exec('cat /etc/passwd |grep "/bin/bash"  |cut -d: -f1 | wc -l'); echo $usernum*100/$users."%";?></font>
		</td>
	</tr>

	<tr><td bgcolor="#000000" colspan="2"style="width: 1px; height:1px"></td></tr>

	<tr>
		<td valign="top" align="left">
			<font face="Arial" size="2"><b>Total Traffic</b>  &nbsp; &nbsp; &nbsp;
				<?php 	$rx  = (trim(file_get_contents("/sys/class/net/eth0/statistics/rx_bytes"))); 
					$tx  = (trim(file_get_contents("/sys/class/net/eth0/statistics/tx_bytes")));
					$totes = $tx+$rx;
					echo formatBytes($totes); ?>
				</font>
		</td>
		<td valign="top" align="right">
			<font face="Arial" size="2">100%</font>
		</td>
	</tr>

	<tr><td bgcolor="#000000" colspan="2"style="width: 1px; height:1px"></td></tr>

	<tr>
		<td valign="top" align="left">
			<font face="Arial" size="2">&nbsp; &nbsp; Bytes In  &nbsp; &nbsp; &nbsp; &nbsp;
  			<?php echo formatBytes($rx);?></font>
		</td>
		<td valign="top" align="right">
			<font face="Arial" size="2"><?php echo round($rx *100 / $totes, 2); ?> %</font>
		</td>
	</tr>

	<tr><td bgcolor="#000000" colspan="2"style="width: 1px; height:1px"></td></tr>

	<tr>
		<td valign="top" align="left">
			<font face="Arial" size="2">&nbsp; &nbsp; Bytes Out &nbsp; &nbsp; &nbsp;
                        <?php echo formatBytes($tx);?></font>
		</td>
		<td valign="top" align="right">
			<font face="Arial" size="2"><?php echo round($tx *100 / $totes, 2); ?> %</font>
		</td>
	</tr>

	<tr><td bgcolor="#000000" colspan="2"style="width: 1px; height:1px"></td></tr>

	<tr>
		<td valign="top" align="left" colspan="2">
			<font face="Arial" size="2"><b>Uptime</b> &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; <?php
$uptime = shell_exec("cut -d. -f1 /proc/uptime");
$days = floor($uptime/60/60/24);
$hours = $uptime/60/60%24;
$mins = $uptime/60%60;
$secs = $uptime%60;
echo "$days days $hours hrs $mins mins";
?></font>
		</td>
	</tr>

	<tr><td bgcolor="#000000" colspan="2"style="width: 1px; height:5px"></td></tr>

	<tr>
		<td valign="top" align="left" colspan="2">
			<font face="Arial" size="2">* Percent Daily Values are based on total available resources, users, or bytes consumed.</font>
		</td>
	</tr>
</table>
</td></tr></table>
</td></tr></table>

<table width="250"  border="0" cellpadding="3" cellspacing="0" bgcolor="#FFFFFF">
	<tr>
		<td valign="top">
			<font face="Arial" size="1">
				CONTAINS: Carbonated Water, PHP, MySQL, Corn Syrup, Linux, HTML, JavaScript, Sodium Benzoate (Preserves Freshness), and Yellow 5.
			</font>
		</td>
	</tr>
</table>
</td></tr></table>
</body>
</html>
