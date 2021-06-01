<?php

require(__DIR__.'/../Manager.class.php');

class ManagerFactory {

  static function build() {

    return new TasteManager;

  }

}