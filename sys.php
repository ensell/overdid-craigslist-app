<?
// Global definitions
define("APPNAME", 'OverDid Craigslist');

// Load all PHP files from includes directory
foreach ( glob("includes/*.php") as $filename )
	require_once $filename;
	
