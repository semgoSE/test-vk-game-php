<?php

require_once "Room.php";

class EmptyRoom extends Room {

    //заходим в комнату
    public function __construct($pdo, $player) {
        parent::__construct($pdo, $player);
        echo "Вы в пустой комнате.<br />";

        //проверяем на конец подземелья
        if($this->is_end) {
            $this->player->finish();
        } else echo "Куда дальше?";
    }
}