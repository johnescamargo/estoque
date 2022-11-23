// Button save from products (Em estoque "fetch.php")
$(document).ready(function () {
  $("button").click(function () {
    var id_produto = "#id-" + this.id;
    var entrada1 = "#entrada-" + this.id;
    var venda1 = "#venda-" + this.id;
    var consumo1 = "#consumo-" + this.id;
    var perda1 = "#perda-" + this.id;
    var categoria_nome = "#fetchval";
    var quantity = "#quantity-" + this.id;

    //alert(id_categoria);
    //alert($(id_categoria).val());

    id_produto = $(id_produto).text();
    categoria_nome = $(categoria_nome).val();
    var entrada = $(entrada1).val();
    var venda = $(venda1).val();
    var consumo = $(consumo1).val();
    var perda = $(perda1).val();
    quantity = $(quantity).text();

    entrada = catchNull(entrada);
    venda = catchNull(venda);
    consumo = catchNull(consumo);
    perda = catchNull(perda);

    var dataString = [
      id_produto,
      categoria_nome,
      entrada,
      venda,
      consumo,
      perda,
    ];

    var jsonString = JSON.stringify(dataString);

    $.ajax({
      type: "POST",
      url: "./produtos/save_product.php",
      data: { data: jsonString },
      cache: false,

      success: function (data) {
        $(".test").html(data);
      },
    });

    // Calculation for Stock
    var updated_quant =
      parseInt(quantity) +
      parseInt(entrada) +
      -1 * (parseInt(venda) + parseInt(consumo) + parseInt(perda));

      // updating DOM
    var id_prod = "#quantity-" + id_produto;
    $(id_prod).html(updated_quant);
    $(entrada1).val("");
    $(venda1).val("");
    $(consumo1).val("");
    $(perda1).val("");
  });
});

//Check if value is empty and assign 0 instead
function catchNull(data) {
  if (data === "") {
    data = 0;
    return data;
  } else {
    return data;
  }
}
