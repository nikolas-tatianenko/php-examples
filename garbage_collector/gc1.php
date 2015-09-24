<?php
header('content-type:plaintext');

function experiment_results($current_memory, $last_iteration_memory, $original_memory, $time) {
  $ex1_mem2 = $current_memory - $original_memory;
  inM($original_memory, 'Memory usage before iteration : ');
  inM($last_iteration_memory, 'Memory usage in last iteration : ');
  inM($current_memory, 'Memory usage after of iteration (Current memory) : ');
  echo 'Last iteration memory / out of iteration memory : ' . ($last_iteration_memory / $ex1_mem2).PHP_EOL;

  echo 'Time: ' . (time() - $time) . PHP_EOL;
}

/**
 * Format memory
 *
 * @param integer $memory
 */
function inM($memory, $addition_string = '') {
  $test = $memory / 1024;
  echo $addition_string . ' ' . number_format($test) . ' KB' . PHP_EOL;
}

define(SIZE_OF_ARRAY, 10000);

// Typical foreach
echo 'count($array)= ' . SIZE_OF_ARRAY . '; Foreach($array as $key => $val)' . PHP_EOL;
$ex1_mem0 = memory_get_usage();
$array = range(0, SIZE_OF_ARRAY);
$ex1_mem = memory_get_usage() - ex1_mem0;
$time = time();

// foreach ($array as $key => $val) { 100 items . last iteration use at 1.05 times , 1000 items => 1.43, 10000 => 2.38
foreach ($array as $key => $val) {
  $array[$key] = md5($val);
  $last_iteration_memory = memory_get_usage() - $ex1_mem;
}

experiment_results(memory_get_usage(), $last_iteration_memory, $ex1_mem, $time);
echo '---------------------------------------' . PHP_EOL;


// Foreach with link.
echo 'count($array)= ' . SIZE_OF_ARRAY . '; Foreach($array as $key => &$val)' . PHP_EOL;
$ex2_mem0 = memory_get_usage();
$array = range(0, SIZE_OF_ARRAY);
$ex2_mem = memory_get_usage() - ex1_mem0;
$time = time();
// foreach ($array as $key => &$val) { 100 items . last iteration use at 1.05 times , 1000 items => 1.43, 10000 => 2.38
foreach ($array as $key => &$val) {
  $array[$key] = md5($val);
  $last_iteration_memory = memory_get_usage() - $ex2_mem;
}

experiment_results(memory_get_usage(), $last_iteration_memory, $ex2_mem, $time);
echo '---------------------------------------' . PHP_EOL;

// SPLFixedArray.
echo 'count($array)= ' . SIZE_OF_ARRAY . '; $array is SPLFixedArray Foreach($array as $key => $val)' . PHP_EOL;
$ex3_mem0 = memory_get_usage();
$array = SplFixedArray::fromArray(range(0, SIZE_OF_ARRAY));


$ex3_mem = memory_get_usage() - ex1_mem0;
$time = time();
// foreach ($array as $key => &$val) { 100 items . last iteration use at 1.05 times , 1000 items => 1.43, 10000 => 2.38
foreach ($array as $key => $val) {
  $array[$key] = md5($val);
  $last_iteration_memory = memory_get_usage() - $ex3_mem;
}

experiment_results(memory_get_usage(), $last_iteration_memory, $ex3_mem, $time);
echo '---------------------------------------' . PHP_EOL;

// SPLFixedArray.
echo 'count($array)= ' . SIZE_OF_ARRAY . '; $array is SPLFixedArray ArrayIterator' . PHP_EOL;
$ex4_mem0 = memory_get_usage();
$array = new ArrayObject(range(0, SIZE_OF_ARRAY));
$array = $array->getIterator();

$ex4_mem = memory_get_usage() - ex1_mem0;
$time = time();
// foreach ($array as $key => &$val) { 100 items . last iteration use at 1.05 times , 1000 items => 1.43, 10000 => 2.38
foreach ($array as $key => &$val) {
  $array[$key] = md5($val);
  $last_iteration_memory = memory_get_usage() - $ex4_mem;
}

experiment_results(memory_get_usage(), $last_iteration_memory, $ex4_mem, $time);
echo '---------------------------------------' . PHP_EOL;
gc_collect_cycles();
