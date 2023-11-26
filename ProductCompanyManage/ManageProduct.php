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
  <h1>Manage Products</h1>
  <p>Add, Edit, Remove</p> 
</div>


  <div class="container">
    <h3>Your Products</h3>
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
        ?>
        
        <div class="container">
        <div class="row">
    <div class="col-sm-3">
        <?php
        $item = $conn->query("SELECT * FROM Product_Model_Info");
        $itemCount = $item->fetch_all();
        $count = substr_count(print_r($itemCount,TRUE),"Array")-1;
        echo "Total Items: " . $count; ?>
    </div>
    <div class="col-sm-3">
      <?php
        $max = $conn->query("SELECT MAX(Price) FROM Product_Model_Info");
        $maxPrice = $max->fetch_assoc();
        echo "Highest Price: " . $maxPrice['MAX(Price)']; ?>
    </div>
    <div class="col-sm-3">
      <?php 
        $min = $conn->query("SELECT MIN(Price) FROM Product_Model_Info");
        $minPrice = $min->fetch_assoc();
        echo "Lowest Price: " . $minPrice['MIN(Price)']; ?>
    </div>
    <div class="col-sm-3">
      <?php
        $avg = $conn->query("SELECT AVG(Price) FROM Product_Model_Info");
        $avgPrice = $avg->fetch_assoc();
        echo "Average Price: " . $avgPrice['AVG(Price)']; ?>
  </div>
      </div>
    </li> 
            </ul>
            </div>
    <ul class="nav nav-pills">
        <li class="active"><a data-toggle="pill" href="#view">View Active Listings</a></li>
        <li><a data-toggle="pill" href="#menu1">Add Listing</a></li>
        <li><a data-toggle="pill" href="#menu2">Update Listing</a></li>
        <li><a data-toggle="pill" href="#menu3">Remove Listing</a></li>
      </ul>
      
      <div class="tab-content">
        <!-- Tab 1 -->
        <div id="view" class="tab-pane fade in active">
          <h3>Active Listings</h3>
     
            <table class="table table-dark">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Model Name</th>
                <th scope="col">Manufacturer Email</th>
                <th scope="col">Product Type</th>
                <th scope="col">Brand</th>
                <th scope="col">Product Link</th>
                <th scope="col">Price</th>
                <th scope="col">GPU</th>
                <th scope="col">CPU</th>
                <th scope="col">Operating System</th>
                <th scope="col">Screen Size</th>
                <th scope="col">Storage Size</th>
                <th scope="col">Battery Life</th>

              </tr>
            </thead>
            <tbody>
            <?php
              $Company_Email = $_GET['email'];
              
              $result = $conn->query("SELECT * FROM Product_Model_Info WHERE Manufacturer_Email LIKE '$Company_Email'");
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
              <span class="input-group-addon"><i class="glyphicon glyphicon-modal-window"></i></span>
              <input id="screensize" type="text" class="form-control" name="screensize" placeholder="Screen Size">
            </div>
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-tasks"></i></span>
              <input id="storagesize" type="text" class="form-control" name="storagesize" placeholder="Storage Size">
            </div>
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-flash"></i></span>
              <input id="batterylife" type="text" class="form-control" name="batterylife" placeholder="Battery Life">
            </div>
            <input type="submit" name='submit' class="btn btn-info" value="Add Product">
            
          </form>
        
        </div>
        <div id="menu2" class="tab-pane fade">
          <h3>Update</h3>
          <h3>Active Listings</h3>
     
            <table class="table table-dark">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Model Name</th>
                <th scope="col">Manufacturer Email</th>
                <th scope="col">Product Type</th>
                <th scope="col">Brand</th>
                <th scope="col">Product Link</th>
                <th scope="col">Price</th>
                <th scope="col">GPU</th>
                <th scope="col">CPU</th>
                <th scope="col">Operating System</th>
                <th scope="col">Screen Size</th>
                <th scope="col">Storage Size</th>
                <th scope="col">Battery Life</th>

              </tr>
            </thead>
            <tbody>
            <?php
              $Company_Email = $_GET['email'];
              
              $result = $conn->query("SELECT * FROM Product_Model_Info WHERE Manufacturer_Email LIKE '$Company_Email'");
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
          <form action="UpdateProduct.php" method="post">
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
              <span class="input-group-addon"><i class="glyphicon glyphicon-modal-window"></i></span>
              <input id="screensize" type="text" class="form-control" name="screensize" placeholder="Screen Size">
            </div>
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-tasks"></i></span>
              <input id="storagesize" type="text" class="form-control" name="storagesize" placeholder="Storage Size">
            </div>
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-flash"></i></span>
              <input id="batterylife" type="text" class="form-control" name="batterylife" placeholder="Battery Life">
            </div>
            <input type="submit" name='submit' class="btn btn-info" value="Update Product">
            
          </form>
        
        </div>
        <div id="menu3" class="tab-pane fade in active">
          <h3> Listings</h3>
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
                <th scope="col">Model Name</th>
                <th scope="col">Manufacturer Email</th>
                <th scope="col">Product Type</th>
                <th scope="col">Brand</th>
                <th scope="col">Product Link</th>
                <th scope="col">Price</th>
              </tr>
            </thead>
            <tbody>
            <?php
              $Company_Email = $_GET['email'];
              
              $result = $conn->query("SELECT * FROM Product_Model_Info WHERE Manufacturer_Email LIKE '$Company_Email'");
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
          <form action="DeleteProduct.php" method="post">
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-remove"></i></span>
              <input id="model_delete" type="text" class="form-control" name="model_delete" placeholder="Enter Model Name of Product">
            </div>
            <input type="submit" class="btn btn-info" value="Delete">
        </form>
        </div>
      </div>
    </div>
      
      
  </div>

</body>
</html>