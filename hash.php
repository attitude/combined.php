<?php

/**
 * Returns cache busting url
 *
 * @see http://www.stevesouders.com/blog/2008/08/23/revving-filenames-dont-use-querystring/
 * @param string $files List of files to check last mod time
 * @return string Relative URL string to combined files
 *
 */
function getCombinedAssetsHash(/*string*/ $files)
{
    if (!is_string($files)) {
        throw new \Exception("Function expects 1st argument to be of type string", 500);
    }

    $type = 'txt';
    $name = 'texts';

    if (preg_match('/\.(?:js|css)\b/', $files, $match)) {
        switch ($match[0]) {
            case '.css':
                $type = 'css';
                $name = 'styles';
                break;

            default:
                $type = 'js';
                $name = 'scripts';
                break;
        }
    }

    return "{$name}.".max(array_map(function ($file) {
        $BASE = dirname(dirname(__FILE__));

        if ($f = realpath($BASE.'/'.trim($file, '/'))) {
            return filemtime($f);
        }

        return 0;
    }, explode(';', $files))).".{$type}?files={$files}";
}
