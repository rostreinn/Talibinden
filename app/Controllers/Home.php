<?php

namespace App\Controllers;

use MongoDB;// composerla yüklendi
//genel dokümantasyon --> https://www.mongodb.com/docs/php-library/current/get-started/
//veri okuma için dokümantasyon --> https://www.mongodb.com/docs/php-library/current/read/
//veri yazma için dokümantasyon --> https://www.mongodb.com/docs/php-library/current/write/

//mongo kurulum için dokümantasyon --> https://www.mongodb.com/developer/languages/php/php-setup/
//ek bilgi için dokümantasyon --> https://www.mongodb.com/developer/languages/php/php-crud/

class Home extends BaseController
{
    public function index()
    {
        return view('welcome_message');
    }

    public function test($ornek)
    {
        $kul_adi="mert";
        $sifre="mert123";
        $adres="cluster0.qj8sk.mongodb.net";
        $veritabani="user_role";

        switch ($ornek)
        {
        
         
            case 3:{//koleksiyondaki toplam veri miktarı
                $koleksiyon_adi='role';
                $client = new MongoDB\Client("mongodb+srv://$kul_adi:$sifre@$adres");

                $koleksiyon = $client->selectCollection($veritabani, $koleksiyon_adi);
                $toplam = $koleksiyon->countDocuments([]);

                echo $toplam;
            }break;
            
        }

    }
}
