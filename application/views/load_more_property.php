<?php foreach ($property_data_more as $property_more_item): ?>

  <tr>


    <td><?= $property_more_item->property_custom_id ?></td>
    <td><?= $property_more_item->property_type_name ?></td>
    <td><?= truncate_text($property_more_item->description, 50) ?> <span class="moreinfo"><a
          href="<?= MAINSITE ?>property-details/<?= $property_more_item->slug_url ?>">MORE INFO <i
            class="fa fa-angle-double-right"></i></a></span></td>
  </tr>

<?php endforeach; ?>