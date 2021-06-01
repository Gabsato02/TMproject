<?php

require(__DIR__.'/../Movie.class.php');
require(__DIR__.'/../Food.class.php');
require(__DIR__.'/../Game.class.php');

class CategoryFactory {

  static function buildCategory($class) {

    if (!$class) {

      throw new Exception('Categoria inválida.');

    } else {

      $className = ucfirst(strtolower($class));

      if(class_exists($className)) {

        return new $className();

      }

    }
        
  }

}