var qroom = qroom || {};

/**
 * Cookie plugin
 * Copyright (c) 2006 Klaus Hartl (stilbuero.de)
 */
$.cookie = function (name, value, options) {
    if (typeof value != 'undefined') {
        options = options || {};
        if (value === null) {
            value = '';
            options.expires = -1;
        }
        var expires = '';
        if (options.expires && (typeof options.expires == 'number' || options.expires.toUTCString)) {
            var date;
            if (typeof options.expires == 'number') {
                date = new Date();
                date.setTime(date.getTime() + (options.expires * 24 * 60 * 60 * 1000));
            } else {
                date = options.expires;
            }
            expires = '; expires=' + date.toUTCString();
        }
        var path = options.path ? '; path=' + (options.path) : '';
        var domain = options.domain ? '; domain=' + (options.domain) : '';
        var secure = options.secure ? '; secure' : '';
        document.cookie = [name, '=', encodeURIComponent(value), expires, path, domain, secure].join('');
    } else {
        var cookieValue = null;
        if (document.cookie && document.cookie != '') {
            var cookies = document.cookie.split(';');
            for (var i = 0, l = cookies.length; i < l; i += 1) {
                var cookie = jQuery.trim(cookies[i]);
                if (cookie.substring(0, name.length + 1) == (name + '=')) {
                    cookieValue = decodeURIComponent(cookie.substring(name.length + 1));
                    break;
                }
            }
        }
        return cookieValue;
    }
};

/**
 * Event Machine
 * 22.03.2013
 *
 * new Eventer();
 */

var eventer = function (opts) {
    $.extend(this, {
        eventPrefix: '__em_'
    }, opts);
};

(function (proto) {

    proto.on = function (type, fn) {
        var self = this;
        $(this).on(self.eventPrefix + type, function (e, data) {
            fn.call(self, { type: e.type }, data);
        });
        return this;
    };

    proto.emit = function (type, data) {
        $(this).triggerHandler(this.eventPrefix + type, data);
        return this;
    };

    proto.off = function (type) {
        $(this).off(this.eventPrefix + type);
        return this;
    };

})(eventer.prototype);

qroom.eventGlob = new eventer(); //additional for subscribe and emit global events

/**
 * Questroom popup module
 *
 * for new popup call qopup.open(html, opts)
 */
var qopup = function () { };

(function (pop, _proto) {
    pop.stack = [];

    $.extend(pop, new eventer());

    pop.props = {
        width: 400,
        showTop: true,
        onlyContent: true
    };

    pop.on('close', function (event, data) {
        if (pop.stack.length == 0) {
            qroom.nodes.$wrapper.removeClass('fixed');
            qroom.nodes.$window.scrollTop(-document.getElementById('qroom-wrapper').style.top.replace('px', ''));
            qroom.nodes.$wrapper.css('top', 0);
        } else {
            pop.enableFirst();
        }
    });

    pop.on('open', function (event, data) {
        if (data.context.index == 0) {
            qroom.nodes.$wrapper.css('top', -$(window).scrollTop()).addClass('fixed');
            qroom.nodes.$window.scrollTop(0);
        }

        if (pop.stack.length) {
            pop.enableFirst();
        }
    });

    pop.enableFirst = function () {
        var _stackLength = pop.stack.length;

        for (var i in pop.stack) {
            pop.stack[i].$box[(i == _stackLength - 1 ? 'remove' : 'add') + 'Class']('invisible');
        }
    };

    pop.open = function (html, opts) {
        opts = opts || {};

        var _ex = new pop(opts);

        _ex.html = html;
        _ex.index = pop.stack.length;

        pop.stack.push(_ex);

        opts.wr_class = opts.wr_class || '';

        _ex.props = $.extend({}, pop.props, opts);

        _ex.open();

        pop.emit('open', { context: _ex });

        return _ex;
    };

    pop.close = function (index) {
        if (typeof (index) === 'undefined') index = pop.stack.length - 1;

        if (pop.stack[index]) pop.stack[index].close();

        pop.emit('close');
    };

    pop.closeAll = function () {
        for (var i in pop.stack) {
            pop.stack[i].$wrapper.remove();
        }

        pop.stack = [];
    };

    pop.confirm = function (msg, title, callOk, callNo) {
        msg = '<div>' + msg + '</div><div style="padding: 20px 0 0; text-align: right;"><span class="qroom-btn qopup-confirm-yes">Да</span>&nbsp;&nbsp;&nbsp;<span class="qroom-btn qopup-confirm-no">Нет</span></div>';

        pop.open(msg, {
            title: title,
            width: 400,
            onOpen: function () {
                $('.qopup-confirm-yes').click(function () {
                    if (callOk) callOk();

                    pop.close();
                });

                $('.qopup-confirm-no').click(function () {
                    if (callNo) callNo();

                    pop.close();
                });
            }
        })
    };

    /**
     * information popup
      * @param opts
     * opts.width - width popup
     * opts.msg - info message
     * opts.onClose - function after closing
     */
    pop.info = function (opts) {
        opts = opts || {};

        pop.open(opts.msg ? opts.msg : '',
        {
            width: opts.width || 400,
            onClose: function () {
                if (opts.onClose) opts.onClose();
            }
        });
    };

    _proto.open = function () {
        var context = this;

        context.render();
        context.$header.html(context.props.title);
        context.$content.html(context.html);
        context.$box.css({
            'maxWidth': context.props.width
        });
        context.align();

        if (context.props.onOpen) context.props.onOpen(context);

    };

    _proto.align = function () {
        var context = this;

        context.$box.css({ 'margin-top': context.props.fixedTop ? 0 : (context.$wrapper.height() - context.$box.height()) / 2 })
            .addClass('opened');
    };

    _proto.close = function () {
        var context = this;

        if (typeof context.props.shouldClose === "function") {
            if (context.props.shouldClose() === false) {
                return;   
            }            
        }

        context.$box.css({ 'marginTop': 0 }).addClass('closed');

        setTimeout(function () {
            context.$wrapper.remove();
            pop.stack.splice(context.index, 1);

            for (var i in pop.stack) {
                pop.stack[i].index = i;
            }

            pop.emit('close');

            if (context.props.onClose) context.props.onClose(context);
        }, 300);
    };

    _proto.render = function () {
        var context = this;

        context.$wrapper = $('<div>', { 'id': 'qopup-wrap-' + context.index, 'class': 'qopup-wrap ' + context.props.wr_class }).click(function () {
            qopup.close();
        });
        context.$box = $('<div>', { 'class': 'qopup-box' }).appendTo(context.$wrapper).click(function (event) {
            event.stopPropagation();
        });
        context.$header = $('<div>', { 'class': 'qopup-header' }).appendTo(context.$box);
        context.$closer = $('<div>', { 'class': 'qopup-close material-icons' }).html('close').appendTo(context.$box).click(function () {
            qopup.close();
        });
        context.$content = $('<div>', { 'class': 'qopup-content' }).appendTo(context.$box);

        context.$wrapper.css({ 'z-index': 1000 + context.index });
        $('#qroom-node_heap').append(context.$wrapper);
    };
}(qopup, qopup.prototype));

