<?php

namespace App\Controllers;

use App\Models\RoleModel;

class RoleController extends BaseController
{
    public function index()
    {
        // Form sayfasını yükler
        return view('add-role');
    }

    public function add()
    {
        $roleModel = new RoleModel();

        // Formdan gelen verileri al
        $name = $this->request->getPost('name');
        $permissions = $this->request->getPost('permissions');
        $permissionsArray = explode(',', $permissions); // İzinleri virgülle ayırır

        // Veriyi hazırlıyoruz
        $data = [
            'name' => trim($name),
            'permissions' => array_map('trim', $permissionsArray),
        ];

        // Veriyi ekle
        try {
            $insertResult = $roleModel->create($data); // RoleModel üzerinden veriyi kaydediyoruz

            if ($insertResult) {
                session()->setFlashdata('success', 'Role başarıyla eklendi!');
            } else {
                session()->setFlashdata('error', 'Role eklenirken bir hata oluştu.');
            }
        } catch (\Exception $e) {
            session()->setFlashdata('error', 'Bir hata oluştu: ' . $e->getMessage());
        }

        // Form sayfasına yönlendir
        return redirect()->to('/role');
    }
}
