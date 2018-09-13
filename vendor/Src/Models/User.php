<?php 
namespace Src\Models;
use \Src\DB\Sql;
use \Src\Model;

class User extends Model {

	const SESSION = "userSession";
	
	public static function login($username, $password) {
		$sql = new Sql();
		$results  = $sql->select("SELECT *FROM tb_users WHERE username = :USERNAME", array(
			"USERNAME" => $username
		));
		if (count($results) == 0) {
			throw new \Exception("Usuário inexistente ou senha inválida");
		}
		$data = $results[0];
		// password_hash(string, PASSWORD_DEFAULT) Gera um hash de uma string
		if ($password == $data["password"]) {
			$user = new User();
			$user->setData($data);
			$_SESSION[User::SESSION] = $user->getData();
			return $user;
		} else {
			throw new \Exception("Usuário inexistente ou senha inválida"); // Exception não existe neste namespace
		}
	}

	public static function verifyLogin($inadmin = true){
		if (!isset($_SESSION[User::SESSION]) || !$_SESSION[User::SESSION] || (int)$_SESSION[User::SESSION]["iduser"] > 0 || (bool)$_SESSION[User::SESSION]["inadmin"] !== $inadmin) {
			header("Location: /admin/login");
			exit;
		}
	}
}

?>