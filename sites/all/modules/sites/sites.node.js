(function ($) {

Drupal.behaviors.sitesFieldsetSummary = {
  attach: function (context) {
    $('fieldset#edit-sites-options', context).drupalSetSummary(function (context) {
      var vals = [];

      $('input:checked', context).parent().each(function () {
        vals.push(Drupal.checkPlain($.trim($(this).text())));
      });

      if ($('.form-item input', context).filter(':checked').length === 0) {
        vals.unshift(Drupal.t('All sites'));
      }
      return vals.join(', ');
    });
  }
};

})(jQuery);
