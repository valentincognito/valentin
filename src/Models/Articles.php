<?php declare(strict_types = 1);

namespace App\Models;

class ArticleModel
{
  protected $db;

  public function __construct(\PDO $db)
  {
    $this->db = $db;
  }

  public function getAllArticles() {
    return $this->db->query('SELECT * FROM articles');
  }
}