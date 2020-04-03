(function ($, Drupal) {
  Drupal.behaviors.ocmc_mission_disable_number_input_scrolling = {
    attach: function (context, settings) {
      console.log('kurt loaded');
      $(document).on("wheel", "input[type=number]", function (e) {
        $(this).blur();
      });
    }
  };
})(jQuery, Drupal);
