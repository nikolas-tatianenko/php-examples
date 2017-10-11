<?php
function myErrorHandler($errno, $errstr, $errfile, $errline) {
    if (!(error_reporting() & $errno)) {
        // ���� ��� ������ �� ������� � error_reporting
        return;
    }
    switch ($errno) {
    case E_USER_ERROR:
        echo "<b>My ERROR</b> [$errno] $errstr<br />\n";
        exit(1);
        break;
    case E_USER_WARNING:
        echo "<b>My WARNING</b> [$errno] $errstr<br />\n";
		
        break;
    case E_USER_NOTICE:
        echo "<b>My NOTICE</b> [$errno] $errstr<br />\n";
        break;
    default:
        echo "����������� ������: [$errno] $errstr<br />\n";
        break;
    }
    /* �� ��������� ���������� ���������� ������ PHP */
    return true;
}
set_error_handler('myErrorHandler'); //��������� ����������
trigger_error('test', E_USER_WARNING);

echo 'test';