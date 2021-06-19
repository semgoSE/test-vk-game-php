<?php

require_once "Room.php";

class TreasureRoom extends Room {

    //то что можеь выпасть (мин - макс, диапозоны )
    private $treasure = [
        [1, 5],
        [5,10],
        [10,15]
    ];
    

    //редкость сундука в комнате
    private $rarity = 0;


    //заходим в комнату
    public function __construct($pdo, $player) {
        parent::__construct($pdo, $player);

        //опредеилили редкость
        $this->rarity = rand(0, 2);
        
        echo "Вы в комнате c сокровищем. Редкость сундука - ".($this->rarity+1)."<br />";
        
        $count = $this->getTreasure();

        //добавляем очки пользователю
        $this->player->addCount($count);

        //очищаем комнату
        $this->clearRoom();
        echo "Вы получаете ".$count."<br />";
        //проверяем на конец подземелья
        if($this->is_end) {
            $this->player->finish();
        } else echo "Куда дальше?";
    }


    //получаем очки из сундука в зависисомти от редкости
    public function getTreasure() {
        return rand($this->treasure[$this->rarity][0], $this->treasure[$this->rarity][1]);
    }
}