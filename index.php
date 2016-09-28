<?php

if (isset($_GET['files'])) {
    if (preg_match('/\.(?:js|css)\b/', $_GET['files'], $match)) {
        switch ($match[0]) {
            case '.css':
                header('Content-Type: text/css;charset=UTF-8');
                break;

            case '.js':
                header('Content-Type: application/javascript;charset=UTF-8');
                break;

            default:
                header('Content-Type: text/pain;charset=UTF-8');
                break;
        }
    } else {
        header('Content-Type: text/plain;charset=UTF-8');
    }

    $content = implode("\n", array_filter(array_map(function ($file) {
        $BASE = dirname(dirname(__FILE__));

        if ($f = realpath($BASE.'/'.trim($file, '/'))) {
            return "/*$file*/".file_get_contents($f);
        }

        return "/*Missing: $file*/";
    }, explode(';', $_GET['files']))));

    echo $content;
} else {
    header('Content-Type: text/plain;charset=UTF-8');
    echo '/*Missing $_GET[\'files\']*/';
}
