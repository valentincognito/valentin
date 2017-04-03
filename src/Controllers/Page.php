<?php declare(strict_types = 1);

namespace App\Controllers;

use Http\Response;
use App\Page\PageReader;
use App\Template\FrontendRenderer;

class Page
{
  private $response;
  private $renderer;
  private $pageReader;

  public function __construct(Response $response, FrontendRenderer $renderer, PageReader $pageReader) 
  {
    $this->response = $response;
    $this->renderer = $renderer;
    $this->pageReader = $pageReader;
  }
  public function show($params)
  {
    $slug = $params['slug'];

    try {
      $data['content'] = $this->pageReader->readBySlug($slug);
    } catch (InvalidPageException $e) {
      $this->response->setStatusCode(404);
      return $this->response->setContent('404 - Page not found');
    }

    //$html = $this->renderer->render('Page', $data);
    $html = $data['content'];
    $this->response->setContent($html);
  }
}