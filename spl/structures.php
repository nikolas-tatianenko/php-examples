<?php
header('Content-type:Text');
_spl_stack();
function _spl_stack() {
  $stack = new SplStack();

  // Check Stack for values.
  if ($stack->isEmpty()) {
    echo 'Empty' . PHP_EOL;
  }
  else {
    echo 'Not Empty' . PHP_EOL;
  }
  // Set data.
  $stack->push('1');
  $stack->push('2');
  $stack->push('3');

  // Get count
  echo $stack->count() . PHP_EOL;

  // Get top.
  echo 'get top' . PHP_EOL;
  echo $stack->top() . PHP_EOL;

  // Get bottom.
  echo 'get bottom' . PHP_EOL;
  echo $stack->bottom() . PHP_EOL;

  echo 'Serialize' . PHP_EOL;
  echo $stack->serialize() . PHP_EOL; // i:6;:s:1:"1";:s:1:"2";:s:1:"3"
  //
  echo $stack->pop() . PHP_EOL; // 3
  echo $stack->pop() . PHP_EOL; // 2
  echo $stack->pop() . PHP_EOL; // 1

  // Set values again.
  foreach (range(5, 15) as $val) {
    $stack->push($val);
  }

  echo 'Get count ';
  echo $stack->count() . PHP_EOL;

  while (!$stack->isEmpty()) {
    echo $stack->pop() . PHP_EOL;
  }

  $iterations = 1000000;
  $array = array(
    "10",
    "20",
    "qwerty",
    "100",
    array("one", "two", array("100"))
  );


  echo 'Comparison:' . PHP_EOL;
  $memory = memory_get_usage();
  $time_start = time();

  $test_array = array();
  for ($i = 0; $i <= $iterations; $i++) {
    foreach ($array as $val) {
      array_push($test_array, $val);
    }
    while (count($test_array) > 0) {
      array_pop($test_array);
    }
  }

  $array_push_time = time() - $time_start;
  $array_push_memory = memory_get_peak_usage() - $memory;
  echo 'Array_push/pop total time=' . $array_push_time . ' Memory pick Usage : ' . $array_push_memory . PHP_EOL;

  $time_start = time();
  $memory = memory_get_usage();
  $testStack = new SplStack();
  for ($i = 0; $i <= $iterations; $i++) {
    foreach ($array as $val) {
      $testStack->push($val);
    }
    while (!$testStack->isEmpty()) {
      $testStack->pop() . PHP_;
    }
  }
  $stack_time = time() - $time_start;
  $stack_memory = memory_get_peak_usage() - $memory;
  echo 'SPL total time=' . $stack_time . ' Memory pick Usage : ' . $stack_memory . PHP_EOL;
  echo 'Faster in ' . ($stack_time / $array_push_time) . ' memory less in ' . ($stack_memory / $array_push_memory);
  // Iterations 1000000 faster in 9% memory usage the same.
}
