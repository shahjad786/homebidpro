<html>
<head>
<title>Upload Form</title>
<link href="<?php echo base_url(); ?>assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>

</head>
<body>
 
<h3>hlo contractor</h3>
<form action="<?php echo base_url();?>/index.php/contractor/insert" method="post">
<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Name</label>
			<input class="form-control placeholder-no-fix" required type="text" autocomplete="off" placeholder="Name" name="name"/>
		</div>
<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Username</label>
			<input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Username" name="username"/>
		</div>
<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Password</label>
			<input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Password" name="password"/>
		</div>
<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Phone No</label>
			<input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Phone" name="phone"/>
		</div>
<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Company Name</label>
			<input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Company" name="company"/>
		</div>
<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Year's Experience</label>
			<input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Experience" name="experience"/>
		</div> 
<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Company Address</label>
			<input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder=Company_address" name="company_address"/>
		</div>
<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Country</label>
			<select class="form-control form-control-solid placeholder-no-fix" name="country" id="role_id">
                          <option value="">Select</option>
                    <?php foreach($country as $contries){ ?>
                     <option value="<?php echo $contries->id;?>"><?php echo $contries->country;?></option>>
                     <?php } ?>
			</select>
		</div>
<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Category</label>
			<select class="form-control form-control-solid placeholder-no-fix" name="role_id" id="role_id">
                          <option value="">Select</option>
                    <?php foreach($result as $row){ ?>
                     <option value="<?php echo $row->id;?>"><?php echo $row->job_category;?></option>>
                     <?php } ?>
			</select>
		</div>

<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">State License No.</label>
			<input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="State License No." name="license"/>
		</div>
<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Company Bio</label>
			<input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Company Bio" name="company_bio"/>
		</div>
<div class="form-actions">
			<button type="submit" class="btn btn-success uppercase">Submit</button>
		</div>	
</form> 
 
</body>
</html>
