<?php declare(strict_types = 1);

namespace App\Models;

class Articles
{
  protected $db;

  public function __construct(\PDO $db)
  {
    $this->db = $db;
  }

  public function getAllArticles() {
    return $this->db->query('SELECT * FROM articles ORDER BY date DESC');
  }
  
  public function getArticleBySlug() {
    return $this->db->prepare('SELECT * FROM articles WHERE slug = ? ORDER BY date DESC');
  }
}