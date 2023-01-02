<?php
/*Methods executed with the url extracted method name*/
require_once __DIR__ . "/../Models/UsuarioCredenciales.php";
class LoginController extends Controller
{
    private $loginModelInstance;
    public function __construct(PDO $connInstance)
    {
        $this->loginModelInstance = new UsuarioCredenciales($connInstance);
    }

    public function createSession($username, $idusuario)
    {        //session_start();
        $_SESSION["user"] = $username;
        $_SESSION["id"] = $idusuario;
    }


    public function login()
    {
        $this->render('login', [], "bootstrapstructure"); //so we can just specify the name of the view
    }

    public function loginpost()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST" /* && isset($_POST["usernametxt"]) && isset($_POST["password"])*/) {
            $queryForCredentials = $this->loginModelInstance->validateUserAndPass($_POST["usernametxt"], $_POST["userpass"]);

            if (sizeof($queryForCredentials) > 0) {
                $this->createSession($queryForCredentials["usuario"], $queryForCredentials["fkUsuarioDatos"]);
                header("Location:" . PUBLIC_PATH . "/dashboard/getproductos");
            } else {
                header("Location:" . PUBLIC_PATH . "/login");
            }
        }
    }

    public function logout()
    {
        if ($_GET)
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }
            session_destroy();
            unset($_SESSION);
            header("Location:" . PUBLIC_PATH . "/login");
    }
}
