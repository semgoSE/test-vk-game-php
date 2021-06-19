<?php

require_once "Enemy.php";

class Skeleton extends Enemy {
    public function __construct() {
        $this->name = "Склетет";
        $this->force = rand(1, 5);
        $this->incoming_damage = 2;
    }
}

?>