// Update view using JSON
function updateWithJson(url) {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      // Update view with current json
      updateView(this.responseText);
    }
  };
  xhttp.open("GET", url, true);
  xhttp.send();
}