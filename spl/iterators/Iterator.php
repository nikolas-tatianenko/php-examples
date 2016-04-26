<?php
header('content-type:plaintext');
$it = new ArrayIterator(array(
    'foo',
    'bar',
    array('qux', 'wox'),
    'baz'
  ));

foreach ($it as $v) {
  if (is_scalar($v)) {
    $v = $v.'_test';
    print $v . PHP_EOL;
  }
}
