<?php declare(strict_types = 1);

return [
  ['GET', '/', ['App\Controllers\Home', 'show']],
  ['GET', '/portfolio', ['App\Controllers\Portfolio', 'show']],
  ['GET', '/{slug}', ['App\Controllers\Page', 'show']],
];