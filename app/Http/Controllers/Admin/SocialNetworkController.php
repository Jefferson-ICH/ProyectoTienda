<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SocialNetwork;
use Illuminate\Http\Request;

class SocialNetworkController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index()
  {
    $socialnetwork = SocialNetwork::all();
    return view('admin.socialnetwork.index', ['socialnetworks'=>$socialnetwork]);
  }

  public function create()
  {
    return view('admin.socialnetwork.create');
  }

  public function store(Request $request)
    {
      $newSocialNetwork = new SocialNetwork();
      $newSocialNetwork->name = $request->socialnetwork;
      $newSocialNetwork->save();
      return redirect()->back();
    }

    public function update(Request $request, $socialnetworkId)
    {
      $socialnetwork = SocialNetwork::find($socialnetworkId);
      $socialnetwork->name = $request->socialnetwork;
      $socialnetwork->save();
      return redirect()->back();
    }

    public function delete(Request $request, $socialnetworkId)
    {
      $socialnetwork = SocialNetwork::find($socialnetworkId);
      $socialnetwork->delete();
      return redirect()->back();
    }

}
