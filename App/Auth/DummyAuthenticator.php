<?php

namespace App\Auth;

use App\Core\IAuthenticator;
use App\Models\User;

/**
 * Class DummyAuthenticator
 * Basic implementation of user authentication
 * @package App\Auth
 */
class DummyAuthenticator implements IAuthenticator
{
    /**
     * DummyAuthenticator constructor
     */
    public function __construct()
    {
        session_start();
    }

    /**
     * Verify, if the user is in DB and has his password is correct
     * @param $login
     * @param $password
     * @return bool
     * @throws \Exception
     */
    public function login($login, $password): bool
    {
        $id=null;
        $users=User::getAll();

        foreach ($users as $user){
            if($user->getName() == $login){
                $id=$user->getId();
                break;
            }
        }
        $user = User::getOne($id);

        // Kontrola, či sa používateľ našiel a heslo sa zhoduje
        if ($user && password_verify($user->getNasada() . $password, $user->getPassword())) {
            //Prihlásenie úspešné, uloženie informácií do session
            $_SESSION['user'] = $user->getName();
            $_SESSION['admin'] = $user->getIsAdmin();
            return true;
        } else {
            return false;
        }
    }

    /**
     * Logout the user
     */
    public function logout(): void
    {
        if (isset($_SESSION["user"])) {
            unset($_SESSION["user"]);
            session_destroy();
        }
    }

    /**
     * Get the name of the logged-in user
     * @return string
     * @throws \Exception
     */
    public function getLoggedUserName(): string
    {
        return isset($_SESSION['user']) ? $_SESSION['user'] : throw new \Exception("User not logged in");
    }

    public function isLoggedUserAdmin(): bool
    {
        if($_SESSION['admin'] == ''){
            return false;
        }
        return true;
    }

    /**
     * Get the context of the logged-in user
     * @return string
     */
    public function getLoggedUserContext(): mixed
    {
        return null;
    }

    /**
     * Return if the user is authenticated or not
     * @return bool
     */
    public function isLogged(): bool
    {
        return isset($_SESSION['user']) && $_SESSION['user'] != null;
    }

    /**
     * Return the id of the logged-in user
     * @return mixed
     */
    public function getLoggedUserId(): mixed
    {
        return $_SESSION['user'];
    }
}
