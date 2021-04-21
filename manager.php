<?php

require('classes/Movie.class.php');

class TasteManager {

  private $movie;
  public $listMovies;
  public $editMovie;

  public function __construct() {

    echo "\n\n --- COMEÇO DO PROGRAMA --- \n\n";

    $this->movie = new Movie;

    $this->executeFunction();

    $this->listMovies = $this->movie->getData();
  }

  private function executeFunction () {

    if (isset($_POST['save']) && !isset($_GET['id'])) {
      switch($_POST['save']) {
        case 'movie':
          $this->addMovie();
          break;
        default:
          break;
      }
    } else if (isset($_POST['save']) && isset($_GET['id'])) {
        switch($_POST['save']) {
          case 'movie':
            $this->updateMovie();
            break;
          default:
            break;
      } 
    }

    if (isset($_POST['delete'])) {
      switch($_POST['delete']) {
        case 'movie':
          $this->deleteMovie();
          break;
        default:
          break;
      }
    }

    if (isset($_POST['edit'])) {
      switch($_POST['edit']) {
        case 'movie':
          $this->editMovie();
          break;
        default:
          break;
      }
    }
  }

  private function addMovie() {

    $addMovie = $this->movie->setData($_POST);

    if ($addMovie) $this->movie->insert();

    $_POST = array();

  }

  private function deleteMovie() {

    $deleteMovie = $this->movie->setData($_GET);

    if ($deleteMovie) $this->movie->delete();

    $_POST = array();
    $_GET = array();

    $this->clearUrl();

  }

  private function editMovie() {

    $editMovie = $this->movie->setData($_GET);
    $this->editMovie = $this->movie->getData($_GET['id']);

  }

  private function updateMovie() {

    $updateMovie = $this->movie->setData($_POST);
    
    if ($updateMovie) $this->movie->update();

    $_POST = array();
    $_GET = array();

    $this->clearUrl();

  }

  private function clearUrl() {
    (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') ? $url = "https://" : $url = "http://";

    $url.= $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];   
     
    $url = strtok($url, '?');

    header('Location: '.$url);  
  }
}

$tm = new TasteManager;