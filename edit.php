<?php include 'head.php';?>

  <?php
    include_once("config.php");
    
    // Check if form is submitted for user update, then redirect to homepage after update
    if(isset($_POST['update']))
    {	
        $id = $_POST['id'];
        
        $activity=$_POST['activity'];
            
        // update user data
        $result = mysqli_query($mysqli, "UPDATE users SET activity='$activity' WHERE id=$id");
        header("Location: index.php");
    }
    ?>
    <?php
    // Display selected user data based on id
    // Getting id from url
    $id = $_GET['id'];
    
    // user data based on id
    $result = mysqli_query($mysqli, "SELECT * FROM users WHERE id=$id");
    
    while($todo = mysqli_fetch_array($result))
    {
        $activity = $todo['activity'];
    }
    ?>
  <body>
      <!-- <main>
          <section >
              <div class="container">
                  <div class="row"> -->
                        <div class="wrapper-data" >
                            <form hx-post="edit.php?id=<?php echo $id;?>" hx-target="#listData" hx-swap="outerHTML" id="editForm">
                                <table border="0">
                                    <tr> 
                                        <td>Activity</td>
                                        <td><input type="text" class="ml-3 form-control" name="activity" value=<?php echo $activity;?>></td>
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
                  <!-- </div>
              </div>
          </section>
      </main> -->
    

  </body>
</html>