<?php
/**
 * Created by PhpStorm.
 * User: Michael
 * Date: 10/2/2018
 * Time: 22:59
 */

$body = file_get_contents('php://input');

$url = 'https://measstudentapi:measstudentapi@webservices.collegenet.com/r25ws/wrd/northwestern/run/space_avail.xml';

// use key 'http' even if you send the request to https://...
$options = array(
    'http' => array(
        'header'  => array(
            'Content-type: text/xml'
        ),
        'method'  => 'POST',
        'content' => $body
    )
);
$context  = stream_context_create($options);
$result = file_get_contents($url, false, $context);
echo(header('content-type: text/xml'));
echo $result;