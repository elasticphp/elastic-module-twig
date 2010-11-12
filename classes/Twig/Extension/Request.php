<?php

class Twig_Extension_Request extends Twig_Extension {
  public function getTokenParsers() {
    return array(Container::factory('Twig_Extension_Request_TokenParser'));
    return array();
  }

  public function getFilters() {
    return array();
  }

  public function getName() {
    return 'elastic_request';
  }
}

?>
