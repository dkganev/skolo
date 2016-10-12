$(document).ready(function() {

// RESTART TERMINAL
 $('#resetPsModal').on('show.bs.modal', function(e) {
    var psId = $(e.relatedTarget).data('psid');
    var dallasid = $(e.relatedTarget).data('dallasid');

    $(e.currentTarget).find('span').html(dallasid);
    $(e.currentTarget).find('input[name="psid"]').val(psId);
});

$('#reset-ps').on('click', function() {
     $.ajax({
         method: 'GET',
         async: true,
         url: reset_ps,
         data: { 
             psid: $('#resetPsModal input[name="psid"]').val(),
             _token: token
        } 
     })
     .done(function() {
         console.log('success');
         $('#resetPsModal').modal('hide');
         window.location.reload();
     });
});

}); // <== End Document Ready