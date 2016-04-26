<?php
header('content-type:plaintext');

class ToUpperCaseIterator extends IteratorIterator {
  public function current() {
    return strtoupper(parent::current());
  }
}

$array = new ArrayIterator(array('test', 'smallText', 'anotherText'));
$it = new ToUpperCaseIterator($array);
foreach ($it as $val) {
  echo $val . PHP_EOL;
}
