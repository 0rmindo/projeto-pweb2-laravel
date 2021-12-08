<?php

namespace App\Http\Controllers;

use App\Models\Seller;
use Illuminate\Http\Request;

class SellerController extends Controller {
  public function signup() {
    return view('seller.signup');
  }

  public function signin() {
    return view('seller.login');
  }

  public function dashboard() {
    return view('seller.dashboard');
  }

  public function create(Request $request) {
    $seller = Seller::create(array(
      'name' => $request->name,
      'email' => $request->email,
      'password' => md5($request->password)
    ));

    $seller->save();

    return redirect('/dashboard')->with('name', $request->name);
  }

  public function login(Request $request) {
    $sellers = Seller::where('email', $request->email)->get();
    
    if (sizeof($sellers) > 0) {
      $passwordIsCorrect = $sellers[0]['password'] === md5($request->password);
      
      if ($passwordIsCorrect) {
        return redirect('/dashboard')->with('name', $sellers[0]['name']);
      }
    }

    echo "
      <h3>E-mail e/ou senha incorretos</h3>
      </p>Você será redirecionado para a tela inicial</p>
      
      <script>
        setTimeout(() => {
          window.location.replace('/');
        }, 3000);
      </script>
    ";
  }
}
