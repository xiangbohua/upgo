// footerjs

$(function () {
    setTimeout(() => {
    	const $video = $('.content_list li.active').find('video');
    	if($video.length)$video[0].play();
    });
})