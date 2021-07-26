<?php include 'head.php';?>

  <?php
    include_once("config.php");
    
    // Fetch all users data from database
    $result = mysqli_query($mysqli, "SELECT * FROM users ORDER BY id DESC");
  ?>
  <body>
      <main>
          <header>
            <nav class="navbar navbar-light bg-light justify-content-center">
                <span class="navbar-brand mb-0 h1">Learn HTMX & Hyperscript</span>
              </nav>
          </header>
          <section id="listData">
              <div class="container">
                  <div class="row">
                      <div class="col-12">
                          <a href="add.php" class="btn btn-primary my-4">Add New User</a>
                          <table width='80%' border=1>
                            <tr>
                                <th>Name</th> 
                                <th>Age</th> 
                                <th>Email</th> 
                                <th>Update</th>
                            </tr>
                            <?php  
                            while($user_data = mysqli_fetch_array($result)) {         
                                echo "<tr hx-target='this' hx-swap='outerHTML'>";
                                echo "<td>".$user_data['name']."</td>";
                                echo "<td>".$user_data['age']."</td>";
                                echo "<td>".$user_data['email']."</td>";    
                                echo "<td><a class='btn btn-info' hx-get='edit.php?id=$user_data[id]' hx-trigger='click[ctrlKey&&shiftKey] delay:2s' hx-indicator='#indicator'>Edit <img id='indicator' class='htmx-indicator' src='/assets/images/oval.svg'/></a><a class='btn btn-danger ml-2 fade-me-out' hx-delete='delete.php?id=$user_data[id]' hx-swap='outerHTML swap:1s'>Delete</a></td></tr>";    
                            }
                            ?>
                          </table>

                          <button 
                            hx-get="/uikit-modal.html" 
                            hx-target="#modals-here" 
                            hx-trigger="click"
                            class="btn btn-primary mt-5"
                            _="on htmx:afterOnLoad then add .show to #modal then add .show to #modal-backdrop">Open Modal</button>

                          <div id="modals-here"></div>
                      </div>
                  </div>
              </div>
          </section>
      </main>

      <?php include 'footer.php';?>
  </body>
</html>