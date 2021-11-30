<?php

$urls = [
    '/' => 'home',
    'o-mnie' => 'site/about',
    'posts/<year:\d{4}>/<category>' => 'postt/index',
    'posts' => 'post/index',
    'post/<id:\d+>' => 'post/view',
    '<controller:\w+>' => '<controller>',
    '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
    '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>'
];