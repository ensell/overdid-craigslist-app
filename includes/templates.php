<?
//require_once('sys.php');

function showHeader($page = "") {
?>
<!DOCTYPE html>

<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">
	
	<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no" />
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta name="apple-mobile-web-app-status-bar-style" content="black" />  
	
	<!-- For non-Retina iPhone, iPod Touch, and Android 2.2+ devices: -->
	<link rel="apple-touch-icon" href="//dummyimage.com/57x57.png" />
	<!-- For first-generation iPad: -->
	<link rel="apple-touch-icon" sizes="72x72" href="//dummyimage.com/72x72.png" />
	<!-- For iPhone 4/4s/5 with high-resolution Retina display: -->
	<link rel="apple-touch-icon" sizes="114x114" href="//dummyimage.com/114x114.png" />
	<!-- For fourth-generation Retina iPad: -->
	<link rel="apple-touch-icon" sizes="144x144" href="//dummyimage.com/114x114.png" />

	<meta name="apple-mobile-web-app-title" content="<?=APPNAME?>" />

	<title><?=APPNAME?> <?=($page) ? "- $page" : ""; ?></title>

	<link type="text/css" href="css/reset.css" rel="stylesheet">

	<!-- Libraries -->
	<script type='text/javascript' src='js/libs/jquery.js'></script>
	<script type='text/javascript' src='js/libs/jquery.ui.js'></script>
	<script type='text/javascript' src='js/libs/require.js'></script>

	<!-- Controllers -->
	<script type='text/javascript' src='js/global.js'></script>
	<? 
	// Load per page controller
	if (file_exists( $filename = 'js/controllers/' . strtolower( $page ) . '.js' ) ) 
		echo "<script type='text/javascript' src='$filename'></script>";
	?>
</head>
<body>
<?
}

function showFooter() {
?>
</body>
</html>
<?
}