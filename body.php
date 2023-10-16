<body>
<main id="main" class="main">

    <div class="pagetitle">
      <h1>
        Listado de Productos </h1>

      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Inicio</a></li>
          <li class="breadcrumb-item"><a href="#">Productos</a></li>
          <li class="breadcrumb-item active">Los mas vendidos</li>


        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
    <?php
    require_once "array.php";
    ?>

<div class="col-xxl-4 col-md-6">
    <div class="card info-card revenue-card">
        <div class="card-body">
            <h5 class="card-title">
                PRODUCTOS <span>| Cantidad para la venta web</span>
            </h5>
            <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-patch-check-fill"></i>
                </div>
                <div class="ps-3">
                    <?php
                    require_once 'TotalProductsComponent.php';

                    // Crear instancia del microcomponente para la cantidad total de productos
                    $totalProductsComponent = new TotalProductsComponent($productos);

                    // Mostrar la cantidad total de productos
                    echo '<h6>' . $totalProductsComponent->render() . '</h6>';
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-xxl-4 col-md-6">
    <div class="card info-card revenue-card">
        <div class="card-body">
            <h5 class="card-title">
                Total <span>| Monetario en Stock</span>
            </h5>
            <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-currency-dollar"></i>
                </div>
                <div class="ps-3">
                <?php
require_once 'TotalMonetaryValueComponent.php';

// Crear instancia del microcomponente para el valor monetario total en stock
$totalMonetaryValueComponent = new TotalMonetaryValueComponent($productos);
$monetaryValueString = $totalMonetaryValueComponent->render();
$cleanedValue = str_replace(['$', ','], '', $monetaryValueString);

// Imprimir el valor limpio como un número flotante en JavaScript
echo '<h6 class="precio precio-usd" data-precio="' . $cleanedValue . '">$' . number_format((float) $cleanedValue, 2) . '</h6>';



?>
                </div>
            </div>
        </div>
    </div>
</div>


  </section>
  </main>
  <script src="usdxars.js"></script>
  </body>
</html>