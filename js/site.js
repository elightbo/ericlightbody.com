$(document).foundation();

$(function(){
    $('.fi-magnifying-glass').on('click', function(e) {
       $(this).next().focus();
    });
});
