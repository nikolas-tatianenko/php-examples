<?php

class callbackFilter extends FilterIterator {
  private $callback;

  public function __construct(Iterator $iterator, $filter) {

    parent::__construct($iterator);
    $this->callback = $filter;
  }

  public function accept() {
    $content = $this->getInnerIterator()->current();

    if (call_user_func($this->callback, $content)) {
      return FALSE;
    }
    return TRUE;
  }
}

$array = array(1, 2, 3, 'a', 'b', 'c');
$object = new ArrayObject($array);
$iterator = new callbackFilter($object->getIterator(), 'is_int');

foreach ($iterator as $result) {
  echo $result, PHP_EOL;
}
