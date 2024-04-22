$(document).ready(function() {
    $('.search-btn').find('a').bind('click', function() {
        $('#navWrapper').addClass('searchopen');
        $('#header').addClass('head-bg')
    });

    $('.search-frame').find('a').bind('click', function () {
        $('#navWrapper').removeClass('searchopen');
        $('#header').removeClass('head-bg')
    });

    $('.search-input').find('input').on('input', function(input) {
        $('.clearfix').find('div').attr('action', 'search/'+ $(this).val());
    }).on('keyup', function (e) {
        if(e.which == 13) { // 13 是回车键的键码
            // 在这里写上你想要执行的代码
            window.location.href = '/search/' + $('.search-input').find('input').val();
        }
    });

    $('#openMenu').on('click', function () {
        $('.child').toggleClass('openMenu');
    });

    $(window).scroll(function() {
        // 获取窗口滚动条的位置
        var scrollPosition = $(window).scrollTop();

        if (scrollPosition == 0) {
            $("#header").removeClass("mini");
        } else {
            $("#header").addClass("mini");
        }
    });
});