<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{

    protected $uslov = true;
    public function index()
    {
        if ($this->uslov) {

            return view('contact');
        } else {
            echo 'Wrong page! Sorry try again!';
        }
    }
}
