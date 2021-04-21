<?php

require(__DIR__.'/../interfaces/movie.interface.php');
require_once(__DIR__.'/abstracts/Category.class.php');

Class Movie extends Category implements iMovie {

  protected $id;
  protected $name;
  protected $description;
  protected $observation;
  protected $rating;

  public function __construct() {

    parent::__construct();

  }

  public function setData(array $data):bool {
      
    $this->id = $data['id'] ?? '';
    $this->name = $data['name'] ?? '';
    $this->description = $data['description'] ?? '';
    $this->observation = $data['observation'] ?? '';
    $this->rating = $data['rating'] ?? '';

    return true;
    
  }

  public function getData(int $movie_id):array {
      
  }
}