$(document).ready(function() {
    var maxIndex = $('#swiper_content_list').find('li').length - 1;
    function setItemWidth() {
        $('.content_list').find('li').width($('#topSlider').width());
    }
    function currentIndex(valIfSetting) {
        if (undefined === valIfSetting) {
            return parseInt($('#swiper_content_list').attr('current-display-index'));
        } else {
            $('#swiper_content_list').attr('current-display-index', valIfSetting);
        }
    }
    function displayIndex(index) {
        var transformValue = $('#topSlider').width() * index;
        var tt = 'translate3d(-'+ transformValue + 'px, 0px, 0px)'
        $('#swiper_content_list').css("transform", tt);
        currentIndex(index);
    }
    setItemWidth();
    $(window).resize(function() {
        setItemWidth();
    });
    $('#left-button').bind('click', function(e) {
        var tryIndex = currentIndex() + 1;
        var target = tryIndex > maxIndex ? 0 : tryIndex;
        displayIndex(target);
        e.stopPropagation();
    });
    $('#right-button').bind('click', function(e) {
        var tryIndex = currentIndex() - 1;
        var target = tryIndex < 0 ? maxIndex : tryIndex;
        displayIndex(target);
    });
});