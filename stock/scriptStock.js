const toggleButton = document.getElementsByClassName("toggle-button")[0];
const navbarLinks = document.getElementsByClassName("navbar-links")[0];

toggleButton.addEventListener("click", () => {
  navbarLinks.classList.toggle("active");
});

$(document).ready(function () {
  $("#fetchval").on("change", function () {
    let value = $(this).val();

    $.ajax({
      url: "fetch.php",
      type: "POST",
      data: "request=" + value,
      beforeSend: function () {
        $(".container").html("<span>Working...</span>");
      },
      success: function (data) {
        $(".container").html(data);
      },
    });
  });
});



// //Sticky Navbar
// window.onscroll = function () {
//   myFunction();
// };

// var navbar = document.getElementById("navbar");
// var sticky = navbar.offsetTop;

// function myFunction() {
//   if (window.pageYOffset >= sticky) {
//     navbar.classList.add("sticky");
//   } else {
//     navbar.classList.remove("sticky");
//   }
// }


