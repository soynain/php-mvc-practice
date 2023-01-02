<?php
/*Methods executed with the url extracted method name*/
require_once __DIR__ . "/../Auth/SessionCreate.php";
require_once __DIR__ . "/../Models/UsuarioCredenciales.php";
class LoginController extends Controller
{
    private $loginModelInstance;
    public function __construct(PDO $connInstance)
    {
        $this->loginModelInstance = new UsuarioCredenciales($connInstance);
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
                createSession($queryForCredentials->usuario, $queryForCredentials->fkUsuarioDatos);
                header("Location:" . PUBLIC_PATH . "/dashboard/getproductos");
            } else {
                header("Location:" . PUBLIC_PATH . "/");
            }
        }
    }

    public function logout()
    {
        if ($_GET)
            session_destroy();
            header("Location:" . PUBLIC_PATH . "/");
    }
}
