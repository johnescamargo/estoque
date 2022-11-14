$(document).ready(function () {
  $("button").click(function () {
    var id_user = "#id-" + this.id;
    //alert(id_user);

    if (id_user.match("update")) {
      //TODO create a sahdow-box to update the user
      $.ajax({
        type: "POST",
        url: "update_user.php",
        data: "request=" + id_user,
        success: function (data) {
          $(".test").html(data);
          location.reload(); // Reloading the page
        },
      });

    } else {
      id_user = $(id_user).text();
      $.ajax({
        type: "POST",
        url: "delete_user.php",
        data: "request=" + id_user,
        success: function (data) {
          $(".test").html(data);
          location.reload(); // Reloading the page
        },
      });
    }
  });
});
