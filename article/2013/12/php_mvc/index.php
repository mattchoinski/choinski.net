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
		<meta content="The PHP MVC Pattern allows developers to quickly create robust, modern web-based applications." name="description">
		<meta content="Matthew Choinski" name="author">
		<meta content="Matthew Choinski, Matt Choinski, PHP, MVC" name="keywords">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="<?php echo( $urlPath ); ?>/include/style/screen.css" media="screen" rel="stylesheet">
		<!--[if lt IE 9]>
		<link href="<?php echo( $urlPath ); ?>/include/style/screen_ie.css" media="screen" rel="stylesheet">
		<![endif]-->
		<link rel="stylesheet" href="<?php echo( $urlPath ); ?>/include/style/font-awesome.min.css">
		<!--[if IE 7]>
		  <link rel="stylesheet" href="<?php echo( $urlPath ); ?>/include/style/font-awesome-ie7.min.css">
		<![endif]-->
        <title>Matthew Choinski - PHP MVC Pattern</title>
		<!--[if lt IE 9]>
		<script src="<?php echo( $urlPath ); ?>/include/script/html5shim.js"></script>
		<![endif]-->
    </head>
<?php flush(); ?>
    <body>
		<header>
			<h1><a href="<?php echo( $urlPath ); ?>/">matt<span>&#64;</span>choinski<span>&#46;net</span></a></h1>
		</header>
		<div class="columns two offset">
			<section>
				<h1>PHP MVC Pattern</h1>
				<p>Originally, this pattern was developed as a way to learn PHP. However, it has grown and matured into a way to develop robust, modern web-based applications (such as the <a href="https://github.com/mattchoinski/employee-database.choinski.net">"employee-database"</a> web application).</p>
				<h2>What it is</h2>
				<p>The PHP MVC Pattern is a <em>pattern</em> and not a <em>framework</em>. This pattern simply provides a way to develop a web-based applications using the <a href="http://en.wikipedia.org/wiki/Model%E2%80%93view%E2%80%93controller">Model-View-Controller (MVC)</a> software architecture pattern. This pattern requires <a href="http://www.php.net/">PHP</a> version 5.3 (or greater).</p>
				<p>
					This pattern contists of the following elements:
					<ul>
						<li>Routing</li>
						<li>Controller</li>
						<li>Model</li>
						<li>View</li>
					</ul>
				</p>
				<h2>Routing</h2>
				<p>The <em>routing</em> of requests is handled by the web server (through a configuration file, such as a <em>.htaccess</em> or <em>VirtualHost</em> file).  The routing rules can be as basic as the following example:</p>
				<pre><code>
RewriteEngine On

