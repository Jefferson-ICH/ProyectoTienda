<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SocialNetworkController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index()
  {
    return view('admin.socialnetwork.index');
  }

  public function create()
  {
    return view('admin.socialnetwork.create');
  }

  public function store()
  {

  }
}
