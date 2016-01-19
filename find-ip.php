Your IP address is: <?php echo($_SERVER['REMOTE_ADDR']); ?>

<!--//to get all info from the server global-->
<pre>
Your server info is:
	<?php
	print_r($_SERVER);
	?>

<!--	//returns first forwarded IP match it finds-->
	What is my IP proxy:
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
		return 'None';
	}

	echo forwarded_ip()
	?>
</pre>
<!--/**-->
<!-- * Created by PhpStorm.-->
<!-- * User: Tamra-->
<!-- * Date: 1/19/2016-->
<!-- * Time: 10:55 AM-->
<!-- */-->