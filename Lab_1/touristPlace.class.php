<?php
class TouristPlace {
  private $name;
  private $description;
  private $rating;

  public function __construct($name, $description, $rating) {
    $this->name = $name;
    $this->description = $description;
    $this->rating = $rating;
  }

  public function getName() {
    return $this->name;
  }

  public function getDescription() {
    return $this->description;
  }

  public function getRating() {
    return $this->rating;
  }
}
