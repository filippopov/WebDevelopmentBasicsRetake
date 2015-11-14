<?php
/**
 * Created by PhpStorm.
 * User: Filip
 * Date: 11/14/2015
 * Time: 5:10 PM
 */

namespace MVC\HttpContext;


use MVC\Models\IdentityUser;

class HttpContext {

    private $cookie;

    private $valueCookie;

    private $session;

    private $sessionValue;

    /**
     * @var HttpContext
     */
    private static $inst = null;

    private function __construct()
    {
    }

    /**
     * @return HttpContext
     */
    public static function create(){
        if(self::$inst == null){
            self::$inst = new self();
        }

        return self::$inst;
    }

    /**
     * @return mixed
     */
    private function getValueCookie()
    {
        return $this->valueCookie;

    }

    /**
     * @param mixed $valueCookie
     */
    public function setValueCookie($valueCookie)
    {
        $this->valueCookie = $valueCookie;
        return $this;
    }

    /**
     * @return mixed
     */
    private function getCookie()
    {
        return $this->cookie;
    }

    /**
     * @param mixed $cookie
     */
    public function setCookie($cookie)
    {
        $this->cookie = $cookie;
        return $this;
    }


    public function saveCookie(){
        $_COOKIE[$this->getCookie()] = $this->getValueCookie();
    }

    public function takeCookie($value){
        return $_COOKIE[$value];
    }

    public function deleteCookie($value){
        $_COOKIE[$value] = null;
    }

    /**
     * @return mixed
     */
    private function getSession()
    {
        return $this->session;
    }

    /**
     * @param mixed $session
     */
    public function setSession($session)
    {
        $this->session = $session;
        return $this;
    }

    /**
     * @return mixed
     */
    private function getSessionValue()
    {
        return $this->sessionValue;
    }

    /**
     * @param mixed $sessionValue
     */
    public function setSessionValue($sessionValue)
    {
        $this->sessionValue = $sessionValue;
        return $this;
    }

    public function saveSession(){
        $_SESSION[$this->getSession()] = $this->getSessionValue();
    }

    public function takeSession($value){
        return $_SESSION[$value];
    }

    public function deleteSession($value){
        $_SESSION[$value] = null;
    }

    public function getIdentity(){
        $user = IdentityUser::create()->filterById($_SESSION['id'])->findOne();
        return $user;
    }
} 