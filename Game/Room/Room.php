<?php

/*
    mode 
        treasure
        empty
        enemy

*/

class Room {

    public $pdo; //для запросов к бд

    public $room_id; //id комнаты

    //двери если они есть(нет false)
    public  $w_top;
    public  $w_right;
    public  $w_left;
    public  $w_bottom;

    //признак статовой команты
    public $is_start;

    //признак конечной комнаты
    public $is_end;

    //персонаж
    public $player;


    //player вошел вк комнату
    public function __construct($pdo, $player) {
        $this->pdo = $pdo;
        $this->player = $player;
        $this->room_id = $player->room_id;
        $this->loadRoom();
    }


    public static function getTypeRoom($pdo, $room_id) {
        $room = $pdo->prepare("SELECT mode FROM room WHERE `room_id`= ?");
        $room->execute([$room_id]);
        return $room = $room->fetchAll()[0]['mode'];
    }

    public function clearRoom() {
        $room = $this->pdo->prepare("UPDATE room SET mode= ? WHERE `room_id`= ?");
        $room->execute(["empty", $this->room_id]);
    }


    //функция загрузки комнаты
    public function loadRoom() {
        $room = $this->pdo->prepare("SELECT * FROM room WHERE `room_id`= ?");
        $room->execute([$this->room_id]);
        $room = $room->fetchAll()[0];

        $this->w_top = ($room['w_top'] == null ? false : $room['w_top'] );
        $this->w_right = ($room['w_right'] == null ? false : $room['w_right']);
        $this->w_left = ($room['w_left'] == null ? false : $room['w_left']);
        $this->w_bottom = ($room['w_bottom'] == null ? false : $room['w_bottom']);
        $this->is_start = ($room['is_start'] == 1);
        $this->is_end = ($room['is_end'] == 1);
    }
  
 

}


?>