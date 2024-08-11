<?php

namespace App\Http\Controllers;

use App\Models\items;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        $data = items::all();
        return view('items.index', compact('data'));
    }
}
