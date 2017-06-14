<style>
down vote
+50
/* do not group these rules */
*::-webkit-input-placeholder {
    font-family: Roboto Medium; 
    color: #c6c6c6; 
    font-size: 15px;
}
*:-moz-placeholder {
    /* FF 4-18 */
  font-family: Roboto Medium; 
    color: #c6c6c6; 
    font-size: 15px;
}
*::-moz-placeholder {
    /* FF 19+ */
    font-family: Roboto Medium; 
    color: #c6c6c6; 
    font-size: 15px;
}
*:-ms-input-placeholder {
    /* IE 10+ */
    font-family: Roboto Medium; 
    color: #c6c6c6; 
    font-size: 15px;
}

input::-webkit-input-placeholder{
    font-family: Roboto Medium; 
    color: #c6c6c6; 
    font-size: 15px;
}
input:-moz-placeholder {
     font-family: Roboto Medium; 
    color: #c6c6c6; 
    font-size: 15px;
}
</style>













<!-- Carousel



    ================================================== -->



    <div id="myCarousel" class="carousel slide" data-ride="carousel">



      <!-- Indicators -->



     



      <div class="carousel-inner" role="listbox">



        <div class="item active">



          <img class="first-slide" src="<?php echo base_url(); ?>media/img/banner.jpg" alt="First slide">



          <div class="container">



            <div class="carousel-caption">



              <h1 class = "fast_free">Fast, Free, Reliable</h1>



              <p class ="have_local">Have local professionals bid on your project today.</p>



              <p><div class="row">



                  <div class="col-md-6 col-sm-8">



                   <div class="input-group">

                      

                          <input type="text" class="form-control category"  placeholder="What service do you need?" id = "category">



                          <span class="input-group-btn">

                            <button class="btn btn-default get_started" id ="get_started" type="button" title="GET STARTED">GET STARTED</button>
                            <p class="error"> </p>
                           <div id="genreSuggestion" class="autosuggestion genreSuggestion">

                            </div>
                          <input type="hidden" class = "category_id" name="category_id" value="" id="category_id">


                          </span>



                    </div><!-- /input-group -->



                  </div><!-- /.col-lg-6 -->



                  <div class="col-lg-6">



                   



                  </div><!-- /.col-lg-6 -->



                </div><!-- /.row -->



              </p>



            </div>



          </div>



        </div>



      



      </div>



     



    </div><!-- /.carousel -->











    <!-- Marketing messaging and featurettes



    ================================================== -->



    <!-- Wrap the rest of the page in another container to center all the content. -->







    <div class="container marketing first">







    <div class="row featurette">



      <div class="col-md-12 explore_job">



        <h1 id = "explor">Explore and find the right pro for the job</h1>



       



      </div>



      <div class="col-md-6 video_player">

      <?php  foreach($home_video as $video);  ?>
           <video style = "width:100%;max-width:675px;height:330px;" id="image" controls=""  name="media">

            <source src="<?php echo base_url();?>videos/<?php echo $video->video;?>" type="video/mp4">

         </video>
       <!--  <!<img alt="Generic placeholder image" src="<?php echo base_url(); ?>media/img/video2.jpg" class="featurette-image img-responsive center-block"> -->



      </div>



    </div>







    </div><!-- /.container -->



















  <div class="home_search">



    <div class="container">



      <div class="row">



        <div class="col-md-7 inner">



          <div class="col-md-8 col-sm-8 pull-left">



                   <div class="input-group">

                      

                          <input type="text" class="form-control category"  placeholder="What service do you need?" id = "category">



                          <span class="input-group-btn">



                            <button class="btn btn-default get_started" id ="get_started" type="button" title="GET STARTED">GET STARTED</button>
                            <p class="error"> </p>
                            <div id="genreSuggestion" class="autosuggestion genreSuggestion" style="width:249px!important;top: 39px;right: 144px !important;display:block;height: 283px;overflow-y:auto;position: absolute;">

                            </div>
                          <input type="hidden" class = "category_id" name="category_id" value="" id="category_id">


                          </span>



                    </div><!-- /input-group -->



          </div><!-- /.col-lg-6 -->
        <div class="col-md-3 col-sm-3 browse_service pull-right">
		
        <a href = "#all-services" title="Browse  all services">
         <button class="btn btn-success" type="button">Browse  all services</button>
        </a>
		
        </div>



        </div>



      </div>



    </div>



  </div>







  <div class="container marketing second cf">

