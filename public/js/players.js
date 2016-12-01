 var addMenu = 0;
 
function AddNewCart() {
    if (addMenu == 0){
        $(".rowInputAdd").show();
        $("#addCard").text('Close Add');
        addMenu = 1;
    }else{
        $(".rowInputAdd").hide();
        $("#addCard").text('Add Card');
        addMenu = 0;
    }
}
function SaveAddCard() {
    CartIDAdd
    $("#refresh").show();
    $("#OK").hide();
    $("#remove").hide();
    CartID = $("#CartIDAdd").val();
    
    
    if (CartID != ""){
        $("#errorAdd").hide();
        
        alert("test");
        
        
    }else{
        $("#errorAdd").show();
        
    }
}
