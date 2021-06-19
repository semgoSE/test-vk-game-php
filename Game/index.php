<?php

/*
    author semgoSE(https://github.com/semgoSE)
    date 18.06.2021
*/




//подключаемся к бд
require_once "./db.php";


require_once "./Game/Player.php";
require_once "./Game/Room/Room.php";
require_once "./Game/Room/EmptyRoom.php";
require_once "./Game/Room/TreasureRoom.php";
require_once "./Game/Room/EnemyRoom.php";

//запускаем сессию
session_start();

//получаем данные из запроса
$file = json_decode(file_get_contents("php://input"), true);

if($file['type'] == "start") {
    $pdo->query("TRUNCATE `vk-game`.`room`");
    foreach($file["map"]["scheme"] as $room) {
        $sql_create_room = "INSERT room SET `room_id` = :room_id, `is_start` = :is_start, `is_end` = :is_end, `w_top` = :w_top, `w_left` =:w_left, `w_right` = :w_right, `w_bottom` = :w_bottom, `mode` = :mode";
        $predata = $pdo->prepare($sql_create_room);
        $predata->execute($room);
    }
    $pl = new Player($pdo);
    $pl->create($file['player']);
    echo "Игра началась. Игрок ".$pl->player."<br />";
    goRoom($pdo, $pl);
} else {

    $pl = new Player($pdo);
    $pl->load();
    // echo "номер текущей команты ".$pl->room_id."<br />";
    $room = new Room($pdo, $pl);

    switch($file["action"]) {
        case "top":
         if($room->w_top !== false) {
             $next_room = $room->w_top;
             $pl->setRoomId($next_room);
             goRoom($pdo, $pl);
         } else echo "Прохода нет";
        break;

        case "bottom":
            if($room->w_bottom !== false) {
                $next_room = $room->w_bottom;   
                $pl->setRoomId($next_room);
                goRoom($pdo, $pl);
            } else echo "Прохода нет";
        break;

        case "right":
            if($room->w_right !== false) {
                $next_room = $room->w_right;
                $pl->setRoomId($next_room);
                goRoom($pdo, $pl);
            } else echo "Прохода нет";
        break;

        case "left":
            if($room->w_left !== false) {
                $next_room = $room->w_left;
                $pl->setRoomId($next_room);
                goRoom($pdo, $pl);
            } else echo "Прохода нет";
        break;

        default: 
            echo "Такого действия нет. (".$file["action"].")";
    }

    
}

//заходим в команату по ее id
function goRoom($pdo, $player) {
    switch(Room::getTypeRoom($pdo, $player->room_id)) {

        case "empty": 
            $room = new EmptyRoom($pdo, $player);
            break;

        case "treasure":
            $room = new TreasureRoom($pdo, $player);
            break;
        
        case "enemy": 
            $room = new EnemyRoom($pdo, $player);
            break;
    }
}