/**
 * объект хранит локи для сабмита форм
 * @type {Object}
 */
qroom.locks = {};

/**
 * remove fail class from parent node
 * @param elem
 */
qroom.checkData = function (elem) {
    $(elem).removeClass('fail');
};

/**
 *
 * @param elem - кнопка по которой идёт отправка формы
 * @param callbackSuccess - коллбэк в случае успеха
 * @param callbackError - коллбэк в случае неудачи
 * @return {Boolean}
 */
qroom.submitForm = function (elem, callbackSuccess, callbackError) {
    elem = $(elem);

    var _$parentForm = elem.closest('form');

    // проверяем есть ли форма
    if (!_$parentForm.length) {
        alert('Произошла ошибка, вероятней всего кнопка не в форме.');

        return false;
    }

    var _actionUrl = _$parentForm[0].action;
    var _$inputs = $('input, textarea, select', _$parentForm); // находим все поля ввода и селекторы
    var _$errorPlaceholder = $('.form-field_errors', _$parentForm); // контейнер для ошибок
    var _errorMsg = '';
    var _errorArray = [];
    var noajax = _$parentForm.hasClass("noajax");

    _$inputs.focus(function () {
        $(this).removeClass('_fail').parent().find('.qroom-form_field_error').slideUp();
    });

    // проверка на лок отправки для этой формы
    if (qroom.locks.hasOwnProperty(_actionUrl) && qroom.locks[_actionUrl]) return false;

    // ставим лок наотправку
    qroom.locks[_actionUrl] = true;

    _$inputs.each(function () {
        var _$input = $(this);
        var _value = _$input.val();
        var _title = _$input.data('title');

        // заполняем заголовок (необходимо для вывода ошибки)
        if (!_title || (_title && !_title.length)) _title = _$input.attr('name');

        // проверяем нужна ли валидация
        if (!_$input.hasClass('qroom-need_validate')) return;

        // смотрим в дате есть ли типы валидации, которые надо проверить
        var validations = _$input.data('validations');

        if (validations) validations = validations.length ? validations.split(',') : [];

        // прогоняем проверки, которые находим
        for (var index in validations) if (qroom.validations.hasOwnProperty(validations[index])) {
            if (!qroom.validations[validations[index]].func(_value, _$input)) {
                _errorMsg += _errorMsg.length ? ', ' + _title : _title;
                _$input.addClass('_fail');

                _errorArray.push({
                    'input': _$input,
                    'validation': qroom.validations[validations[index]],
                    'msg': _title
                });

                break;
            }
        }
    });

    if (_errorMsg.length) {
        // Какие то из полей не прошли валидацию

        _errorMsg = 'Error: ' + _errorMsg;
        _$errorPlaceholder.html(_errorMsg);

        if (callbackError) callbackError(_errorArray);

        qroom.locks[_actionUrl] = false; // снимаем лок с отправки этой формы

        return false;

    } else {
        //отправка на сервер

        if (noajax) {
            _$parentForm[0].submit();

            return true;
        }

        var inputs = _$parentForm.serializeArray();
        var params = {};

        for (var index in inputs) {
            params[inputs[index].name] = inputs[index].value;
        }

        elem.addClass('_loading');

        // Отправит пост запрос на экшн, который указан у формы

        qroom.ajax.post(_actionUrl, params, function (data) {
            elem.removeClass('_loading');

            if (!data.is_error) {
                // Ответ положительный

                if (callbackSuccess) callbackSuccess(data);
            } else {
                // Ответ с ошибкой

                _errorMsg = data.errorMsg ? data.errorMsg : 'Error from server';
                _$errorPlaceholder.html(data.errorMsg);

                if (callbackError) callbackError(_errorArray);
            }

            qroom.locks[_actionUrl] = false; // снимаем лок с отправки этой формы
        });
    }

};

qroom.submitCard = function () {
    var card = $(".card").val();

    $.ajax({
        url: '/бонус/',
        data: {
            cardnumber: card
        },
        success: function (response) {
            $(".result").replaceWith(response);
        },
        type: 'POST'
    });
}

qroom.card = function (el) {
    var $this = $(el);
    $this.hide();
    $this.next().show();
};

qroom.baseCallbacks = {
    /**
     * base success of forms
     * @param opts
     * opts.text - text for popup suceess
     */
    success: function (opts) {
        qopup.info({
            msg: opts.text || 'All correct',
            onClose: function () {
                //location.reload();
            }
        });
        $('.qroom-form input[type=text]').val('');
        opts.invoke && opts.invoke();
    },
    error: function (errO) {
        for (var i in errO) {
            if (errO[i].hasOwnProperty('input')) {
                var $input = errO[i].input;
                var errorMsg = $input.data('error');
                var $fieldError = $input.parent().find('.qroom-form_field_error');

                if ($fieldError.length) {
                    $fieldError.text(errorMsg ? errorMsg : errO[i].msg + ': ' + errO[i].validation.text)
                        .slideDown(100);
                }
            }
        }
    }
}
/**
 * объект для хранения валидаций
 * @type {Object}
 */
qroom.validations = {
    'not_null': {
        func: function (str, i) {
            return !!str.length;
        },
        text: 'Empty field'
    },
    'email': {
        func: function (str, i) {
            return !!str.length;
        },
        text: 'Wrang email'
    },
    'phone': {
        func: function (str, i) {
            return !!str.length;
        },
        text: 'Wrang phone'
    },
    'date': {
        func: function (str, i) {
            return !!str.length;
        },
        text: 'Wrang date'
    },
    'checked': {
        func: function (str, i) {
            return !!$(i).attr('checked');
        },
        text: 'Doesn\'t check'
    },
};

/**
 * main init for init nodes, events, etc.
 */