<div class="row">
<?php  foreach($result as $row) { ?>

    <!-- Three columns of text below the carousel -->
      <div class="col-lg-4 col-md-4 col-sm-12 animation-element slide-left">



        <div class="cold-md-12">



        <img class="" alt="image" src="<?php echo base_url(); ?>uploads/<?php echo $row->image; ?>"></br>



        </div>



        <div class="bullet_number col-md-2 col-sm-2 col-xs-2 "><?php echo $row->number; ?></div>



        <div class="<?php echo base_url(); ?>media_text col-md-8 col-sm-8 col-xs-8" id = "contentData" ><?php echo $row->content; ?></div>



      <!-- /.col-lg-4 -->


<!--
      <div class="col-lg-4 col-md-4 col-sm-12 animation-element slide-left">   <div class="cold-md-12">  <img alt="image" src="<?php echo base_url(); ?>media/img/tablet.jpg"> </div>



        <div class="bullet_number col-md-2 col-sm-2 col-xs-2 ">2</div>



        <div class="<?php //echo base_url(); ?>media_text col-md-8 col-sm-8 col-xs-8">Compare the Pros through reviews, before and after pictures, and pricing</div>



      </div>



      <div class="col-lg-4 col-md-4 col-sm-12 animation-element slide-left">



        <div class="cold-md-12"> <img alt="image" src="<?php //echo base_url(); ?>media/img/tablet2.jpg"> </div>



        <div class="bullet_number col-md-2 col-sm-2 col-xs-2 ">3</div>



        <div class="<?php //echo base_url(); ?>media_text col-md-8 col-sm-8 col-xs-8">Hire the pro that you want to work with</div>



      </div> -->



    </div>





<?php } ?>
</div>
  </div>







  <div class="imp_professional">



    <div class="image_professional col-md-6 col-sm-6"> 
      <img src="<?php echo base_url(); ?>uploads/<?php echo $contractor['image']; ?>">
    </div>



    <div class="text_professional col-md-6 col-sm-6 col-xs-12">

      <div class="text_professional_img col-md-1 col-sm-2 col-xs-2 "> <img alt="image" src="<?php echo base_url(); ?>media/img/img_pro_img.jpg"> </div>



      <div class="text_professional_text col-md-10 col-sm-9 col-xs-9" id = "data_text_professional"><h1 id ="firstSection">
        
        <?php 
              
              echo substr($contractor['meta_keyword'], 0, 15).'<br>';
              echo substr($contractor['meta_keyword'], 15, 25);           
           ?> 
        </h1>



      <h4 id="secondSection"> 

          <?php  

            echo substr($contractor['page_content'], 0, 26).'<br>';
            echo substr( $contractor['page_content'], 26, 65); ?>

      </h4> 
    

      

        <h5 id="thirdSection"> <a href = "<?php echo base_url(); ?>contractor/signup" >Get Started</a>

        <img alt="image" src="<?php echo base_url(); ?>media/img/playgreen.png">

      </h5>
       </div>



    </div>     



  </div>


<div class="marketing cf container">
<div class="row">
<div class="col-md-12 explore_job">

  
        <h1>Get your to do list done</h1>


</div>


<div class="text-center grid3">

