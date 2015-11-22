(function ($) {
  
  Drupal.behaviors.citilightsSort = {
    attach: function (context) {
      var sort_order = Drupal.settings.citilights.sort_order;
      var asc        = $('.selected-asc');
      var desc       = $('.selected-desc');
      var sortSelect = $("#edit-sort-by");

      // widget display.
      if (sort_order === 'DESC') {
        desc.hide();
      } else {
        asc.hide();
      }
      
      // Change sort.
      sortSelect.change(function() {
        var query = Drupal.settings.citilights.query;
        if (query.length === 0) {
          query = {};
        }
        
        query.sort_by = $(this).val();
        query.sort_order = sort_order;
        
        var path = window.location.pathname + '?' + $.param(query);
        window.location.href = path;
      });
      
      // ASC sort.
      asc.click(function() {
        sort_order = 'ASC';
        desc.show();
        asc.hide();
        sortSelect.trigger("change");
      });
      
      // DESC sort.
      desc.click(function() {
        sort_order = 'DESC';
        asc.show();
        desc.hide();
        sortSelect.trigger("change");
      });
    }
  };
})(jQuery);