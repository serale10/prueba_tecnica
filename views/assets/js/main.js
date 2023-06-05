function mobileMenu() {
    var x = document.getElementById("myLinks");
    if (x.style.display === "block") {
      x.style.display = "none";
    } else {
      x.style.display = "block";
    }
  }

$("registerInputName").change(function () { 
    
  var registerInputName = $(this).val();
  var dates = new FormData();

  dates.append("validarInputName", registerInputName);

  $.ajax({
    type: "method",
    method: "POST",
    url: "ajax/ajax-controller.php",
    data: dates,
    cache: false,
    contentType: false,
    processData: false,
    success: function (response) {
        console.log("respuesta correcta");
    }
  });
});