<?php
require_once 'EnComponentTable.php';

// Array multidimensional de productos
$productos = array(
  array(
    "codigo" => 1,
    "imagen" => array("ubicacion" => "assets/img/product-1.jpg", "nombre" => "Zapatillas"),
    "descripcion" => "Nike Pegasus Trail 4 GORE-TEX",
    "stockActual" => 40,
    "stockMinimo" => 5,
    "precio" => 35.99,
    // "ventaWeb" => true
),
array(
    "codigo" => 2,
    "imagen" => array("ubicacion" => "assets/img/product-2.jpg", "nombre" => "NombreImagen2"),
    "descripcion" => "Smart Watch for Android / iOS Phone",
    "stockActual" => 25,
    "stockMinimo" => 3,
    "precio" => 19.95,
    // "ventaWeb" => true
),
array(
    "codigo" => 3,
    "imagen" => array("ubicacion" => "assets/img/product-3.jpg", "nombre" => "NombreImagen3"),
    "descripcion" => "Labs Caffeine Cleanse",
    "stockActual" => 10,
    "stockMinimo" => 2,
    "precio" => 29.99,
    // "ventaWeb" => false
),
array(
    "codigo" => 4,
    "imagen" => array("ubicacion" => "assets/img/product-4.jpg", "nombre" => "NombreImagen4"),
    "descripcion" => "Sunglasses AVIATOR CLASSIC",
    "stockActual" => 25,
    "stockMinimo" => 8,
    "precio" => 22.50,
    // "ventaWeb" => true
),
array(
    "codigo" => 5,
    "imagen" => array("ubicacion" => "assets/img/product-5.jpg", "nombre" => "NombreImagen5"),
    "descripcion" => "HyperX Cloud III Wireless Gaming Headset (Black)",
    "stockActual" => 40,
    "stockMinimo" => 6,
    "precio" => 34.75,
    // "ventaWeb" => true
)
);

foreach ($productos as &$producto) {
$diferenciaStock = $producto["stockActual"] - $producto["stockMinimo"];
$producto["ventaWeb"] = $diferenciaStock > 10;
$producto["monetarioEnStock"] = $producto["stockActual"] * $producto["precio"];
}
// Creo una instancia del componente y muestro la tabla
$productTable = new ProductTableComponent($productos);
echo $productTable->render();
?>