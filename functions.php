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

function concatVersion($v, $r = 0, $h = 0, $b = null)
{
    if (is_array($v)) {
        @list($v, $r, $h, $b) = $v;
    }
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
    $tags = shell_exec($cmd);
    $tags = trim($tags, PHP_EOL);
    if (!$tags) {
        return concatVersion(0, 0, 0);
    }
    $tags = explode(PHP_EOL, $tags);
    $tags = _sortTags($tags);
    $tag = end($tags);
    $tag = extractVersion($tag);
    foreach ($tag as $k => $v) {
        $tag[$k] = (int)$v;
    }
    $tag = concatVersion($tag);

    return $tag;
}

function _sortTags($tags)
{
    foreach ($tags as $k => $tag) {
        $tag = extractVersion($tag);
        foreach ($tag as $i => $v) {
            $tag[$i] = str_pad($v, 4, '0', STR_PAD_LEFT);
        }
        $tags[$k] = concatVersion($tag);
    }
    sort($tags);

    return $tags;
}