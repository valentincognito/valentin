<?php declare(strict_types = 1);

namespace App\Controllers;

use Http\Request;
use Http\Response;
use App\Template\FrontendRenderer;
use App\Models\Articles;

class Home
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
    $articles = new Articles($this->db);
    $articles = $articles->getAllArticles();
    
    $data = [
      'name' => $this->request->getParameter('name', 'stranger'),
    ];
    $html = $this->renderer->render('Home', $data);
    $this->response->setContent($html);
  }
}