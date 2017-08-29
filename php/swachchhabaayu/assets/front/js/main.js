$('#table-toggle').on("click", function (e) {
    e.preventDefault();
    $('.tab-title li a').removeClass('active');
    $(this).addClass('active');
    $('.map-wrapper').addClass('hide');

    setTimeout(function () {
        $('.table-view-wrapper').addClass('open');
        $('.table-view-wrapper').removeClass('hide');
    }, 300);

});
$('#map-toggle').on("click", function (e) {
    e.preventDefault();
    $('.tab-title li a').removeClass('active');
    $(this).addClass('active');
    $('.table-view-wrapper').addClass('hide');

    setTimeout(function () {
        $('.map-wrapper').addClass('open');
        $('.map-wrapper').removeClass('hide');
    }, 300);

});