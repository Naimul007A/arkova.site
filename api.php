 <?php
header( "Access-Control-Allow-Origin: *" );
header( "Access-Control-Allow-Methods: GET, POST, OPTIONS" );
header( "Access-Control-Allow-Headers: Content-Type, Authorization" );
header( "Content-Type:application/json" );
if ( isset( $_REQUEST["url"] ) ) {
    ///if code extis array goto shortener
    require_once "dbConfig.php";
    $n = 7;
    function getName( $n ) {
        $characters   = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';

        for ( $i = 0; $i < $n; $i++ ) {
            $index = rand( 0, strlen( $characters ) - 1 );
            $randomString .= $characters[$index];
        }

        return $randomString;
    }

    $code = getName( $n );
    // Get the current protocol (http or https)
    $protocol = isset( $_SERVER['HTTPS'] ) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';

// Get the current domain name
    $domain = $_SERVER['HTTP_HOST'];

// Get the current script name (including path) from the URL
    $script = $_SERVER['SCRIPT_NAME'];

// Combine the protocol, domain, and script to form the full site URL
    $siteURL  = $protocol . '://' . $domain;
    $shortUrl = $siteURL . "/" . $code;

    $orginal = $_REQUEST["url"];
    $sql     = "INSERT INTO `short_code`(`short_code`, `long_code`, `full_url`) VALUES ('{$code}','{$orginal}','{$shortUrl}')";
    $run     = mysqli_query( $db, $sql );
    response( 'Success', 'Url Short successfully.', "200", $code );
} else {
    response( 'Error', 'Invalid Request', "400", Null );
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