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
    <a href="/">Voltar</a>
  </p>

  <h1>Entrar como vendedor(a)</h1>
  <form action="/vendedor/login" method="POST">
    @csrf
    <label>
      E-mail:<br>
      <input type="email" placeholder="Seu e-mail" name="email">
    </label>
    <br>
    <br>
    <label>
      Senha:<br>
      <input type="password" placeholder="Sua senha" name="password">
    </label>
    <br>
    <br>
    <button type="submit">Entrar</button>
  </form>

  <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
</body>
</html>