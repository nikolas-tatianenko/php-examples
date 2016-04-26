<?php
header('Content-type:plaintext');

interface myInterface0 {
  public function myIntFunc0();
}

interface myInterface {
  public function myIntFunc();
}

interface myInterface2 {
  public function myIntFunc2();
}

class myAbstractClass implements myInterface0 {
  public function myIntFunc0() {

  }

}

class myClass extends myAbstractClass implements myInterface, myInterface2 {

  public function myIntFunc() {

  }

  public function myIntFunc2() {

  }

}

class myClass2 extends myClass {

}

print 'Class Implements ' . PHP_EOL;
print_r(class_implements(myClass2));

print 'Class Parents ' . PHP_EOL;
print_r(class_parents(myClass2));

print 'Class uses' . PHP_EOL;
print_r(class_uses(myClass2));

print PHP_EOL;

$obj = new MyClass2;
$hash = spl_object_hash($obj);

print $hash;
