<?php include 'head.php';?>

  <?php
 
    // Check If form submitted, insert form data into users table.
    if(isset($_POST['Submit'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $age = $_POST['age'];
        
        include_once("config.php");
                
        // Insert user data into table
        $result = mysqli_query($mysqli, "INSERT INTO users(name,email,age) VALUES('$name','$email','$age')");
        header("Location: index.php");
    }
    ?>
  <body>
      <main>
          <header>
            <nav class="navbar navbar-light bg-light justify-content-center">
                <span class="navbar-brand mb-0 h1">Learn HTMX & Hyperscript</span>
              </nav>
          </header>
          <section>
              <div class="container">
                  <div class="row">
                      <div class="col-12">
                        <form action="add.php" method="post" name="form1">
                            <table width="25%" border="0">
                                <tr> 
                                    <td>Name</td>
                                    <td><input type="text" name="name"></td>
                                </tr>
                                <tr> 
                                    <td>Email</td>
                                    <td><input type="text" name="email"></td>
                                </tr>
                                <tr> 
                                    <td>Age</td>
                                    <td><input type="text" name="age"></td>
                                </tr>
                                <tr> 
                                    <td></td>
                                    <td><input type="submit" class="btn btn-primary" name="Submit" value="Add"></td>
                                </tr>
                            </table>
                        </form>
                      </div>
                  </div>
              </div>
          </section>
      </main>

      <?php include 'footer.php';?>
  </body>
</html>