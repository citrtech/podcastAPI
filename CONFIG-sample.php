<?php
//podcast config - directory paths, db credentials, etc...


$archive_tool_url = 'http://archive.citr.ca';
$archive_access_url = $archive_tool_url.
    "/py-test/archbrad/download?archive=%2Fmnt%2Faudio-stor%2Flog";

// new version (using ftp to put podcast audio
$ftp_url = '';
$ftp_user = '';  $ftp_pass = '';
$ftp_path = '/mnt/Audio/audio/';


$djland_db_address = '';
$djland_db_username = '';
$djland_db_password = '';
$djland_db_dbname = '';

$db = mysqli_connect($djland_db_address,$djland_db_username,$djland_db_password,$djland_db_dbname);

$timezone = 'America/Vancouver';
date_default_timezone_set($timezone);

// old version (using file access to put podcast audio somewhere)

$audio_dir = 'podcast-media/audio/';//'\\\\PODCAST\\Audio\\audio\\new\\';

//*******************************************
//*******************************************
//*******************************************

?>