qroom.init = function () {
    qroom.nodes = {
        $window: $(window),
        $wrapper: $('#qroom-wrapper'),
        $header: $('.qroom-header'),
        $headerNav: $('.qroom-header_nav'),
        $content: $('.qroom-content'),
        $nodeHeap: $('#qroom-node_heap'),
        $boxesForResize: $('.qroom-box_page'),
    };

    qroom.values = {}; // объект будет хранить переменные scrollTop, windowHeight, windowWidth

    qroom.nodes.$window.scroll(qroom.actions.scroll);
    qroom.nodes.$window.resize(qroom.actions.resize);

    qroom.actions.scroll();
    qroom.actions.resize();

    qroom.nodes.$content.removeClass('_hidden');

    qroom.timeHeaderChange = null;

    qroom.eventGlob.on('wheel', function (type, data) {
        clearTimeout(qroom.timeHeaderChange);

        return;
    });

    qroom.opinion.scroller.init();

    qroom.gallery.init({
        selector: '.qroom-childrens_7'
    });

    //Меню всплывайка

    $('.qroom-header_nav_item._js_show_quest').hover(function () {
        qroom.ttip.show({
            el: this,
            content: document.getElementById('qroom-nav_ttip_items').innerHTML,
            side: 'bottom',
            fixed: true,
            centered: false,
            distance: 0,
            showDistance: 0,
            cssClass: 'qroom-header_ttip_menu'
        })
        $(this).addClass('_hovered');
    }, function () {
        qroom.ttip.hide(this);
        $(this).removeClass('_hovered');
    });

    //qroom.nodes.$nodeHeap.hover(
    //    function () {
    //        if ($(this).children().hasClass('qroom-header_ttip_menu')) {
    //            $('.qroom-header_nav_item._js_show_quest').addClass('_hovered');
    //        }
    //    }, function () {
    //        if ($(this).children().hasClass('qroom-header_ttip_menu')) {
    //            $('.qroom-header_nav_item._js_show_quest').removeClass('_hovered');
    //        }
    //    }
    //);

    $('.qroom-header_nav_item._js_show_quest').click(function (e) {
        if ($(this).hasClass('_active')) {
            e.preventDefault();
        }
    });

    //Праздники
    $('.qroom-header_nav_item._js_show_holidays').hover(function () {
        qroom.ttip.show({
            el: this,
            content: document.getElementById('qroom-nav_holidays_ttip_items').innerHTML,
            side: 'bottom',
            fixed: true,
            centered: false,
            distance: 0,
            showDistance: 0,
            cssClass: 'qroom-header_ttip_menu'
        })
        $(this).addClass('_hovered');
    }, function () {
        qroom.ttip.hide(this);
        $(this).removeClass('_hovered');
    });
};


qroom.actions = new function () {
    var actions = this;

    var scrollPrev = 0;

    actions.scroll = function () {
        qroom.values.scrollTop = qroom.nodes.$window.scrollTop();

        qroom.nodes.$header[(qroom.values.scrollTop > 0 ? 'add' : 'remove') + 'Class']('_black');

        qroom.eventGlob.emit('wheel', { direction: qroom.values.scrollTop > scrollPrev ? 2 : 1 });

        scrollPrev = qroom.values.scrollTop;
    };

    actions.resize = function () {
        qroom.values.windowHeight = qroom.nodes.$window.outerHeight();
        qroom.values.windowHeightBlock = qroom.nodes.$content.find('.qroom-page_top_box > .qroom-content_inner').outerHeight();
        if (qroom.values.windowHeightBlock > qroom.values.windowHeight) {
            qroom.values.windowHeight = qroom.values.windowHeightBlock;
        }
        qroom.values.windowWidth = qroom.nodes.$window.outerWidth();
        qroom.values.staticHeader = qroom.values.windowHeight <= 580;

        qroom.nodes.$boxesForResize.each(function () {
            var $box = $(this);

            if ($box.hasClass('_height_without_header')) {
                $box.css({
                    minHeight: qroom.values.windowHeight - qroom.nodes.$header.outerHeight() + 1
                })
            } else {
                $box.css({
                    minHeight: qroom.values.windowHeight + 1
                })
            }
        });
    };
};

/**
 * обёртка над $.post, пример применения questroom.ajax.post(url, {param1: val}, function(data){ console.log(data); })
 * @type {Object}
 */
qroom.ajax = {
    post: function (url, data, successF) {
        data = data || {};
        data.ajax = 1;

        $.ajax({
            url: url,
            data: data,
            success: function (response) {
                if (typeof successF == 'function') {
                    successF(response);
                }
            },
            complete: function (jqXHR) { },
            error: function (a, b, c) { },
            type: 'POST'
        });
    }
};

/**
 * scroll to element, jquery element
 * @param el
 */
qroom.navScroll = function (el) {
    if (!el.length) return;

    qroom.navScrollEnable = true;

    $('body, html').animate({
        'scrollTop': el.offset().top - (!qroom.values.staticHeader ? qroom.nodes.$header.outerHeight() : 0)
    }, 500);

    qroom.disableScroll();

    setTimeout(function () {
        qroom.navScrollEnable = false;
        qroom.enableScroll();
    }, 500);
};

/**
 * Если есть элемент бронирования на странице - скроллит до него
 * Иначе переводит на главную
 */
qroom.scrollToBooking = function () {
    var el = $('.qroom-booking');
    if (el.length) {
        qroom.analytics.track('quest', 'header_book_button', { label: 'scroll' });
        qroom.navScroll(el);
    } else {
        qroom.analytics.track('quest', 'header_book_button', { label: 'home_page' });
        window.location = "/#booking";
    }
};

qroom.disableScroll = function () {
    if (window.addEventListener) window.addEventListener('DOMMouseScroll', qroom.preventDefault, false);
    window.onwheel = qroom.preventDefault; // modern standard
    window.onmousewheel = document.onmousewheel = qroom.preventDefault; // older browsers, IE
    window.ontouchmove = qroom.preventDefault; // mobile
    document.onkeydown = qroom.preventDefaultForScrollKeys;
};

qroom.enableScroll = function () {
    if (window.removeEventListener) window.removeEventListener('DOMMouseScroll', qroom.preventDefault, false);
    window.onmousewheel = document.onmousewheel = null;
    window.onwheel = null;
    window.ontouchmove = null;
    document.onkeydown = null;
};

qroom.preventDefault = function (e) {
    e = e || window.event;
    if (e.preventDefault)
        e.preventDefault();
    e.returnValue = false;
};

qroom.preventDefaultForScrollKeys = function (e) {
    var keys = { 37: 1, 38: 1, 39: 1, 40: 1 };

    if (keys[e.keyCode]) {
        qroom.preventDefault(e);
        return false;
    }
};

/**
 * drop down menu
 * @type {ddn}
 */
qroom.ddn = new function () {
    var ddn = this;

    ddn.toggle = function (el) {
        var $el = $(el);

        $el.toggleClass('_hover');
    }
};

/**
 * object for manipulation quest
 * @type {quests}
 */
