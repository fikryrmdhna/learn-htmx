<?php include 'head.php';?>

  <?php
    include_once("config.php");
    
    // Check if form is submitted for user update, then redirect to homepage after update
    if(isset($_POST['update']))
    {	
        $id = $_POST['id'];
        
        $name=$_POST['name'];
        $age=$_POST['age'];
        $email=$_POST['email'];
            
        // update user data
        $result = mysqli_query($mysqli, "UPDATE users SET name='$name',email='$email',age='$age' WHERE id=$id");
        header("Location: index.php");
    }
    ?>
    <?php
    // Display selected user data based on id
    // Getting id from url
    $id = $_GET['id'];
    
    // user data based on id
    $result = mysqli_query($mysqli, "SELECT * FROM users WHERE id=$id");
    
    while($user_data = mysqli_fetch_array($result))
    {
        $name = $user_data['name'];
        $email = $user_data['email'];
        $age = $user_data['age'];
    }
    ?>
  <body>
      <main>
          <section>
              <div class="container">
                  <div class="row">
                        <div class="col-12">
                            <!-- <form name="update_user" method="post" action="edit.php"> -->
                            <form name="update_user" hx-post="edit.php?id=<?php echo $id;?>" hx-target="#listData" hx-swap="outerHTML">
                                <table border="0">
                                    <tr> 
                                        <td>Name</td>
                                        <td><input type="text" name="name" value=<?php echo $name;?>></td>
                                    </tr>
                                    <tr> 
                                        <td>Email</td>
                                        <td><input type="text" name="email" value=<?php echo $email;?>></td>
                                    </tr>
                                    <tr> 
                                        <td>Age</td>
                                        <td><input type="text" name="age" value=<?php echo $age;?>></td>
                                    </tr>
                                    <tr>
                                        <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                                        <td>
                                            <button type="submit" class="btn btn-success" name="update">
                                                Update
                                            </button>
                                        </td>
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