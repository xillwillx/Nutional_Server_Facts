

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

function formatBytes($size, $precision = 2)
{
    $base = log($size, 1024);
    $suffixes = array('', ' KB', ' MB', ' GB', ' TB');
    return round(pow(1024, $base - floor($base)), $precision) . $suffixes[floor($base)];
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
<tr><td bgcolor="#000000" colspan="2"><img src="images/spacer.gif" width="1" height="8"</td></tr>

	<tr>
		<td valign="top" colspan="2">
			<font face="Arial" size="2"><b>Amount Per Serving</b></font>
		</td>
	</tr>

	<tr><td bgcolor="#000000" colspan="2"><img src="images/spacer.gif" width="1" height="1"</td></tr>

	<tr>
		<td valign="top" align="left" colspan="2">
			<font face="Arial" size="2">Calories 
			<?php 
            echo formatBytes(dirSize("/var/www/"));
			?>
</td></tr>
	<tr>	<td valign="top" align="left">
			<font face="Arial" size="2">Daily Allowance
			<?php 
			 $ds = disk_total_space("/");
			 echo formatBytes($ds);
			?>
</font>
		
			
</font>
		</td>
	</tr>

	<tr><td bgcolor="#000000" colspan="2"><img src="images/spacer.gif" width="1" height="5"</td></tr>

	<tr>
		<td valign="top" align="right" colspan="2">
			<font face="Arial" size="2"><b>% Daily Value*</b></font>
		</td>
	</tr>

	<tr><td bgcolor="#000000" colspan="2"><img src="images/spacer.gif" width="1" height="1"</td></tr>
<?php
$fh = fopen('/proc/meminfo', 'r');
$mem = array();
while($line = fgets($fh)) {
    array_push($mem, explode(":", $line));
}
fclose($fh);

?>
	<tr>
		<td valign="top" align="left">
			<font face="Arial" size="2"><b>Total Memory</b><?php printf(" %s", $mem[0][1]);?></font>
		</td>
		<td valign="top" align="right">
			<font face="Arial" size="2">100%</font>
		</td>
	</tr>

	<tr><td bgcolor="#000000" colspan="2"><img src="images/spacer.gif" width="1" height="1"</td></tr>

	<tr>
		<td valign="top" align="left">
			<font face="Arial" size="2">&nbsp; &nbsp; Free  Memory <?php printf(" %s", $mem[1][1]);?></font>
		</td>
		<td valign="top" align="right">
			<font face="Arial" size="2">34.98%</font>
		</td>
	</tr>

	<tr><td bgcolor="#000000" colspan="2"><img src="images/spacer.gif" width="1" height="1"</td></tr>

	<tr>
		<td valign="top" align="left">
			<font face="Arial" size="2">&nbsp; &nbsp; Memory Available <?php printf(" %s", $mem[2][1]);?></font>
		</td>
		<td valign="top" align="right">
			<font face="Arial" size="2">65.02%</font>
		</td>
	</tr>

	<tr><td bgcolor="#000000" colspan="2"><img src="images/spacer.gif" width="1" height="1"</td></tr>

	<tr>
		<td valign="top" align="left">
			<font face="Arial" size="2"><b>Total Swap</b><?php printf(" %s", $mem[14][1]);?> </font>
		</td>
		<td valign="top" align="right">
			<font face="Arial" size="2">100%</font>
		</td>
	</tr>

	<tr><td bgcolor="#000000" colspan="2"><img src="images/spacer.gif" width="1" height="1"</td></tr>

	<tr>
		<td valign="top" align="left">
			<font face="Arial" size="2">&nbsp; &nbsp; Used Swap <?php printf(" %s", $mem[5][1]);?></font>
		</td>
		<td valign="top" align="right">
			<font face="Arial" size="2">0.02%</font>
		</td>
	</tr>

	<tr><td bgcolor="#000000" colspan="2"><img src="images/spacer.gif" width="1" height="1"</td></tr>

	<tr>
		<td valign="top" align="left">
			<font face="Arial" size="2">&nbsp; &nbsp; Free Swap <?php printf(" %s", $mem[15][1]);?></font>
		</td>
		<td valign="top" align="right">
			<font face="Arial" size="2">99.98%</font>
		</td>
	</tr>

	<tr><td bgcolor="#000000" colspan="2"><img src="images/spacer.gif" width="1" height="1"</td></tr>

	<tr>
		<td valign="top" align="left">
			<font face="Arial" size="2"><b>Active Users</b> <?php echo exec('who |cut -c 1-9 |sort -u |wc -l'); ?></font>
		</td>
		<td valign="top" align="right">
			<font face="Arial" size="2">200%</font>
		</td>
	</tr>

	<tr><td bgcolor="#000000" colspan="2"><img src="images/spacer.gif" width="1" height="1"</td></tr>

	<tr>
		<td valign="top" align="left">
			<font face="Arial" size="2"><b>Total Traffic</b> 590.01 MB</font>
		</td>
		<td valign="top" align="right">
			<font face="Arial" size="2">100%</font>
		</td>
	</tr>

	<tr><td bgcolor="#000000" colspan="2"><img src="images/spacer.gif" width="1" height="1"</td></tr>

	<tr>
		<td valign="top" colspan="2">
			<font face="Arial" size="2"><b>Extranet</b></font>
		</td>
	</tr>

	<tr><td bgcolor="#000000" colspan="2"><img src="images/spacer.gif" width="1" height="1"</td></tr>

	<tr>
		<td valign="top" align="left">
			<font face="Arial" size="2">&nbsp; &nbsp; Bytes In 376.68 MB</font>
		</td>
		<td valign="top" align="right">
			<font face="Arial" size="2">63.84%</font>
		</td>
	</tr>

	<tr><td bgcolor="#000000" colspan="2"><img src="images/spacer.gif" width="1" height="1"</td></tr>

	<tr>
		<td valign="top" align="left">
			<font face="Arial" size="2">&nbsp; &nbsp; Bytes Out 213.33 MB</font>
		</td>
		<td valign="top" align="right">
			<font face="Arial" size="2">36.16%</font>
		</td>
	</tr>

	<tr><td bgcolor="#000000" colspan="2"><img src="images/spacer.gif" width="1" height="1"</td></tr>

	<tr>
		<td valign="top" colspan="2">
			<font face="Arial" size="2"><b>Intranet</b></font>
		</td>
	</tr>

	<tr><td bgcolor="#000000" colspan="2"><img src="images/spacer.gif" width="1" height="1"</td></tr>

	<tr>
		<td valign="top" align="left">
			<font face="Arial" size="2">&nbsp; &nbsp; Bytes In 0.00 KB</font>
		</td>
		<td valign="top" align="right">
			<font face="Arial" size="2">0%</font>
		</td>
	</tr>

	<tr><td bgcolor="#000000" colspan="2"><img src="images/spacer.gif" width="1" height="1"</td></tr>

	<tr>
		<td valign="top" align="left">
			<font face="Arial" size="2">&nbsp; &nbsp; Bytes Out 0.00 KB</font>
		</td>
		<td valign="top" align="right">
			<font face="Arial" size="2">0%</font>
		</td>
	</tr>


	<tr><td bgcolor="#000000" colspan="2"><img src="images/spacer.gif" width="1" height="1"</td></tr>

	<tr>
		<td valign="top" align="left" colspan="2">
			<font face="Arial" size="2"><b>Uptime</b> <?php
$uptime = shell_exec("cut -d. -f1 /proc/uptime");
$days = floor($uptime/60/60/24);
$hours = $uptime/60/60%24;
$mins = $uptime/60%60;
$secs = $uptime%60;
echo "$days days $hours hrs $mins mins";
?></font>
		</td>
	</tr>

	<tr><td bgcolor="#000000" colspan="2"><img src="images/spacer.gif" width="1" height="5"</td></tr>

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
