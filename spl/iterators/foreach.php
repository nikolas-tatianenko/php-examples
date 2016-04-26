<?php
header('content-type:plaintext');
$memory_limit0 = memory_get_usage();
$array = range(0,100);

$memory_limit = memory_get_usage();
echo $memory_limit-$memory_limit0;
echo '-----------------------------------------------------------------';
echo PHP_EOL;
echo 'Read';
echo PHP_EOL;
echo '-----------------------------------------------------------------';
echo PHP_EOL;
foreach ($array as $val) {
  $test = $val*2;
  echo memory_get_usage() - $memory_limit;
  echo PHP_EOL;
}
unset($test);
echo '-----------------------------------------------------------------';
echo PHP_EOL;
echo 'Update';
echo PHP_EOL;
echo '-----------------------------------------------------------------';
echo PHP_EOL;


foreach ($array as $key => $val) {
  $array[$key] = $val *2;
  echo memory_get_usage() - $memory_limit;
  echo PHP_EOL;
}


echo '-----------------------------------------------------------------';
echo PHP_EOL;
echo 'Update by link';
echo PHP_EOL;
echo '-----------------------------------------------------------------';
echo PHP_EOL;

foreach ($array as $key => &$val) {
  $val = $val *2;
  echo memory_get_usage() - $memory_limit;
  echo PHP_EOL;
}

$spl = new SplFixedArray();
$spl = $spl::fromArray($array);
unset($array);
$memory_limit = memory_get_usage();
echo '-----------------------------------------------------------------';
echo PHP_EOL;
echo 'Update';
echo PHP_EOL;
echo '-----------------------------------------------------------------';
echo PHP_EOL;


foreach ($spl as $key => $val) {
  $array[$key] = $val *2;
  echo memory_get_usage() - $memory_limit;
  echo PHP_EOL;
}