RewriteRule ^([\w]+)/$                      /path/to/controller/$1.php
RewriteRule ^([\w]+)/([\w]+)/$              /path/to/controller/$1.php?action=$2
RewriteRule ^([\w])/([\w])/([0-9]{1,10}/$   /path/to/controller/$1.php?action=$2&id=$3
				</code></pre>
				<p>In this routing rules example, the first matching group <code>(([\w]+))</code> refers to the <em>Model</em>; the second matching group <code>(([\w]+))</code> refers to the <em>Action</em> to be performed on the <em>Model</em>; and the last matching group <code>(([0-9]{1,10})</code> refers to an <em>Id</em> of a <em>Model</em> record.</p>
				<p>For example, a URL of <code>http://myapp.com/person/show/1/</code> is routed to the <em>Person Controller</em>, which calls the <em>Show Action</em> to display a <em>View</em> containing a <em>Person</em> record with an <em>Id</em> of "1".</p>
				<h2>Controller</h2>
				<p>The <em>Controller</em> processes the routing request and displays a <em>View</em> containing a <em>Model</em> object (or objects). The following is an example of a <em>Controller</em>:</p>
				<pre><code>
&#60;&#63;php

namespace MattChoinski\MyApp\Controller
{
        require_once( realpath( $_SERVER[ "DOCUMENT_ROOT"] ) . "/controller/base.php" );

        use \MattChoinski\MyApp\Model as Model;

        class Person extends Base
        {
            public function Edit()
            {
                $person = Model\Person::FetchById();

                require_once( DOCUMENT_ROOT . "/view/person/form.php" );
            }

            public function List()
            {
                $personCollection = Model\Person::FetchAll();

                require_once( DOCUMENT_ROOT . "/view/person/list.php" );
            }

            public function Set()
            {
                Model\Person::Set();

                header( "Location: /person/" );
            }

            public function Show()
            {
                $person = Model\Person::FetchById();

                require_once( DOCUMENT_ROOT . "/view/person/show.php" );
            }
        }
}

namespace
{
    $action = (
        isset( $_GET[ "action" ] )
            ? $_GET[ "action" ]
            : "List" );
    $controller = new MattChoinski\MyApp\Controller\Person();

    call_user_func( array( $controller, $action ) );
}
				</code></pre>
				<p>This example <em>Controller</em> contains a few <em>Actions</em> ("Edit", "List", "Set" and "Show"). (This example <em>Controller</em> extends a <em><a href="https://raw.github.com/mattchoinski/employee-database.choinski.net/master/controller/base.php">Base Controller</a></em>, which simply provides common functionality to all <em>Controllers</em>.)</p>
				<p>It is important to note that there is a "default" namespace that instantiates the <em>Controller</em> - with the appropriate <em>Action</em> - through the <code>call_user_func</code> function.</p>
				<p>The requested (or defaulted) <em>Action</em> then calls the appropriate <em>Model</em> (or <em>Models</em>) and passes the data (or data collections) to a <em>View</em>.</p>
				<h2>Model</h2>
				<p>The <em>Model</em> simply encapsulates the business logic and data management, as shown in the following example:</p>
				<code><pre>
&#60;&#63;php

namespace MattChoinski\MyApp\Model
{
    require_once( realpath( $_SERVER[ "DOCUMENT_ROOT" ] ) . "/model/base.php" );

    class Person extends Base
    {
        private static $dataQuery = <<<DataQuery
SELECT Id
      ,DateCreated
      ,Email
      ,NameFirst
      ,NameLast
  FROM Person
DataQuery;

        public $Email;
        public $NameFirst;
        public $NameLast;


        public static function FetchAll( )
        {
            return self::Fetch( self::$dataQuery ) );
        }

        public static function FetchById(
            $id = null )
        {
            $result = null;

            if ( !isset( $id ) )
            {
                $id = $_GET[ "id" ];
            }
            $dataCriteria = <<<DataCriteria
 WHERE a.Id = $id;
DataCriteria;
            $modelCollection =
                self::Fetch(
                    self::$dataQuery
                    . $dataCriteria ) );
            if ( !empty( $modelCollection[ 0 ] ) )
            {
                $result = $modelCollection[ 0 ];
            }

            return $result;
        }

        private static function Insert(
            $model )
        {
            $dataQuery = <<<DataQuery
INSERT
  INTO Employee
       (
         Email
        ,NameFirst
        ,NameLast
       )
VALUES
       (
         '{$model->Email}'
        ,'{$model->NameFirst}'
        ,'{$model->NameLast}'
       );
DataQuery;

            return parent::Execute( $dataQuery );
        }

        public static function Set()
        {
            $result = 0;

            $model = new Person();
            $model->Id =
                filter_input(
                    INPUT_POST,
                    "id",
                    FILTER_SANITIZE_NUMBER_INT );
            $model->Email =
                filter_input(
                    INPUT_POST,
                    "email",
                    FILTER_SANITIZE_STRING );
            $model->NameFirst =
                filter_input(
                    INPUT_POST,
                    "name_first",
                    FILTER_SANITIZE_STRING );
            $model->NameLast =
                filter_input(
                    INPUT_POST,
                    "name_last",
                    FILTER_SANITIZE_STRING );
            if ( $model->Id == 0 )
            {
                $result = self::Insert( $model );
            }
            else
            {
                self::Update( $model );
                $result = $model->Id;
            }

            return $result;
        }

        private static function Update(
            $model )
        {
            $dataQuery = <<<DataQuery
UPDATE Person
   SET CreatedById = {$_SESSION[ "id" ]}
      ,Email = '{$model->Email}'
      ,NameFirst = '{$model->NameFirst}'
      ,NameLast = '{$model->NameLast}'
 WHERE Id = {$model->Id};
DataQuery;

            parent::Execute( $dataQuery );
        }
    }
}
				</code></pre>
				<p>This example <em>Model</em> extends a <em><a href="https://raw.github.com/mattchoinski/employee-database.choinski.net/master/model/base.php">Base Model</a></em>, which simply provides common functionality, such as data binding to objects, to all <em>Models</em>.</p>
				<h2>View</h2>
				<p>The <em>View</em> simply handles the display of an object (or a collection of objects), as shown in the following example:</p>
				<code><pre>
&#60;&#63;php

require_once( DOCUMENT_ROOT . "/include/script/header.php" );

&#63;&#62;
        &#60;section&#62;
            &#60;h1&#62;All Employees&#60;/h1&#62;
            &#60;br /&#62;&#60;br /&#62;
&#60;&#63;php

if ( !empty( $peopleCollection ) )
{
    foreach( $peopleCollection as $person )
    {
        echo &#60;&#60;&#60;Html
            &#60;a href="/person/edit/{$person->Id}/">{$person->NameLast}, {$person->NameFirst}&#60;/a&#62;&#60;br /&#62;
Html;
    }
}

&#63;&#62;
        &#60;/section&#62;
&#60;&#63;php

require_once( DOCUMENT_ROOT . "/include/script/footer.php" );

				</code></pre>
				<p>It is important to note that the <em>View</em>, as shown in the above example, does not directly interact with the <em>Model</em>. Instead, the <em>View</em> receives <em>Model</em> data from the <em>Controller</em>.</p>
			</section>
			<section>
				&nbsp;
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
