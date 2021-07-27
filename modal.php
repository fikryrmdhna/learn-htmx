<div id="modal-backdrop" class="modal-backdrop fade show" style="display:block;"></div>
<div id="modal" class="modal fade show" tabindex="-1" style="display:block;">
	<div class="modal-dialog modal-dialog-centered">
	  <div class="modal-content">
		<div class="modal-header">
		  <h5 class="modal-title">Modal title</h5>
		</div>
		<form action="add.php" method="post" name="form1">
			<div class="modal-body">
                <div class="row align-items-end">
                	<div class="col-12"> 
                        <div class="d-flex align-items-center">
                            Activity
                            <input type="text" class="form-control ml-2" name="activity">
                        </div>
                    </div>
                </div>
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-primary" name="Submit" value="Add">Save</button>
				<button type="button" class="btn btn-light" onclick="closeModal()">Close</button>
			</div>
		</form>
	  </div>
	</div>
  </div>