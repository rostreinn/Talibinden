from flask import Flask, request, jsonify
from pymongo import MongoClient
from bson.objectid import ObjectId


app = Flask(__name__)

# MongoDB Bağlantısı
client = MongoClient("mongodb+srv://mert:mert123@cluster0.qj8sk.mongodb.net/?retryWrites=true&w=majority&appName=Cluster0")
db = client['blog_database']

# Blog ve Yorumlar Koleksiyonları
blogs_collection = db['blogs']
comments_collection = db['comments']



@app.route('/add_comment', methods=['POST'])
def add_comment():
    try:
        # Gelen JSON verisini al
        data = request.get_json()

        # Veriyi konsola yazdırarak kontrol et
        print("Gelen veri:", data)

        # Verinin eksik olup olmadığını kontrol et
        if 'blog_id' not in data or 'user_id' not in data or 'comment' not in data:
            return jsonify({'success': False, 'message': 'Eksik veri, lütfen blog_id, user_id ve comment parametrelerini kontrol edin.'}), 400

        # MongoDB formatına uygun olarak veriyi hazırlıyoruz
        comment_data = {
            "_id": str(ObjectId()),  # MongoDB ID'si (otomatik oluşturulacak)
            "blog_id": data['blog_id'],
            "user_id": data['user_id'],
            "comment": data['comment']
        }

        # MongoDB'ye veriyi kaydediyoruz
        comments_collection.insert_one(comment_data)

        # Örnek başarılı yanıt
        return jsonify({'success': True, 'message': 'Yorum başarıyla eklendi!', 'data': comment_data})

    except Exception as e:
        # Hata mesajını döndür
        print(f"Hata: {str(e)}")
        return jsonify({'success': False, 'message': str(e)}), 500
    except Exception as e:
        # Hata mesajını döndür
        print(f"Hata: {str(e)}")
        return jsonify({'success': False, 'message': str(e)}), 500


@app.route('/get_blog_comments/<blog_id>', methods=['GET'])
def get_blog_comments(blog_id):
    try:
        blog_id = ObjectId(blog_id)  # Blog ID'sinin geçerli bir ObjectId olduğunu doğrula
    except Exception as e:
        return jsonify({'error': 'Invalid blog ID format'}), 400
    
    blog = blogs_collection.find_one({'_id': blog_id})
    if blog:
        return jsonify({'comments': blog.get('comments', [])})
    return jsonify({'error': 'Blog not found'}), 404

if __name__ == '__main__':
    app.run(debug=True)
