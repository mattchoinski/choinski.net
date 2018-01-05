<?php 

/*
	$currentDate = time ();
	$startOfCareerDate = mktime( 0, 0, 0, 1, 1, 2001 );

	$differenceOfDates = $currentDate - $startOfCareerDate;
	$differenceExpressedAsYears = floor ( $differenceOfDates / ( 60 * 60 * 24 * 365 ) );
 */

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
    <title>Matthew Choinski - Web Developer in Baltimore, Maryland Specializing in Open Source and Microsoft Technologies.</title>
		<!--[if lt IE 9]>
		<script src="<?php echo( $urlPath ); ?>/include/script/html5shim.js"></script>
		<![endif]-->
	</head>
<?php flush(); ?>
  <body>
		<header>
			<h1>matt<span>&#64;</span>choinski<span>&#46;net</span></h1>
		</header>
		<div class="columns two">
			<section>
				<h1>Software Engineer</h1>
				<p>Accomplished software engineer with over fifteen (15) years of experience specializing in object-oriented approaches to web application development. Extensive background in full life-cycle of software development process including requirements gathering, design, coding, testing, debugging and maintenance.</p>
				<p class="hidden-phone">Experienced with:</p>
				<ul class="hidden-phone">
					<li>Microsoft .NET Frameworks</li>
					<li>Microsoft Databases (SQL Server, SQL Reports)</li>
					<li>Apache Web Server on Linux</li>
					<li>jQuery and JavaScript</li>
					<li>PHP, Python, and other open source technologies</li>
				</ul>
			</section>
		</div>
		<footer class="columns two">
			<section>
				<p>&copy; 2013 - 2018 Matthew Choinski</p>
				<p><a href="https://github.com/mattchoinski"><i class="icon-github-sign icon-2x"></i></a> <a href="http://www.linkedin.com/in/matthewchoinski"><i class="icon-linkedin-sign icon-2x"></i></a> <a href="https://twitter.com/mattchoinski"><i class="icon-twitter-sign icon-2x"></i></a></p>
			</section>
			<section>
				<p>&nbsp;</p>
			</section>
		</footer>
		<script src="<?php echo( $urlPath ); ?>/include/script/jquery.min.js"></script>
		<script src="<?php echo( $urlPath ); ?>/include/script/script.min.js" type="text/javascript"></script>
	</body>
</html> 