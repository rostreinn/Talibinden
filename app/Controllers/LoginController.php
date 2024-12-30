<?php

namespace App\Controllers;

use App\Models\UyelerModel;

class LoginController extends BaseController
{
    public function index()
    {
        helper(['form', 'url']);
        return view('login'); // Giriş formunu göstermek için
    }

    public function authenticate()
    {
        $uyelerModel = new UyelerModel();

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        // Kullanıcıyı email ile bul
        $user = $uyelerModel->where('email', $email)->first();

        if ($user && password_verify($password, $user['password'])) {
            // Kullanıcı oturumu başlat
            session()->set([
                'user_id'       => $user['id'],
                'kullaniciadi'  => $user['kullaniciadi'],
                'user_role'     => $user['user_role'] ?? 'user',
                'isLoggedIn'    => true,
            ]);

            // Başarılı giriş sonrası kök URL'ye yönlendirme
            return redirect()->to(base_url('/'))->with('success', 'Giriş başarılı!');
        }

        // Hata mesajı ile giriş sayfasına yönlendirme
        return redirect()->back()->with('error', 'E-posta veya şifre hatalı.')->withInput();
    }

    public function logout()
    {
        // Oturumu bitir
        session()->destroy();
        return redirect()->to('/login')->with('success', 'Başarıyla çıkış yaptınız.');
    }
}
