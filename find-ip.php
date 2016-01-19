
<!--	//returns first forwarded IP match it finds-->

<?php
	function forwarded_ip() {
		$keys = array(
			'HTTP_X_FORWARDED_FOR',
			'HTTP_X_FORWARDED',
			'HTTP_FORWARDED_FOR',
			'HTTP_FORWARDED',
			'HTTP_CLIENT_IP',
			'HTTP_X_CLUSTER_CLIENT-IP',
		);

		foreach($keys as $key) {
			if(isset($_SERVER[$key])) {
				$ip_array = explode(',', $_SERVER[$key]);
				foreach($ip_array as $ip) {
					$ip = trim($ip);
						return $ip;
				}
			}
		}
		return '';
	}

$remote_ip = $_SERVER['REMOTE_ADDR'];
$forwarded_ip = forwarded_ip();

	?>

	Your IP address is: <?php echo($_SERVER['REMOTE_ADDR']); ?><br/>
	<br/>
	<?php if($forwarded_ip != '') {?>
	Forwarded For: <?php echo $forwarded_ip; ?><br/>
	<br/>
<?php } ?>




<!--//to get all info from the server global-->
<pre>
Your server info is:
<?php
print_r($_SERVER);
?>
</pre>
