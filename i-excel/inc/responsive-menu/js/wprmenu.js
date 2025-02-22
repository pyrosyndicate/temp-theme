jQuery(document).ready(function( $ ) {

    var bar = $('#wprmenu_bar'), // top bar that shows/hides the menu
        bar_height = bar.outerHeight(true), // the bar height
        from_width = wprmenu.from_width,
        menu = $('#wprmenu_menu'), // the menu div
        menu_ul = $('#wprmenu_menu_ul'), // the menu ul
        menu_a = menu.find('a'), // single menu link
        body = $('body'),
        html = $('html'),
        animation_speed = 300,
        ab = $('#wpadminbar'),
        menu_enabled = (bar.length > 0 && menu.length > 0) ? true : false,
        menu_width = menu.width(),
        target_height = (window.innerHeight < body.height()) ? body.height() : window.innerHeight,
        target_width = (window.innerWidth < body.width()) ? body.width() : window.innerWidth;

    if (menu_enabled) {

        menu_ul.find('li').first().css({ 'border-top': 'none' });

        $(document).mouseup(function (e) {
            if (!menu.is(e.target) && menu.has(e.target).length === 0) {
                if (menu.is(':visible') && (!menu.hasClass('top'))) {
                    $.sidr('close', 'wprmenu_menu');
                }
            }
        });

        // ENABLE NESTING
        menu.find('ul.sub-menu').each(function () {
            var sub_ul = $(this),
                parent_a = sub_ul.prev('a'),
                parent_li = parent_a.parent('li').first();

            parent_a.addClass('wprmenu_parent_item');
            parent_li.addClass('wprmenu_parent_item_li');

            var expand = parent_a.before('<span class="wprmenu_icon wprmenu_icon_par icon_default"></span> ').find('.wprmenu_icon_par');

            sub_ul.hide();
        });

        function adjust_expandable_items() {
            $('.wprmenu_parent_item_li').each(function () {
                var t = $(this),
                    main_ul_width = 0,
                    icon = t.find('.wprmenu_icon_par').first(),
                    link = t.find('a.wprmenu_parent_item').first();

                if (menu.hasClass('top')) {
                    main_ul_width = window.innerWidth;
                } else {
                    main_ul_width = menu_ul.innerWidth();
                }

                if (t.find('.wprmenu_clear').length == 0) link.after('<br class="wprmenu_clear"/>');
            });
        }
        adjust_expandable_items();

        $('.wprmenu_icon_par').on('click', function () {
            var t = $(this),
                child_ul = t.parent('li').find('ul.sub-menu').first();
            child_ul.slideToggle(300);
            t.toggleClass('wprmenu_par_opened');
            t.parent('li').first().toggleClass('wprmenu_no_border_bottom');
        });

        function close_sub_uls() {
            menu.find('ul.sub-menu').each(function () {
                var ul = $(this),
                    icon = ul.parent('li').find('.wprmenu_icon_par'),
                    li = ul.parent('li');

                if (ul.is(':visible')) ul.slideUp(300);
                icon.removeClass('wprmenu_par_opened');
                li.removeClass('wprmenu_no_border_bottom');
            });
        }

        var mt = $('meta[name=viewport]');
        mt = mt.length ? mt : $('<meta name="viewport" />').appendTo('head');
        if (wprmenu.zooming == 'no') {
            mt.attr('content', 'user-scalable=no, width=device-width, maximum-scale=1, minimum-scale=1');
        } else {
            mt.attr('content', 'user-scalable=yes, width=device-width, initial-scale=1.0, minimum-scale=1');
        }

        // Detect if the browser is Firefox
        var isFirefox = navigator.userAgent.toLowerCase().indexOf('firefox') > -1;

        if (isFirefox) {
            screen.addEventListener("orientationchange", function () { updateOrientation(); }); // Firefox
        } else if (window.addEventListener) {
            window.addEventListener('orientationchange', updateOrientation, false);
        } else {
            window.attachEvent("orientationchange");
        }

        function updateOrientation() {
            window.scrollBy(1, 1);
            window.scrollBy(-1, -1);

            menu_width = menu.width();

            if (menu.is(':visible') && menu.hasClass('left')) {
                body.css({ 'left': menu_width });
                body.scrollLeft(0);
            }
        }

        if (menu.hasClass('left') || menu.hasClass('right')) {
            var hor_pos = (menu.hasClass('left')) ? 'left' : 'right';
            bar.sidr({
                name: 'wprmenu_menu',
                side: hor_pos,
                speed: animation_speed,
                onOpen: function () { bar.addClass('menu_is_opened'); },
                onClose: function () { bar.removeClass('menu_is_opened'); close_sub_uls(); }
            });

            menu_a.on('click', function () {
                $.sidr('close', 'wprmenu_menu');
            });

            if (wprmenu.swipe != 'no') {
                $('body').touchwipe({
                    wipeLeft: function () {
                        $.sidr('close', 'wprmenu_menu');
                    },
                    wipeRight: function () {
                        $.sidr('open', 'wprmenu_menu');
                    },
                    min_move_x: 60,
                    min_move_y: 60,
                    preventDefaultEvents: false
                });
            }

            $(window).resize(function () {
                target_width = (window.innerWidth < body.width()) ? body.width() : window.innerWidth;
                if (target_width > from_width && menu.is(':visible')) {
                    $.sidr('close', 'wprmenu_menu');
                }
            });

        } else if (menu.hasClass('top')) { // The top positioned menu
            body.prepend(menu);

            bar.on('click', function () {
                $("html, body").animate({ scrollTop: 0 }, animation_speed);

                close_sub_uls();
                menu.stop(true, false).slideToggle(animation_speed);
            });

            menu_a.on('click', function (e) {
                e.preventDefault();
                var url = $(this).attr('href');

                menu.slideUp(animation_speed, function () {
                    window.location.href = url;
                });
            });

            $(window).resize(function () {
                target_width = (window.innerWidth < body.width()) ? body.width() : window.innerWidth;
                if (target_width > from_width && menu.is(':visible')) {
                    close_sub_uls();
                    menu.slideUp(animation_speed, function () { });
                }
            });
        }
    }
});