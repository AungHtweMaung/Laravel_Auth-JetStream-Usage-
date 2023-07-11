<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function home()
    {
        return "Home Page";
    }

    public function about()
    {
        return "about Page";
    }

    public function contact()
    {

        return "contact Page";
    }

}
