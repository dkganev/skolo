$(".langSupport").click(function() {
    token = $('meta[name="csrf-token"]').attr('content');

    lang = $(this).attr("data-lang");
    $.ajax({
       type:'POST',
       url:'localize',
       dataType: "json",
       data:{'lang': lang , _token: token},
       success:function(data){
          if (data.success == "success"){
              $("#LangMenu").text( data.set);
              
              location.reload();
          }
       },
       error: function (error) {
            alert ("Unexpected wrong.");
        }
    });
});

$(".CasinoName").click(function() {
    token = $('meta[name="csrf-token"]').attr('content');
    newCasino = $(this).attr("data-casino");
    $.ajax({
       type:'POST',
       url:'ajax_casino',
       dataType: "json",
       data:{'newCasino': newCasino , _token: token},
       success:function(data){
          if (data.success == "success"){
              $("#CasinoMenu").text( data.casinoname);
              //$("#casinoEvents1").click();
              //var href = $('#casinoEvents').attr('href');
              var href = $('#CasinoCasino').attr('href');
              window.location.href = href; 
              //location.reload();casinoEvents
              //window.location.href = "http://10.0.0.156:8000/casino/events";
          }
       },
       error: function (error) {
            alert ("Unexpected wrong.");
        }
    });
});