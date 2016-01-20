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
			<p><strong>Request Time: </strong><?php echo($_SERVER['REQUEST_TIME']); ?> </p>
			<p><strong>Request URI: </strong><?php echo($_SERVER['REQUEST_URI']); ?> </p>
			<p><strong>Request Method: </strong><?php echo($_SERVER['REQUEST_METHOD']); ?> </p>
			<p><strong>Query String: </strong><?php echo($_SERVER['QUERY_STRING']); ?> </p>
			<p><strong>HTTP Accept: </strong><?php echo($_SERVER['HTTP_ACCEPT']); ?> </p>
			<p><strong>Accept Charset: </strong><?php echo $_SERVER['HTTP_ACCEPT_CHARSET']; ?> </p>
			<p><strong>Accept Encoding: </strong><?php echo($_SERVER['HTTP_ACCEPT_ENCODING']); ?> </p>
			<p><strong>Accept Language: </strong><?php echo($_SERVER['HTTP_ACCEPT_LANGUAGE']); ?> </p>
			<p><strong>HTTPS?: </strong><?php if(isset($_SERVER['HTTPS'])) {echo "Yes";}
					else
					{echo "No";} ?> </p>
			<p><strong>Remote Port: </strong><?php echo($_SERVER['REMOTE_PORT']); ?> </p>


		</div>
	</body>
</html>