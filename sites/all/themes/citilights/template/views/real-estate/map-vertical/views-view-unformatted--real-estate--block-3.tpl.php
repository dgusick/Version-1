<script>
var nooGmapL10n = {
  "latitude": "40.714398",
  "longitude": "-74.005279",
  "maxZoom_MarkerClusterer": "5",
  "zoom": "12",
  "area_unit": "sqft",
  "thousands_sep": ",",
  "decimal_sep": ".",
  "num_decimals": "0",
  "currency": "$",
  "currency_position": "left",
  "default_label": "",
  "fullscreen_label": "",
  "no_geolocation_pos": "The browser couldn't detect your position!",
  "no_geolocation_msg": "Geolocation is not supported by this browser.",
  "markers": [
  	<?php foreach ($rows as $id => $row): ?>
      	<?php print $row; ?>
  	<?php endforeach; ?>  
  ],
  "ajax_finishedMsg": "All posts displayed"
};
</script>