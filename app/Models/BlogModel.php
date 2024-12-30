<?php

namespace App\Models;

use CodeIgniter\Model;

class BlogModel extends Model
{
    protected $table = 'blogs';  // Blog verileri hangi tablodan alınacak
    protected $primaryKey = 'id'; // Primary key
    protected $allowedFields = ['title', 'content']; // İzin verilen alanlar

    // Tüm blogları getiren fonksiyon
    public function getBlogs()
    {
        return $this->findAll();
    }

    // Yorum ekleme fonksiyonu
    public function addComment($blogId, $comment)
    {
        // Yorumları tutacak tabloyu ekleyin (örneğin: comments tablosu)
        $commentData = [
            'blog_id' => $blogId,
            'comment' => $comment,
            'user_id' => session('user_id'), // Kullanıcı id'sini alın
        ];

        // Yorum verisini ekleyelim
        $db = \Config\Database::connect();
        $builder = $db->table('comments');
        return $builder->insert($commentData);
        
    }
}
