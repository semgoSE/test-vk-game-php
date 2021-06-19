<?php


class Enemy {
    public string $name = "";
    public int $force = 1; //сила врага
    public int $incoming_damage = 1; //входящий урон

    
    //уменьшаем силу моба
    public function decrease() {
        $this->force = $this->force - $this->incoming_damage;
    }

}

?>