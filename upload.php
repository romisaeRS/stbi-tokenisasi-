<?php include('navi.php'); ?>

<div class="container" style="margin-top:200px;">
		<div class="well text-center">
			<h1>Upload file pdf</h1>
			<hr>
			<div class="col-md-8 col-md-offset-2">
				<form enctype="multipart/form-data" class="form-inline" method="post" action="hasil_upload.php">
					<div class="input-group">
						<label class="input-group-btn">
							<span class="btn btn-danger btn-lg">
								Browse&hellip; <input type="file" name="fupload" style="display: none;" required>
							</span>
						</label>
						<input type="text" class="form-control input-lg" size="40" readonly required>
					</div>
					<div class="input-group">
						<input type="submit" class="btn btn-lg btn-primary" value="Upload">
					</div><br>
          <label id="deskripsi">Deskripsi</label> <br>
          <textarea name="deskripsi" rows="8" cols="50" id="deskripsi" placeholder="masukan deskripsi file"></textarea><br>
				</form>



				<br>
				<div class="progress" style="display:none">
					<div id="progressBar" class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
						<span class="sr-only">0%</span>
					</div>
				</div>
				<div class="msg alert alert-info text-left" style="display:none"></div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>

	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/upload.js"></script>
    <script>
	$(function() {
	  $(document).on('change', ':file', function() {
		var input = $(this),
			numFiles = input.get(0).files ? input.get(0).files.length : 1,
			label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
		input.trigger('fileselect', [numFiles, label]);
	  });

	  $(document).ready( function() {
		  $(':file').on('fileselect', function(event, numFiles, label) {

			  var input = $(this).parents('.input-group').find(':text'),
				  log = numFiles > 1 ? numFiles + ' files selected' : label;

			  if( input.length ) {
				  input.val(log);
			  } else {
				  if( log ) alert(log);
			  }

		  });
	  });

	});
	</script>

<!--
<form enctype="multipart/form-data" method="POST" action="hasil_upload.php">
File yang di upload : <input type="file" name="fupload"><br>
Deskripsi File : <br>
<textarea name="deskripsi" rows="8" cols="40"></textarea><br>
<input type=submit value=Upload>
</form> -->

<?php include('foot.php'); ?>
