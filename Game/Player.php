<?php

class Player {

    //выдаем одно очко по умолчанию
    private int $count = 1;

    public string $player;
    public int $room_id = 0;

    public function __construct() {

    }


    //меняем комнату
    public function setRoomId($next_id) {
        $this->room_id = $next_id;
        $_SESSION['room_id'] = $next_id;
    }

    //создаем персонажа и пемещаем его в 0 команту
    public function create($player) {
        $_SESSION['player'] = $player;
        $_SESSION['room_id'] = 0;
        $_SESSION['count'] = $this->count;
        $this->player = $player;
        $this->room_id = 0;
    }

    //загружаем ифнормацию о персонаже
    public function load() {
        if(isset($_SESSION['player']) && isset($_SESSION['room_id'])) {
            $this->player = $_SESSION['player'];
            $this->room_id = $_SESSION['room_id'];
            $this->count = $_SESSION['count'];
        } else {
            echo "Игра не найдена";
            exit();
        }
    }

    //добавляем очки
    public function addCount($count) {
        if($count > 0) {
            $this->count = $this->count + $count;
            $_SESSION['count'] = $this->count;
        }
    }

    //получаем урон персонажа
    public function getForce() {
        return rand(1, $this->count);
    }

    //заканчиваем игру
    public function finish() {
        echo "Вы вышли из подземелья";
        session_destroy();
    }


}