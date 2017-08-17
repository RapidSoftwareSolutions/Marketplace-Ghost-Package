<?php
$routes = [
    'metadata',
    'getAllPosts',
    'getPost',
    'getPostBySlug',
    'getAllTags',
    'getTag',
    'getTagBySlug',
    'getAllUsers',
    'getUser',
    'getUserBySlug',
    'getUserByEmail'

];
foreach($routes as $file) {
    require __DIR__ . '/../src/routes/'.$file.'.php';
}
