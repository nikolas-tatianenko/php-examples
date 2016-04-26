<?php

header('Content-type:plaintext');
function test($a,$b,$c){
  return $a+$b+$c;
}

try{
  throw new BadFunctionCallException('No arguments');
  test(1,2);

}catch(BadFunctionCallException $e){
  print 'No arguments '.$e->getMessage();
}catch(Exception $e){
  print 'global '.$e->getMessage();
}
