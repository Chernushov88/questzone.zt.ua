var qroom = qroom || {};
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
var eventer = function (opts) {
	$.extend(this, {
		eventPrefix: '__em_'
	}, opts);
};
(function (proto) {
	proto.on = function (type, fn) {
		var self = this;
		$(this).on(self.eventPrefix + type, function (e, data) {
			fn.call(self, {
				type: e.type
			}, data);
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
qroom.eventGlob = new eventer();
var qopup = function () {};
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
		pop.emit('open', {
			context: _ex
		});
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
	pop.info = function (opts) {
		opts = opts || {};
		pop.open(opts.msg ? opts.msg : '', {
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
		context.$box.css({
			'margin-top': context.props.fixedTop ? 0 : (context.$wrapper.height() - context.$box.height()) / 2
		}).addClass('opened');
	};
	_proto.close = function () {
		var context = this;
		if (typeof context.props.shouldClose === "function") {
			if (context.props.shouldClose() === false) {
				return;
			}
		}
		context.$box.css({
			'marginTop': 0
		}).addClass('closed');
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
		context.$wrapper = $('<div>', {
			'id': 'qopup-wrap-' + context.index,
			'class': 'qopup-wrap ' + context.props.wr_class
		}).click(function () {
			qopup.close();
		});
		context.$box = $('<div>', {
			'class': 'qopup-box'
		}).appendTo(context.$wrapper).click(function (event) {
			event.stopPropagation();
		});
		context.$header = $('<div>', {
			'class': 'qopup-header'
		}).appendTo(context.$box);
		context.$closer = $('<div>', {
			'class': 'qopup-close material-icons'
		}).html('close').appendTo(context.$box).click(function () {
			qopup.close();
		});
		context.$content = $('<div>', {
			'class': 'qopup-content'
		}).appendTo(context.$box);
		context.$wrapper.css({
			'z-index': 1000 + context.index
		});
		$('#qroom-node_heap').append(context.$wrapper);
	};
}(qopup, qopup.prototype));
qroom.locks = {};
qroom.checkData = function (elem) {
	$(elem).removeClass('fail');
};
qroom.submitForm = function (elem, callbackSuccess, callbackError) {
	elem = $(elem);
	var _$parentForm = elem.closest('form');
	if (!_$parentForm.length) {
		alert('Произошла ошибка, вероятней всего кнопка не в форме.');
		return false;
	}
	var _actionUrl = _$parentForm[0].action;
	var _$inputs = $('input, textarea, select', _$parentForm);
	var _$errorPlaceholder = $('.form-field_errors', _$parentForm);
	var _errorMsg = '';
	var _errorArray = [];
	var noajax = _$parentForm.hasClass("noajax");
	_$inputs.focus(function () {
		$(this).removeClass('_fail').parent().find('.qroom-form_field_error').slideUp();
	});
	if (qroom.locks.hasOwnProperty(_actionUrl) && qroom.locks[_actionUrl]) return false;
	qroom.locks[_actionUrl] = true;
	_$inputs.each(function () {
		var _$input = $(this);
		var _value = _$input.val();
		var _title = _$input.data('title');
		if (!_title || (_title && !_title.length)) _title = _$input.attr('name');
		if (!_$input.hasClass('qroom-need_validate')) return;
		var validations = _$input.data('validations');
		if (validations) validations = validations.length ? validations.split(',') : [];
		for (var index in validations)
			if (qroom.validations.hasOwnProperty(validations[index])) {
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
		_errorMsg = 'Error: ' + _errorMsg;
		_$errorPlaceholder.html(_errorMsg);
		if (callbackError) callbackError(_errorArray);
		qroom.locks[_actionUrl] = false;
		return false;
	} else {
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
		qroom.ajax.post(_actionUrl, params, function (data) {
			elem.removeClass('_loading');
			if (!data.is_error) {
				if (callbackSuccess) callbackSuccess(data);
			} else {
				_errorMsg = data.errorMsg ? data.errorMsg : 'Error from server';
				_$errorPlaceholder.html(data.errorMsg);
				if (callbackError) callbackError(_errorArray);
			}
			qroom.locks[_actionUrl] = false;
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
	success: function (opts) {
		qopup.info({
			msg: opts.text || 'All correct',
			onClose: function () {}
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
					$fieldError.text(errorMsg ? errorMsg : errO[i].msg + ': ' + errO[i].validation.text).slideDown(100);
				}
			}
		}
	}
}
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
	qroom.values = {};
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
	$('.qroom-header_nav_item._js_show_quest').click(function (e) {
		if ($(this).hasClass('_active')) {
			e.preventDefault();
		}
	});
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
		qroom.eventGlob.emit('wheel', {
			direction: qroom.values.scrollTop > scrollPrev ? 2 : 1
		});
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
			complete: function (jqXHR) {},
			error: function (a, b, c) {},
			type: 'POST'
		});
	}
};
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
qroom.scrollToBooking = function () {
	var el = $('.qroom-booking');
	if (el.length) {
		qroom.analytics.track('quest', 'header_book_button', {
			label: 'scroll'
		});
		qroom.navScroll(el);
	} else {
		qroom.analytics.track('quest', 'header_book_button', {
			label: 'home_page'
		});
		window.location = "/#booking";
	}
};
qroom.disableScroll = function () {
	if (window.addEventListener) window.addEventListener('DOMMouseScroll', qroom.preventDefault, false);
	window.onwheel = qroom.preventDefault;
	window.onmousewheel = document.onmousewheel = qroom.preventDefault;
	window.ontouchmove = qroom.preventDefault;
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
	if (e.preventDefault) e.preventDefault();
	e.returnValue = false;
};
qroom.preventDefaultForScrollKeys = function (e) {
	var keys = {
		37: 1,
		38: 1,
		39: 1,
		40: 1
	};
	if (keys[e.keyCode]) {
		qroom.preventDefault(e);
		return false;
	}
};
qroom.ddn = new function () {
	var ddn = this;
	ddn.toggle = function (el) {
		var $el = $(el);
		$el.toggleClass('_hover');
	}
};
qroom.quests = new function () {
	var quests = this;
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
				if ($i.hasClass("_disabled")) $i.hide('fast');
				else
					$i.show('fast');
			});
		}
		if (params.withScroll) qroom.navScroll($('.qroom-quests_list'));
	};
	quests.showMore = function (params, el, buttn) {
		$(el).hide();
		$('.button-' + buttn).show();
		$('.qroom-booking_times_week-' + params).show();
		console.log('quest.showMore - ' + buttn);
	};
	quests.bookingPopup = function (params) {
		$('#qroom-node_heap').show();
		$('#qopup-wrap-form').show();
		var data_time = $(params).attr('data-time');
		var data_date = $(params).attr('data-date');
		var data_title = $(params).attr('data-title-h1');
		var data_price = $(params).attr('data-price');
		$('.qroom-form #time').attr('value', data_time);
		$('.qroom-form #date').attr('value', data_date);
		$('.qroom-form #title').attr('value', data_title);
		$('.data-time').text(data_time);
		$('.data-date').text(data_date);
		$('.qroom-booking_qopup_title').text(data_title);
		var room = $('.qroom-form #title').attr('value', data_title);
		$('#room').val(data_title);
		$('.qroom-booking_qopup_cost_holder').text(data_price);
		var home_room_title = $(params).parents('.qroom-booking_quest_title-content').find('.qroom-booking_quest_title').attr('data-title');
		$('.qroom-content-hom-page').parents('.customize-support').find('#room').val(home_room_title);
		$('.qroom-booking_qopup_title').text(home_room_title);
		var home_room_title2 = $(params).parents('.qroom-booking_quest_title-content').find('.qroom-booking_quest_title').attr('data-title');
		var room_title1 = 'Тайны да Винчи';
		var room_title2 = 'Пятый элемент';
		if ($(home_room_title2) == $(room_title1)) {
			console.log('55555555555');
		}
		if ($(home_room_title2) == $(room_title2)) {
			console.log('00000000000000');
		}
		var kvest_komnata_kontent = $('.kvest-komnata-kontent');
		$('.qroom-booking_qopup_desc p.insert').html(kvest_komnata_kontent);
		var params_attr = $(params).attr('data-id');
		if ($('#' + params_attr)) {
			$('.kvest-komnata-kontent').addClass('hide');
			$('#' + params_attr).removeClass('hide');
		};
		$('.qroom-booking_terms .qroom-checkbox').each(function () {
			var inputVal = $(this).find('input').val();
			console.log(inputVal);
			if (inputVal == 'on') {
				console.log(inputVal + ' = true');
			} else {
				console.log(inputVal + ' = false');
			}
		});
	};
	$('.qopup-close').on('click', function () {
		$('#qroom-node_heap').hide();
		$('#qroom-wrapper').removeClass('fixed');
	});
	quests.resizeTiles = function () {
		var $questsItems = $('.qroom-quests_item');
		var countQuests = $questsItems.length;
		var heightItem = 0;
		var headerHeight = !qroom.values.staticHeader ? qroom.nodes.$header.outerHeight() : 0;
		var $filter = $('.qroom-quests_filter_holder');
		var filterHeight = 0;
		if ($filter.length) filterHeight = $filter.outerHeight();
		if (countQuests == 1) {
			heightItem = qroom.values.windowHeight - headerHeight;
			$filter.hide();
		} else if (countQuests <= 3) {
			heightItem = qroom.values.windowHeight - headerHeight - filterHeight;
			// console.log(heightItem);
		} else {
			heightItem = (qroom.values.windowHeight - headerHeight - filterHeight) / 2 - 30;
			// console.log(heightItem);
		}
		var dataHeight = $(".qroom-quests_list").attr("data-height-item");
		if (dataHeight) heightItem = parseInt(dataHeight);
		console.log(heightItem);
		var delta = countQuests % 2;
		var percent = 100 / delta;
		for (var i = 0; i < delta; i++) {
			$($questsItems[countQuests - 1 - i]).css('width', percent + '%');
		}
		$questsItems.css({			
			'height': Math.floor(heightItem + 11)
		});
		if (countQuests) {
			$questsItems.each(function (index) {
				var $i = $(this);
				var $h = $i.find('.qroom-quests_item_hover_inner');
				$i.removeClass('_mini');
				if ($i.outerHeight() < $h.outerHeight()) $i.addClass('_mini');
			});
		}
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
		if (qroom.values.scrollTop + headerHeight >= listOffset.top && listHeight + listOffset.top >= qroom.values.scrollTop + qroom.values.windowHeight) {
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
				$input.parent().find('.qroom-form_field_error').text(errorMsg ? errorMsg : validation.text + ':' + errO[i]).slideDown(100);
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
		$.cookie("AutoCityId", cityId, {
			domain: domain,
			expires: 365
		});
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
		try {
			fbq('track', category + "_" + action);
		} catch (e) {}
	}
};
qroom.lang = new function () {
	var lang = this;
	lang.get = function (key) {
		return qroom.dictionary.hasOwnProperty(key) ? qroom.dictionary[key] : '';
	};
	lang.hideTtip = function () {
		$('.qroom-lang_choice').removeClass('_hover');
	};
	lang.change = function (lang) {
		console.log(lang);
		window.location = "/site/applylanguage/" + lang;
		lang.hideTtip();
	};
	lang.plural = function (c, form1, form2, form3, nullForm, printNumber) {
		printNumber = printNumber || true;
		if (!c && nullForm) {
			return nullForm;
		} else {
			return (printNumber ? c + ' ' : '') + (c % 10 == 1 && c % 100 != 11 ? form1 : (c % 10 >= 2 && c % 10 <= 4 && (c % 100 < 10 || c % 100 >= 20) ? form2 : form3))
		}
	};
	lang.gender = function (forms, gender) {
		forms = forms || ['', ''];
		if (forms.length < 2) return '';
		return gender == 'm' ? forms[0] : forms[1];
	};
};
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
qroom.checkbox = function (checkbox) {
	var $checkbox = $(checkbox);
	var $input = $checkbox.find('input');
	$checkbox.toggleClass('_checked');
	$input.attr('checked', $checkbox.hasClass('_checked'));
};
qroom.gallery = function () {};
(function (gallery, proto) {
	gallery.formats = {
		'img': ['jpg', 'jpeg', 'png'],
		'video': ['mpg', 'mpeg', 'avi', 'mp4', 'ogv', 'webm']
	};
	gallery.init = function (params) {
		var _ins = new gallery();
		_ins.init(params);
	};
	gallery.getTypeShow = function () {};
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
			var $changerItem = $('<div>', {
				'class': 'qroom-gallery_changer_item _item_' + index
			}).appendTo(ctx.$changer);
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

function sp(e) {
	e.stopPropagation ? e.stopPropagation() : e.cancelBubble = true;
}

function pd(e) {
	e.preventDefault ? e.preventDefault() : e.returnValue = false;
}

function cancelEvent(e) {
	e = e || window.event || {};
	e = e.originalEvent || e;
	sp(e);
	pd(e);
}
qroom.ttip = new function () {
	var ttip = this;
	var defaultDelayForClose = 300;
	ttip.collector = [];
	ttip.init = function () {
		$('.qroom-element_with_ttip').hover(function () {
			ttip.show({
				el: this
			})
		}, function () {
			ttip.show(this);
		});
	};
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
			return;
		}
		args.el.showTimeout = setTimeout(function () {
			open(args);
		}, 200);
	};
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
	ttip.anyHide = function () {
		for (var i in ttip.collector) {
			ttip.hide(ttip.collector[i]);
		}
	};
	var open = function (args) {
		var tooltip = render(args);
		var $ttip = tooltip.$ttip;
		var $ttipArrow = tooltip.$ttipArrow;
		args.ttipParams = {
			width: $ttip.outerWidth(),
			height: $ttip.outerHeight()
		};
		args.side = getSide(args);
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
	var getSide = function (args) {
		if (args.side) return args.side;
		return 'top';
	};
};