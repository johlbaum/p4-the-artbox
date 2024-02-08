<?php

function connectToDatabase() {
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=artbox;charset=utf8;', 'root', 'root');
        return $bdd;
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
}
