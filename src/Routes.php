<?php declare(strict_types = 1);

return [
  ['GET', '/', ['App\Controllers\Home', 'show']],
  ['GET', '/{slug}', ['App\Controllers\Page', 'show']],
];