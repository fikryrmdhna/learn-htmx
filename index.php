<?php include 'head.php';?>

  <?php
    include_once("config.php");
    
    // Fetch all users data from database
    $result = mysqli_query($mysqli, "SELECT * FROM users ORDER BY id DESC");
  ?>
  <body>
      <main id="listData">
          <header>
            <nav class="navbar navbar-light bg-light justify-content-center">
                <span class="navbar-brand mb-0 h1">Learn HTMX & Hyperscript</span>
              </nav>
          </header>
          <section>
              <div class="container">
                  <div class="row">
                      <div class="col-12">
                          <a href="#" 
                             class="btn btn-primary my-4" 
                             hx-get="/modal.php" 
                             hx-target="#modals-here" 
                             hx-trigger="click"
                             class="btn btn-primary mt-5"
                             _="on htmx:afterOnLoad add .show to #modal then add .show to #modal-backdrop">Add New Activity</a>

                          <table width='80%' class="table table-hover">
                            <thead>
                              <tr>
                                  <th class="text-center">Activity</th>
                                  <th class="text-center">Action</th>
                              </tr>
                            </thead>
                            <?php  
                            while($todo = mysqli_fetch_array($result)) {         
                                echo "<tr hx-target='this' hx-swap='outerHTML' id='$todo[id]'>";
                                echo "<td data-target='activity'>".$todo['activity']."</td>"; 
                                // echo "<td class='text-center'><a class='btn btn-info edit-button' data-role='update' data-id='$todo[id]'>Edit <img id='indicator' class='htmx-indicator' src='/assets/images/oval.svg'/></a><a class='btn btn-danger ml-2 fade-me-out' hx-delete='delete.php?id=$todo[id]' hx-swap='outerHTML swap:1s'>Delete</a></td></tr>";    
                                echo "<td class='text-center'><a class='btn btn-info' hx-put='edit.php?id=$todo[id]' hx-trigger='click' hx-indicator='#indicator'>Edit <img id='indicator' class='htmx-indicator' src='/assets/images/oval.svg'/></a><a class='btn btn-danger ml-2 fade-me-out' hx-delete='delete.php?id=$todo[id]' hx-swap='outerHTML swap:1s'>Delete</a></td></tr>";    
                            }
                            ?>
                          </table>

                          <div id="modals-here"></div>
                      </div>
                  </div>
              </div>
          </section>
      </main>

      <!-- Edit Modal -->
      <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="editModalLabel">Edit Activity</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="container">
                <div class="row">
                  <div class="col-12">
                    <form action="edit.php" method="post" name="form1">
                      <div class="row align-items-end">
                        <div class="col-6 p-0"> 
                          <div class="d-flex align-items-center">
                            Activity
                            <input type="hidden" id="editId">
                            <input type="text" class="form-control ml-2" name="activity" id="activity-val">
                          </div>
                        </div>
                        <div class="col-3 p-0">
                          <div><input type="submit" class="btn btn-block btn-primary" id="editSave" name="Edit" value="update"></div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <?php include 'footer.php';?>
  </body>
</html>