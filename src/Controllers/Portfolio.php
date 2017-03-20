<?php declare(strict_types = 1);

namespace App\Controllers;

use Http\Request;
use Http\Response;
use App\Template\FrontendRenderer;

use App\Models\Projects;

class Portfolio
{
  private $request;
  private $response;

  public function __construct(Request $request, Response $response, FrontendRenderer $renderer, \PDO $db)
  {
    $this->request = $request;
    $this->response = $response;
    $this->renderer = $renderer;
    $this->db = $db;
  }

  public function show()
  {    
    $projects = new Projects($this->db);
    $projects = $projects->getAllProjects();
    
    $data = [
      'projects' => $projects,
    ];
    
    $html = $this->renderer->render('Portfolio', $data);
    $this->response->setContent($html);
  }
}