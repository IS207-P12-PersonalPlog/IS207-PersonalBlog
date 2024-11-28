// init Isotope
var $grid = $('#phone_list').isotope({
  // options
});
// filter items on button click
$('.filter-button-group').on( 'click', 'button', function() {
  var filterValue = $(this).attr('data-filter');
  $grid.isotope({ filter: filterValue });
});


// hide or show button when scroll
$(window).scroll(function(){
  if ($(this).scrollTop() > 600) {
    $('.scr_btn').fadeIn();
  }
  else {
    $('.scr_btn').fadeOut();
  } 
});

$(document).ready(function() {
  // scroll to top when refresh page
  //$('html, body').animate({scrollTop: 0}, 'fast');
  // scroll to top page when click button home or button scroll
  $('.scrollup').click(function() {
      $('html, body').animate({scrollTop : 0}, 600);
      return false;
  });

  $('#addToCartBtn').click(function() {
    alert('Product added to cart!');
  });

  $('.removeItem').on('click', function(){
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
                // $('#listItemSuperCart').load(location.href + "#listItemSuperCart");
                location.reload();
            }
            else{
              alert("Some error has happen");
            }
        }
    });
  });

});

