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
     * @param string $valueCookie
     * @return $this
     */
    public function setValueCookie(string $valueCookie)
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
     * @param string $cookie
     * @return $this
     */
    public function setCookie(string $cookie)
    {
        $this->cookie = $cookie;
        return $this;
    }


    public function saveCookie(){
        $_COOKIE[$this->getCookie()] = $this->getValueCookie();
    }

    /**
     * @param $value
     * @return mixed
     */
    public function takeCookie($value){
        return $_COOKIE[$value];
    }

    /**
     * @param $value
     */
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
     * @param string $session
     * @return $this
     */
    public function setSession(string $session)
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
     * @param $sessionValue
     * @return $this
     */
    public function setSessionValue(string $sessionValue)
    {
        $this->sessionValue = $sessionValue;
        return $this;
    }


    public function saveSession(){
        $_SESSION[$this->getSession()] = $this->getSessionValue();
    }

    /**
     * @param string $value
     * @return mixed
     */
    public function takeSession(string $value){
        return $_SESSION[$value];
    }

    /**
     * @param string $value
     */
    public function deleteSession(string $value){
        $_SESSION[$value] = null;
    }

    /**
     * @return \MVC\ViewModels\User
     */
    public function getIdentity(){
        $user = IdentityUser::create()->filterById($_SESSION['id'])->findOne();
        return $user;
    }
} 