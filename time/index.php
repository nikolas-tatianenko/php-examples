<?php
header('content-type:plaintext');
print time();
print "\n";
  print $_SERVER['REQUEST_TIME'];
print "\n";
sleep(2);

print time();
print "\n";
print $_SERVER['REQUEST_TIME'];
print "\n";