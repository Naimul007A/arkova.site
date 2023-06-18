<?php
header( "Access-Control-Allow-Origin: *" );
header( "Access-Control-Allow-Methods: GET, POST, OPTIONS" );
header( "Access-Control-Allow-Headers: Content-Type, Authorization" );
header( "Content-Type:application/json" );
if ( $_GET["code"] ) {
    require_once "dbConfig.php";
    $code  = $_GET["code"];
    $sql   = "SELECT * FROM `short_code` WHERE short_code='{$code}'";
    $run   = mysqli_query( $db, $sql );
    $row   = mysqli_fetch_assoc( $run );
    $count = mysqli_num_rows( $run );
    $code  = $row['short_code'];
    if ( $count > 0 ) {
        response( 'Success', "Record Found", 200, $code );
    } else {
        response( 'Error', 'invalid id', "200", null );
    }
} else {
    response( 'Error', 'invalid id', "400", Null );
}
function response( $status, $message, $response_code, $code ) {
    $response['status']        = $status;
    $response['message']       = $message;
    $response['response_code'] = $response_code;
    $response['shortCode']     = $code;

    $json_response = json_encode( $response );
    print_r( $json_response );
}
?>