<?php

/**
 * Loads template from the filesystem, uses the Elastic::find_file method
 * to locate it.
 *
 * Based on Twig_Loader_Filesystem
 *
 * @package elastic-twig
 * @author deoxxa <deoxxa@fknsrs.biz>
 */
class Twig_Loader_Elastic extends Twig_Loader_Filesystem {
  public function setPaths($paths) {
    $this->cache = array();

    if (!is_array($paths)) {
      $paths = array($paths);
    }

    foreach ($paths as $path) {
      if (!Elastic::find_file($path, true)) {
        throw new InvalidArgumentException(sprintf('The "%s" directory does not exist.', $path));
      }

      $this->paths[] = $path;
    }
  }

  protected function findTemplate($name) {
    if (isset($this->cache[$name])) {
      return $this->cache[$name];
    }

    foreach ($this->paths as $path) {
      if (!$file = Elastic::find_file($path.DS.$name, false, false)) {
        continue;
      }

      return $this->cache[$name] = $file;
    }

    throw new RuntimeException(sprintf('Unable to find template "%s" (looked into: %s).', $name, implode(', ', $this->paths)));
  }
}

?>
