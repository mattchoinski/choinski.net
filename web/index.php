<?php 

$urlPath =
	( !empty( $_SERVER[ "HTTPS" ] )
		&& $_SERVER[ "HTTPS" ] == "on"
			? "https://"
			: "http://" )
	. $_SERVER[ "SERVER_NAME" ];

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta content="Matthew Choinski is a web developer specializing in Open Source and Microsoft Technologies." name="description">
		<meta content="Matthew Choinski" name="author">
		<meta content="Matthew Choinski, Matt Choinski, Freelance, Freelance Web Developer, Web Developer, Open Source, LAMP, Linux, Apache, MySQL, PHP, Python, jQuery" name="keywords">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="<?php echo( $urlPath ); ?>/include/style/screen.min.css" media="screen" rel="stylesheet">
		<!--[if lt IE 9]>
		<link href="<?php echo( $urlPath ); ?>/include/style/screen_ie.min.css" media="screen" rel="stylesheet">
		<![endif]-->
		<title>Matthew Choinski - Software Developer in Maryland Specializing in Open Source and Microsoft Technologies.</title>
		<!--[if lt IE 9]>
		<script src="<?php echo( $urlPath ); ?>/include/script/html5shim.js"></script>
		<![endif]-->
	</head>
<?php flush(); ?>
  <body>
		<header>
			<h1>matt&#64;choinski&#46;net</h1>
		</header>
		<div class="columns two">
			<section>
				<h1>Software Engineer</h1>
				<p>Accomplished software developer with over fifteen (15) years of experience specializing in object-oriented approaches to web application development. Extensive background in full life-cycle of software development process including requirements gathering, design, coding, testing, debugging, and maintenance.</p>
				<p>Experienced with:</p>
				<ul>
					<li>Microsoft .NET Frameworks</li>
					<li>Microsoft Databases (SQL Server, SQL Reports)</li>
					<li>Apache Web Server on Linux</li>
					<li>jQuery and JavaScript</li>
					<li>MongoDB</li>
					<li>PHP, Python, and other open source technologies</li>
				</ul>
			</section>
		</div>
		<footer class="columns">
			<section>
				<p>&copy; 2013 - 2019 Matthew Choinski</p>
			</section>
		</footer>
		<script src="<?php echo( $urlPath ); ?>/include/script/script.adjust.min.js"></script>
	</body>
</html> 