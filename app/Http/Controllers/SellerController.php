<?php

namespace App\Http\Controllers;

use App\Models\Seller;
use Illuminate\Http\Request;

class SellerController extends Controller {
  public function signup() {
    return view('seller.signup');
  }

  public function login() {
    return view('seller.login');
  }

  public function dashboard() {
    return view('seller.dashboard');
  }

  public function store(Request $request) {
    $seller = Seller::create(array(
      'name' => $request->name,
      'email' => $request->email,
      'password' => md5($request->password)
    ));

    $seller->save();

    return redirect('/dashboard')->with('name', $request->name);
  }
}
