<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class ClientController extends Controller {
  public function signup() {
    return view('client.signup');
  }

  public function login() {
    return view('client.login');
  }

  public function home() {
    return view('client.home');
  }

  public function store(Request $request) {
    $client = Client::create(array(
      'name' => $request->name,
      'email' => $request->email,
      'password' => md5($request->password)
    ));

    $client->save();

    return redirect('/home')->with('name', $request->name);
  }
}
