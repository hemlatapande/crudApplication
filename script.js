$(document).ready(function () {
    $('.nav-tabs a').on('shown.bs.tab', function (event) {
        var activeTab = $(event.target).attr('href');
        $(activeTab).find('.carousel').carousel(0);
    });
});
