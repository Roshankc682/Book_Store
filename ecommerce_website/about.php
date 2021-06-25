<?php
  require "header.php";
  // require "ip.php";

$all_details = array (
  array("image/ceo.png","Mr.Roshan","Details_of_C.E.O","C.E.O@email.com"),
  array("https://thegatewayonline.ca/wp-content/uploads/2017/01/Arts-Supplied-The-Founder-Movie-Review.jpg","Mr.Pawan","Details_of_director","Director@email.com")
);

?>

<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  margin: 0;
}

html {
  box-sizing: border-box;
}

*, *:before, *:after {
  box-sizing: inherit;
}

.column {
  float: left;
  width: 50%;
  margin-bottom: 16px;
  padding: 0 8px;
  
}
.column:hover {
 box-shadow:0 10px 16px 0 rgba(0,0,0,1),0 6px 20px 0 rgba(0,0,0,0.19) !important;
}

.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  margin: 8px;
}


.container {
  padding: 0 16px;
}

.container::after, .row::after {
  content: "";
  clear: both;
  display: table;
}

.title {
  color: grey;
}

.button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
}

.button:hover {
  background-color: #555;
}

@media screen and (max-width: 650px) {
  .column {
    width: 100%;
    display: block;
  }
}
</style>
</head>
<body>
<br>

<h2 style="text-align:center">Our Team</h2>
<div class="row">
  <div class="column">
    <div class="card">
      <center><img src="<?php echo $all_details[0][0] ?>" alt="Jane" style="padding-top: 10px;width:50%;height: 300px;"></center>
      <div class="container">
        <center><h2><?php echo $all_details[0][1] ?></h2>
        <p><?php echo $all_details[0][2] ?></p>
        <p><?php echo $all_details[0][3] ?></p></center>
        <p><button class="button">Contact</button></p>
      </div>
    </div>
  </div>
<div class="column">
    <div class="card">
     <center><img src="<?php echo $all_details[1][0] ?>" alt="Jane" style="padding-top: 10px;width:50%;height: 300px;"></center>
       <div class="container">
        <center><h2><?php echo $all_details[1][1] ?></h2>
        <p><?php echo $all_details[1][2] ?></p>
        <p><?php echo $all_details[1][3] ?></p></center>
        <p><button class="button">Contact</button></p>
      </div>
    </div>
  </div>
</div>
<?php
  require "footer.php";
?>

