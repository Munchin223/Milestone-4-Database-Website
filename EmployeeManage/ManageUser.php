<!--
  Known bug of tab panels overlapping initially. Not sure how to fix.
-->
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="jumbotron text-center">
  <h1>User Management</h1>
</div>


  <div class="container">
    <h3>Manage Users</h3>
    <ul class="nav nav-pills">
        <li class="active"><a data-toggle="pill" href="#view">All Users</a></li>
        <li><a data-toggle="pill" href="#menu1">Product Companies</a></li>
        <li><a data-toggle="pill" href="#menu2">Employees</a></li>
        <!--<li><a data-toggle="pill" href="#menu3">View Data</a></li> No time left for this unfortuantely-->
      </ul>
      
      <div class="tab-content">
        <!-- Tab 1 -->
        <div id="view" class="tab-pane fade in active">
          <div class ="card">
          <ul class="list-group list-group-flush">
          <li class="list-group-item">
            <?php
              $servername = "localhost";
              $username = "root";
              $password ="root";
              $database = "catalogue";
              
              $conn = new mysqli($servername, $username, $password, $database);
              
              if ($conn->connect_error) {
                  die($conn->connect_error);
              }
              
              $user_count = $conn->query("SELECT * FROM User_Info");
              $row = $user_count->fetch_all();
              $count = substr_count(print_r($row,TRUE),"Array")-1;
              echo "Total Users: " . $count;
              ?>
          </li> 
          </ul>
          </div>
          <table class="table table-dark">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">User Email</th>
                <th scope="col">Phone Number</th>
                <th scope="col">Username</th>
                <th scope="col">Password</th>
              </tr>
            </thead>
            <tbody>
            <?php
              $Company_Email = $_GET['email'];
              
              $result = $conn->query("SELECT * FROM User_Info NATURAL JOIN Login_Has");
              $row = $result->fetch_all();

              $count = substr_count(print_r($row,TRUE),"Array")-1;
            
              for($j=0; $j < $count; $j++) {
                foreach($row[$j] as $key => $value) {
                  if($key === 0) { ?><tr>
                    <th scope="row">
                    <?php echo $j+1?>
                  </th><?php } ?>
                  <td><?php echo $value?></td><?php
                }
                ?></tr><?php
              } ?>
           </tbody>
          </table>
          <form action="DeleteUser.php" method="post">
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-remove"></i></span>
              <input id="user_delete" type="text" class="form-control" name="user_delete" placeholder="Enter Email of User to Delete">
            </div>
            <input type="submit" class="btn btn-info" value="Delete">
        </div>
        <div id="menu1" class="tab-pane fade">
          <h3>Product Companies</h3>
          <table class="table table-dark">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Company Email</th>
                <th scope="col">Brand</th>
                <th scope="col">Phone</th>


              </tr>
            </thead>
            <tbody>
            <?php
              $Company_Email = $_GET['email'];
              
              $result = $conn->query("SELECT * FROM Product_Company NATURAL JOIN User_Info");
              $row = $result->fetch_all();

              $count = substr_count(print_r($row,TRUE),"Array")-1;
            
              for($j=0; $j < $count; $j++) {
                foreach($row[$j] as $key => $value) {
                  if($key === 0) { ?><tr>
                    <th scope="row">
                    <?php echo $j+1?>
                  </th><?php } ?>
                  <td><?php echo $value?></td><?php
                }
                ?></tr><?php
              } ?>
           </tbody>
          </table>
        
        </div>
        <div id="menu2" class="tab-pane fade in active">
          <h3>Current Employees</h3>
          <?php
            $servername = "localhost";
            $username = "root";
            $password ="root";
            $database = "catalogue";
            
            $conn = new mysqli($servername, $username, $password, $database);
            
            if ($conn->connect_error) {
                die($conn->connect_error);
            }


            ?>
            <table class="table table-dark">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Employee Email</th>
                <th scope="col">Employee Name</th>
                <th scope="col">Employee Username</th>
                <th scope="col">Password</th>
                <th scope="col">Phone</th>

              </tr>
            </thead>
            <tbody>
            <?php
              $Company_Email = $_GET['email'];
              
              $result = $conn->query("SELECT DISTINCT * FROM Employee NATURAL JOIN Login_Has NATURAL JOIN User_Info");
              $row = $result->fetch_all();

              // This is such a line.
              $count = substr_count(print_r($row,TRUE),"Array")-1;

              for($j=0; $j < $count; $j++) {
                foreach($row[$j] as $key => $value) {
                  if($key === 0) { ?><tr>
                    <th scope="row">
                    <?php echo $j+1?>
                  </th><?php } 
                  if($key === 6) {
                    break;
                  }?>
                  <td><?php echo $value?></td><?php
                }
                ?></tr><?php
              } ?>
           </tbody>
          </table>
          
        </div>
        <div id="menu3" class="tab-pane fade in active">
          <div class ="card">
          <ul class="list-group list-group-flush">
          <li class="list-group-item">
            <?php
              $servername = "localhost";
              $username = "root";
              $password ="root";
              $database = "catalogue";
              
              $conn = new mysqli($servername, $username, $password, $database);
              
              if ($conn->connect_error) {
                  die($conn->connect_error);
              }
              
              $user_count = $conn->query("SELECT * FROM User_Info");
              $row = $user_count->fetch_all();
              $count = substr_count(print_r($row,TRUE),"Array")-1;
              echo "Total Users: " . $count;
              ?>
          </li> 
          </ul>
          </div>
          <!-- <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Table Name</th>

    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">-</th>
      <td>Employee</td>
    </tr>
    <tr>
      <th scope="row">-</th>
      <td>User_Info</td>
      <td>Login_Has</td>
    </tr>
    <tr>
      <th scope="row">-</th>
      <td>Product_Company</td>
      <td>Product_Model_Info</td>
    </tr>
  </tbody>
 
</table>
<tbody>
            <?php

            if(isset($_GET['SearchButton']))
            {
              $table = $_GET['search'];
              $result = $conn->query("SELECT * FROM $table");
              $row = $result->fetch_all();

              $count = substr_count(print_r($row,TRUE),"Array")-1;
          
              for($j=0; $j < $count; $j++) {
                foreach($row[$j] as $key => $value) {
                  if($key === 0) { ?><tr>
                    <th scope="row">
                    <?php echo $j+1?>
                  </th><?php } ?>
                  <td><?php echo $value?></td><?php
                }
                ?></tr><?php
              } 
            }
            
            
              
            ?>
           </tbody>
      <form action="ManageUser.php" method="get">
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-remove"></i></span>
              <input id="search" type="text" class="form-control" name="search" placeholder="Enter Email of User to Delete">
            </div>
            <input type="submit" class="btn btn-info" value="SearchButton">
            </form>
    </form>
          <table class="table table-dark">
          
          </table> -->

        </div>
      </div>
    </div>
      
      
  </div>

</body>
</html>