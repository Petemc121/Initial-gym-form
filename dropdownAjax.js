window.onload = function () {
  $("#country").on("change", function () {
    document
      .querySelector("input[list]")
      .addEventListener("input", function (e) {
        var input = e.target,
          list = input.getAttribute("list"),
          options = document.querySelectorAll("#" + list + " option"),
          hiddenInput = document.getElementById(
            input.getAttribute("id") + "-hidden"
          ),
          label = input.value;

        hiddenInput.value = label;

        alert(label);

        for (var i = 0; i < options.length; i++) {
          var option = options[i];

          if (option.innerText === label) {
            hiddenInput.value = option.getAttribute("data-value");
            break;
          }
        }
        var countryID = hiddenInput.value;
        if (countryID) {
          $.ajax({
            type: "POST",
            url: ajax_object.ajax_url + "?action=load_countries",
            data: "country_id=" + countryID,
            success: function (html) {
              $("#state").html(html);
              $("#city").html('<option value="">Select state first</option>');
            },
          });
        } else {
          $("#state").html('<option value="">Select country first</option>');
          $("#city").html('<option value="">Select state first</option>');
        }
      });
  });

  $("#state").on("change", function () {
    var stateID = $(this).val();
    if (stateID) {
      $.ajax({
        type: "POST",
        url: ajax_object.ajax_url + "?action=load_countries",
        data: "state_id=" + stateID,
        success: function (html) {
          $("#city").html(html);
        },
      });
    } else {
      $("#city").html('<option value="">Select state first</option>');
    }
  });
};
