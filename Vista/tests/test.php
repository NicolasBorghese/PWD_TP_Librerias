<!DOCTYPE html>
<html>
  <head>
    <title>Certificate Generator</title>
    <link rel="stylesheet" href="estilos.css">
  </head>
  <body>
    <form method="post" action="actionTest.php" enctype="multipart/form-data">
      Name:
      <input type="text" name="name">
      <br>
      Course:
      <input type="text" name="course">
      <br>
      Date:
      <input type="date" name="date">
      <br>
      Photo:
      <input type="file" accept="image/*" class="form-control image-upload" id="imagen" name="imagen">
      <button type="submit">Generate</button>
    </form>
  </body>
</html>
