<link type="text/css" rel="stylesheet" href="css/style.css">

<!--	//returns first forwarded IP match it finds-->

<?php
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Browser Mirror</title>
	</head>
	<body>
		<div id="main-content">
			<h1>Browser Mirror</h1>
			<p><strong>Remote IP: </strong><?php echo($_SERVER['REMOTE_ADDR']); ?> </p>
			<p><strong>User Agent: </strong><?php echo($_SERVER['HTTP_USER_AGENT']); ?> </p>
			<p><strong>Referrer: </strong><?php echo($_SERVER['HTTP_REFERER']); ?> </p>
			<p><strong>Request Time: </strong>
				<?php //my version working it out
				$date = ($_SERVER['REQUEST_TIME']); //pulls the time from the server
				$format= 'l, F j, Y g:ia'; //formats the time day, month, date, year, time, am/pm
				//timezone needs to be declared if not in php.ini file use dat.timezone = "America/New_York"
				echo date($format, $date); // outputs the time
				 ?> </p>
			<?php date_default_timezone_set("American/New_York"); //not needed on my server but here for an example ?>
			<p><strong>Request Time: </strong>
				<?php //the much better version form the tutorial
				echo date('l, F j, Y g:ia', $_SERVER['REQUEST_TIME']);
				?> </p>
			<p><strong>Request URI: </strong><?php echo($_SERVER['REQUEST_URI']); ?> </p>
			<p><strong>Request Method: </strong><?php echo($_SERVER['REQUEST_METHOD']); ?> </p>
			<p><strong>Query String: </strong><?php echo($_SERVER['QUERY_STRING']); ?> </p>
			<p><strong>HTTP Accept: </strong><?php echo($_SERVER['HTTP_ACCEPT']); ?> </p>
			<p><strong>Accept Charset: </strong><?php echo $_SERVER['HTTP_ACCEPT_CHARSET']; ?> </p>
			<p><strong>Accept Encoding: </strong><?php echo($_SERVER['HTTP_ACCEPT_ENCODING']); ?> </p>
			<p><strong>Accept Language: </strong><?php echo($_SERVER['HTTP_ACCEPT_LANGUAGE']); ?> </p>
			<p><strong>HTTPS?: </strong>
				<?php if(isset($_SERVER['HTTPS'])) { //asks if server is using HTTPS
					echo "Yes";} // if it is Yes is output
					else {
						echo "No";} //if it is not set as https No is output ?> </p>
			<p><strong>Remote Port: </strong><?php echo($_SERVER['REMOTE_PORT']); ?> </p>


		</div>
	</body>
</html>