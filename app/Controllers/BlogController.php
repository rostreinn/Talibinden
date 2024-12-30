<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class BlogController extends Controller
{
    // Blog sayfasını render etme
    public function blog()
    {
        // Blog verilerini manuel olarak bir dizide tutuyoruz
        $blogs = [
            [
                '_id' => 1,
                'title' => 'İlk Blog Yazım',
                'content' => 'Bu, ilk blog yazımın içeriğidir.',
                'comments' => [
                    ['user_id' => 1, 'comment' => 'Bu yazıyı çok beğendim!'],
                    ['user_id' => 2, 'comment' => 'Harika bir içerik, teşekkürler!']
                ]
            ],
            [
                '_id' => 2,
                'title' => 'İkinci Blog Yazım',
                'content' => 'İkinci yazım burada yer alıyor.',
                'comments' => [
                    ['user_id' => 1, 'comment' => 'Yorum 1.']
                ]
            ]
        ];

        // Veriyi view'e gönderiyoruz
        return view('blog', ['blogs' => $blogs]);
    }

    // Yorum ekleme işlemi
    public function addComment()
    {
        // CodeIgniter 4'te doğru veri alma yöntemi
        $blog_id = $this->request->getPost('blog_id');
        $user_id = $this->request->getPost('user_id');
        $comment = $this->request->getPost('comment');

        // Python Flask API'sine veri gönder
        $data = array(
            'blog_id' => $blog_id,
            'user_id' => $user_id,
            'comment' => $comment
        );

        $url = 'http://127.0.0.1:5000/add_comment'; // Flask API'nin URL'si

        // cURL kullanarak veriyi gönder
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data)); // JSON formatında veri gönderiyoruz
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

        $response = curl_exec($ch);
        
        // cURL isteği başarısızsa hata mesajı al
        if (curl_errno($ch)) {
            echo 'cURL Error: ' . curl_error($ch);
            exit;
        }

        curl_close($ch);

        // API'den gelen yanıtı kontrol et
        $response_data = json_decode($response, true);

        // Eğer response_data geçerli ve success anahtarı varsa
        if ($response_data && isset($response_data['success']) && $response_data['success']) {
            echo 'Yorum başarıyla eklendi!';
        } else {
            // Eğer success anahtarı yoksa veya yanıt başarısızsa
            echo 'Yorum eklenirken bir hata oluştu: ' . (isset($response_data['message']) ? $response_data['message'] : 'Bilinmeyen hata');
        }
    }
    private function makePostRequest($url, $data)
    {
        $options = [
            'http' => [
                'header'  => "Content-type: application/json\r\n",
                'method'  => 'POST',
                'content' => json_encode($data),
            ],
        ];

        $context  = stream_context_create($options);
        $result = file_get_contents($url, false, $context);
        return json_decode($result, true);
    }
}