qroom.quests = new function () {
    var quests = this;

    /**
     * метод для фильтрации квестов в блоке квестов на страницах
     */
    quests.filter = function (params) {
        var $elsFilter = $('.qroom-quests_filter_item');
        qroom.analytics.track('quest', 'filter');

        $elsFilter.removeClass('_active');

        if (params.type == -1) {
            $('.qroom-quests_filter_item._item_all').addClass('_active');

            $('.qroom-quests_item').removeClass('_disabled').show('fast');
        } else {
            $('.qroom-quests_filter_item._item_' + params.type).addClass('_active');

            $('.qroom-quests_item').each(function () {
                var $i = $(this);
                var filterData = $i.data('filter') + '';
                var types = filterData.split(',');

                $i.addClass('_disabled');

                for (var i in types) {
                    if (types[i] == params.type) $i.removeClass('_disabled');
                }

                if ($i.hasClass("_disabled"))
                    $i.hide('fast');
                else
                    $i.show('fast');
            });
        }


        if (params.withScroll) qroom.navScroll($('.qroom-quests_list'));
    };

    /**
     * попап квестов
     * @param params
     * params.qid - id of quest
     * params.time - time (example: 10, 11, ...)
     */
    quests.bookingPopup = function (params) {
        var btn = $('#qroom-booking_id-' + params.qid);

        btn.addClass('_loading');

        $(".active_booking").removeClass("active_booking");
        btn.addClass('active_booking');

        qroom.ajax.post("/quests/book/" + params.qid + "/" + params.gid, {}, function (response) {
            btn.removeClass('_loading');

            qroom.analytics.track('quest', 'booking_start');
            try { fbq('track', 'InitiateCheckout'); } catch (e) { }
            

            if (response.small === true) {
                qopup.open(response.Html,
                {
                    width: 560
                });
            } else {
                qopup.open(response.Html, {
                    wr_class: 'qroom-booking_popup',
                    width: '100%',
                    shouldClose: function () {
                        var samara = [3, 4, 1038, 2096, 1075, 2112];
                        if (samara.indexOf(parseInt($('#GameInCityIdForBooking').val())) >= 0) {
                            qroom.analytics.track('samara', 'booking_popup_open');
                            quests.saleOnBookingClosePopup();
                            return false;
                        }
                        return true;
                    },
                    //fixedTop: true,
                    onOpen: function (context) {
                        context.$wrapper.css({
                            'background-image': 'url(' + response.background + ')'
                        });

                        context.$wrapper.append('<div class="qroom-popup_linear_mask"></div><div class="qroom-booking_popup_bg"></div>');

                        context.$wrapper.find('.qroom-booking_popup_bg').click(function (e) {
                            e.stopPropagation();
                        });
                    }
                });
            }


        });
    };

    /**
     *
     * @param el - DOM element
     * @param field {String} - name of field
     */
    quests.bookingPopup.changeField = function (el, field) {
        el = $(el);

        var value = el.data('value');
        var wrapper = el.closest('.qroom-booking_qopup');
        var wrapperMobile = el.closest('.qroom-booking_selctors');
        var fieldInput = $('.qroom-booking_input._' + field);

        el.closest('.qroom-booking_qopup_selctors').find('.qroom-booking_qopup_selctor').removeClass('_active');
        wrapperMobile.find('.qroom-booking_selctor').removeClass('_active');

        el.addClass('_active');

        if (fieldInput.length) fieldInput.val(value);
    };

    // Проверка промо-кода
    quests.checkPromo = function () {
        var btn = $('#qroomButtonApplyCode');
        btn.addClass('_loading');
        var $parentForm = btn.closest('form');
        var inputs = $parentForm.serializeArray();
        var params = {};

        for (var index in inputs) {
            params[inputs[index].name] = inputs[index].value;
        }

        qroom.ajax.post("/quests/verify/", params, function (response) {
            btn.removeClass('_loading');

            var $promoIcon = $('.qroom-form_promo .material-icons');
            var $promoInfo = $('.qroom-promo_error_info');
            var $price = $('.qroom-form_price_now span');
            var $oldPrice = $('.qroom-form_old_price');

            var result = response.result;
            if (result.status_code == 1) {
                $promoIcon.html('checked').addClass('_success').removeClass('_error');
                $promoInfo.hide();
                $oldPrice.css('visibility', 'visible')
                    .find('span')
                    .text(result.old_price);
                $price.text(result.new_price);
                btn.text(result.promo_applied_text);
                btn.addClass('_small-padding');
                btn.prop('disabled', true);
                //$("#qroomPromoCode").prop('disabled', true);
            } else if (result.status_code == 2) {
                $promoIcon.html('sentiment_dissatisfied').addClass('_error').removeClass('_success');
                $promoInfo.html(result.error_message);
                $oldPrice.css('visibility', 'hidden');
                $price.text(result.old_price);
                $promoInfo.show();
            } else {
                $promoIcon.html('').removeClass('_error, _success');
                $promoInfo.hide();
            }

        });
    };

    quests.bookingPopup.changeCount = function (el) {
        el = $(el);

        var count = el.data('count');
        var cost = el.data('cost');
        var wrapper = el.closest('.qroom-booking_qopup');
        var costHolder = wrapper.find('.qroom-booking_qopup_cost_holder');
        var countInput = wrapper.find('.qroom-booking_count_input');

        el.closest('.qroom-booking_qopup_selctors').find('.qroom-booking_qopup_selctor').removeClass('_active');

        el.addClass('_active');

        costHolder.text(cost);
        countInput.val(count);

        if (document.getElementById('qroomPromoCode').value.length) {
            quests.checkPromo();
        }
    };

    /**
     * попап после брони квестов
     * @param params
     */
    quests.bookingSuccessPopup = function () {
        var html = '';

        html += document.getElementById('qroom-successBooking_popup').innerHTML;
        qopup.open(html,
        {
            wr_class: 'qroom-booking_popup',
            width: '100%',
            onOpen: function (context) {
                context.$wrapper.css({
                    'background-image': 'url(' + 'static/i/quest_top_img.png' + ')'
                });

                context.$wrapper.append('<div class="qroom-popup_linear_mask"></div>');
                context.$wrapper.append('<div class="qroom-booking_popup_bg"></div>');

                context.$wrapper.find('.qroom-booking_popup_bg')
                    .click(function (e) {
                        e.stopPropagation();
                    });
            }
        });
    };


    quests.servicesPopup = function () {
        var html = '';

        html += document.getElementById('qroom-dop_services').innerHTML;

        qopup.open(html, {
            width: 560,
            wr_class: 'qroom-services_popup',
            onOpen: function () {
                $('.qroom-booking_popup').find('.qopup-box').addClass('invisible-false');
            },
            onClose: function () {
                $('.qroom-booking_popup').find('.qopup-box').removeClass('invisible-false');
            }
        });
    }

    quests.adwordsPopup = function()
    {
        var html = '';
        html += document.getElementById('qroom-adwords').innerHTML;
        qopup.open(html, {
            width: 560,
            wr_class: 'qroom-adwords_popup',
            onOpen: function () {
                $('.qroom-booking_popup').find('.qopup-box').addClass('invisible-false');
            },
            onClose: function () {
                $('.qroom-booking_popup').find('.qopup-box').removeClass('invisible-false');
            }
        });
    }

    quests.saleOnBookingClosePopup = function () {
        var html = '';
        html += document.getElementById('qroom-sale-on-booking-close').innerHTML;
        qopup.open(html, {
            width: 560,
            wr_class: 'qroom-adwords_popup',
            //wr_class: 'qroom-adwords_popup',
            onOpen: function () {
                $('.qroom-booking_popup').find('.qopup-box').addClass('invisible-false');
            },
            onClose: function () {
                $('.qroom-booking_popup').find('.qopup-box').removeClass('invisible-false');
            }
        });
    }

    quests.saleOnBookingClosePopupStep2 = function () {
        qopup.close();
        var html = document.getElementById('qroom-sale-on-booking-close-step-2').innerHTML;
        qopup.open(html, {
            width: 560,
            wr_class: 'qroom-adwords_popup',
            onOpen: function () {
                $('.qroom-booking_popup').find('.qopup-box').addClass('invisible-false');
            },
            onClose: function () {
                $('.qroom-booking_popup').find('.qopup-box').removeClass('invisible-false');
            }
        });
        //$('#qopup-wrap-1').find('.qopup-content').html(html);

    }

    quests.adwordsSuccessPopup = function ()
    {
        document.getElementById('iscoffee').value = true;
        var html = '';
        html += document.getElementById('qroom-adwords-success').innerHTML;
        qopup.open(html, {
            width: 560,
            wr_class: 'qroom-adwords_popup',
            onOpen: function () {
                $('.qroom-booking_popup').find('.qopup-box').addClass('invisible-false');
            },
            onClose: function () {
                $('.qroom-booking_popup').find('.qopup-box').removeClass('invisible-false');
            }
        });
    }

    quests.haveCertPopup = function () {
        var html = '';
        html += document.getElementById('qroom-have_certificate').innerHTML;
        qopup.open(html, {
            width: 560,
            wr_class: 'qroom-services_popup',
            onOpen: function () {
                $('.qroom-booking_popup').find('.qopup-box').addClass('invisible-false');
            },
            onClose: function () {
                $('.qroom-booking_popup').find('.qopup-box').removeClass('invisible-false');
            }
        });
    }



    quests.choiceDay = function (day) {
        if (qroom.locks.choiceDay) return;

        qroom.locks.choiceDay = true;
        qroom.analytics.track('quest', 'select_date');

        $('.qroom-booking_date_pick').removeClass('_active');
        $('#qroom-date_' + day).addClass('_active');
        $('.qroom-booking_holder').addClass('_box_loading _loader_size_50');

        $.ajax({
            url: "/quests/time-table/" + day,
            success: function (response) {
                //questroom.loader.stop($('#PathOrderItems'), 'PathOrderItems');
                $(".qroom-booking_holder").html(response.Html);
                //$(".path-order_prices").html(response.PriceHtml);
            },
            complete: function (jqXHR) {
                qroom.locks.choiceDay = false;

                $('.qroom-booking_holder').removeClass('_box_loading _loader_size_50');
            },
            error: function (a, b, c) { },
            type: 'GET'
        });
    };

    /**
     * метод для резайса тайлов квестов на страницах
     */
    quests.resizeTiles = function () {
        var $questsItems = $('.qroom-quests_item');
        var countQuests = $questsItems.length;
        var heightItem = 0;
        var headerHeight = !qroom.values.staticHeader ? qroom.nodes.$header.outerHeight() : 0;
        var $filter = $('.qroom-quests_filter_holder');
        var filterHeight = 0;

        if ($filter.length) filterHeight = $filter.outerHeight();

        // calc height for items
        if (countQuests == 1) {
            heightItem = qroom.values.windowHeight - headerHeight;

            $filter.hide();
        } else if (countQuests <= 3) {
            heightItem = qroom.values.windowHeight - headerHeight - filterHeight;
        } else {
            heightItem = (qroom.values.windowHeight - headerHeight - filterHeight) / 2 - 30;
        }

        var dataHeight = $(".qroom-quests_list").attr("data-height-item");
        console.log(dataHeight);
        if (dataHeight)
            heightItem = parseInt(dataHeight);
        console.log(heightItem);

        var delta = countQuests % 3;
        var percent = 100 / delta;

        // set width for delta tiles
        for (var i = 0; i < delta; i++) {
            $($questsItems[countQuests - 1 - i]).css('width', percent + '%');
        }

        $questsItems.css({
            'height': Math.floor(heightItem + 1)
        });

        // check inner height
        if (countQuests) {
            $questsItems.each(function(index) {
                var $i = $(this);
                var $h = $i.find('.qroom-quests_item_hover_inner');

                $i.removeClass('_mini');

                if ($i.outerHeight() < $h.outerHeight()) $i.addClass('_mini');
            });
        }

        // check filter floating
        if (countQuests > 6 && $filter.length) {
            quests.checkFilterPos();

            qroom.eventGlob.on('wheel.filterQuest', function (type, data) {
                quests.checkFilterPos();
            });
        } else {
            qroom.eventGlob.off('wheel.filterQuest');
        }

    };

    quests.checkFilterPos = function () {
        var $list = $('.qroom-quests_list');
        var listOffset = $list.offset();
        var listHeight = $list.outerHeight();
        var headerHeight = !qroom.values.staticHeader ? qroom.nodes.$header.outerHeight() : 0;
        var $filter = $('.qroom-quests_filter_holder');
        var filterHeight = 0;

        if ($filter.length) filterHeight = $filter.outerHeight();

        if (qroom.values.scrollTop + headerHeight >= listOffset.top
            && listHeight + listOffset.top >= qroom.values.scrollTop + qroom.values.windowHeight) {

            $filter.find('.qroom-quests_filter').addClass('_fixed');
        } else {
            $filter.find('.qroom-quests_filter').removeClass('_fixed');
        }
    };

    quests.successBooking = function (data) {
        window.location = data.message;
        qroom.analytics.track('quest', 'booking_finish');
    };

    quests.errorBooking = function (errO) {
        for (var i in errO) {
            if (errO[i].hasOwnProperty('input')) {
                var $input = errO[i].input;
                var errorMsg = $input.data('error');

                $input.parent()
                    .find('.qroom-form_field_error')
                    .text(errorMsg ? errorMsg : validation.text + ':' + errO[i])
                    .slideDown(100);
            }
        }
    };

    quests.pricesTypesPopup = function () {
        var html = '';

        html += document.getElementById('qroom-prices_popup').innerHTML;
        qopup.open(html, {
            width: 600
        });
    };
};

