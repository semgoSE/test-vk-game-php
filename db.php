<?php

try {
    $pdo = new PDO('mysql:host=localhost;dbname=vk-game', 'admin', 'admin');
  } catch (PDOException $e) {
    print "Error!: " . $e->getMessage();
    die();
}
