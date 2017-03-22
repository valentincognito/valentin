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
    
    
    $project_array = array(); $i = 0;
    
    while ($row = $projects->fetch())
    {
      $project_array[$i]['name']       = $row['name'];
      $project_array[$i]['role']       = $row['role'];
      $project_array[$i]['thumbnail']  = $row['thumbnail'];
      $project_array[$i]['company']    = $row['company'];
      $project_array[$i]['languages']  = $row['languages'];
      $project_array[$i]['date']       = substr($row['date'], 0, 7);
      $i++;
    }
    
    $data = [
      'projects' => $project_array,
    ];
    
    $html = $this->renderer->render('Portfolio', $data);
    $this->response->setContent($html);
  }
}