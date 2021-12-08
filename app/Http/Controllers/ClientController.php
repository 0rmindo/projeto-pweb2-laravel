<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class ClientController extends Controller {
  public function signup() {
    return view('client.signup');
  }

  public function signin() {
    return view('client.login');
  }

  public function home() {
    return view('client.home');
  }

  public function create(Request $request) {
    $clients = Client::where('email', $request->email)->get();
    
    if (sizeof($clients) === 0) {
      $client = Client::create(array(
        'name' => $request->name,
        'email' => $request->email,
        'password' => md5($request->password)
      ));
  
      $client->save();
  
      return redirect('/home')->with('name', $request->name);
    }

    echo "
      <h3>Este endereço de e-mail já está sendo usado</h3>
      </p>Você será redirecionado para a tela inicial</p>

      <script>
        setTimeout(() => {
          window.location.replace('/');
        }, 3000);
      </script>
    ";
  }
  
  public function login(Request $request) {
    $clients = Client::where('email', $request->email)->get();
    
    if (sizeof($clients) > 0) {
      $passwordIsCorrect = $clients[0]['password'] === md5($request->password);
      
      if ($passwordIsCorrect) {
        return redirect('/dashboard')->with('name', $clients[0]['name']);
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