/**
 * object for manipulation location
 * @type {location}
 */
qroom.location = new function () {
    var location = this;

    location.popup = function () {
        var html = '';

        location.hideTtip();

        html += document.getElementById('qroom-location_popup').innerHTML;

        qopup.open(html, {
            width: 800
        });
    };

    location.hideTtip = function () {
        $('.qroom-location').removeClass('_hover');
    };

    location.changeCity = function (cityId, url, domain) {
        if (!cityId) return;

        $.cookie("AutoCityId", cityId, { domain: domain, expires: 365 });
        console.log(window.location.hostname + " " + cityId);
        return true;
    }
};

qroom.analytics = new function () {
    var analytics = this;

    analytics.track = function (category, action, opts) {
        opts = opts || {};
        try {
            if (typeof window.yaCounter == "undefined") {
                console.log("No Yandex");
            } else {
                window.yaCounter.reachGoal(category + "_" + action, opts);
            }
        } catch (e) {
            console.log(e);
        }

        try {
            var eventLabel = opts.label || null;
            ga('send', 'event', category, action, eventLabel);
            ga('b.send', 'event', category, action, eventLabel);
        } catch (e) {
            console.log(e);
        }

        //add Facebook
        try {
            fbq('track', category + "_" + action);
        } catch (e) {
            
        }
    }
};


