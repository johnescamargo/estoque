const toggleButton = document.getElementsByClassName("toggle-button")[0];
const navbarLinks = document.getElementsByClassName("navbar-links")[0];
const notification = document.getElementById("notification-container");
const nameCat = document.getElementById("name");

toggleButton.addEventListener("click", () => {
  navbarLinks.classList.toggle("active");
});

// Show notification
function showNotification() {
  if (nameCat.value !== "") {
    notification.classList.add("show");

    setTimeout(() => {
      notification.classList.remove("show");
    }, 2000);
  }
}

$(document).ready(function () {
  $("#fetchval").on("change", function () {
    let value = $(this).val();

    $.ajax({
      url: "./produtos/fetch.php",
      type: "POST",
      data: "request=" + value,
      beforeSend: function () {
        $(".container").html("<span>Carregando dados...</span>");
      },
      success: function (data) {
        $(".container").html(data);
      },
    });
  });
});
