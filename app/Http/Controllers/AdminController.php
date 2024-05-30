<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        // Esempio di contenuto per la dashboard amministrativa
        return view('admin.index');
    }
}
