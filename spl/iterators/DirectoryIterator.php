<?php
header('content-type:plaintext');
$folder_name = 'compass\xml';
$it = new DirectoryIterator($folder_name);
// Filter mp3.

$it2 = new RegexIterator($it, '/\.xml$/i');
// Filter 6 megabytes.
//$it3 = new FilesystemIterator($it2, 0, 6 * 1024 * 1024);
//$it4 = new LimitIterator($it3, 10, 5);
foreach ($it2 as $fi) {
 //print get_class($fi);
  //print "File:" . $fi->getPathname() . "\n";
}

$it = new RecursiveDirectoryIterator('.');

foreach($it as $fi){

  print $fi->getPathname().PHP_EOL;
}
