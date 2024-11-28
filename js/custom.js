import $ from 'jquery';

$(document).on('click', '.removeItem', function(){
    var masp = $(this).val();
    $.ajax({
        method: "POST",
        url: "functions/handlecart.php",
        data:{
            "masp": masp,
            "scope": "delete"
        },
        success: function(response){
            if(response == 200)
            {
                alert("Deleted successfully");
                $('#listItemSuperCart').load(location.href + "#listItemSuperCart");
            }
        }
    });
});