<?php declare(strict_types = 1);

namespace App\Menu;

class ArrayMenuReader implements MenuReader
{
  public function readMenu() : array
  {
    return [
      ['href' => '/', 'text' => 'Home'],
      ['href' => '/portfolio', 'text' => 'Portfolio'],
      ['href' => '/articles', 'text' => 'Articles'],
    ];
  }
}