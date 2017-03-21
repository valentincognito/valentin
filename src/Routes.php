<?php declare(strict_types = 1);

return [
  ['GET', '/', ['App\Controllers\Home', 'show']],
  ['GET', '/portfolio', ['App\Controllers\Portfolio', 'show']],
  ['GET', '/articles', ['App\Controllers\Blog', 'list']],
  ['GET', '/{year}/{month}/{day}/{slug}', ['App\Controllers\Blog', 'show']],
];