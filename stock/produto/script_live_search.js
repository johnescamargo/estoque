$(document).ready(function () {
  $("#live_search").keyup(function () {
    var input = $(this).val();
    //alert(input);
    if (input != "") {
      $.ajax({
        url: "./produto/livesearch.php",
        method: "POST",
        data: { input: input },
        success: function (data) {
          $("#search-result").html(data);
          $("#search-result").css("display", "contents");
        },
      });
    } else {
      $("#search-result").css("display", "none");
    }
  });
});
