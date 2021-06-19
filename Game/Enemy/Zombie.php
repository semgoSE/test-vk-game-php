<?php

class Zombie extends Enemy {
    public function __construct() {
        $this->name = "Зомби";
        $this->force = rand(5, 10);
        $this->incoming_damage = 1;
    }
}

?>