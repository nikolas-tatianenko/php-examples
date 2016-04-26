<?php
header('content-type:plaintext');
$myArray = array(
  0 => 'a',
  1 => array(
    'subA',
    'subB',
    array(
      0 => 'subsubA',
      1 => 'subsubB',
      2 => array(0 => 'deepA', 1 => 'deepB')
    )
  ),
  2 => 'b',
  3 => array('subA', 'subB', 'subC'),
  4 => 'c'
);

$iterator = new RecursiveArrayIterator($myArray);
iterator_apply($iterator, 'traverseStructure', array($iterator));

function traverseStructure($iterator) {

  while ($iterator->valid()) {

    if ($iterator->hasChildren()) {

      traverseStructure($iterator->getChildren());

    }
    else {
      $prefix = '';
      if ($iterator->key() > 0) {
        $prefix = implode('', array_fill(0, (int) $iterator->key(), "\t"));
      }
      echo get_class($iterator);
      echo $prefix . $iterator->key() . ' : ' . $iterator->current() . PHP_EOL;
    }

    $iterator->next();
  }
}
