<?php

class Controller_Template_Twig extends Controller_Template {
  protected $twig;

  public function before() {
    $this->type = 'text/html';
    $this->twig = Container::factory('Twig_Environment');
    $route = Request::current()->get_route();
    $file = str_replace(array('_', '\\', '/'), DS, $route['directory'].DS.$route['arguments']['controller'].DS.$route['arguments']['action']).'.html';

    // Clean up double slashes
    while (strpos(DS.DS, $file) !== false) {
      $file = str_replace(DS.DS, DS, $file);
    }

    // Remove leading slash
    if (substr($file, 0, 1) === DS) {
      $file = substr($file, 1);
    }

    $this->template_file = $file;

    return parent::before();
  }

  public function after() {
    $this->content = $this->twig->loadTemplate($this->template_file)->render($this->template_data);

    return parent::after();
  }
}

?>
