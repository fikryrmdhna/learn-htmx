<?php include 'head.php';?>

  <?php
    include_once("config.php");
    
    // Fetch all users data from database
    $result = mysqli_query($mysqli, "SELECT * FROM users ORDER BY id DESC");
  ?>
  <body>
      <main id="listData">
          <header>
            <nav class="navbar navbar-dark bg-dark justify-content-center">
                <span class="navbar-brand mb-0 h1">Learn HTMX & Hyperscript</span>
              </nav>
          </header>
          <section>
              <div class="container">
                  <div class="row">
                      <div class="col-12">
                          <a class='btn btn-primary mt-5 mb-4' hx-get='add.php' data-toggle='modal' data-target='#modalPopup' hx-target='.modal-selector' hx-trigger='click'>Add new Activity</a>

                          <div class="cards--table">
                            <table class="table table-hover">
                              <thead class="thead-dark">
                                <tr>
                                    <th class="text-center">Activity</th>
                                    <th class="text-center">Action</th>
                                </tr>
                              </thead>
                              <?php  
                              while($todo = mysqli_fetch_array($result)) {         
                                  echo "<tr hx-target='this' hx-swap='outerHTML' id='$todo[id]'>";
                                  echo "<td data-target='activity'>".$todo['activity']."</td>"; 
                                  echo "<td class='text-center'>
                                  <a class='btn btn-info' hx-get='edit.php?id=$todo[id]' data-toggle='modal' data-target='#modalPopup' hx-target='.modal-selector' hx-trigger='click'>Edit</a>
                                  <a class='btn btn-danger ml-2' hx-delete='delete.php?id=$todo[id]' data-toggle='modal' data-target='#modalPopup' hx-target='.modal-selector' hx-trigger='click'>Delete</a></td></tr>";    
                              }
                              ?>
                            </table>
                          </div>

                          <!-- Modal -->
                          <div class="modal fade" id="modalPopup" tabindex="-1" aria-labelledby="modal-selectorLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <div class="modal-selector"></div>
                                </div>
                              </div>
                            </div>
                          </div>

                      </div>
                  </div>
              </div>
          </section>
      </main>

      <?php include 'footer.php';?>
  </body>
</html>