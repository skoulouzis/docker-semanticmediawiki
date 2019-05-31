<?php
# This file was automatically generated by the MediaWiki 1.28.3
# installer. If you make manual changes, please keep track in case you
# need to recreate them later.
#
# See includes/DefaultSettings.php for all configurable settings
# and their default values, but don't forget to make changes in _this_
# file, not there.
#
# Further documentation for configuration settings may be found at:
# https://www.mediawiki.org/wiki/Manual:Configuration_settings
# Protect against web entry
if ( !defined( 'MEDIAWIKI' ) ) {
	exit;
}
## Uncomment this to disable output compression
# $wgDisableOutputCompression = true;
$wgSitename = "TravisWiki";
## The URL base path to the directory containing the wiki;
## defaults for all runtime URL paths are based off of this.
## For more information on customizing the URLs
## (like /w/index.php/Page_title to /wiki/Page_title) please see:
## https://www.mediawiki.org/wiki/Manual:Short_URL
$wgScriptPath = "/TravisWiki";
## The URL path to static resources (images, scripts, etc.)
$wgResourceBasePath = $wgScriptPath;
## The URL path to the logo.  Make sure you change this from the default,
## or else you'll overwrite your logo when you upgrade!
$wgLogo = "$wgResourceBasePath/resources/assets/wiki.png";
## UPO means: this is also a user preference option
$wgEnableEmail = true;
$wgEnableUserEmail = true; # UPO
$wgEmergencyContact = "apache@localhost";
$wgPasswordSender = "apache@localhost";
$wgEnotifUserTalk = false; # UPO
$wgEnotifWatchlist = false; # UPO
$wgEmailAuthentication = true;
## Database settings
$wgDBtype = "mysql";
$wgDBserver = "";
$wgDBname = "its_a_mw";
$wgDBuser = "root";
$wgDBpassword = "";
# MySQL specific settings
$wgDBprefix = "";
# MySQL table options to use during installation or update
$wgDBTableOptions = "ENGINE=InnoDB, DEFAULT CHARSET=binary";
# Experimental charset support for MySQL 5.0.
$wgDBmysql5 = false;
## Shared memory settings
$wgMainCacheType = CACHE_NONE;
$wgMemCachedServers = [];
## To enable image uploads, make sure the 'images' directory
## is writable, then set this to true:
$wgEnableUploads = false;
$wgUseImageMagick = true;
$wgImageMagickConvertCommand = "/usr/bin/convert";
# InstantCommons allows wiki to use images from https://commons.wikimedia.org
$wgUseInstantCommons = false;
# Periodically send a pingback to https://www.mediawiki.org/ with basic data
# about this MediaWiki instance. The Wikimedia Foundation shares this data
# with MediaWiki developers to help guide future development efforts.
$wgPingback = false;
## If you use ImageMagick (or any other shell command) on a
## Linux server, this will need to be set to the name of an
## available UTF-8 locale
$wgShellLocale = "en_US.utf8";
## Set $wgCacheDirectory to a writable directory on the web server
## to make your wiki go slightly faster. The directory should not
## be publically accessible from the web.
#$wgCacheDirectory = "$IP/cache";
# Site language code, should be one of the list in ./languages/data/Names.php
$wgLanguageCode = "en";
$wgSecretKey = "044e3c5a4957d09f286993985838e675292f957fb506e5822b86cb835f674a76";
# Changing this will log out all existing sessions.
$wgAuthenticationTokenVersion = "1";
# Site upgrade key. Must be set to a string (default provided) to turn on the
# web installer while LocalSettings.php is in place
$wgUpgradeKey = "b658baba33853c3b";
## For attaching licensing metadata to pages, and displaying an
## appropriate copyright notice / icon. GNU Free Documentation
## License and Creative Commons licenses are supported so far.
$wgRightsPage = ""; # Set to the title of a wiki page that describes your license/copyright
$wgRightsUrl = "";
$wgRightsText = "";
$wgRightsIcon = "";
# Path to the GNU diff3 utility. Used for conflict resolution.
$wgDiff3 = "/usr/bin/diff3";
## Default skin: you can change the default skin. Use the internal symbolic
## names, ie 'vector', 'monobook':
$wgDefaultSkin = "vector";
# End of automatically generated settings.
# Add more configuration options below.
define("SMW_PHPUNIT_PULL_VERSION_FROM_GITHUB", true);
define("NS_TRAVIS", 998);
define("NS_TRAVIS_TALK", 999);
$wgExtraNamespaces[NS_TRAVIS] = "Travis";
$wgExtraNamespaces[NS_TRAVIS_TALK] = "Travis_talk";
$wgNamespacesWithSubpages[NS_TRAVIS] = true;
wfLoadExtension( "SemanticMediaWiki" );
$smwgNamespacesWithSemanticLinks = array( NS_MAIN => true, NS_FILE => true, NS_TRAVIS => true );
$smwgNamespace = "http://example.org/id/";
$smwgDefaultStore = "SMWSparqlStore";
$smwgSparqlRepositoryConnector = "Fuseki";
$smwgSparqlEndpoint["query"] = "http://localhost:3030/db/query";
$smwgSparqlEndpoint["update"] = "http://localhost:3030/db/update";
$smwgSparqlEndpoint["data"] = "";
error_reporting(E_ALL| E_STRICT);
ini_set("display_errors", 1);
$wgShowExceptionDetails = true;
$wgDevelopmentWarnings = true;
$wgShowSQLErrors = true;
$wgDebugDumpSql = false;
$wgShowDBErrorBacktrace = true;
