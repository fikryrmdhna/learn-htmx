<?php
    if(isset($_POST['Submit'])) {
        $activity = $_POST['activity'];
        
        include_once("config.php");
                
        // Insert user data into table
        $result = mysqli_query($mysqli, "INSERT INTO users(activity) VALUES('$activity')");
        header("Location: index.php");
    }
?>

<form action="add.php" method="post" name="form1">
	<div class="modal-body">
        <div class="row align-items-end">
            <div class="col-12 text-center">
                <h3 class="title">Add Activity</h3>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text">Activity</label>
                    </div>
                    <input type="text" class="form-control" name="activity" aria-describedby="button-addon2">
                </div>
            </div>
        </div>
	</div>
	<div class="modal-footer">
		<button type="submit" class="btn btn-primary" name="Submit" value="Add">Save</button>
		<button type="button" class="btn btn-light" data-dismiss="modal" aria-label="Close">Close</button>
	</div>
</form>