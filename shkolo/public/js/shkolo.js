$(document).ready(function(){
    $("select").change(function(){
        //$( "#myselect option:selected" ).text();
        //$( "#myselect" ).val();
        selectedColor = $( "select option:selected" ).text();
        console.log('test1234', selectedColor);
        $("select").css("color", selectedColor);
                //alert("The text has been changed.");
    });
});

function updateData() {
    postData = {
        _token: $("input[name*='_token']").val(),
        ID: $( '#ID' ).val(),
        name: $( '#name' ).val(),
        url: $( '#url' ).val(),
        color_id: $( '#color' ).val(),
    }            

    $.ajax({
        url: "/shkolo/public/update",
        type:"POST",
	dataType: 'JSON',
        data:postData,
        success:function(response){
            if(response.success == 1) {
                window.open('/shkolo/public/shkolo',"_self");
            }
            else{
                alert(response.error)
            }
        },
	error:function(response){
            console.log('error',response);
            if(response) {
            }
        },
    });
}