<?php







// $property_type_id = 2;
// 0 means hidden,1 means optional,2 means required

$feilds_details_data = [
  //
  (object) [
    "selected_property_type_id" => 0,
    "property_sub_type_id_prop" => 0,
    "property_age_id_prop" => 0,
    "bhk_type_id_prop" => 0,
    "plot_facing_type_id_prop" => 0,
    "door_facing_type_id_prop" => 0,
    "plot_dimension_sqft_prop" => 0,
    "built_up_area_prop" => 0,
    "in_acres_prop" => 0,
    "in_guntas_prop" => 0,
    "gated_community_type_id_prop" => 0,
  ],

  (object) [
    "selected_property_type_id" => 1,//Rent_Residential
    "property_sub_type_id_prop" => 1,
    "property_age_id_prop" => 1,
    "bhk_type_id_prop" => 1,
    "plot_facing_type_id_prop" => 1,
    "door_facing_type_id_prop" => 1,
    "plot_dimension_sqft_prop" => 0,
    "built_up_area_prop" => 1,
    "in_acres_prop" => 0,
    "in_guntas_prop" => 0,
    "gated_community_type_id_prop" => 1,

  ],
  (object) [
    "selected_property_type_id" => 2,//Rent_Commercial
    "property_sub_type_id_prop" => 1,
    "property_age_id_prop" => 1,
    "bhk_type_id_prop" => 0,
    "plot_facing_type_id_prop" => 0,
    "door_facing_type_id_prop" => 1,
    "plot_dimension_sqft_prop" => 1,
    "built_up_area_prop" => 1,
    "in_acres_prop" => 0,
    "in_guntas_prop" => 0,
    "gated_community_type_id_prop" => 0,

  ],
  (object) [
    "selected_property_type_id" => 3,//Sale_Residential Flat
    "property_sub_type_id_prop" => 0,
    "property_age_id_prop" => 1,
    "bhk_type_id_prop" => 1,
    "plot_facing_type_id_prop" => 1,
    "door_facing_type_id_prop" => 1,
    "plot_dimension_sqft_prop" => 0,
    "built_up_area_prop" => 1,
    "in_acres_prop" => 0,
    "in_guntas_prop" => 0,
    "gated_community_type_id_prop" => 1,

  ],

  (object) [
    "selected_property_type_id" => 4,//Sale_Residential House
    "property_sub_type_id_prop" => 0,
    "property_age_id_prop" => 1,
    "bhk_type_id_prop" => 1,
    "plot_facing_type_id_prop" => 1,
    "door_facing_type_id_prop" => 1,
    "plot_dimension_sqft_prop" => 1,
    "built_up_area_prop" => 1,
    "in_acres_prop" => 0,
    "in_guntas_prop" => 0,
    "gated_community_type_id_prop" => 0,

  ],

  (object) [
    "selected_property_type_id" => 5,//Sale_Residential Site
    "property_sub_type_id_prop" => 0,
    "property_age_id_prop" => 0,
    "bhk_type_id_prop" => 0,
    "plot_facing_type_id_prop" => 1,
    "door_facing_type_id_prop" => 0,
    "plot_dimension_sqft_prop" => 1,
    "built_up_area_prop" => 0,
    "in_acres_prop" => 0,
    "in_guntas_prop" => 0,
    "gated_community_type_id_prop" => 0,

  ],
  (object) [
    "selected_property_type_id" => 6,//Sale_Commercial Site
    "property_sub_type_id_prop" => 0,
    "property_age_id_prop" => 0,
    "bhk_type_id_prop" => 0,
    "plot_facing_type_id_prop" => 1,
    "door_facing_type_id_prop" => 0,
    "plot_dimension_sqft_prop" => 1,
    "built_up_area_prop" => 0,
    "in_acres_prop" => 0,
    "in_guntas_prop" => 0,
    "gated_community_type_id_prop" => 0,

  ],


  (object) [
    "selected_property_type_id" => 7,//Sale_Commercial Building
    "property_sub_type_id_prop" => 0,
    "property_age_id_prop" => 1,
    "bhk_type_id_prop" => 0,
    "plot_facing_type_id_prop" => 1,
    "door_facing_type_id_prop" => 1,
    "plot_dimension_sqft_prop" => 1,
    "built_up_area_prop" => 1,
    "in_acres_prop" => 0,
    "in_guntas_prop" => 0,
    "gated_community_type_id_prop" => 0,

  ],
  (object) [
    "selected_property_type_id" => 8,//Sale_Agriculture
    "property_sub_type_id_prop" => 0,
    "property_age_id_prop" => 0,
    "bhk_type_id_prop" => 0,
    "plot_facing_type_id_prop" => 0,
    "door_facing_type_id_prop" => 0,
    "plot_dimension_sqft_prop" => 0,
    "built_up_area_prop" => 0,
    "in_acres_prop" => 1,
    "in_guntas_prop" => 1,
    "gated_community_type_id_prop" => 0,

  ],

  (object) [
    "selected_property_type_id" => 9,//New Projects
    "property_sub_type_id_prop" => 0,
    "property_age_id_prop" => 0,
    "bhk_type_id_prop" => 0,
    "plot_facing_type_id_prop" => 0,
    "door_facing_type_id_prop" => 0,
    "plot_dimension_sqft_prop" => 0,
    "built_up_area_prop" => 0,
    "in_acres_prop" => 0,
    "in_guntas_prop" => 0,
    "gated_community_type_id_prop" => 0,
  ],







];




