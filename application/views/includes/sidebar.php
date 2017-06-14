<?php

	$url =  base_url(uri_string());


     $secondlast =  basename(dirname($url));


	$keys = parse_url($url); // parse the url
	$path = explode("/", $keys['path']); // splitting the path
    $last = end($path);

    $secondlastdata = $secondlast.'/'.$last;





?>


<div class="page-sidebar-wrapper">

			

			<div class="page-sidebar navbar-collapse collapse">

				

				<ul id="menu" class="page-sidebar-menu page-sidebar-menu-hover-submenu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">

					<li class =" nav-item start <?php  if($last=="dashboard") { echo "active open"; } ?>">

						<a href="<?php echo base_url();?>admin/dashboard">

						<i class="icon-home"></i>

						<span class="title">Dashboard</span>

						<span class="selected"></span>

						</a>

					</li>

					<li class =" nav-item start <?php  if($last=="homeowner"||$secondlastdata=="homeowner/jobs"||$secondlastdata=="homeowner/complete_information") { echo "active open"; } ?>" >

						<a href="javascript:;">

						<i class="icon-users"></i>

						<span class="title">Homeowners</span>

						<span class="arrow "></span>

						</a>

						<ul class="sub-menu">

							<li>

								<a href="<?php echo base_url();?>admin/homeowner">

								

								Manage Homeowners</a>

							</li>

							<li style ="display:none;">

								<a href="<?php echo base_url();?>admin/homeowner/add_homeowner">

								
								Add New Homeowners</a>

							</li>

							

						</ul>

				   </li>

				   <li class =" nav-item start <?php  if($last=="contractor"||$secondlastdata=="contractor/complete_information"||$secondlastdata=="contractor/contractor_history") { echo "active open"; } ?>">

						<a href="javascript:;">

						<i class="icon-users"></i>

						<span class="title">Contractors</span>

						<span class="arrow "></span>

						</a>

						<ul class="sub-menu">

							<li>

								<a href="<?php echo base_url();?>admin/contractor">

								

								Manage Contractors</a>

							</li>

							<li style ="display:none;">

								<a href="<?php echo base_url();?>admin/contractor/add_contractor">

								

								Add New Contractors</a>

							</li>

							

						</ul>

				   </li>

					<li class =" nav-item start <?php  if($secondlastdata=="admin/jobs"||$secondlastdata=="jobs/job_detail") { echo "active open"; } ?>">

						<a href="javascript:;">

						<i class="icon-briefcase"></i>

						<span class="title">Jobs</span>

						<span class="arrow "></span>

						</a>

						<ul class="sub-menu">

							


							<li>

								<a href="<?php echo base_url();?>admin/jobs">
								Manage Jobs</a>

							</li>

							

						

						</ul>

				   </li>
				    <li class =" nav-item start <?php  if($last=="category" || $last=="add_category"||$last=="edit_category") { echo "active open"; } ?>">

						<a href="javascript:;">

						<i class="icon-layers"></i>

						<span class="title"> Job Categories</span>

						<span class="arrow "></span>

						</a>

						<ul class="sub-menu">

							<li>

								<a href="<?php echo base_url();?>admin/category">

								

								Manage Categories</a>

							</li>

							<li>

								<a href="<?php echo base_url();?>admin/category/add_category">

								

								Add New Categories</a>

							</li>

							

						</ul>

				   </li>


					

				   <li class =" nav-item start <?php  if($last=="questions" || $last=="add_question"||$last=="edit_question") { echo "active open"; } ?>">

						<a href="javascript:;">

						<i class="icon-question"></i>

						<span class="title">Questions</span>

						<span class="arrow "></span>

						</a>

						<ul class="sub-menu">

							<li>

								<a href="<?php echo base_url();?>admin/questions">

								

								Manage Questions</a>

							</li>

							<li>

								<a href="<?php echo base_url();?>admin/questions/add_question">

								

								Add New Questions</a>

							</li>

							

						</ul>

				   </li>
				    <li class ="nav-item start <?php  if($last=="reviews"||$last=="review_detail") { echo "active open"; } ?>">

						<a href="javascript:;">

						<i class="icon-question"></i>

						<span class="title">Reviews</span>

						<span class="arrow "></span>

						</a>

						<ul class="sub-menu">

							<li>

								<a href="<?php echo base_url();?>admin/reviews">

								

								Manage Reviews</a>

							</li>

						</ul>

				   </li>

					

					<li class ="nav-item start <?php  if($last=="email"||$last=="edit_email") { echo "active open"; } ?>">

						<a href="javascript:;">

						<i class="icon-envelope"></i>

						<span class="title">Emails Templates</span>

						<span class="arrow "></span>

						</a>

						<ul class="sub-menu">

							<li>

								<a href="<?php echo base_url();?>admin/email">

								

								Manage Emails</a>

							</li>

							<!-- <li>

								<a href="<?php //echo base_url();?>admin/email/add_email">

								

								Add New Emails</a>

							</li> -->

							

						</ul>

				   </li>

				   <li class ="nav-item start <?php  if($last=="payments"||$last=="payment_details") { echo "active open"; } ?>">

						<a href="javascript:;">

						<i class="glyphicon glyphicon-usd"></i>

						<span class="title">Payment</span>

						<span class="arrow "></span>

						</a>

						<ul class="sub-menu">

							<li>

								<a href="<?php echo base_url();?>admin/payments">

								

								Manage Payments</a>

							</li>

							<!-- <li>

								<a href="#">

								

								Add New Payment</a>

							</li> -->

							

						</ul>

				   </li>

				   <li class ="nav-item start <?php  if($last=="cmscontent" ||$last=="edit_staticBlock" ||$last=="edit_marketBlock"||$last=="edit_pages"|| $last=="edit" ||$last=="video" || $last=="pages" || $last=="staticblock") { echo "active open"; } ?>">

						<a href="javascript:;">

						<i class="icon-settings"></i>

						<span class="title">Content Management</span>

						<span class="arrow "></span>

						</a>

						<ul class="sub-menu">

							<li>

								<a href="<?php echo base_url();?>admin/cmscontent">

								

								Manage Banners</a>

							</li>

							<li>

								<a href="<?php echo base_url();?>admin/video">								
								Manage Videos</a>

							</li>
								<li>

								<a href="<?php echo base_url();?>admin/pages">
								Manage CMS Pages</a>

							</li>

								<li>

								<a href="<?php echo base_url();?>admin/staticblock">
								Manage  Container Marketing StaticBlock</a>

							</li>
							
							<li>

								<a href="<?php echo base_url();?>admin/marketblock">
								Manage Marketing Block </a>

							</li>

						</ul>

				   </li>

				 

				</ul>

				<!-- END SIDEBAR MENU -->

			</div>

		</div>

