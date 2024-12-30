<?php

namespace Config;

use MongoDB\Client;

class MongoDB
{
    public $connection;
    public $client;
    public $database;

    public function __construct()
    {
        $dbPassword = 'mert123'; // Şifreyi buraya ekleyin
        $uri = "mongodb+srv://mert:$dbPassword@cluster0.qj8sk.mongodb.net/?retryWrites=true&w=majority&appName=Cluster0";
        $this->connection = (new Client($uri))->user_role; // user_role veritabanına bağlanır
        $this->client = new Client("mongodb+srv://mert:mert123@cluster0.qj8sk.mongodb.net/?retryWrites=true&w=majority&appName=Cluster0");  // Yerel MongoDB bağlantısı
        $this->database = $this->client->user_role;
    }

    public function getCollection($collection)
    {
        return $this->connection->$collection;
    }
}