/**
 * object for manipulation with language
 */
qroom.lang = new function () {
    var lang = this;

    /**
     * work with dictionary
     * @param key - string (example 'success_answer_after_booking')
     * @returns {string}
     */
    lang.get = function (key) {
        return qroom.dictionary.hasOwnProperty(key) ? qroom.dictionary[key] : '';
    };

    lang.hideTtip = function () {
        $('.qroom-lang_choice').removeClass('_hover');
    };

    /**
     * method for change lang
     * @param lang - string (example 'ru')
     */
    lang.change = function (lang) {
        console.log(lang);
        window.location = "/site/applylanguage/" + lang;
        lang.hideTtip();
    };

    /**
     * plural method
     * @param c - int count of anything
     * @param form1 - form for 1
     * @param form2 -form for 2..4
     * @param form3 -form for 5..9
     * @param nullForm - form for nil
     * @param printNumber flag of print number
     * @returns {*}
     */
    lang.plural = function (c, form1, form2, form3, nullForm, printNumber) {
        printNumber = printNumber || true;

        if (!c && nullForm) {
            return nullForm;
        } else {
            return (printNumber ? c + ' ' : '') + (c % 10 == 1 && c % 100 != 11 ? form1 : (c % 10 >= 2 && c % 10 <= 4 && (c % 100 < 10 || c % 100 >= 20) ? form2 : form3))
        }
    };

    /**
     *
     * @param forms array - массив из 2-ух строк, первая строка - м, вторая для w
     * @param gender - string (value: 'm' or 'w')
     */
    lang.gender = function (forms, gender) {
        forms = forms || ['', ''];

        if (forms.length < 2) return '';

        return gender == 'm' ? forms[0] : forms[1];
    };
};

/**
 * object for opinions
 * @type {opinion}
 */
qroom.opinion = new function () {
    var opinion = this;

    opinion.scroller = new function () {
        var scroller = this;

        scroller.init = function () {
            scroller.$wrapper = $('.qroom-opinions_list');
            scroller.$items = $('.qroom-opinion');
            scroller.itemsLength = scroller.$items.length;
            scroller.$choicer = $('.qroom-opinions_choicer');

            scroller.$pointerBack = $('.qroom-opinion_pointer._pointer_back');
            scroller.$pointerForward = $('.qroom-opinion_pointer._pointer_forward');

            scroller.curI = 0;
            scroller.show(scroller.curI);

            if (scroller.itemsLength > 1) {
                scroller.$pointerBack.removeClass('_hidden');
                scroller.$pointerForward.removeClass('_hidden');
                scroller.renderNav();
            }

            scroller.$wrapper.addClass('_inited');
        };

        scroller.next = function () {
            var index = scroller.curI + 1 > scroller.itemsLength - 1 ? 0 : scroller.curI + 1;

            scroller.show(index);
        };

        scroller.prev = function () {
            var index = scroller.curI - 1 < 0 ? scroller.itemsLength - 1 : scroller.curI - 1;

            scroller.show(index);
        };

        scroller.show = function (i) {
            $(scroller.$items[scroller.curI]).removeClass('_shown');

            scroller.curI = i;

            $(scroller.$items[scroller.curI]).addClass('_shown');

            $('.qroom-opinions_choicer_item').removeClass('_active');
            $('.qroom-opinions_choicer_item._item_' + scroller.curI).addClass('_active');
        };

        scroller.renderNav = function () {
            var html = '';

            for (var i = 0; i < scroller.itemsLength; i++) {
                html += '<div class="qroom-opinions_choicer_item _item_' + i + ' ' + (i == scroller.curI ? '_active' : '') + '" onclick="qroom.opinion.scroller.show(' + i + ')"></div>'
            }

            scroller.$choicer.html(html);
        };
    };

    opinion.popup = function () {
        var html = '';

        html += document.getElementById('qroom-opinion_popup').innerHTML;
        qroom.analytics.track('opinion', 'order_start');
        qopup.open(html, {
            width: 600
        });
    };
};

/**
 * Checkbox object for form
 * @param checkbox
 */
qroom.checkbox = function (checkbox) {
    var $checkbox = $(checkbox);
    var $input = $checkbox.find('input');

    $checkbox.toggleClass('_checked');
    $input.attr('checked', $checkbox.hasClass('_checked'));
};

/**
 * gallery viewer for photos
 * use :
 * qroom.gallery({
 *  selector: '.selector' OR elements: $('.selector')
 * });
 *
 * work for structure:
 *
 * <a class="selector" href="img_url || video_url" style="img_preview"></a>
 *
 * gallery supports images formats [jpg, jpeg, png]
 * gallery supports video formats [mpg, mpeg, avi, mp4, ogv, webm]
 */
qroom.gallery = function () { };

