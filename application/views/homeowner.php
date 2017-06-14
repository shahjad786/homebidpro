<html>
<head>
<title>Upload Form</title>
<link href="<?php echo base_url(); ?>assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>

</head>
<body>
 
<h3>hlo homeowner</h3>
<form action="<?php echo base_url();?>/index.php/homeowner/insert" method="post">
<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Name</label>
			<input class="form-control placeholder-no-fix" required type="text" autocomplete="off" placeholder="Name" name="name"/>
		</div>
<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Username</label>
			<input class="form-control placeholder-no-fix" required type="text" autocomplete="off" placeholder="Username" name="username"/>
		</div>
<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Password</label>
			<input class="form-control placeholder-no-fix" required type="text" autocomplete="off" placeholder="Password" name="password"/>
		</div>
<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Phone No</label>
			<input class="form-control placeholder-no-fix" required type="text" autocomplete="off" placeholder="Phone" name="phone"/>
		</div>
<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Property Address</label>
			<input class="form-control placeholder-no-fix" required type="text" autocomplete="off" placeholder="Property" name="property"/>
		</div>
<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Country</label>
			<select required class="form-control form-control-solid placeholder-no-fix" name="role_id" id="role_id">
                          <option value="">Select</option>
                    <?php foreach($country as $contries){ ?>
                     <option value="<?php echo $contries->id;?>"><?php echo $contries->country;?></option>>
                     <?php } ?>
			</select>
		</div>
<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Category</label>
			<select  required class="form-control form-control-solid placeholder-no-fix" name="role_id" id="role_id">
                          <option value="">Select</option>
                    <?php foreach($result as $row){ ?>
                     <option value="<?php echo $row->id;?>"><?php echo $row->job_category;?></option>>
                     <?php } ?>
			</select>
		</div>
<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Question</label>
			<input required class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Question" name="question"/>
		</div> 
<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Detailed Description</label>
			<input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Description" name="description"/>
		</div>
<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Photo Upload</label>
			<input class="form-control placeholder-no-fix" required type="text" autocomplete="off" placeholder="Photo" name="photo"/>
		</div>
<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Video Upload</label>
			<input class="form-control placeholder-no-fix"  required type="text" autocomplete="off" placeholder="Video" name="video"/>
</div>	
		<div class="form-actions">
			<button type="submit" class="btn btn-success uppercase">Submit</button>
		</div>	

</form> 
</body>
</html>
