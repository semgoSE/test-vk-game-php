<?php

require_once "Room.php";
require_once dirname(__FILE__)."/../Enemy/Enemy.php";
require_once dirname(__FILE__)."/../Enemy/Zombie.php";

class EnemyRoom extends Room {

    //возможные противники
    private $types_mob;

    //противник
    public $enemy;

    //идет битва
    public bool $is_war = true;


    public function __construct($pdo, $player) {
        parent::__construct($pdo, $player);


        $this->types_mob = [new Zombie()];

        //выбираем врага
        $this->enemy = $this->types_mob[rand(0, count($this->types_mob)-1)];
        echo "Вы встретили монстра. Это - ".$this->enemy->name."<br />";
        $this->war();
        $this->clearRoom();

        //проверяем на конец подземелья
        if($this->is_end) {
            $this->player->finish();
        } else echo "Куда дальше?";
    }

    //битва с врагом
    public function war() {
        while($this->is_war) {
            $force = $this->player->getForce();
            echo "Ваша сила - ".$force."<br />";
            if($force > $this->enemy->force) {
                $this->is_war = false;
                $this->player->addCount($this->enemy->force);
                echo "Вы победили. Вы получаете ".$this->enemy->force."<br />";
            } else {
                echo "Враг: -".$this->enemy->incoming_damage."<br />";
                $this->enemy->decrease();
            }
        }
    }
}