<?php
// Get the current protocol (http or https)
$protocol = isset( $_SERVER['HTTPS'] ) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
// Get the current domain name
$domain = $_SERVER['HTTP_HOST'];
// Get the current script name (including path) from the URL
$script = $_SERVER['SCRIPT_NAME'];
//site url
$siteURL = $protocol . '://' . $domain;
if ( $_GET["c"] ) {
    require_once "dbConfig.php";
    $code  = $_GET["c"];
    $sql   = "SELECT * FROM `short_code` WHERE short_code='{$code}'";
    $run   = mysqli_query( $db, $sql );
    $row   = mysqli_fetch_assoc( $run );
    $count = mysqli_num_rows( $run );
    if ( $count > 0 ) {
        header( "location:{$row['long_code']}" );

    } else {
        require_once "error.php";
    }
} else {
    header( "location:gen.php" );
}

?>