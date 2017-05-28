<?php declare(strict_types = 1);

namespace App\Models;

class Projects
{
  protected $db;

  public function __construct(\PDO $db)
  {
    $this->db = $db;
  }

  public function getAllProjects() {
    return $this->db->query('SELECT * FROM projects ORDER BY display_order DESC');
  }
}
