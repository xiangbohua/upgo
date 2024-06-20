$(document).ready(function() {
    const WAIT_TIME = 30000;
    const AUTO_NEXT_TIME = 5000;

    var maxIndex = $('#swiper_content_list').find('li').length - 1;
    function setItemWidth() {
        $('#swiper_content_list').find('li').width($('#topSlider').width());
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
        resetWaitInterval();
        e.stopPropagation();
    });
    $('#right-button').bind('click', function(e) {
        var tryIndex = currentIndex() - 1;
        var target = tryIndex < 0 ? maxIndex : tryIndex;
        resetWaitInterval();
        displayIndex(target);
    });

    $('[data-slide-index]').bind('click', function(e) {
        var index = $(e.target).attr('data-slide-index');
        displayIndex(index);
        return false;
    });


    var time = 0;
    var waitingTime = WAIT_TIME; //点击后等待的市场
    var waitTimer = undefined;
    // 设置定时任务
    setInterval(function() {
        return;
        if (waitTimer !== undefined) {
            if (waitingTime < 0) {
                clearInterval(waitTimer);
                waitTimer = undefined;
            }
            return;
        }
        var current = currentIndex();
        var tryIndex = current + 1;
        var target = tryIndex;
        if (tryIndex > maxIndex) {
            target = 0;
        } else {
            target = tryIndex;
        }

        if (time === AUTO_NEXT_TIME) {
            displayIndex(target);
            time = 0;
        }
        time += 50;

        var width = (time / AUTO_NEXT_TIME).toFixed(2);
        $('[progress-mask='+current+']').css('width', (width * 100) + '%');

    }, 50); // 1000毫秒后执行

    function resetWaitInterval() {
        waitingTime = WAIT_TIME;
        waitTimer = setInterval(function() {
            waitingTime -= 100;
        }, 100);
        $('[data-slide-index]').removeClass('active');
        $('[progress-mask]').css('width', '100%');
    }


    var startX = 0;

    $('.home_banner').on('touchstart', function (event) {
        var startX = event.originalEvent.touches[0].clientX;
    });
    $('.home_banner').on('touchmove', function (event) {
        //var startX = event.originalEvent.touches[0].clientX;
    });
    $('.home_banner').on('touchend', function (event) {
        var endX = event.originalEvent.changedTouches[0].clientX;
        var moveX = endX - startX;
        var target = 1;
        if (moveX > 0) {
            //向右
            var tryIndex = currentIndex() - 1;
            target = tryIndex < 0 ? maxIndex : tryIndex;
        } else {
            var tryIndex = currentIndex() + 1;
            target = tryIndex > maxIndex ? 0 : tryIndex;
        }
        displayIndex(target);
        resetWaitInterval();
    });






});