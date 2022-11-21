// Get the modal
var modal = document.getElementById("myModal");
var name1 = document.getElementById("name1");
const log = document.getElementById("values");
var id = -1;

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal
function func(nome) {
  modal.style.display = "block";
  name1.value = nome;
}

// When the user clicks on <span> (x), close the modal
span.onclick = function () {
  modal.style.display = "none";
};

// When the user clicks anywhere outside of the modal, close it
window.onclick = function (event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
};

$(document).ready(function () {
  $("button").click(function () {
    var id_category = "#id-" + this.id;
    var id_update = "#" + this.id;
    var id_up = this.id;

    if (this.id == "create") {
      var dataString = [name1.value, id];

      var jsonString = JSON.stringify(dataString);

      $.ajax({
        type: "POST",
        url: "./category/update_category.php",
        data: { data: jsonString },
        cache: false,
        success: function (data) {
          $(".test").html(data);
          location.reload(); // Reloading the page
        },
      });
    } else if (id_category.match("update")) {
      var nome = id_up.replace("update-", "");
      id = nome;
      var name = "name-" + nome;
      var name2 = document.getElementById(name.toString()).innerHTML;
      func(name2);
    } else {
      id_category = $(id_category).text();
      $.ajax({
        type: "POST",
        url: "./category/delete_category.php",
        data: "request=" + id_category,
        success: function (data) {
          $(".test").html(data);
          location.reload(); // Reloading the page
        },
      });
    }
  });
});
