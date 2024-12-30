<?php

namespace App\Controllers;

class IndexController extends BaseController
{
    public function index()
    {
        // BaseController'dan gelen verilerle birlikte view render et
        return $this->render('index');
    }

    public function mss(){
        return redirect()->to(base_url('index.php'));
    }

    public function logout()
    {
        // Kullanıcı oturumunu sonlandır
        session()->destroy();
        return redirect()->to('/login')->with('success', 'Başarıyla çıkış yaptınız.');
    }
}
