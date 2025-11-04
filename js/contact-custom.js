(jQuery);
(function ($) {
             $('#contact_form').validate({
             submitHandler: function (form) {
                 const formBtn = $(form).find('button[type="submit"]');
                 const formResultDivId = 'form-result';
                 const formResultDiv = $('#' + formResultDivId);
         
                 // Remove any existing result div
                 formResultDiv.remove();
         
                 // Insert a new result div before the submit button, initially hidden
                 formBtn.before(`<div id="${formResultDivId}" class="alert alert-success" role="alert" style="display: none;"></div>`);
         
                 const formBtnOldMsg = formBtn.html();
         
                 // Disable button and show loading text if available
                 const loadingText = formBtn.data('loading-text') || 'Loading...';
                 formBtn.html(loadingText).prop('disabled', true);
         
                 // Submit the form via AJAX
                 $(form).ajaxSubmit({
                 dataType: 'json',
                 success: function (data) {
                     if (data.status === 'true') {
                     // Clear input fields only on success
                     $(form).find('.form-control').val('');
                     }
         
                     // Re-enable button and restore original text
                     formBtn.prop('disabled', false).html(formBtnOldMsg);
         
                     // Show response message
                     $('#' + formResultDivId).html(data.message).fadeIn('slow');
         
                     // Hide message after 6 seconds
                     setTimeout(() => {
                     $('#' + formResultDivId).fadeOut('slow');
                     }, 6000);
                 },
                 error: function () {
                     // Handle AJAX errors
                     formBtn.prop('disabled', false).html(formBtnOldMsg);
                     $('#' + formResultDivId).html('An error occurred. Please try again.').fadeIn('slow');
                     setTimeout(() => {
                     $('#' + formResultDivId).fadeOut('slow');
                     }, 6000);
                 }
                 });
             }
             });
         })(jQuery);