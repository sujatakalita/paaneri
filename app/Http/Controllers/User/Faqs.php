<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Faqs extends Controller
{
    public function index()
    {
        return view('user.faqs.index');
    }
}
