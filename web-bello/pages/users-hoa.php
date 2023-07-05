<?php
require_once('../components/navbar.php')
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

<div id="officials">
  <div class="official">
    <img src="president.jpg" alt="President">
    <h3>John Doe</h3>
    <p>President</p>
  </div>

  <div class="official">
    <img src="vice-president.jpg" alt="Vice President">
    <h3>Jane Smith</h3>
    <p>Vice President</p>
  </div>

  <div class="official">
    <img src="secretary.jpg" alt="Secretary">
    <h3>Michael Johnson</h3>
    <p>Secretary</p>
  </div>

  <div class="official treasurer">
    <img src="treasurer.jpg" alt="Treasurer">
    <h3>Sarah Wilson</h3>
    <p>Treasurer</p>
  </div>

  <div class="official auditor">
    <img src="auditor.jpg" alt="Auditor">
    <h3>Robert Davis</h3>
    <p>Auditor</p>
  </div>

  <div class="official">
    <img src="board-member.jpg" alt="Board Member">
    <h3>Emily Brown</h3>
    <p>Board Member</p>
  </div>

  <div class="official">
    <img src="board-member.jpg" alt="Board Member">
    <h3>David Wilson</h3>
    <p>Board Member</p>
  </div>

  <div class="official">
    <img src="board-member.jpg" alt="Board Member">
    <h3>Jennifer Lee</h3>
    <p>Board Member</p>
  </div>

  <div class="official">
    <img src="board-member.jpg" alt="Board Member">
    <h3>William Johnson</h3>
    <p>Board Member</p>
  </div>

  <div class="official">
    <img src="board-member.jpg" alt="Board Member">
    <h3>Amy Davis</h3>
    <p>Board Member</p>
  </div>

  <div class="official">
    <img src="board-member.jpg" alt="Board Member">
    <h3>Christopher Smith</h3>
    <p>Board Member</p>
  </div>
</div>

<style>
#officials {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
}

.official {
  text-align: center;
  margin: 20px;
}

.official img {
  width: 150px;
  height: 150px;
  border-radius: 50%;
}

.official h3 {
  margin-top: 10px;
}

.official p {
  margin-top: 5px;
}
</style>

</body>
</html>