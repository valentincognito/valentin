<?php declare(strict_types = 1);

namespace App\Controllers;

use Http\Request;
use Http\Response;
use App\Template\FrontendRenderer;

class Portfolio
{
  private $request;
  private $response;

  public function __construct(Request $request, Response $response, FrontendRenderer $renderer)
  {
    $this->request = $request;
    $this->response = $response;
    $this->renderer = $renderer;
  }

  public function show()
  {    
    $html = $this->renderer->render('Portfolio');
    $this->response->setContent($html);
  }
}