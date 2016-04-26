<?php
$sleep = rand(1, 1000);
$file = new SplFileObject('../logs/' . date('h-i-s') . '_' . $sleep . '.txt', 'w + ');
//$file->fwrite(date('h:i:s d / m / Y'));
$file->fwrite('post = ' . print_r($_POST, true) . ' get =' . print_r($_GET, true));
print 'sleep';
print_r($_POST);
sleep(rand(0,10));
print 'ok';
return 'my';