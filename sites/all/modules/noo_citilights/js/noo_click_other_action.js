(function ($) {
  Drupal.behaviors.clickOtherAction = {
    attach: function (context) {
      $(".click-other-action").click(function (event) {
        event.preventDefault();
        var data = $(this).data();
        var click = $(data.click);
        if (click.length) {
          click.trigger("click");
        }
      })
    }
  };
})(jQuery);
