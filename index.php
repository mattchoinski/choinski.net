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
		<meta content="Matthew Choinski is a web developer specializing in Open Source and Microsoft Technologies. Call 410-541-6736." name="description">
		<meta content="Matthew Choinski" name="author">
		<meta content="Matthew Choinski, Matt Choinski, Freelance, Freelance Web Developer, Web Developer, Open Source, LAMP, Linux, Apache, MySQL, PHP, Python, jQuery" name="keywords">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="<?php echo( $urlPath ); ?>/include/style/screen.css" media="screen" rel="stylesheet">
		<!--[if lt IE 9]>
		<link href="<?php echo( $urlPath ); ?>/include/style/screen_ie.css" media="screen" rel="stylesheet">
		<![endif]-->
		<link rel="stylesheet" href="<?php echo( $urlPath ); ?>/include/style/font-awesome.min.css">
		<!--[if IE 7]>
		  <link rel="stylesheet" href="<?php echo( $urlPath ); ?>/include/style/font-awesome-ie7.min.css">
		<![endif]-->
        <title>Matthew Choinski - Web Developer in Baltimore, Maryland Specializing in Open Source and Microsoft Technologies.</title>
		<!--[if lt IE 9]>
		<script src="<?php echo( $urlPath ); ?>/script/shim_html5.js"></script>
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
				<p>Accomplished software engineer with over ten (10) years of experience specializing in object-oriented approaches to web application development. Extensive background in full life-cycle of software development process including requirements gathering, design, coding, testing, debugging and maintenance. <!--Proven track record of designing and implementing flexible solutions which support frequent UI and functionality changes.--></p>
				<p>
					Experienced with:
					</p><ul>
						<li>Microsoft .NET Frameworks</li>
						<li>Microsoft Databases (SQL Server, SQL Reports)</li>
						<li>Apache Web Server on Linux</li>
						<li>jQuery and JavaScript</li>
						<li>PHP, Python and other open source technologies</li>
					</ul>
				</p>
				<p>Founded MessagingReminder.com, LLC, which provided a service that synchronized your Microsoft Outlook Calendar with your mobile phone via text messaging. The service supported several hundred users.</p>
				<p>Call me at <em>410-541-6736</em> or <a href="http://www.linkedin.com/in/matthewchoinski">view my experiences</a>.</p>
			</section>
			<section>
				&nbsp;
<!--
That’s a very limited life. Life can be much broader, once you discover one simple fact, and that is that everything around you that you call life was made up by people that were no smarter than you. And you can change it, you can influence it, you can build your own things that other people can use. Once you learn that, you’ll never be the same again. - Steve Jobs (http://www.youtube.com/watch?feature=player_embedded&v=kYfNvmF0Bqw)
-->
			</section>
		</div>
		<footer class="columns two">
			<section>
				<p>&copy; 2013 Matthew Choinski</p>
				<p><a href="https://github.com/mattchoinski"><i class="icon-github-sign icon-2x"></i></a> <a href="http://www.linkedin.com/in/matthewchoinski"><i class="icon-linkedin-sign icon-2x"></i></a> <a href="https://twitter.com/mattchoinski"><i class="icon-twitter-sign icon-2x"></i></a></p>
			</section>
			<section>
				<p>&nbsp;</p>
			</section>
		</footer>
		<script src="<?php echo( $urlPath ); ?>/include/script/jquery.min.js"></script>
		<script src="<?php echo( $urlPath ); ?>/include/script/script.js" type="text/javascript"></script>
	</body>
</html>