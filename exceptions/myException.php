<?php
header('content-type:plantext');
/**
 * Exception function.
 *
 * Get all uncatched values.
 *
 * @argument Exception $exception
 * Exception object.
 */

function myTestException(Exception $exception) {
  echo "<strong>Exception:</strong> ", $exception->getMessage(), PHP_EOL;
  // Return trace
  print_r($exception->getTrace());
}

set_exception_handler('myTestException');


function f1(array &$a) {
  $a[]=rand(0,10);
  throw new Exception('test',0);
}

$a = array();
print ' test1';
f1($a);
f1($a);
f1($a);

print_r($a);
print ' test2';