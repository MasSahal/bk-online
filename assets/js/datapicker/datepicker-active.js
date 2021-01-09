(function ($) {
  "use strict";
  $("#date_pick .input-group.date").datepicker({
    todayBtn: "linked",
    keyboardNavigation: false,
    forceParse: false,
    calendarWeeks: true,
    autoclose: true,
    format: "yyyy-mm-dd",
  });

  $("#date_picker .input-group.date").datepicker({
    // startView: 2,
    // minViewMode: 3,
    todayBtn: "linked",
    keyboardNavigation: true,
    forceParse: false,
    autoclose: true,
    format: "yyyy-mm-dd",
  });

  $("#data_3 .input-group.date").datepicker({
    startView: 2,
    todayBtn: "linked",
    keyboardNavigation: false,
    forceParse: false,
    autoclose: true,
  });

  $("#data_4 .input-group.date").datepicker({
    minViewMode: 1,
    keyboardNavigation: false,
    forceParse: false,
    forceParse: false,
    autoclose: true,
    todayHighlight: true,
  });

  $("#data_5 .input-daterange").datepicker({
    keyboardNavigation: false,
    forceParse: false,
    autoclose: true,
  });
})(jQuery);