(function (gallery, proto) {
    gallery.formats = {
        'img': ['jpg', 'jpeg', 'png'],
        'video': ['mpg', 'mpeg', 'avi', 'mp4', 'ogv', 'webm']
    };

    gallery.init = function (params) {
        var _ins = new gallery();

        _ins.init(params);
    };

    gallery.getTypeShow = function () {

    };

    proto.init = function (params) {
        var ctx = this;

        if (!params.selector && !params.elements) {
            console.log('selector not detected');

            return;
        }

        if (params.selector) {
            ctx.$els = $(params.selector);
        } else {
            ctx.$els = params.elements;
        }

        ctx.cacheImages = {};

        ctx.$els.each(function (index) {
            var el = $(this);

            el.click(function (event) {
                ctx.open(index);

                cancelEvent(event);
            })
        });
    };

    proto.open = function (index) {
        var ctx = this;

        var structure = document.getElementById('qroom-gallery_structure').innerHTML;

        index = index || 0;

        ctx.popup = qopup.open(structure, {
            wr_class: 'qroom-gallery_popup',
            onOpen: function (galleryPopup) {
                ctx.initStructure(galleryPopup.$wrapper);
                ctx.renderNav();
                ctx.showImage(index);
            }
        });

        ctx.opened = true;
    };

    proto.initStructure = function (wrapper) {
        var ctx = this;

        ctx.$wrapper = wrapper;
        ctx.$img = ctx.$wrapper.find('.qroom-gallery_img');
        ctx.$pointerBack = ctx.$wrapper.find('.qroom-gallery_pointer._back');
        ctx.$pointerForward = ctx.$wrapper.find('.qroom-gallery_pointer._forward');
        ctx.$changer = ctx.$wrapper.find('.qroom-gallery_changer');

        if (ctx.$els.length > 1) {
            ctx.$pointerBack.removeClass('_hidden');
            ctx.$pointerForward.removeClass('_hidden');

            ctx.$pointerBack.click(function () {
                ctx.prevImage();
            });

            ctx.$pointerForward.click(function () {
                ctx.nextImage();
            });
        }
    };

    proto.showImage = function (index) {
        var ctx = this;
        var href = ctx.$els.get(index).href;

        ctx.cutI = index;

        ctx.$changer.find('.qroom-gallery_changer_item').removeClass('_active');
        ctx.$changer.find('.qroom-gallery_changer_item:eq(' + index + ')').addClass('_active');

        ctx.$img.stop().fadeOut(100);

        setTimeout(function () {
            ctx.$img.html('');

            var hrefSplit = href.split('.');
            var fileExt = hrefSplit[hrefSplit.length - 1];

            if (_.indexOf(gallery.formats.video, fileExt) != -1) {
                ctx.$img.stop().show(100);
                ctx.$img[0].style.backgroundImage = 'none';
                ctx.$img.append('<video width="' + qroom.values.windowWidth + '" height="' + (qroom.values.windowHeight - 140) + '" controls><source src="' + href + '"></video>');
            } else if ((new RegExp('youtube', 'gi').test(href))) {
                ctx.$img.stop().show(100);
                ctx.$img[0].style.backgroundImage = 'none';
                ctx.$img.append('<iframe width="' + qroom.values.windowWidth + '" height="' + (qroom.values.windowHeight - 140) + '" src="' + href + '" frameborder="0" allowfullscreen></iframe>');
            } else if (ctx.cacheImages.hasOwnProperty(href)) {
                ctx.$img[0].style.backgroundImage = 'url(' + href + ')';
                ctx.$img.stop().fadeIn(100);
            } else {
                var img = new Image();

                img.onload = function () {
                    ctx.cacheImages[href] = true;
                    ctx.$img[0].style.backgroundImage = 'url(' + href + ')';
                    ctx.$img.fadeIn(100);
                };

                img.src = href;
            }
        }, 100);
    };

    proto.nextImage = function () {
        var ctx = this;
        var index;

        index = ctx.cutI + 1 > ctx.$els.length - 1 ? 0 : ctx.cutI + 1;

        ctx.showImage(index);
    };

    proto.prevImage = function () {
        var ctx = this;
        var index;

        index = ctx.cutI - 1 < 0 ? ctx.$els.length - 1 : ctx.cutI - 1;

        ctx.showImage(index);
    };

    proto.renderNav = function () {
        var ctx = this;

        ctx.$els.each(function (index) {
            var $changerItem = $('<div>', { 'class': 'qroom-gallery_changer_item _item_' + index }).appendTo(ctx.$changer);

            if (ctx.cutI == index) $changerItem.addClass('_active');

            $changerItem.click(function () {
                ctx.showImage(index);
            })
        });
    };

    proto.close = function () {
        var ctx = this;

        ctx.opened = false;
    };

})(qroom.gallery, qroom.gallery.prototype);

/**
 * helpers
 */
function sp(e) { e.stopPropagation ? e.stopPropagation() : e.cancelBubble = true; }

function pd(e) { e.preventDefault ? e.preventDefault() : e.returnValue = false; }

function cancelEvent(e) {
    e = e || window.event || {};
    e = e.originalEvent || e;
    sp(e);
    pd(e);
}

/**
 * Модуль для тултипов
 * @type {ttip}
 */
