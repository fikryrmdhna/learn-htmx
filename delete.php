<?php
include_once("config.php");
 
// Get id from URL to delete that user
$id = $_GET['id'];

$result = mysqli_query($mysqli, "DELETE FROM users WHERE id=$id");
?>

<div class="wrapper__delete" >
    <h3 class="title">Are Your Sure?</h3>
    <form action="delete.php?id=<?php echo $id;?>" method="post" name="form-delete">
        <div class="wrapper__button">
            <button class='btn btn-danger mr-3 fade-me-out' type="submit" name="delete" hx-delete='delete.php?id=<?php echo $id;?>' hx-swap='outerHTML' onclick="closeModal(); refreshPage()">Delete</button>
            <button type="button" class="btn btn-light" data-dismiss="modal" aria-label="Close">Close</button>
        </div>
    </form>
</div>