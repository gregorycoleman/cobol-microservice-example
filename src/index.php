<?php
/**
 * This is only an example
 * If this were a production use, you would have to include all the
 * usual things like error blocks and signal handling.

  */

//print_r($_SERVER) ;
$method = "GET" ;   // default to GET if calling from command  line

if (isset($_SERVER['REQUEST_METHOD'])) {
    $method = $_SERVER['REQUEST_METHOD'];       //* save the request

}
if (isset($_SERVER['QUERY_STRING'])) {

    $query_string = filter_var($_SERVER['QUERY_STRING'], FILTER_SANITIZE_STRING);
    parse_str($query_string, $parameters);

    // This is where you would further sanitize your inputs
}

$_response = "{ ok : 0 }" ;
switch ($method) {
case 'GET':
    if (!file_exists ( "/service/JSONTest" )) {
        $_response = '{ ok : 0, text: "Could not find JSONTest, did you compile?" }' ;
    } else {
        $_response = exec("/service/JSONTest"); // you could also use  backticks
    }
    break;
case 'PUT':
    break;
case 'POST':
    break;
case 'DELETE':
    break;
}

echo $_response ;