?>





<?php foreach ($feilds_details_data as $row): ?>

  <?php if ($row->selected_property_type_id == $selected_property_type_id): ?>



    <?php if ($row->property_sub_type_id_prop == 2): ?>
      <div class="col-lg-3 col-sm-6 mbb-5 mb-2">
        <select type="text" class="form-control" required id="property_sub_type_id" name="property_sub_type_id">
          <option value="">Select Property Sub Type</option>
        </select>
      </div>
    <?php elseif ($row->property_sub_type_id_prop == 1): ?>
      <div class="col-lg-3 col-sm-6 mbb-5 mb-2">

        <select type="text" class="form-control" id="property_sub_type_id" name="property_sub_type_id">
          <option value=""> Property Sub Type</option>
        </select>
      </div>
    <?php else: ?>

      <input type="hidden" name="property_sub_type_id" id="property_sub_type_id" value="0" />
    <?php endif; ?>

    <?php if ($row->property_age_id_prop == 2): ?>
      <div class="col-lg-3 col-sm-6 mbb-5 mb-2">

        <select type="text" class="form-control " required id="property_age_id" name="property_age_id">
          <option value="">Select Property Age</option>
          <?php foreach ($property_age_data as $item) {
            $selected = "";
            if ($item->id == $property_age_id) {
              $selected = "selected";
            }
            ?>
            <option value="<?php echo $item->id ?>" <?php echo $selected ?>>
              <?php echo $item->name ?>
              <?php if ($item->status != 1) {
                echo " [Block]";
              } ?>
            </option>
          <?php } ?>
        </select>
      </div>
    <?php elseif ($row->property_age_id_prop == 1): ?>
      <div class="col-lg-3 col-sm-6 mbb-5 mb-2">

        <select type="text" class="form-control" id="property_age_id" name="property_age_id">
          <option value="">Select Property Age</option>
          <?php foreach ($property_age_data as $item) {
            $selected = "";
            if ($item->id == $property_age_id) {
              $selected = "selected";
            }
            ?>
            <option value="<?php echo $item->id ?>" <?php echo $selected ?>>
              <?php echo $item->name ?>
              <?php if ($item->status != 1) {
                echo " [Block]";
              } ?>
            </option>
          <?php } ?>
        </select>
      </div>
    <?php else: ?>

      <input type="hidden" name="property_age_id" id="property_age_id" value="0" />
    <?php endif; ?>


    <?php if ($row->bhk_type_id_prop == 2): ?>
      <div class="col-lg-3 col-sm-6 mbb-5 mb-2">

        <select type="text" class="form-control " id="bhk_type_id" name="bhk_type_id">
          <option value="">Select BHK Type</option>
          <?php foreach ($bhk_type_data as $item) {
            $selected = "";
            if ($item->id == $bhk_type_id) {
              $selected = "selected";
            }
            ?>
            <option value="<?php echo $item->id ?>" <?php echo $selected ?>>
              <?php echo $item->name ?>

            </option>
          <?php } ?>
        </select>
      </div>
    <?php elseif ($row->bhk_type_id_prop == 1): ?>
      <div class="col-lg-3 col-sm-6 mbb-5 mb-2">

        <select type="text" class="form-control " id="bhk_type_id" name="bhk_type_id">
          <option value="">Select BHK Type</option>
          <?php foreach ($bhk_type_data as $item) {
            $selected = "";
            if ($item->id == $bhk_type_id) {
              $selected = "selected";
            }
            ?>
            <option value="<?php echo $item->id ?>" <?php echo $selected ?>>
              <?php echo $item->name ?>

            </option>
          <?php } ?>
        </select>
      </div>
    <?php else: ?>

      <input type="hidden" name="bhk_type_id" id="bhk_type_id" value="0" />
    <?php endif; ?>



    <?php if ($row->plot_facing_type_id_prop == 2): ?>
      <div class="col-lg-3 col-sm-6 mbb-5 mb-2">

        <select type="text" class="form-control " id="plot_facing_type_id" name="plot_facing_type_id">
          <option value="">Select Plot Facing</option>
          <?php foreach ($facing_type_data as $item) {
            $selected = "";
            if ($item->id == $plot_facing_type_id) {
              $selected = "selected";
            }
            ?>
            <option value="<?php echo $item->id ?>" <?php echo $selected ?>>
              <?php echo $item->name ?>
              <?php if ($item->status != 1) {
                echo " [Block]";
              } ?>
            </option>
          <?php } ?>
        </select>
      </div>
    <?php elseif ($row->plot_facing_type_id_prop == 1): ?>
      <div class="col-lg-3 col-sm-6 mbb-5 mb-2">

        <select type="text" class="form-control " id="plot_facing_type_id" name="plot_facing_type_id">
          <option value="">Select Plot Facing </option>
          <?php foreach ($facing_type_data as $item) {
            $selected = "";
            if ($item->id == $plot_facing_type_id) {
              $selected = "selected";
            }
            ?>
            <option value="<?php echo $item->id ?>" <?php echo $selected ?>>
              <?php echo $item->name ?>
              <?php if ($item->status != 1) {
                echo " [Block]";
              } ?>
            </option>
          <?php } ?>
        </select>
      </div>
    <?php else: ?>
      <input type="hidden" name="plot_facing_type_id" id="plot_facing_type_id" value="0" />
    <?php endif; ?>


    <?php if ($row->door_facing_type_id_prop == 2): ?>
      <div class="col-lg-3 col-sm-6 mbb-5 mb-2">

        <select type="text" class="form-control " id="door_facing_type_id" name="door_facing_type_id">
          <option value="">Select Door Facing</option>
          <?php foreach ($facing_type_data as $item) {
            $selected = "";
            if ($item->id == $door_facing_type_id) {
              $selected = "selected";
            }
            ?>
            <option value="<?php echo $item->id ?>" <?php echo $selected ?>>
              <?php echo $item->name ?>

            </option>
          <?php } ?>
        </select>
      </div>
    <?php elseif ($row->door_facing_type_id_prop == 1): ?>
      <div class="col-lg-3 col-sm-6 mbb-5 mb-2">

        <select type="text" class="form-control " id="door_facing_type_id" name="door_facing_type_id">
          <option value="">Select Door Facing</option>
          <?php foreach ($facing_type_data as $item) {
            $selected = "";
            if ($item->id == $door_facing_type_id) {
              $selected = "selected";
            }
            ?>
            <option value="<?php echo $item->id ?>" <?php echo $selected ?>>
              <?php echo $item->name ?>
            </option>
          <?php } ?>
        </select>
      </div>
    <?php else: ?>
      <input type="hidden" name="door_facing_type_id" id="door_facing_type_id" value="0" />
    <?php endif; ?>


    <?php if ($row->gated_community_type_id_prop == 2): ?>
      <div class="col-lg-3 col-sm-6 mbb-5 mb-2">

        <select type="text" class="form-control " id="gated_community_type_id" name="gated_community_type_id">
          <option value="">Select Gated Community </option>
          <?php foreach ($gated_community_type_data as $item) {
            $selected = "";
            if ($item->id == $gated_community_type_id) {
              $selected = "selected";
            }
            ?>
            <option value="<?php echo $item->id ?>" <?php echo $selected ?>>
              <?php echo $item->name ?>

            </option>
          <?php } ?>
        </select>
      </div>

    <?php elseif ($row->gated_community_type_id_prop == 1): ?>
      <div class="col-lg-3 col-sm-6 mbb-5 mb-2">

        <select type="text" class="form-control " id="gated_community_type_id" name="gated_community_type_id">
          <option value="">Select Gated Community Type</option>
          <?php foreach ($gated_community_type_data as $item) {
            $selected = "";
            if ($item->id == $gated_community_type_id) {
              $selected = "selected";
            }
            ?>
            <option value="<?php echo $item->id ?>" <?php echo $selected ?>>
              <?php echo $item->name ?>

            </option>
          <?php } ?>
        </select>
      </div>


    <?php else: ?>
      <input type="hidden" name="gated_community_type_id" id="gated_community_type_id" value="0" />
    <?php endif; ?>












  <?php endif; ?>


<?php endforeach; ?>