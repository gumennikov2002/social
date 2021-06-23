<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\User;

class BooksController extends Controller
{
    function library()
    {
        $data = [
            'LoggedUserInfo'=>User::where('id', '=', session('LoggedUser'))->first()
        ];
        return view('library', $data);
    }
}
