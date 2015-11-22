(function ($) {
  Drupal.behaviors.citilights = {
    attach: function (context) {
      $(".gsearch-action .gsubmit-button-action").click(function () {
        $(".gsearch-action .gsubmit-button input").trigger("click");
      });
      
      // Linking input fields price
      $(".gprice-slider-range").on({
        change: function () {
          var priceRange = $(this).val();
          $(".gprice-input .form-item-gprice-min input").val(formatPrice(priceRange[0]));
          $(".gprice-input .form-item-gprice-max input").val(formatPrice(priceRange[1]));
        }
      });
      
      function formatPrice(price) {
        price = price.replace('$', '');
        price = price.replace(/,/g, '');
        return parseInt(price);
      }
      
      function formatArea(area) {
        area = area.replace(' sqft', '');
        return parseInt(area);
      }
      
      // Linking input fields area
      $(".garea-slider-range").on({
        change: function () {
          var areaRange = $(this).val();
          $(".garea-input .form-item-garea-min input").val(formatArea(areaRange[0]));
          $(".garea-input .form-item-garea-max input").val(formatArea(areaRange[1]));
        }
      });

    }
  };
})(jQuery);