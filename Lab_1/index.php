<?php
require_once('touristPlace.class.php');

class TouristPlaces implements Iterator {
    private $places = array();
    private $position = 0;
  
    public function addPlace($place) {
      $this->places[] = $place;
    }
  
    public function current() {
      return $this->places[$this->position];
    }
  
    public function key() {
      return $this->position;
    }
  
    public function next() {
        $this->position++;
    }
  
    public function rewind() {
      return $this->position = 0;
    }
  
    public function valid() {
      return isset($this->places[$this->position]);
    }

    public function getPlacesByTourist($tourist) {
      $result = array();
      foreach ($this->places as $place) {
        $result[] = $place;
      }
      return $result;
    }
  
    public function getPlacesByNavigator() {
      $result = array();
      foreach ($this->places as $place) {
        $result[] = $place;
      }
      return $result;
    }
  
    public function getPlacesByGuide() {
      $result = array();
      foreach ($this->places as $place) {
        $result[] = $place;
      }
      return $result;
    }
  }