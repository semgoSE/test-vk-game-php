
## Основные сведения
Игра написана на:
 * php 8
 * mysql
  
Сервер apache

##  Локальный запуск(windows) 
 1. [Скачать](https://www.apachefriends.org/ru/index.html) и запустить XAMPP
 2. В меню XAMPP запустить Apache и MySQL сервер
 3. Скачайте репозиторий в папку htdocs(она находится в каталоге xampp) 
 4. [Перейдите](http://localhost/phpmyadmin/)
 5. Создайте базу данных vk-game 
 6. Выполните импорт в базу данных файла vk-game.sql
 7.  Готово. (Игра достпна по адресу http://localhost)

## Схема отправки 
 Все запросы отправляются методом **POST** в json формте.<br>
 Для тетирования использовался Postman. [Коллекция](https://www.getpostman.com/collections/ff838814646dbe7a347a)


 ---------------------------
1) Для запуска игры отправьте следующий json:
   ```json 
   {
       "type": "start", //тип запроса
       "player": "semgo", //ник игрока
       "map": { //объект подземелья
            "name": "my_map", //название подземелья
            "scheme": [ //массив комнат подземелья
               {
                 "room_id": 0, //id команты
                 "is_start": true, //признак начала подземелья
                 "is_end": false, //признак конца подземелья
                 "w_top": null, //дверь выше(если null то стена, если нет то id команты за дверью), 
                 "w_left": null,
                 "w_right": 1,
                 "w_bottom": null,
                 "mode": "empty" //тип комнаты
               }, // и т.д  пример подземелья map.json
            ]
       } 
   }

2) Для ходьбы используйте следующий json:
    ```json
    {
        "type": "action",
        "action": "top" //тип действия 
    }

 Типы action:
1. top - поднятся выше
2. right - пойти направо
3. left - пойти налево
4. bottom - пойти вниз


Карта подземелья. (прошу прощения за красоту, я плохой художник)
![map](https://github.com/semgoSE/test-vk-game-php/blob/main/map.png) 