window.onload = function () {
  $("#country").on("change", function () {
    var shownVal = $(this).val();
    var countryID = document.querySelector(
      "#countryList option[value='" + shownVal + "']"
    ).dataset.value;

    if (countryID) {
      $.ajax({
        type: "POST",
        url: ajax_object.ajax_url + "?action=load_countries",
        data: "country_id=" + countryID,
        success: function (html) {
          $("#stateList").html(html);
          $("#city").html('<option value="">Select state first</option>');
        },
      });
    } else {
      $("#state").html('<option value="">Select country first</option>');
      $("#city").html('<option value="">Select state first</option>');
    }
  });

  $("#state").on("change", function () {
    var shownVal = $(this).val();
    var stateID = document.querySelector(
      "#stateList option[value='" + shownVal + "']"
    ).dataset.value;
    if (stateID) {
      $.ajax({
        type: "POST",
        url: ajax_object.ajax_url + "?action=load_countries",
        data: "state_id=" + stateID,
        success: function (html) {
          $("#cityList").html(html);
        },
      });
    } else {
      $("#city").html('<option value="">Select state first</option>');
    }
  });
};
