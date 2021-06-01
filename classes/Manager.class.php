<?php

require('factories/CategoryFactory.class.php');

class TasteManager {

  public $movie;
  public $food;
  public $game;
  public $editItem;

  public function __construct() {

    $this->movie = CategoryFactory::buildCategory('movie');
    $this->food = CategoryFactory::buildCategory('food');
    $this->game = CategoryFactory::buildCategory('game');

    $this->executeFunction();

  }

  private function executeFunction() {
    
    if (key($_POST)) {

      $functionName = array_key_last($_POST);

      $object = $_POST[$functionName];

      $this->$functionName($this->$object);
      
    }

  }

  private function save(object $object) {

    $save = $object->setData($_POST);

    if ($save) $object->insert();

    $_POST = array();

  }

  private function delete(object $object) {

    $delete = $object->setData($_GET);

    if ($delete) $object->delete();

    $_POST = array();
    $_GET = array();

    $this->resetUrl();

  }

  private function edit(object $object) {

    $edit = $object->setData($_GET);
    $this->editItem = $object->getData($_GET['id']);

  }

  private function update(object $object) {

    $update = $object->setData($_POST);
    
    if ($update) $object->update();

    $_POST = array();
    $_GET = array();

    $this->resetUrl();

  }

  private function resetUrl() {
    (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') ? $url = "https://" : $url = "http://";

    $url.= $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];   
     
    $url = strtok($url, '?');

    header('Location: '.$url);  
  }
}