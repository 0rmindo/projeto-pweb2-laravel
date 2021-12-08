<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Loja de Roupas</title>
</head>

<body>
  <p>
    <a href="/vendedor/cadastrar">Criar loja</a> |
    <a href="/vendedor/entrar">Entrar como vendedor(a)</a>
  </p>

  <h1>Criar conta</h1>
  
  <form action="/cliente/novo" method="POST">
    @csrf
    <label>Nome completo:<br>
      <input type="text" placeholder="Seu nome" name="name" required>
    </label>
    <br> <br>

    <label>E-mail:<br>
      <input type="email" placeholder="Seu melhor e-mail" name="email" required>
    </label>
    <br> <br>
    
    <label>Senha:<br>
      <input type="password" placeholder="Sua senha" name="password" required>
    </label>
    <br> <br>
    
    <button type="submit">Criar Conta</button>
    <br> <br>
    
    <p>Já possui uma conta? <a href="/cliente/login">Faça login</a>.</p>
  </form>

  <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
</body>
</html>