<?php

require('classes/Movie.class.php');
require('classes/Food.class.php');
require('classes/Game.class.php');

class TasteManager {

  public $movie;
  public $food;
  public $game;
  public $editItem;

  public function __construct() {

    $this->movie = new Movie;
    $this->food = new Food;
    $this->game = new Game;

    $this->executeFunction();

  }

  private function executeFunction() {
    
    if (key($_POST)) {

      $functionName = array_key_last($_POST);

      $object = $_POST[$functionName];

      $this->$functionName($this->$object);
      
    }

  }

/* AS FUNÇÕES ABAIXO FORAM SUBSTITUÍDAS PELA FUNÇÃO ACIMA, QUE PERMITE A ADIÇÃO DE NOVAS FUNÇÕES A SEREM EXECUTADAS
SEM A NECESSIDADE DE ALTERAR O CÓDIGO EXISTENTE

  private function identifyFunction () {

    if (isset($_POST['save']) && !isset($_GET['id'])) {

      $this->executeFunction('save', 'add');

    } else if (isset($_POST['save']) && isset($_GET['id'])) {

      $this->executeFunction('save', 'update');

    }

    if (isset($_POST['delete'])) $this->executeFunction('delete', 'delete');

    if (isset($_POST['edit'])) $this->executeFunction('edit', 'edit');

  }

  private function executeFunction(string $postName, string $functionName) {

    switch($_POST[$postName]) {
        case 'movie':
          $this->$functionName($this->movie);
          break;
        case 'food':
          $this->$functionName($this->food);
          break;
        case 'game':
          $this->$functionName($this->game);
          break;
        default:
          break;
      }
  } */

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

$tm = new TasteManager;