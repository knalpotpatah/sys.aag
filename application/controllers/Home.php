<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;

class Home extends BaseController
{
	// public function __construct()
	// {

	// Mendeklarasikan class UserModel menggunakan $this->product

	/* Catatan:
        Apa yang ada di dalam function construct ini nantinya bisa digunakan
        pada function di dalam class Product 
        */
	// }

	public function index()
	{
		$user = new UserModel;
		$data['test'] = $user->getUser();
		echo view('template/js');
		return view('welcome_message', $data);
	}

	public function dashboard()
	{
		echo view('template/header');
		echo view('template/navbar');
		echo view('template/sidebar');
		echo view('dashboard');
		echo view('template/footer');
	}

	public function edit()
	{
		$model = new UserModel();
		$id = $this->request->getPost('id');

		$user = $model->getUserOne($id);
		if (!password_verify($this->request->getPost('password'), $user->password)) {
			return json_encode([
				"statusreg" => false,
				"status" => "Current Password Salah"
			]);
		}

		if ($this->request->getPost('newpassword') !== $this->request->getPost('confirmpassword')) {
			return json_encode([
				"statusreg" => false,
				"status" => "Password Konfirmasi tidak sama"
			]);
		}

		$data = array(
			'email' => $this->request->getPost('email'),
			'password' => password_hash($this->request->getPost('newpassword'), PASSWORD_DEFAULT)
		);
		$model->editBarang($data, $id);
		return json_encode([
			"statusreg" => true,
			"status" => "Sukses mengubah data"
		]);
	}

	public function tambah()
	{

		$model = new UserModel();
		$data = array(
			'email' => $this->request->getPost('email'),
			'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT)
		);
		$model->saveBarang($data);
		return json_encode([
			"statusreg" => true,
			"status" => "Sukses tambahkan data"
		]);
	}

	// public function tambah()
	// {
	// 	$email = $this->request->getpost('email');
	// 	if ($email == "") {
	// 		$result['pesan'] = "wkwkwkwkwk";
	// 	}
	// }

	public function delete($id)
	{
		// $id = $this->request->getPost('id');
		$model = new UserModel();
		$model->hapusBarang($id);
		return redirect()->to(base_url('home'));
		// echo '<script>
		//         alert("Sukses Hapus Data");
		//         window.location="' . base_url('home') . '"
		//     </script>';
	}
	//--------------------------------------------------------------------

}
