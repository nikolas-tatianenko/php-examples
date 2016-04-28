<?php
chdir(dirname(__DIR__));
header('content-type:plaintext');
require_once 'vendor/autoload.php';

use GuzzleHttp\Pool;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
// Time of script.
$time = time();
$client = new Client();
try {
	// Request function.
  $requests = function ($total, $params) use ($client) {
    $uri = 'http://php-technologies/guzzle/actions/create_file.php';

    for ($i = 0; $i < $total; $i++) {
      $sleep = rand(0, 20);
	  // Parameters, that will be send.
      $options = [
        'multipart' => [
          [
            'name' => 'sleep',
            'contents' => (string)$sleep,
          ],
		    [
            'name' => 'test',
            'contents' => 'testtext',
          ],
        ]
      ];
      yield function () use ($client, $uri, $options) {
        // $client->request('POST', $uri, $options);
        return $client->postAsync($uri, $options);
      };
    }
  };
$response_array=array();
$count_of_requests = 100;
$params = array(
	'my_params'=>'test',
);
  $pool = new Pool($client, $requests($count_of_requests, $params), [
    'concurrency' => 25,
    'fulfilled' => function ($response, $index) {
		 $response_array[$index] = $response->getStatusCode();
    },
    'rejected' => function ($reason, $index) {
		$response_array[$index] = $response->getStatusCode();
      // this is delivered each failed request
    },
  ]);

  // Initiate the transfers and create a promise
  $promise = $pool->promise();

  // Force the pool of requests to complete.
  $promise->wait();

  print '<pre>';
  print_r($response_array);
  print '</pre>';
  
  print time() - $time;
}
catch (RequestException $e) {
  echo $e->getRequest();
  if ($e->hasResponse()) {
    echo $e->getResponse();
  }
}


