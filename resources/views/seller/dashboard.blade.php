<?php
  use App\Http\Controllers\ProductController;

  $productController = new ProductController;

  if (session('name')) {
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Loja de Roupas</title>

  <style>
    .chart-container { max-width: 600px; max-height: 400px; }
  </style>
</head>

<body>
  <p><a href="/">Sair</a></p>
  
  <h1>Olá, {{ session('name') }}</h1>

  <h2>Produtos por categoria:</h2>
  <canvas class="chart-container" id="productsPerCategory" width="400" height="400"></canvas>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js" integrity="sha512-QSkVNOCYLtj73J4hbmVoOV6KVZuMluZlioC+trLpewV8qMjsWqlIQvkn1KGX2StWvPMdWGBqim1xlC8krl1EKQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script>

    const categoryCanvas = document.querySelector('#productsPerCategory');
    
    const categoryAmount = <?php echo $productController->productsPerCategory(); ?>;
    const categoryNames = [];
    const categoryValues = [];
    const colors = [];

    for (const category in categoryAmount) {
      categoryNames.push(category);
      categoryValues.push(categoryAmount[category]);
      colors.push(`#${Math.floor(Math.random()*16777215).toString(16)}`);
    }

    new Chart(categoryCanvas, {
      type: 'pie',
      data: {
        labels: categoryNames,
        datasets: [{ data: categoryValues, backgroundColor: colors }]
      }
    });

  </script>
</body>
</html>

<?php
  } else {
    echo "
      <h3>É necessário estar logado para ver esta página</h3>
      </p>Você será redirecionado para a tela inicial</p>
      
      <script>
        setTimeout(() => {
          window.location.replace('/');
        }, 3000);
      </script>
    ";
  }
?>