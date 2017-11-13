// Function to draw object
function drawObject(ctx, left, top, size1, size2, fillcolour) {
  ctx.beginPath();
  ctx.rect(left, top, size1, size2);
  ctx.fillStyle = fillcolour;
  ctx.fill();
}

// Function to update view
function updateView(ctx, jsonData) {
  var gameData = JSON.parse(jsonData, (key, objectData) => {
    // key = Object1, etc.
    document.getElementById("myCanvas").innerHTML = drawObject(ctx, objectData.left, objectData.top, objectData.width, objectData.height, objectData.objectcolor);
    return objectData;     // return the unchanged property value.
  });
}

// Update view using JSON
function updateWithJson(ctx, url) {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      // Update view with current json
      updateView(ctx, this.responseText);
    }
  };
  xhttp.open("GET", url, true);
  xhttp.send();
}