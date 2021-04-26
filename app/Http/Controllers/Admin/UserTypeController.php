<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserTypeController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index()
  {
    return view('admin.usertype.index');
  }

  public function create()
  {
    return view('admin.usertype.create');
  }

  public function store()
  {

  }
}
