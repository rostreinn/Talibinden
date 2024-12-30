<?php

namespace App\Controllers;

use App\Models\UyelerModel;
use App\Models\RoleModel;
use CodeIgniter\Controller;

class AdminController extends Controller
{
    protected $userModel;
    protected $roleModel;

    public function __construct()
    {
        $this->userModel = new UyelerModel();
        $this->roleModel = new RoleModel();

        // Admin kontrolü yapalım
        $this->checkAdminAccess();
    }

    // Admin Kontrolü Fonksiyonu
    private function checkAdminAccess()
    {
        // Eğer kullanıcı giriş yapmamışsa veya admin değilse, ana sayfaya yönlendir
        if (!session()->get('isLoggedIn') || session()->get('user_role') !== '1') {
            return redirect()->to('/index.php');
        }
    }

    // Ana Sayfa
    public function index()
    {
        $users = $this->userModel->findAll();
        return view('admin/index', ['users' => $users]);
    }

    // Kullanıcı Listeleme
    public function userList()
    {
        // Kullanıcıları alıyoruz
        $users = $this->userModel->findAll();
        
        // Eğer kullanıcı yoksa, kullanıcıyı 'users' değişkenine boş dizi olarak aktaralım
        if (!$users) {
            $users = [];
        }

        return view('admin/user_list', ['users' => $users]);
    }

    // Kullanıcı Ekleme
    public function createUser()
    {
        return view('admin/create_user');
    }

    // Kullanıcı Kaydetme
    public function saveUser()
    {
        $data = $this->request->getPost();
        if (isset($data['password'])) {
            $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);
        }
        $this->userModel->save($data);
        session()->setFlashdata('success', 'Kullanıcı başarıyla kaydedildi!');
        return redirect()->to('/admin/user_list');
    }

    // Kullanıcı Düzenleme
    public function editUser($id)
    {
        $user = $this->userModel->getUserById($id);
        if (!$user) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Kullanıcı bulunamadı: $id");
        }
        return view('admin/edit_user', ['user' => $user]);
    }

    // Kullanıcı Güncelleme
    public function updateUser($id)
    {
        $data = $this->request->getPost();  // POST verilerini alıyoruz
        // Eğer password varsa şifreyi hashliyoruz
        if (isset($data['password'])) {
            $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);
        }
        // İzinleri virgülle ayırarak dizi haline getiriyoruz
        if (isset($data['permissions'])) {
            $data['permissions'] = implode(', ', explode(',', $data['permissions']));
        }

        // Veriyi güncelliyoruz
        $this->userModel->update($id, $data);

        return redirect()->to('/admin/user_list');  // Kullanıcılar sayfasına yönlendiriyoruz
    }

    // Kullanıcı Silme
    public function deleteUser($id)
    {
        $this->userModel->delete($id);
        return redirect()->to('/admin/user_list');
    }

    // Roller Listeleme
    public function roles()
    {
        $roles = $this->roleModel->getAll();
        return view('admin/role_list', ['roles' => $roles]);
    }

    // Rol Ekleme
    public function createRole()
    {
        return view('admin/create_role');
    }

    // Rol Kaydetme
    public function saveRole()
    {
        $data = $this->request->getPost();
        $this->roleModel->create($data);
        return redirect()->to('/admin/role_list');
    }

    // Rol Düzenleme
    public function editRole($id)
    {
        $role = $this->roleModel->getById($id);
        return view('admin/edit_role', ['role' => $role]);
    }

    // Rol Güncelleme
    public function updateRole($id)
    {
        $data = $this->request->getPost();
        $this->roleModel->updateRole($id, $data);
        return redirect()->to('/admin/role_list');
    }

    // Rol Silme
    public function deleteRole($id)
    {
        $this->roleModel->deleteRole($id);
        return redirect()->to('/admin/role_list');
    }
}
