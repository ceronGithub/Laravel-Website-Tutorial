jQuery(document).ready(function (){
    jQuery("#test").click(function(event) {
        alert('Hello');
    });
    jQuery(document).on('click', '.product__information', function(){
        alert('Hello');
    });
});