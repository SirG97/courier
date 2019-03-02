<nav class="navbar navbar-expand-sm navbar-dark bg-primary">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav-content" aria-controls="nav-content" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Brand -->
    <a class="navbar-brand" href="#">Courier Track</a>

    <!-- Links -->
    <div class="collapse navbar-collapse" id="nav-content">  
      <?php if(isset($_SESSION['user_name'])){ ?>
        <div class="collapse navbar-collapse" id="nav-content">   
            <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="http://courier.glc-shipping.com">Home</a>
              </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Shipment
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="add-courier.php">Add Shipment</a>
                <a class="dropdown-item" href="track-status.php">Update Shipment</a>
                <a class="dropdown-item" href="track-status.php">Search Shipment</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Managers
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="add-new-officer.php">Add New Manager</a>
                <a class="dropdown-item" href="manager-list.php">Managers list</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Offices
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="add-office.php">Add New Office</a>
                <a class="dropdown-item" href="offices-list.php">Office list</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Reports
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="delivered-list.php">Delivered Shipments</a>
                <a class="dropdown-item" href="datewise-list.php">Pending Shipment</a>
              </div>
            </li>
              <li class="nav-item">
                <a class="nav-link" href="process.php?action=logOut">Logout</a>
              </li>
            </ul>
          </div> 
      <?php }else{  ?>
        <div class="collapse navbar-collapse" id="nav-content">   
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="track-result.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="http://glc-shipping.com">Back to Main Site</a>
            </li>
          </ul>
        </div>
      <?php } ?>
    </div> 
  </nav>