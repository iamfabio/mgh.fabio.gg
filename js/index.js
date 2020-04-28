jQuery(function ($) {

    try {
        var lightmode = localStorage.getItem('lightmode');
        if (lightmode === 'true') {
            $('body').addClass('light');
        }
    } catch (e) {
        //console.error(e);
    }

    /* Define window width & if the current device is considered a small device. */
    let windowWidth = $(window).width() || -1;
    let smallDevice = false;
    if (windowWidth > -1) {
        smallDevice = (windowWidth < 992);
    }

    /* Fixed header. */
    var elemOffset = $('header .menu').offset().top;
    var offset = $(window).scrollTop();
    if (!smallDevice) {
        var header = $('header');
        if (offset >= elemOffset) {
            if (!header.hasClass('fixed')) {
                header.addClass('fixed');
            }
        } else {
            if (header.hasClass('fixed')) {
                header.removeClass('fixed');
            }
        }
    }

    $(window).on('scroll', function () {
        if (!smallDevice) {
            offset = $(window).scrollTop();
            var header = $('header');
            if (offset >= elemOffset) {
                if (!header.hasClass('fixed')) {
                    header.addClass('fixed');
                }
            } else {
                if (header.hasClass('fixed')) {
                    header.removeClass('fixed');
                }
            }
        }
    });

    /* Event handler for window resize. */
    var timeout;
    $(window).on('resize', function () {
        elemOffset = $('header .menu').offset().top;
        windowWidth = $(window).width() || -1;
        if (windowWidth > -1) {
            smallDevice = (windowWidth < 992);
        }

        clearTimeout(timeout);
        timeout = setTimeout(function () {
            if ($('body:not(.modmail)').length && confettiEnabled && confetti) {
                confetti.clear();
                $('#confetti').remove();
                confettiEnabled = null;
                /*confettiSettings.width = $(window).width();
                confettiSettings.height = $(document).height();
                confetti = new ConfettiGenerator(confettiSettings);
                confetti.render();*/
            }

            $('.tag').each(function () {
                moveTag(this);
            });
        }, 100);
    });

    function moveTag(tag) {
        if ($(tag).offset().top > $(tag).prev().offset().top) {
            $(tag).css('margin-left', '0');
            if ($(tag).offset().top <= $(tag).prev().offset().top) {
                $(tag).css('margin-left', '10px');
            }
        } else {
            $(tag).css('margin-left', '10px');
            if ($(tag).offset().top > $(tag).prev().offset().top) {
                moveTag(tag);
            }
        }
    }

    $('.tag').each(function () {
        moveTag(this);
    });

    /* Soft scroll with optional offset. */
    $('a[href*=\\#]:not([href=\\#])').on('click', function (e) {
        var target = $(this.hash);
        target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
        if (target.length) {
            e.preventDefault();
            if (location.pathname.replace(/^\//, '') === this.pathname.replace(/^\//, '') && location.hostname === this.hostname) {
                var offset = typeof $(this).data('offset') !== 'number' && typeof $(this)
                        .data('offset') !== 'undefined' ? parseInt($(this).data('offset')) : $(this).data('offset') || 0,
                    duration = typeof $(this).data('duration') === 'undefined' ? 750 : $(this).data('duration');
                duration = typeof duration === 'number' ? duration : (isNaN(parseInt(duration)) ? 750 : parseInt(duration));
                var targetOffset = target.offset() || { left: 0, top: 0 };
                $('html,body').animate({
                    scrollTop: targetOffset.top ? (targetOffset.top - offset) : 0
                }, duration);
                $('html, body').one('scroll mousedown DOMMouseScroll mousewheel keyup', function () {
                    $(this).stop();
                });
            }
        }
    });

    $(document).on('click', '#light, #dark', function () {
        var $body = $('body');
        $body.toggleClass('light');
        try {
            if ($body.hasClass('light')) {
                localStorage.setItem('lightmode', 'true');
            } else {
                localStorage.setItem('lightmode', 'false');
            }
        } catch (e) {
            //console.error(e);
        }
    });

    if ($('body.home').length) {
        /* Easter eggs. If you see this, you are clearly cheating. */
        var egg1 = false;
        $('.heart').on('click', function () {
            if (!$('#about .modal-body .easteregg').length) {
                $('#about .modal-body')
                    .append('<div class="easteregg">Looks like you found an easter egg. By reading this you have gained absolutely nothing. I salute you though for finding this!</div>');
            }
            egg1 = true;
            eastereggs();
        });

        var egg2 = false;
        var counter = 0;
        $('a.top').on('click', function () {
            counter++;
            if ($('.easteregg2').length) {
                $('.easteregg2 span.counter').html(counter);
            }
            egg2 = true;
            eastereggs();
        });

        var egg3 = false;
        $('.logo').on('click', function () {
            var spooky = $('.spooky');
            if (!spooky.hasClass('show') && !egg3) {
                spooky.addClass('show');
                setTimeout(function () {
                    spooky.removeClass('show');
                }, 5000);
            }
            egg3 = true;
            eastereggs();
        });

        var confettiEnabled = false;
        var confettiSettings = {
            target: 'confetti',
            max: '120',
            size: '1',
            animate: true,
            props: [ 'circle', 'square', 'triangle' ],
            colors: [ [ 166, 120, 222 ], [ 215, 155, 35 ], [ 255, 255, 255 ], [ 18, 18, 18 ] ],
            clock: '25',
            rotate: true,
            width: $(document).width(),
            height: $(document).height(),
            start_from_edge: false,
            respawn: true
        };
        var confetti = new ConfettiGenerator(confettiSettings);

        function eastereggs() {
            if (egg1 && egg2 && egg3 && confettiEnabled === false) {
                confettiEnabled = true;
                confetti.render();
            }
        }

        eastereggs();
    }

});