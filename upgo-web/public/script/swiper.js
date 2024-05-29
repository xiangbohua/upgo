$(document).ready(function() {
    const WAIT_TIME = 30000;
    const AUTO_NEXT_TIME = 5000;
    const maxIndex = $('#swiper_content_list').find('li').length - 1;
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
        $('[progress-mask='+ index+']').css('width', '');
        $('.bx-pager-link').removeClass('active');
        $('#mask-cover-'+index).addClass('active');
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
        resetWaitInterval();
        displayIndex(target);
    });

    $('.bx-pager-link').bind('click', function(e) {
        var target = $(e.target).attr('data-slide-index');
        resetWaitInterval();
        displayIndex(target);
    })

    var time = 0;
    var waitingTime = WAIT_TIME; //点击后等待的市场
    var waitTimer = undefined;
    // 设置定时任务
    setInterval(function() {
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

});