// This example adds a search box to a map, using the Google Place Autocomplete
// feature. People can enter geographical searches. The search box will return a
// pick list containing a mix of places and predicted search terms.
// This example requires the Places library. Include the libraries=places
// parameter when you first load the API. For example:
// <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">
function initAutocomplete() {
  const addressline1 = document.getElementById("inaddress1");
  const addressline2 = document.getElementById("inaddress2");
  const country = document.getElementById("country");
  const state = document.getElementById("state");
  const city = document.getElementById("city");
  const postcode = document.getElementById("postcode");

  const map = new google.maps.Map(document.getElementById("map"), {
    center: { lat: -33.8688, lng: 151.2195 },
    zoom: 13,
    mapTypeId: "roadmap",
  });
  // Create the search box and link it to the UI element.
  const input = document.getElementById("pac-input");
  const searchBox = new google.maps.places.SearchBox(input);
  map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

  // Bias the SearchBox results towards current map's viewport.
  map.addListener("bounds_changed", () => {
    var bounds = map.getBounds();
    searchBox.setBounds(bounds);
  });

  map.addListener("zoom_changed", () => {
    searchInput = input.value;
    inputArray = searchInput.split(",");
    console.log(inputArray);
    addressline2.value = inputArray[0];
    addressline1.value = inputArray[1];
    city.value = inputArray[2];
    state.value = inputArray[3];
    country.value = inputArray[4];
  });

  3;
  let markers = [];
  // Listen for the event fired when the user selects a prediction and retrieve
  // more details for that place.
  searchBox.addListener("places_changed", () => {
    const places = searchBox.getPlaces();

    if (places.length == 0) {
      return;
    }
    // Clear out the old markers.
    markers.forEach((marker) => {
      marker.setMap(null);
    });
    markers = [];
    // For each place, get the icon, name and location.
    const bounds = new google.maps.LatLngBounds();
    places.forEach((place) => {
      if (!place.geometry || !place.geometry.location) {
        console.log("Returned place contains no geometry");
        return;
      }
      const icon = {
        url: place.icon,
        size: new google.maps.Size(71, 71),
        origin: new google.maps.Point(0, 0),
        anchor: new google.maps.Point(17, 34),
        scaledSize: new google.maps.Size(25, 25),
      };
      // Create a marker for each place.
      markers.push(
        new google.maps.Marker({
          map,
          icon,
          title: place.name,
          position: place.geometry.location,
        })
      );

      if (place.geometry.viewport) {
        // Only geocodes have viewport.
        bounds.union(place.geometry.viewport);
      } else {
        bounds.extend(place.geometry.location);
      }
    });
    map.fitBounds(bounds);
  });
}

var element1 = document.querySelector("#form1");
setTimeout(function () {
  element1.style.transform = "translatex(1400px)";
}, 100);

var element2 = document.querySelector("#form2");
setTimeout(function () {
  element2.style.transform = "translatex(1400px)";
}, 100);

document.getElementById("btnsub1").onmouseover = function () {
  document.getElementById("btnsub1").style.backgroundImage =
    "linear-gradient(#AD0E2C, black)";
};

document.getElementById("btnsub1").onmouseout = function () {
  document.getElementById("btnsub1").style.backgroundImage =
    "linear-gradient(#0A0A23, #071A4B)";
};
