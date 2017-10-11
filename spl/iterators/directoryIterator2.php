<?php
header('content-type:plaintext');
$path = realpath('../');
//$path = realpath('audiobooks');
var_dump($path);
$objects = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path), RecursiveIteratorIterator::SELF_FIRST);
var_dump($objects);
$files = array();
$sorted_books = array();
$folder_name = '';
foreach ($objects as $name => $object) {
  if (is_file($name)) {
    $sorted_books[$folder_name]['title'] = basename($name);
    $sorted_books[$folder_name]['type'] = mime_content_type($name);
    $sorted_books[$folder_name]['folder_name'] = $folder_name;
    $sorted_books[$folder_name]['files'][] = $name;
    $files[] = array(
      'path' => $name,
      'basename' => basename($name),
      'type' => 'file',
    );
  }
  else {
    $folder_name = $name;
    $files[] = array(
      'path' => $name,
      'basename' => basename($name),
      'type' => 'folder',
    );
  }
}

//var_dump($files);
var_dump(count($sorted_books));
var_dump($sorted_books);

$file = new SplFileObject('file.csv', 'w');

$row = array(
  'title' => 'Title',
  'type' => 'Type',
  'folder_name' => 'Folder Name',
  'file' => 'File',
);

$file->fputcsv($row);

foreach ($sorted_books as $fields) {
  //$fields['files'] = serialize($fields['files']);
  $row = $fields;
  unset($row['files']);
  foreach ($fields['files'] as $f) {
    $row['file'] = $f;
    $file->fputcsv($row);
  }
}