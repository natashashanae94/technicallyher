$(document).ready(function() {
    $('.icon').click(function() {
        $('.menu_item').toggleClass('responsive');
    });

    $('.search').click(function() {
        //appends an "active" class to .popup and .popup-content when the "Open" button is clicked
        $(".bg-modal").addClass("active");
    });
  
    $('.close').click(function() {
        $(".bg-modal").removeClass("active");
    });
   
});
