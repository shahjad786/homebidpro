
<div class="container">
<h1 class="staticBlock">
          All Services
        </h1>
 <div class="row">

      <div class="col-md-12 col-sm-12">
        <ul class="nav nav-pills nav-stacked animation-element slide-left in-view">

           <?php 

           foreach($job_category as $category) { ?>

                 <li><img alt="<?php echo $category->job_category; ?>" src="<?php echo base_url(); ?>/media/img/<?php echo $category->images_name; ?>"><a title="<?php echo $category->job_category; ?>" class ="allCategories" href="<?php echo base_url();?>category/projects/?id=<?php echo $category->id;?>"><?php echo ucfirst($category->job_category); ?></a></li>

         <?php  } ?>

        </ul>
      </div>

  </div>

</div>

