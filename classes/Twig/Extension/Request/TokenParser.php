<?php

class Twig_Extension_Request_TokenParser extends Twig_TokenParser {
  public function parse(Twig_Token $token) {
    $lineno = $token->getLine();

    $uri = $this->parser->getExpressionParser()->parseExpression();

    $this->parser->getStream()->expect(Twig_Token::BLOCK_END_TYPE);

    return Container::factory('Twig_Extension_Request_Node', null, array('nodes' => array('uri' => $uri), 'attributes' => array(), 'lineno' => $lineno, 'tag' => $this->getTag()));
  }

  public function getTag() {
    return 'request';
  }
}

?>
