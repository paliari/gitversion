<?php
define('BUILD_SEPARATOR', '_');
define('VERSION_SEPARATOR', '.');

function getTime()
{
    $h = 0;
    $i = 0;
    $s = 0;
    $m = date('m');
    $d = 1;
    $y = date('Y');

    return time() - mktime($h, $i, $s, $m - 2, $d, $y);
}

function extractVersion($version)
{
    list($v, $r, $h) = explode(VERSION_SEPARATOR, $version);
    @list($h, $b) = explode(BUILD_SEPARATOR, $h);

    return array($v, $r, $h, $b);
}

function concatVersion($v, $r, $h, $b = null)
{
    $version = implode(VERSION_SEPARATOR, array($v, $r, $h));
    if ($b) {
        $version .= BUILD_SEPARATOR . "$b";
    }

    return $version;
}

/**
 * Obtem a tag do hotfix atual
 *
 * @return mixed|string
 */
function getCurrentHotFix()
{
    $v = shell_exec('git flow hotfix list');
    $v = preg_replace('/[[:space:]]|[^\d\+\._a-zA-Z]/', '', $v);

    return $v;
}

function startHotFix($version)
{
    echo "start $version\n";
    echo shell_exec("git flow hotfix start $version");
}

function finishHotFix($version, $msg)
{
    echo "finish $version\n";
    echo shell_exec("git add . && git commit -a -m '$msg'");
    echo shell_exec("git checkout develop");
    echo shell_exec("git flow hotfix finish -m '@fix-$version' '$version'");
}

function startRelease($version)
{
    echo "start $version\n";
    echo shell_exec("git flow release start $version");
}

function finishRelease($version, $msg)
{
    echo "finish $version\n";

    echo shell_exec("git add . && git commit -a -m '$msg'");
    echo shell_exec("git checkout develop");
    echo shell_exec("git flow release finish -m '@rel-$version' $version");
}

function getLastTag()
{
    $cmd = 'git tag';
    $v = shell_exec($cmd);
    $v = trim($v, PHP_EOL);
    $v = explode(PHP_EOL, $v);

    return end($v) ?: concatVersion(0, 0, 0);
}