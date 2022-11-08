<?php

declare(strict_types=1);

/**
 * Classes autoload
 * @param string $class
 * @return void
 */
function autoload(string $class): void
{
  require_once('src/class/' . $class . '.php');
}

spl_autoload_register('autoload');