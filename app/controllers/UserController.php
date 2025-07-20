<?php
class UserController extends Controller
{
    public function index()
    {
        $this->authorize();
        $userModel = $this->model('User');
        $users = $userModel->getAll();
        $this->view('users/index', compact('users'));
    }

    public function create()
    {
        $this->authorize();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userModel = $this->model('User');
            $data = [
                'nombre' => trim($_POST['nombre']),
                'email' => trim($_POST['email']),
                'rol' => $_POST['rol'],
                'password' => $_POST['password']
            ];
            $userModel->create($data);
            header('Location: index.php?controller=user&action=index');
            exit;
        }
        $this->view('users/form');
    }

    public function edit()
    {
        $this->authorize();
        $userModel = $this->model('User');
        $id = $_GET['id'] ?? null;
        if (!$id) {
            header('Location: index.php?controller=user&action=index');
            exit;
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'nombre' => trim($_POST['nombre']),
                'email' => trim($_POST['email']),
                'rol' => $_POST['rol'],
                'password' => $_POST['password'],
                'activo' => isset($_POST['activo']) ? 1 : 0
            ];
            $userModel->update($id, $data);
            header('Location: index.php?controller=user&action=index');
            exit;
        }
        $user = $userModel->find($id);
        $this->view('users/form', compact('user'));
    }

    public function delete()
    {
        $this->authorize();
        $userModel = $this->model('User');
        $id = $_GET['id'] ?? null;
        if ($id) {
            $userModel->delete($id);
        }
        header('Location: index.php?controller=user&action=index');
        exit;
    }

    private function authorize()
    {
        if (empty($_SESSION['user']) || $_SESSION['user']['rol'] !== 'admin') {
            header('Location: index.php');
            exit;
        }
    }
}