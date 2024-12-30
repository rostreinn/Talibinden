<?php

namespace App\Controllers;

use App\Models\UyelerModel;
use App\Models\CommentsModel;

class ProfileController extends BaseController
{
    public function index()
    {
        $session = session();

        // Kullanıcı oturumu kontrolü
        if (!$session->has('user_id')) {
            return redirect()->to('/login');
        }

        $userId = $session->get('user_id');

        $userModel = new UyelerModel();
        $commentModel = new CommentsModel();

        // Kullanıcı bilgilerini çek
        $user = $userModel->getUserById($userId);
        if (!$user) {
            return view('errors/html/error_404');
        }

        // Kullanıcı yorumlarını çek
        $comments = $commentModel->getCommentsByUserId($userId);

        // Verileri profile view'e gönder
        return view('profile', [
            'user' => $user,
            'comments' => $comments,
        ]);
    }

    public function uploadPhoto()
    {
        $session = session();
        if (!$session->has('user_id')) {
            return redirect()->to('/login');
        }

        $userId = $session->get('user_id');

        $file = $this->request->getFile('profile_photo');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $file->move(FCPATH . 'uploads/', $userId . '.jpg', true);
            return redirect()->to('/profile')->with('success', 'Fotoğraf başarıyla yüklendi.');
        }

        return redirect()->to('/profile')->with('error', 'Fotoğraf yüklenemedi.');

    }

    public function burak()
    {
        return redirect()->to('index');
    }
}

