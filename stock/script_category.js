$(document).ready(function () {
  $("button").click(function () {
    var id_category = "#id-" + this.id;

    if (id_category.match("update")) {
      //TODO create a sahdow-box to update the user

      alert("Update")
      $.ajax({
        type: "POST",
        url: "update_category.php",
        data: "request=" + id_category,
        success: function (data) {
          $(".test").html(data);
          location.reload(); // Reloading the page
        },
      });
    } else {
      id_category = $(id_category).text();
      $.ajax({
        type: "POST",
        url: "delete_category.php",
        data: "request=" + id_category,
        success: function (data) {
          $(".test").html(data);
          location.reload(); // Reloading the page
        },
      });
    }
  });
});
