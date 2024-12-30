<?php
namespace App\Models;

use CodeIgniter\Model;
use MongoDB\Client;

class MongoDB extends Model
{
    protected $mongoClient;
    protected $database;

    private $collection;

    public function __construct()
    {
        // MongoDB Atlas bağlantı dizesini kullanıyoruz
        $uri = "mongodb+srv://mert:mert123@cluster0.qj8sk.mongodb.net/?retryWrites=true&w=majority&appName=Cluster0";
        
        // MongoDB Atlas'a bağlanıyoruz
        $client = new Client($uri);
        $db = $client->selectDatabase('user_role'); // MongoDB veritabanı adı
        $this->collection = $db->selectCollection('role'); // MongoDB koleksiyonu
    }

    // Veriyi MongoDB'ye ekle
    public function insertUserRole($data)
    {
        return $this->collection->insertOne($data); // MongoDB koleksiyonuna veri ekler
    }


    public function getCollection($collectionName)
    {
        return $this->database->$collectionName;
    }
}

