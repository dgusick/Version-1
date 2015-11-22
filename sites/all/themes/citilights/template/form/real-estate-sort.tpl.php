<form class="properties-ordering" method="get">
  <div class="properties-ordering-label"><?php print t('Sorted by'); ?></div>
  <div class="form-group properties-ordering-select">
    <div class="label-select">
      <select id="edit-sort-by" name="sort_by" class="form-control">
        <option value="created" <?php print (isset($params['sort_by']) && $params['sort_by'] == 'created') ? 'selected="selected"' : ''  ?>>Date</option>
        <option value="field_real_area_value" <?php print (isset($params['sort_by']) && $params['sort_by'] == 'field_real_area_value') ? 'selected="selected"' : ''  ?>>Area</option>
        <option value="field_real_bathrooms_value" <?php print (isset($params['sort_by']) && $params['sort_by'] == 'field_real_bathrooms_value') ? 'selected="selected"' : ''  ?>>Bath</option>
        <option value="field_real_bedrooms_value" <?php print (isset($params['sort_by']) && $params['sort_by'] == 'field_real_bedrooms_value') ? 'selected="selected"' : ''  ?>>Bed</option>
        <option value="title" <?php print (isset($params['sort_by']) && $params['sort_by'] == 'title') ? 'selected="selected"' : ''  ?>>Name</option>
      </select>
    </div>
  </div>
  <div class="form-group properties-ordering-select">
    <a class="selected-asc" href="#" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="List"><i class="fa fa-sort-asc"></i></a>
    <a class="selected-desc" href="#" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="List"><i class="fa fa-sort-desc"></i></a>
  </div>
</form>