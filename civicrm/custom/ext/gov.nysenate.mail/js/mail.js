CRM.$(function($) {
  $(document).ready(function() {
    var checkExists;
    var checkDeleteExists;

    //13339 readjust iframe size
    function testPreview(checkExists) {
      //13339 adjust iframe height/location
      checkExists = setInterval(function () {
        var iframe = $('iframe[crm-ui-iframe="model.body_html"]');
        if (iframe.length) {
          var h = $(window).height();
          h = h * 0.8;
          iframe.height(h);

          //move location of modal and fix to the window
          $('div.ui-dialog')
            .draggable({containment: 'window'})
            .css('position', 'fixed')
            .css('top', '25px');

          clearInterval(checkExists);
        }
      }, 100); // check every 100ms
    }

    function deleteDraft(checkDeleteExists) {
      checkDeleteExists = setInterval(function() {
        var modalDelete = $('div.ui-dialog span.ui-dialog-title').text();

        //legacy
        if (modalDelete.length && modalDelete === 'Delete Draft') {
          $('div.ui-dialog')
            .draggable({containment: 'window'})
            .css('position', 'fixed')
            .css('top', '25px');

          clearInterval(checkDeleteExists);
        }
      }, 100);
    }

    //13339 check if this is mailing; check that preview link is present; trigger iframe resize
    if (window.location.hash.indexOf('mailing') !== 0) {
      var checkPreview = setInterval(function () {
        var prevA = $('div.preview-popup a');
        var prevB = $('div.form-group button.btn-primary');

        //legacy
        if (prevA.length > 0) {
          prevA.click(function() {
            testPreview(checkExists);
          });

          clearInterval(checkPreview);
        }

        //mosaico
        if (prevB.length > 0) {
          prevB.click(function() {
            testPreview(checkExists);
          });

          clearInterval(checkPreview);
        }
      }, 100);

      var checkDelete = setInterval(function () {
        var btnDel = $('button[crm-icon=fa-trash]');

        if (btnDel.length) {
          btnDel.click(function() {
            deleteDraft(checkDeleteExists);
          });

          clearInterval(checkDelete);
        }
      }, 100);
    }
  });
});
