<?php

namespace App\Controllers;

use App\Models\UyelerModel;

class RegisterController extends BaseController
{
    public function index()
    {
        return view('register');
    }

    public function store()
    {
        // Form doğrulama kuralları
        $rules = [
            'kullaniciadi' => 'required',
            'email'        => 'required|valid_email',
            'password'     => 'required|min_length[6]',
            'confirm_password' => 'required|matches[password]',
        ];

        // Formda herhangi bir hata varsa
        if (!$this->validate($rules)) {
            return redirect()->back()->with('error', 'Formda hata var!')->withInput();
        }

        // Veritabanına eklemek için veriler
        $data = [
            'kullaniciadi' => $this->request->getPost('kullaniciadi'),
            'email'        => $this->request->getPost('email'),
            'password'     => password_hash($this->request->getPost('password'), PASSWORD_BCRYPT),
            'user_role'    => 'user', // Varsayılan olarak 'user' rolü atanır
        ];

        // Kullanıcı modelini yükle
        $userModel = new UyelerModel();

        // Veriyi veritabanına ekle
        if ($userModel->insert($data)) {
            return redirect()->to(base_url('register'))->with('success', 'Kayıt başarılı!');
        } else {
            return redirect()->back()->with('error', 'Kayıt Başarılı.');
        }
    }
}
