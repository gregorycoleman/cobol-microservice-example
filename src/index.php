<?php
/*

Cobol Microservices Example
Copyright (C) 2016 Gregory Coleman

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software Foundation,
Inc., 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301  USA
*/

/**

 * This is only an example
 * If this were a production use, you would have to include all the
 * usual things like error blocks and signal handling.

  */

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

