<?php
header('Content-type:plaintext');

print PHP_EOL . '===========' . PHP_EOL;
print 'Read text file by lines with chars read limit';
print PHP_EOL . '===========' . PHP_EOL;

// Read by lines;
$file = new SplFileObject('example.txt');
// Set line limit
$file->setMaxLineLen(5);
while (!$file->eof()) {
  print $file->fgetss('<p>');
}

print PHP_EOL . '===========' . PHP_EOL;
print 'Read text file by chars';
print PHP_EOL . '===========' . PHP_EOL;

// Read by chars.

$file = new SplFileObject('example.txt');
while (FALSE !== ($char = $file->fgetc())) {
  echo $char;
}

print PHP_EOL . '===========' . PHP_EOL;
print 'Read file as foreach by lines';
print PHP_EOL . '===========' . PHP_EOL;

$file = new SplFileObject('example.txt');
foreach ($file as $line) {
  print $line;
}
// Read as array.

print PHP_EOL . '===========' . PHP_EOL;
print 'Csv file write';
print PHP_EOL . '===========' . PHP_EOL;

// CSV file.
$filecsv = new SplFileObject('file.csv', 'w');
$array = array(
  array('id', 'title', 'description'),
  array(1, 'title1', 'myDescription1'),
  array(2, 'title2', 'myDescription2'),
);
foreach ($array as $line) {
  $filecsv->fputcsv($line);
}
// Read as array.

print PHP_EOL . '===========' . PHP_EOL;
print 'Csv file read with help of fgetcsv()';
print PHP_EOL . '===========' . PHP_EOL;
$filecsv = new SplFileObject('file.csv');
$csvarray = array();
while (!$filecsv->eof()) {
  $csvarray[] = $filecsv->fgetcsv();
}
print_r($csvarray);


print PHP_EOL . '===========' . PHP_EOL;
print 'Csv file read using flag READ_CSV';
print PHP_EOL . '===========' . PHP_EOL;
$filecsv = new SplFileObject('file.csv');
$filecsv->setFlags(SplFileObject::READ_CSV);
$csvarray = array();
foreach ($filecsv as $line) {
  $csvarray[] = $line;
}
print_r($csvarray);
