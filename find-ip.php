
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
					if(validate_ip($ip)) {
						return $ip;
					}

				}
			}
		}
		return '';
	}

function validate_ip($ip) {
	if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 | FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) === false) {
		return false;
	} else {
		return true;
	}
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

