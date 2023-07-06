



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/x-icon" href="img/dagatanlogo.ico">
</head>
<style>
  #content {
    display: none;
  }

  #loader {
    position: absolute;
    margin: auto;
    top: 0;
    right: 0;
    left: 0;
    bottom: 0;
    width: 300px;
    height: 300px;
  }

  #loader img {
    width: 100%;
  }
</style>
<body>
<div id="loader">
  <img src="img/loader.gif" alt="" />
</div>
<script>
  window.onload = function() {
    document.getElementById("loader").style.display = "none";
    document.getElementById("content").style.display = "block";
  };
</script>


</body>
</html>