<?php
//podcast config - directory paths, db credentials, etc...


$archive_tool_url = 'http://archive.citr.ca';
$archive_access_url = $archive_tool_url.
"/py-test/archbrad/download?archive=%2Fmnt%2Faudio-stor%2Flog";

$timezone = 'America/Vancouver';

$audio_dir = 'podcast-media/audio/';//'\\\\PODCAST\\Audio\\audio\\new\\';

$podcast_xml_dir = 'podcasting-media/xml/'; // destination - final location for our podcast files
$podcast_xml_import_dir = 'burli-xml/'; // one-time use to import xml from burli into db

// the citr podcaster makes a request to the URL specified here.  The
// file at this location should reside on a server with storage space 
// dedicated to storing large amounts of audio.
// for this to work, add the following line to your /etc/hosts file:
// 127.0.0.1       djland.local
// also edit your server settings to point djland.local 
// to the djland root directory
$podcast_media_dir = 'http://djland.local/podcasting/podcast-media/';
$podcast_create_file_api = $podcast_media_dir.'create_audio_file.php';


date_default_timezone_set($timezone);
//*******************************************
//*******************************************
//*******************************************

?>