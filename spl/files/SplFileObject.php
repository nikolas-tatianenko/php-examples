<?php
header('Content-type:plaintext');

// Read by lines;
$file = new SplFileObject('example.txt');
// Set line limit
$file->setMaxLineLen(5);
while (!$file->eof()) {
  print $file->fgetss('<p>').PHP_EOL;
}
print '===========';

// Read by chars.
$file = new SplFileObject('example.txt');
while (FALSE !== ($char = $file->fgetc())) {
  echo $char;
}

print '===========';

// CSV file.
$filecsv = new SplFileObject('file.csv', 'w');
$array = array(
  array('id', 'title', 'description'),
  array(1, 'title1', 'myDescription1'),
  array(2, 'title2', 'myDescription2'),
);
$filecsv->fputcsv($array);
