<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MailController extends Controller
{
    public function create()
    {
        return view('admin.mail.create');
    }
}
