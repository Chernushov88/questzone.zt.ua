var qroom = qroom || {};
qroom.mainpage = new function () {
    var mp = this;
    mp.init = function () {
        var hasMainTop = false;
        var prevDur = 0;
        qroom.quests.resizeTiles();
        qroom.nodes.$window.bind('resize.mainQuests', qroom.quests.resizeTiles);
        qroom.nodes.$window.bind('resize.mainVideo', mp.resizeVideo);
        qroom.timeChangeScroll = null;
        if (!hasMainTop) return;
        qroom.eventGlob.on('wheel', function (type, data) {
            if (qroom.navScrollEnable) return;
            if (qopup.stack.length) return;
            clearTimeout(qroom.timeChangeScroll);
            qroom.timeChangeScroll = setTimeout(function () {
                switch (data.direction) {
                    case 1:
                        break;
                    case 2:
                        if (prevDur == 2 && qroom.values.windowHeight / 10 < qroom.values.scrollTop && qroom.values.scrollTop < qroom.values.windowHeight - qroom.nodes.$header.outerHeight()) {
                            qroom.navScroll($('.qroom-quests_list'));
                        }
                        break;
                }
            }, 100);
            prevDur = data.direction;
            var $topFilter = $('.qroom-quests_filter._in_top');
            mp.initVideos();
            $topFilter[($topFilter.offset().top < qroom.values.scrollTop + qroom.nodes.$header.outerHeight() ? 'add' : 'remove') + 'Class']('_h');
        });
        mp.initVideos();
    };
    mp.initVideos = function () {
        // var video = document.getElementById('qroom-main_video');
        // if (video) {
        //     video.addEventListener('canplay', function () {
        //         $('.qroom-main_video_wrapper').css('opacity', 1);
        //         mp.resizeVideo();
        //         video.loop = true;
        //         video.play();
        //     });
        // }
    };
    mp.resizeVideo = function () {
        // var video = document.getElementById('qroom-main_video');
        // var videoHeight;
        // var videoWidth;
        // videoWidth = qroom.values.windowWidth;
        // videoHeight = video.videoHeight * qroom.values.windowWidth / video.videoWidth;
        // if (videoHeight < qroom.values.windowHeight) {
        //     videoWidth = videoWidth * (qroom.values.windowHeight / videoHeight);
        //     videoHeight = qroom.values.windowHeight;
        // }
        // $(video).attr('width', videoWidth);
        // $(video).attr('height', videoHeight);
        // $(video).css({marginTop: -(videoHeight / 2), marginLeft: -(videoWidth / 2)});
    };
};