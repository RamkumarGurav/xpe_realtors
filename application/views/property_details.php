<?php


$display_status_data = [
  (object) ["name" => "No", "value" => 0],
  (object) ["name" => "Yes", "value" => 1],
];
$sale_type_data = [
  (object) ["name" => "rent", "value" => 1],
  (object) ["name" => "lease", "value" => 2],
  (object) ["name" => "Sale", "value" => 3],
];
$sale_duration_type_data = [
  (object) ["name" => "monthly", "value" => 1],
  (object) ["name" => "yearly", "value" => 2],
  (object) ["name" => "", "value" => 3],
];
?>


<section class="recently breadcrumb bg-white home18">
  <div class="container">
    <div class="sec-title" style="padding-bottom: 1.5em !important">
      <h2><span><?= split_sentance_for_heading($property_data->name)[0] ?> </span>
        <?php if (count(split_sentance_for_heading($property_data->name)) > 1): ?>
          <?= split_sentance_for_heading($property_data->name)[1] ?>
        <?php endif; ?>
      </h2>
      <!-- <p>Verified &amp; Validated properties for customer consideration</p> -->
    </div>
  </div>
</section>
<section class="mb-5">
  <div class="container">
     <?php if (!empty($property_data->property_gallery_image)): ?>
      <div class="owl-carousel style11">
        <?php foreach ($property_data->property_gallery_image as $pgi): ?>
    

                    <div class="single-testimonial" data-aos="zoom-in" data-aos-delay="150">
                        <img src="<?= _uploaded_files_ ?>property_gallery_image/<?= $pgi->file_name ?>" class="property-d-img min-h"
              alt="<?= $pgi->file_alt_title ?>" title="<?= $pgi->file_title ?>">
                    </div>
                    <!-- <div class="single-testimonial" data-aos="zoom-in" data-aos-delay="250">
                         <img src="http://mars-1002/xampp/MARS/pe_realtors/assets/uploads/property_gallery_image/property_gallery_image_27.jpg" class="img-fluid">
                    </div>
                    <div class="single-testimonial" data-aos="zoom-in" data-aos-delay="350">
                        <img src="http://mars-1002/xampp/MARS/pe_realtors/assets/uploads/property_gallery_image/property_gallery_image_27.jpg" class="img-fluid">
                    </div>
                    <div class="single-testimonial" data-aos="zoom-in" data-aos-delay="450">
                         <img src="http://mars-1002/xampp/MARS/pe_realtors/assets/uploads/property_gallery_image/property_gallery_image_27.jpg" class="img-fluid">
                    </div>
                    <div class="single-testimonial" data-aos="zoom-in">
                         <img src="http://mars-1002/xampp/MARS/pe_realtors/assets/uploads/property_gallery_image/property_gallery_image_27.jpg" class="img-fluid">
                    </div> -->
                    
               
                 <?php endforeach; ?>
                  </div>
      <?php endif; ?>

    <!-- <div class="row">
      <?php if (!empty($property_data->property_gallery_image)): ?>
        <?php foreach ($property_data->property_gallery_image as $pgi): ?>
          <div class="col-lg-4 mbb-5 mb-3">
            <img src="<?= _uploaded_files_ ?>property_gallery_image/<?= $pgi->file_name ?>" class="property-d-img"
              alt="<?= $pgi->file_alt_title ?>" title="<?= $pgi->file_title ?>">
          </div>
        <?php endforeach; ?>
      <?php endif; ?>


    </div> -->
    <div class="row mt-4">
      <div class="col-lg-8">
        <h6>
          <i class="fa fa-map-marker"></i>
          <?php if (!empty($property_data->location_name)): ?>
            <span><?= $property_data->location_name ?>,</span>
          <?php endif; ?>
          <?php if (!empty($property_data->city_name)): ?>
            <span><?= $property_data->city_name ?>,</span>
          <?php endif; ?>
          <?php if (!empty($property_data->pincode)): ?>
            <span><?= $property_data->pincode ?>,</span>
          <?php endif; ?>
          <?php if (!empty($property_data->state_name)): ?>
            <span><?= $property_data->state_name ?></span>
          <?php endif; ?>

        </h6>
      </div>

      <!--  <div class="col-lg-4">
               <div class="float-right">
               <img src="<?= IMAGE ?>whatsapp.png" style="max-width: 30px"> Chat With our Consultant
            </div>
            </div> -->
    </div>
    <hr style="border-top: 1px solid rgb(216 158 41) !important;">
    <div class="row">
      <div class="col-lg-12">
        <div>

        </div>
        <h2>


          <?php if (!empty($property_data->sale_amount)): ?>
            Rs <?= indian_currence_in_lakhs_cr($property_data->sale_amount) ?>
          <?php endif; ?>

          <?php if (!empty($property_data->sale_duration_type)): ?>
            <?php foreach ($sale_duration_type_data as $item): ?>
              <?php if ($item->value == $property_data->sale_duration_type): ?>
                <span class="text-secondary font-weight-normal" style="font-size:18px;"> <?= $item->name ?></span>


              <?php endif; ?>

            <?php endforeach; ?>
          <?php else: ?>

          <?php endif; ?>


          <?php if (!empty($property_data->sale_type)): ?>
            <?php foreach ($sale_type_data as $item): ?>
              <?php if ($item->value == $property_data->sale_type): ?>
                <span class="text-secondary font-weight-normal" style="font-size:18px;"> <?= $item->name ?></span>

              <?php endif; ?>

            <?php endforeach; ?>
          <?php else: ?>

          <?php endif; ?>

          <?php if (!empty($property_data->is_negotiable)): ?>
            <span style="color:#f55d2c;    font-family: 'Lato', sans-serif;
    font-size: 12px;font-weight: 500;">Negotiable</span>
          <?php endif; ?>
        </h2>
        <?php if (!empty($property_data->description)): ?>
          <p class="mb-2 mt-2"> <?= $property_data->description ?></p>
        <?php endif; ?>

        <?php if (!empty($property_data->other_details)): ?>
          <p> <?= $property_data->other_details ?></p>
        <?php endif; ?>

        <?php if (!empty($property_data->youtube_link)): ?>
          <a href="<?= $property_data->youtube_link ?>" target="_blank"
            style="color:#000 !important;text-decoration: none !important">
            <span href="#" class="btn pdy" style=""><i class="fab fa-youtube"></i></span> &nbsp;Youtube</a>
        <?php endif; ?>
        <div class="row align-items-center justify-content-center">
          <div class="col-lg-8">

          </div>
          <div class="col-lg-4">
            <div class="float-right" style="color:#f55d2c;font-style: italic;">
              &nbsp;Reach out to our consultant for more details
            </div>
          </div>
        </div>


      </div>
    </div>
    <hr style="border-top: 1px solid rgb(216 158 41) !important;">
    <div class="row align-items-center justify-content-center">
      <div class="col-lg-8">
        <h2 class="prop-head">If assistance needed please submit your requirement <a href="<?= MAINSITE ?>#form-sec"
            class="assistbtn " value="Submit Now" style="    background: #d89e29 !important;"> Submit Now</a></h2>
      </div>
      <div class="col-lg-4">

      </div>
    </div>
  </div>
</section>