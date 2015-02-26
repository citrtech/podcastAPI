<?php

header('access-control-allow-origin: *');
require_once('CONFIG.php');

$ftp_url = '192.168.25.79';
$ftp_user = '******';
$ftp_pass = '******';

error_reporting(E_ALL);
$error = '';

if ( isset($_GET['start']) && isset($_GET['end']) && isset($_GET['show']) ){
} else {
  $error = "Incorrect GET parameters have been supplied.  I need 'start', 'end', and 'show'.  'start' and 'end' must be unix timestamps (PHP style - seconds, not milliseconds).  ";
//	header('HTTP/1.0 400 '.$error);
}
date_default_timezone_set($timezone);

$start = $_GET['start'];
$end = $_GET['end'];
$show = $_GET['show'];

$start_date =  date('d-m-Y+G%3\Ai%3\As', $start);
$end_date =  date('d-m-Y+G%3\Ai%3\As', $end);

$archive_url = $archive_access_url.
    "&startTime=".
    $start_date.
    "&endTime=".
    $end_date;

$ftp_connection = ftp_connect($ftp_url);

  if(!$ftp_connection){
    $error .= 'cannot connect to ftp server. ';
  }

if ($error==''){
  $logged_in = ftp_login($ftp_connection, $ftp_user ,$ftp_pass);

  if(!$logged_in){
    $error .= 'could not login to ftp server. ';
  }
}

if ($error==''){
  $new_podcast_audio_file = file_get_contents($archive_url); // use to test:  file_get_contents('http://maltinerecords.cs8.biz/111/03.mp3');

  if(strlen($new_podcast_audio_file) <=0 ){
    $error .=  'Cannot retrieve audio from archiver at '.$archive_url.'.  ';
  }

}

if ($error=='') {
  $file_name = $show.'-'.$start.'-'.$end.'.mp3';

  $fp = fopen('php://temp', 'r+');

  $num_bytes = fwrite($fp, $new_podcast_audio_file);
  rewind($fp);

  if ($num_bytes < 16){
    $error .= 'Error writing file to temp '.$audio_dir.$file_name.' ('.$num_bytes.').  ';
  }
  ftp_fput($ftp_connection, $file_name, $fp, FTP_ASCII);
}


if($error != ''){
  header('HTTP/1.0 400 '.$error);
} else {
  echo json_encode(
      ['filename' => $file_name,
          'size' => $num_bytes,
          'start' => $start_date,
          'end' => $end_date]
  );
}

?>