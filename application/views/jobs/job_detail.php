<?php
foreach($result as $row);
	
	echo "<p>project_name</p>".$row->name;
	
	echo "<p>project_started_time</p>".$row->started_time;
    echo "<p>project_expire_time</p>".$row->expire_time;
	?>
	<img src ="<?php echo base_url();?>uploads/<?php echo $row->image;?>" />
	<input type="file" name="file1" id="file_1""/>
	
	
	<video width ="320" height="240" controls>
		  <source src ="<?php echo base_url();?>videos/<?php echo $row->video;?>" type="video/mp4">
	</video>

	<?php
	foreach($result as $row)
	{
		echo "<h1>contractor</h1>";
		echo "<p>price</p>".$row->price;
		echo "<p>start_time</p>".$row->start_time;
		echo "<p>contractor</p>".$row->name;
		echo "<p>message</p>".$row->message;
}
	?>
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	