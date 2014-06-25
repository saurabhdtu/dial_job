<?php
?>




<html>
<head>
    <script src="../js/jquery.js" type="text/javascript"></script>
    <script src="../js/formvalidation.js" type="text/javascript"></script>
</head>
<body>
  <form name="candidates" method="post">
      <label>city*</label>
      <select name="city" onchange="addareas(this.value)">
          <option>-Select-</option>
          <option value="Faridabad">Faridabad</option>
          <option value="Ghaziabad">Ghaziabad</option>
          <option value="Gurgaon">Gurgaon</option>
          <option value="Delhi">Delhi</option>
          <option value="Noida">Noida</option>
      </select>
      <select name="cityarea" onchange="getareas(this.value)">
          <option>--select--</option>
      </select>
      <label>residence locality</label>
      <select name="res" id="res">
          <option>--select--</option>
      </select>
  </form>

</body>
</html>