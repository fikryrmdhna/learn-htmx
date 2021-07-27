<?php
include_once("config.php");
 
// Get id from URL to delete that user
$id = $_GET['id'];

$result = mysqli_query($mysqli, "DELETE FROM users WHERE id=$id");
// header("Location:index.php");
?>

<div class="wrapper__delete" >
    <h3 class="title">Are Your Sure?</h3>
    <form hx-post="edit.php?id=<?php echo $id;?>" hx-target="#listData" hx-swap="outerHTML">
        <div class="wrapper__button">
            <button class='btn btn-danger mr-3 fade-me-out' hx-delete='delete.php?id=$todo[id]' hx-swap='outerHTML'>Delete</button>
            <button type="button" class="btn btn-light" data-dismiss="modal" aria-label="Close">Close</button>
        </div>
    </form>
</div>