qroom.ttip = new function () {
    var ttip = this;

    var defaultDelayForClose = 300;

    /**
     * Хранит все тултипы, которые хоть раз показывались
     * @type {Array}
     */
    ttip.collector = [];

    /**
     * Функция инициализирует все тултипы у элементов с классом 'qroom-element_with_ttip'
     */
    ttip.init = function () {
        $('.qroom-element_with_ttip').hover(function () {
            ttip.show({
                el: this
            })
        }, function () {
            ttip.show(this);
        });
    };

    /**
     * Открывает тултип
     * @param args
     * args.content - то, что вставляется в тултип, если параметр не передан, то контент может заполнить аттрибут
     * data-title у элемента
     * args.el - экземпляр DOM элемента, для которого показывается тултип
     * args.width - устанавливает максимальную длинну тултипа (default - 'auto')
     * args.side - устанавливает сторону у элемента, у которой будет показан тултип (default - 'top')
     * args.centered - центрирует тултип по элементу (default - true)
     * args.cssClass - навесит класс на тултип, для кастомизации стилей
     * args.delayForClose - время которое пройдет до закрытия тултипа (default - defaultDelayForClose)
     * args.hoverable - флаг того, можно ли наводить курсором на тултип (default - true)
     * args.showDistance - дистанция которую проходит тултип перед показом (default - 10)
     * args.distance - дистанция от тултипа до элемента (default - 10)
     * args.fixed - включает position fixed у тултипа, необходимо, чтобы отображать тултип у фиксировнных элементов
     */
    ttip.show = function (args) {
        args = args || {};

        if (!args.el) return;

        if (args.el.ttipTimeoutClose) clearTimeout(args.el.ttipTimeoutClose);

        if (args.el.ttipOpened) return;

        args.$el = $(args.el);

        args = $.extend(true, {
            elWidth: args.$el.outerWidth(),
            elHeight: args.$el.outerHeight(),
            elOffset: args.$el.offset(),
            centered: (typeof args.centered == 'undefined' ? true : args.centered),
            hoverable: (typeof args.hoverable == 'undefined' ? true : args.hoverable),
            showDistance: args.showDistance || 10,
            distance: args.distance || 10,
        }, args);

        if (args.delayForClose) args.el.delayForClose = args.delayForClose;

        if (args.showDistance) args.el.showDistance = args.showDistance;

        args = getContent(args);

        var _hasContent = typeof (args.content) == 'undefined' || !(args.content + '').length;

        if (_hasContent) {
            console.log('' +
                'string for ttip is empty , try to add attr \'data-title\' or parametr \'content\' in initialize' +
            '');

            return;
        }
        args.el.showTimeout = setTimeout(function () {
            open(args);
        }, 200);
    };

    /**
     * прячем тултип
     * @param el
     */
    ttip.hide = function (el) {
        el = el || false;

        if (!el) return;

        if (el.showTimeout) clearTimeout(el.showTimeout);

        el.ttipTimeoutClose = setTimeout(function () {
            if (!el.ttip) return;

            el.ttip.animate({
                left: el.parametricInfo.left,
                top: el.parametricInfo.top,
                opacity: 0
            }, 100, 'linear');

            setTimeout(function () {
                el.ttip.remove();
                el.ttip = false;
                el.ttipOpened = false;
            }, 100);
        }, el.delayForClose || defaultDelayForClose);
    };

    /**
     * Прячем все тултипы
     */
    ttip.anyHide = function () {
        for (var i in ttip.collector) {
            ttip.hide(ttip.collector[i]);
        }
    };

    var open = function (args) {
        var tooltip = render(args);
        var $ttip = tooltip.$ttip;
        var $ttipArrow = tooltip.$ttipArrow;

        // получаем параметры тултипа
        args.ttipParams = {
            width: $ttip.outerWidth(),
            height: $ttip.outerHeight()
        };

        // определяем сторону к которой примкнет тултип
        args.side = getSide(args);

        // данные по позиционированию тултипа и стрелки
        var parametricInfo = getParametricInfo(args);

        parametricInfo.arrowClass += args.centered ? ' _centered' : '';

        $ttipArrow.addClass(parametricInfo.arrowClass);

        if (parametricInfo.arrowLeft) $ttipArrow.css('left', parametricInfo.arrowLeft);
        if (parametricInfo.arrowTop) $ttipArrow.css('top', parametricInfo.arrowTop);

        $ttip.css({
            left: parametricInfo.left,
            top: parametricInfo.top,
            opacity: .5,
            position: args.fixed ? 'fixed' : 'absolute'
        }).animate({
            left: parametricInfo.endLeft,
            top: parametricInfo.endTop,
            opacity: 1
        }, 100, 'linear');

        $ttip.data('side', args.side);

        if (args.hoverable) {
            $ttip.hover(function () {
                ttip.show(args);
            }, function () {
                ttip.hide(args.el);
            })
        }

        args.el.parametricInfo = parametricInfo;
        args.el.ttip = $ttip;

        ttip.collector.push(args.el);

        args.el.ttipOpened = true;
    };

    /**
     * высчитываем начальные позиции тултипа
     * @param args
     * @returns {{left: *, top: *, arrowClass: *}}
     */
    var getParametricInfo = function (args) {
        var startLeft;
        var startTop;
        var arrowClass;
        var endLeft;
        var endTop;

        switch (args.side) {
            case 'left':
                startLeft = args.elOffset.left - args.ttipParams.width - args.distance;

                endLeft = startLeft;

                startLeft -= args.showDistance;

                if (args.centered) {
                    startTop = args.elOffset.top + (args.elHeight - args.ttipParams.height) / 2;
                } else {
                    startTop = args.elOffset.top;
                }

                endTop = startTop;

                arrowClass = '_right';

                break;
            case 'right':
                startLeft = args.elOffset.left + args.elWidth + args.distance;

                endLeft = startLeft;

                startLeft += args.showDistance;

                if (args.centered) {
                    startTop = args.elOffset.top + (args.elHeight - args.ttipParams.height) / 2;
                } else {
                    startTop = args.elOffset.top;
                }

                endTop = startTop;

                arrowClass = '_left';

                break;
            case 'bottom':
                startTop = args.elOffset.top + args.elHeight + args.distance;

                endTop = startTop;

                startTop += args.showDistance;

                if (args.centered) {
                    startLeft = args.elOffset.left + (args.elWidth - args.ttipParams.width) / 2;
                } else {
                    startLeft = args.elOffset.left;
                }

                endLeft = startLeft;

                arrowClass = '_top';

                break;
            case 'top':
            case 'default':
                startTop = args.elOffset.top - args.ttipParams.height - args.distance;

                endTop = startTop;

                startTop -= args.showDistance;

                if (args.centered) {
                    startLeft = args.elOffset.left + (args.elWidth - args.ttipParams.width) / 2;
                } else {
                    startLeft = args.elOffset.left;
                }

                endLeft = startLeft;

                arrowClass = '_bottom';

                break;
        }

        var scrollTop = $(window).scrollTop();

        return {
            left: startLeft,
            top: args.fixed ? startTop - scrollTop : startTop,
            endLeft: endLeft,
            endTop: args.fixed ? endTop - scrollTop : endTop,
            arrowClass: arrowClass
        }
    };

    /**
     * Контент для тултипа, кэшируем
     * @param args
     * @returns {*}
     */
    var getContent = function (args) {
        if (args.el.cacheContentTtip && !args.ignoreCache) {
            args.content = args.el.cacheContentTtip;
        } else {
            if (!args.content) {
                args.content = args.$el.data('title');
            }
        }

        args.el.cacheContentTtip = args.content;

        return args;
    };

    /**
     * рендер чвстей тултипа и добавление в ДОМ
     * @param args
     * @returns {{$ttip: (*|jQuery), $ttipArrow: (*|jQuery)}}
     */
    var render = function (args) {
        var $ttip = $('<div>', {
            'class': 'qroom-ttip_lib ' + (args.cssClass || '')
        }).css({
            width: args.width || 'auto'
        });

        $ttip.html(args.content);

        $ttipArrow = $('<div>', {
            'class': 'qroom-ttip_lib_pointer'
        }).appendTo($ttip);

        qroom.nodes.$nodeHeap.append($ttip);

        return {
            $ttip: $ttip,
            $ttipArrow: $ttipArrow
        }
    };

    /**
     * Определение положения тултипа
     * @param args
     * @returns {string}
     */
    var getSide = function (args) {
        if (args.side) return args.side;

        return 'top';
    };
};