<?php
class Utilisateur{
    
    private $login;
    private $passwd;
    private $role;

	public function getLogin() {
		return $this->login;
	}

	
	public function getPasswd() {
		return $this->passwd;
	}
    public function __construct($login, $passwd,$role)
    {
        $this->login = $login;
        $this->passwd = $passwd;
        $this->role=$role;
    }

	/**
	 * @return mixed
	 */
	public function getRole() {
		return $this->role;
	}
	
	/**
	 * @param mixed $role 
	 * @return self
	 */
	public function setRole($role): self {
		$this->role = $role;
		return $this;
	}
}
?>