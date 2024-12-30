<?php

namespace App\Controllers;

class HeaderController extends BaseController
{
    public function index()
    {
        return $this->render('index'); // 'index' yerine istediğiniz view dosyasını yazın
    }

    public function blog()
    {
        return $this->render('blog'); // 'blog' yerine istediğiniz view dosyasını yazın
    }

    public function profile()
    {
        return $this->render('profile'); // 'profile' yerine istediğiniz view dosyasını yazın
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login')->with('success', 'Başarıyla çıkış yaptınız.');
    }
}

