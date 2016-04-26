<?php
header('Content-type:plaintext');
// Create Temp file.
$temp = new SplTempFileObject();
$temp->fwrite('First string' . PHP_EOL);
$temp->fwrite('Second string' . PHP_EOL);
echo $temp->ftell() . ' bytes was wroten in Temp File' . PHP_EOL;

// Set reader cursor to first line. And reading.
$temp->rewind();

foreach ($temp as $line) {
  echo $line;
}
