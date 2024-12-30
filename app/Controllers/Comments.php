<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use CodeIgniter\Controller;
class Comments extends Controller {

    // Yorum ekleme
    public function add_comment() {
        // Formdan gelen veriyi al
        $blog_id = $this->input->post('blog_id');
        $user_id = $this->input->post('user_id');
        $comment = $this->input->post('comment');

        // Python Flask API'sine veri gönder
        $data = array(
            'blog_id' => $blog_id,
            'user_id' => $user_id,
            'comment' => $comment
        );

        $url = 'http://127.0.0.1:5000/add_comment'; // Flask API'nin URL'si

        $options = array(
            'http' => array(
                'header'  => "Content-type: application/json\r\n",
                'method'  => 'POST',
                'content' => json_encode($data)
            )
        );

        $context = stream_context_create($options);
        $result = file_get_contents($url, false, $context);

        // API'den gelen yanıtı işleyelim
        $response = json_decode($result, true);

        if ($response['success']) {
            echo 'Yorum başarıyla eklendi!';
        } else {
            echo 'Yorum eklenirken bir hata oluştu.';
        }
    }

    // Blog yorumlarını getirme
    public function get_comments($blog_id) {
        $url = 'http://127.0.0.1:5000/get_blog_comments/' . $blog_id;

        $comments = file_get_contents($url);
        $comments = json_decode($comments, true);

        if (isset($comments['comments'])) {
            $data['comments'] = $comments['comments'];
            $this->load->view('blog_comments', $data);
        } else {
            echo 'Yorumlar bulunamadı.';
        }
    }
}
