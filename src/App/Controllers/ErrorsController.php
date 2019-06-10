<?php
/**
 * Created by PhpStorm.
 * User: Willian
 * Date: 08/06/2019
 * Time: 15:03
 */

namespace App\Controllers;
use Core\Controller;
use Core\Container;

class ErrorsController extends Controller
{
    public function notFound()
    {

        $this->render(null, '404', true);
    }


}