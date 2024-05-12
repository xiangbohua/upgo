$(document).ready(function() {
    $('#openlc').bind('click', function() {
        $('body').toggleClass('open');
    });

    $('#bgmask').bind('click', function() {
        $('body').toggleClass('open');
    });


    $('#fitem_block_1').bind('click', function () {
        if ($('#fitem_block_1').find('h3').hasClass('active')) {
            $('#fitem_block_1').find('ul').height('0px');
        } else {
            $('#fitem_block_1').find('ul').height('120px');
        }
        $('#fitem_block_1').find('h3').toggleClass('active');
    })
    $('#fitem_block_2').bind('click', function () {
        if ($('#fitem_block_2').find('h3').hasClass('active')) {
            $('#fitem_block_2').find('ul').height('0px');
        } else {
            $('#fitem_block_2').find('ul').height('120px');
        }
        $('#fitem_block_2').find('h3').toggleClass('active');
    })
});