<?php declare(strict_types = 1);

namespace App\Controllers;

use Http\Request;
use Http\Response;
use App\Template\FrontendRenderer;

use App\Models\Articles;

class Blog
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

  public function list()
  {    
    $articles = new Articles($this->db);
    $articles = $articles->getAllArticles();
    
    $article_array = array(); $i = 0;
    
    while ($row = $articles->fetch())
    {
      $article_array[$i]['title']     = $row['title'];
      $article_array[$i]['slug']      = $row['slug'];
      $article_array[$i]['year']      = substr($row['date'], 0, 4);
      $article_array[$i]['month']     = substr($row['date'], 5, 2);
      $article_array[$i]['day']       = substr($row['date'], 8, 2);
      $article_array[$i]['preview']   = $row['preview'];
      $article_array[$i]['thumbnail'] = $row['thumbnail'];
      $i++;
    }
    
    $data = [
      'articles' => $article_array,
    ];
    
    $html = $this->renderer->render('Articles_list', $data);
    $this->response->setContent($html);
  }
  
  public function show($params)
  {    
    $slug = $params['slug'];
    
    $articles = new Articles($this->db);
    $articles = $articles->getArticleBySlug();
    $articles->execute([$slug]);
    
    $data = [
      'article' => $articles->fetch(),
    ];
    
    $html = $this->renderer->render('Article_detail', $data);
    $this->response->setContent($html);
  }
}