<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UserType;
use Illuminate\Http\Request;

class UserTypeController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index()
  {
    $usertype = UserType::all();
    return view('admin.usertype.index', ['userstype'=>$usertype]);
  }

  public function create()
  {
    return view('admin.usertype.create');
  }

  public function store(Request $request)
    {
      $newUserType = new UserType();
      $newUserType->name = $request->usertype;
      $newUserType->save();
      return redirect()->back();
    }

    public function update(Request $request, $usertypeId)
    {
      $usertype = UserType::find($usertypeId);
      $usertype->name = $request->usertype;
      $usertype->save();
      return redirect()->back();
    }

    public function delete(Request $request, $usertypeId)
    {
      $usertype = UserType::find($usertypeId);
      $usertype->delete();
      return redirect()->back();
    }
}
