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
  <h1>Manage Products</h1>
  <p>Add, Edit, Remove</p> 
</div>


  <div class="container">
    <h3>Your Products</h3>
    <ul class="nav nav-pills">
        <li class="active"><a data-toggle="pill" href="#view">View Active Listings</a></li>
        <li><a data-toggle="pill" href="#menu1">Edit/Add Listing</a></li>
        <li><a data-toggle="pill" href="#menu2">Remove Listing</a></li>
        <li><a data-toggle="pill" href="#menu3">Menu 3</a></li>
      </ul>
      
      <div class="tab-content">
        <!-- Tab 1 -->
        <div id="view" class="tab-pane fade in active">
          <h3>Active Listings</h3>
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
                <th scope="col">First</th>
                <th scope="col">Last</th>
                <th scope="col">Handle</th>
              </tr>
            </thead>
            <tbody>
            <?php
              $Company_Email = $_GET['email'];
              
              $result = $conn->query("SELECT * FROM Product_Model_Info WHERE Manufacturer_Email LIKE '$Company_Email'");
              $row = $result->fetch_all();
              print_r($row);
          
              
              $i = 1;
              $j = 0;
              foreach($row[$j] as $key => $value) {
                ?>
                
                <td><?php echo $value?></td><?php
                $i++;
              }
            ?>
              
           </tbody>
          </table>
          
        </div>
        <div id="menu1" class="tab-pane fade">
          <h3>Add</h3>
          <form action="AddProduct.php" method="post">
            <div class="form-group">
                <label for="sel1">Select Product Type:</label>
                <select class="form-control" id="sel1" name='producttype'>
                  <option>Phone</option>
                  <option>Laptop</option>
                  <option>Tablet/Ipad</option>
                  <option>Headphones</option>
                  <option>Desktop</option>
                  <option>Other</option>
                </select>
            </div> 
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-briefcase"></i></span>
              <input id="model" type="text" class="form-control" name="model" placeholder="Product Model Name" required>
            </div>
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
              <input id="price" type="text" class="form-control" name="price" placeholder="Price">
            </div>
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-globe"></i></span>
              <input id="link" type="text" class="form-control" name="link" placeholder="Product Link">
            </div>
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-compressed"></i></span>
                <input id="gpu" type="text" class="form-control" name="gpu" placeholder="GPU">
            </div>
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-compressed"></i></span>
              <input id="cpu" type="text" class="form-control" name="cpu" placeholder="CPU">
            </div>
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-object-align-horizontal"></i></span>
              <input id="os" type="text" class="form-control" name="os" placeholder="Operating System">
            </div>
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-briefcase"></i></span>
              <input id="screensize" type="text" class="form-control" name="screensize" placeholder="Screen Size">
            </div>
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
              <input id="storagesize" type="text" class="form-control" name="storagesize" placeholder="Storage Size">
            </div>
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
              <input id="batterylife" type="text" class="form-control" name="batterylife" placeholder="Battery Life">
            </div>
            <input type="submit" name='submit' class="btn btn-info" value="Add Product">
          </form>
        
        </div>
        <div id="menu2" class="tab-pane fade">
          <h3>Menu 2</h3>
          <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
        </div>
        <div id="menu3" class="tab-pane fade">
          <h3>Menu 3</h3>
          <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
        </div>
      </div>
    </div>
      
      
  </div>

</body>
</html>