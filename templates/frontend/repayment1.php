<?php 
    include $_SERVER['DOCUMENT_ROOT'] .'\SUMMIT\templates\frontend\navbar.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Repayment Options</title>
<style>
   body{
        background-color: skyblue;
        margins:0px;
    }
  .card {
    width: 80%;
    border: 1px solid #ccc;
    border-radius: 8px;
    padding: 20px;
    margin: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    background-color:white;
  }

  .card-content {
    font-size: 18px;
    line-height: 1.6;
  }

  .links {
    display: flex;
    justify-content: flex-end;
    margin-top: 10px;
  }

  .links a {
    margin-left: 10px;
    text-decoration: none;
    color: #007bff;
  }
</style>
</head>
<body>

<div class="card">
  <div class="card-content">
    <h2>Repayment Options</h2>
    <p>Choose your repayment method:</p>
    <ul>
      <li>Individual Repayment</li>
      <li>Group Repayment</li>
    </ul>
  </div>
  
  <div class="links">
    <a href="#">Individual Repayment</a>
    <a href="#">Group Repayment</a>
  </div>
</div>

</body>
</html>
