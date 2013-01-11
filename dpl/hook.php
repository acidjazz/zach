<?php
require_once('class.GitHubHook.php');

$hook = new GitHubHook;
$hook->enableDebug();
$hook->addBranch('master', 'lancome', '/var/www/lancome');
$hook->deploy();
