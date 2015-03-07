<?php
//podcast config - directory paths, db credentials, etc...


$archive_tool_url = 'http://archive.citr.ca';
$archive_access_url = $archive_tool_url.
"/py-test/archbrad/download?archive=%2Fmnt%2Faudio-stor%2Flog";

// new version (using ftp to put podcast audio 
$ftp_url = '192.168.25.79';
$ftp_user = 'user';  $ftp_pass = 'pass';
$ftp_path = '/path/to/audio/';









$timezone = 'America/Vancouver';
date_default_timezone_set($timezone);

// old version (using file access to put podcast audio somewhere)

$audio_dir = 'podcast-media/audio/';//'\\\\PODCAST\\Audio\\audio\\new\\';

$podcast_xml_dir = 'podcasting-media/xml/'; // destination - final location for our podcast files
$podcast_xml_import_dir = 'burli-xml/'; // one-time use to import xml from burli into db



//*******************************************
//*******************************************
//*******************************************

?>