<?php foreach($market_block as $row) { ?>
<div id="f1_container" class="col-md-4 col-sm-10 col-xs-10">


<div id="f1_card" class="shadow">



  <div class="front face  interior">

    <div class="cold-md-12">

      <img src="<?php echo base_url(); ?>uploads/<?php echo $row->image; ?>" alt="<?php echo  $row->title; ?>" class="">

    </div>

    <div class="cold-md-12 int_head"   id = "market_title"><?php echo  $row->title; ?></div>

      <div class="cold-md-12 int_text" id = "market_content"><?php echo $row->content; ?>

    </div>

  </div>




<div class="landscaping back face"> 
    <div class="cold-md-12 int_head" id= "back_market_title"><?php echo  $row->back_title; ?></div>
    <div class="cold-md-12 int_text" id ="back_market_content"><?php echo $row->back_content; ?></div>

    <div class="cold-md-12 int_button"><a href="<?php echo base_url(); ?>site/how_it_works"><button type="button" class="btn btn-success">Learn More</button></a>
    </div>
</div>





</div>

</div>

<?php } ?>
<p id="all-services"></p>
</div>
</div>
</div>



<div class="container text-center footer_menu cf" > 



 <div class="row" >

      <div class="col-md-12 col-sm-12">



        <ul class="nav nav-pills nav-stacked animation-element slide-left">

           <?php 


           // $job_category = sort($job_category);
            //echo "<pre>";print_r($job_category);
            //die;
           foreach($job_category as $category) { ?>

                 <li><img alt="<?php echo ucfirst($category->job_category); ?>" src="<?php echo base_url(); ?>media/img/<?php echo $category->images_name; ?>"><?php echo ucfirst($category->job_category); ?></li>

         <?php  } ?>

        </ul>



      </div>

  </div>

</div>


<div class="imp_professional tool_tipss">

  <div class="text_professional col-md-6 col-sm-6 col-xs-12">

  <div class="text_a">

   



    <div class="text_professional_text col-md-12 col-sm-12 col-xs-12">

      <h1>
        
          <img src="<?php echo base_url(); ?>media/img/tool.png" alt="image">
          <?php echo $tools_tips['page_title']; ?>

      </h1>
       
        <h4><?php echo $tools_tips['meta_discription']; ?></h4>
        <div class="tool_tips_content"><?php echo substr($tools_tips['page_content'],0,220); ?> </div> 
     
      
      <a title="<?php echo $tools_tips['page_title']; ?>" style="color:white;" href="<?php echo base_url(); ?>blog"> READ MORE </a>
      
      <img src="<?php echo base_url();?>media/img/playgreen.png" alt="image">
         
   </div>
  </div>     
</div>

 <div class="image_professional col-md-6 col-sm-6"> 
        <img src = "<?php echo base_url(); ?>uploads/<?php echo $tools_tips['image']; ?>">
  </div>

</div>
<div class="imp_professional blog-post-section">
<div class="marketing_footer container">




<div class="row text-center grid3">

<?php foreach($blog_post as $row) {

 ?>

<div id="" class="col-md-3 col-sm-10 col-xs-10">

<div id="f1_card" class="shadow">

 <div class="front face  interior">

   <div class="cold-md-12">

     <?php echo $row['thumbnail']; ?>

   </div>
    <?php 

     


    ?>
   <div class="cold-md-12 int_head" id="blog_title"><?php echo substr($row['post_title'], 0, 15); ?>...</div>

     <div class="cold-md-12 int_text" id="blog_content"><?php echo substr($row['content'],0,120); ?>...</div>

     <div class = "readmore"><a title="<?php echo $row['post_title']; ?>" href = "<?php echo $row['permalink']; ?>">READ MORE</a>

      <div class = "blogplayimg"><img alt="<?php echo $row['post_title']; ?>" src="<?php echo base_url(); ?>media/img/playwhite.png"></div>

    </div>

 <!-- <div class "read_more><a href="{{ post.permalink}}" title="{{ post.post_title|raw}}">READ MORE</a></div> -->
 </div>


</div>

</div>
<?php } ?>
</div>

</div>
</div>

<script src="<?php echo base_url(); ?>media/js/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
 <script>


 $(".get_started").click(function(){

         var category_id = $(".category_id").val();

         //alert(category_id);

         if(category_id == "")
         {

             alert("please select the category");
         }

        else{
               window.location.href = "<?php echo base_url();?>homeowner/createjob?id="+category_id;
        }
         //alert(category_id);

   
  });








 </script>

  