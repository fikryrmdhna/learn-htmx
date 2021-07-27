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

<div class="wrapper__edit" >
    <h3 class="title">
        Edit Activity
    </h3>
    <form hx-post="edit.php?id=<?php echo $id;?>" hx-target="#listData" hx-swap="outerHTML" id="editForm">
        <div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text">Activity</label>
                </div>
                <input type="text" class="form-control" name="activity" value="<?php echo $activity;?>" aria-describedby="button-addon2">
                <input type="hidden" name="id" value=<?php echo $_GET['id'];?>>
                <div class="input-group-append">
                    <button type="submit" class="btn btn-success" name="update" onclick="closeModal()" id="button-addon2">Update</button>
                </div>
            </div>
        </div>
    </form>
</div>