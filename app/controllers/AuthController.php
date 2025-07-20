<?php
class AuthController extends Controller {
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userModel = $this->model('User');
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';
            $user = $userModel->authenticate($email, $password);

            if ($user) {
                $_SESSION['user'] = $user;
                // Redirigir según el rol
                switch ($user['rol']) {
                    case 'admin':
                        header('Location: index.php?controller=dashboard&action=admin');
                        break;
                    case 'comprador':
                        header('Location: index.php?controller=dashboard&action=compras');
                        break;
                    case 'vendedor':
                        header('Location: index.php?controller=dashboard&action=ventas');
                        break;
                    case 'logistica':
                        header('Location: index.php?controller=dashboard&action=logistica');
                        break;
                    case 'finanzas':
                        header('Location: index.php?controller=dashboard&action=finanzas');
                        break;
                    default:
                        header('Location: index.php');
                }
                exit;
            } else {
                $error = "Usuario o contraseña incorrectos.";
                $this->view('auth/login', compact('error'));
                return;
            }
        }
        $this->view('auth/login');
    }

    public function logout() {
        session_destroy();
        header('Location: index.php');
        exit;
    }
}