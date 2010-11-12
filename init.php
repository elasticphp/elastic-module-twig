<?php

Container::instance()->set_default('Twig_Environment', '__construct', 'loader', '{{component:Twig_Loader_Elastic}}');
Container::instance()->set_default('Twig_Loader_Filesystem', '__construct', 'paths', 'templates');
Container::instance()->set_postinit_action('Twig_Environment-extension-request', 'Twig_Environment', array('{{object}}', 'addExtension'), array('extension' => '{{component:Twig_Extension_Request}}'));

?>
