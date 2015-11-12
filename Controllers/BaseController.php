<?php
/**
 * Created by PhpStorm.
 * User: Filip
 * Date: 10/4/2015
 * Time: 9:38 AM
 */

namespace MVC\Controllers;


use MVC\View;

class BaseController extends Controller{

    public function notFound(){
        return new View();
    }
} 