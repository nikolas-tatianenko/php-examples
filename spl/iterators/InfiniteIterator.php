<?php
header('content-type:plaintext');
$obj = new stdClass();
$obj->Mon = "Monday";
$obj->Tue = "Tuesday";
$obj->Wed = "Wednesday";
$obj->Thu = "Thursday";
$obj->Fri = "Friday";
$obj->Sat = "Saturday";
$obj->Sun = "Sunday";

$infinate = new InfiniteIterator(new ArrayIterator($obj));
foreach ( new LimitIterator($infinate, 0, 14) as $value ) {
  echo $value, PHP_EOL;
}
