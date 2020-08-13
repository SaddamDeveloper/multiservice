<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminPagesController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }
    public function merchantCategory()
    {
        return view('admin.merchant_category.merchant_category');
    }
}
