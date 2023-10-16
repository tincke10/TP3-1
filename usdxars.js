document.addEventListener('DOMContentLoaded', function() {
    var currencySelector = document.getElementById('monedaSelector');
    var preciosEnDolares = Array.from(document.querySelectorAll('.precio-usd')).map(precioElement => parseFloat(precioElement.getAttribute('data-precio')));
    var totalMonetaryValueElement = document.getElementById('totalMonetaryValue'); // Elemento que muestra el total monetario

    function updatePricesAndTotal(currency) {
        var tipoDeCambio = (currency === 'ars') ? 1000 : 1; // Definir el tipo de cambio según la moneda seleccionada

        preciosEnDolares.forEach(function(precioUSD, index) {
            var precioARS = precioUSD * tipoDeCambio;
            var precioElement = document.querySelectorAll('.precio-usd')[index];
            if (currency === 'ars') {
                precioElement.textContent = '$' + (precioARS).toFixed(2);
            } else {
                precioElement.textContent = '$' + precioUSD.toFixed(2);
            }
        });
    }

    currencySelector.addEventListener('change', function() {
        var selectedCurrency = currencySelector.value;
        updatePricesAndTotal(selectedCurrency);
    });

    // Actualizar precios y total monetario al cargar la página
    updatePricesAndTotal(currencySelector.value);
});
