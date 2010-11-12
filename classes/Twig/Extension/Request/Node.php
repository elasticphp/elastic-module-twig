<?php

class Twig_Extension_Request_Node extends Twig_Node {
  protected $uri;

  public function compile($compiler) {
    $compiler
      ->write("Request::factory('raw', ")
      ->subcompile($this->uri)
      ->write(")->execute('raw')->send_headers()->send_content()->finish();")
      ->raw("\n");
  }
}

?>
