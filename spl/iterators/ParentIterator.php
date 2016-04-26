<?php
// Example from PHP.net
/*ParentIterator is just a RecursiveFilterIterator whos accept() method calls the RecursiveFilterIterator->hasChildren() method to filter itself.

Basically, it filters out leaf nodes. For example

This would yield all files and directories*/
$rdi = new RecursiveDirectoryIterator(__DIR__);
$iter = new RecursiveIteratorIterator($rdi, RecursiveIteratorIterator::CHILD_FIRST);
get_class($iter);
//$dirsOnly = new ParentIterator($iter);

