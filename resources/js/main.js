$(document).ready(function(){
    $('#incio').on('slide.bs.carousel', function (e) {
        console.log(e.relatedTarget);
    });
});
