<?php
/**
 * The main template file
 */

get_header(); ?>

<div class="qroom-content _hidden">
    <div class="qroom-default_content_header _black">
        <div class="qroom-quests_list">
            <div class="qroom-quests_item" id="qroom-quests-list-item-1032" data-filter="">
                <div class="qroom-quests_item_img_cover">
                    <div class="qroom-quests_item_img" style="background-image: url(/wp-content/themes/quest/images/0.jpg);"></div>
                </div>
                <div class="qroom-quests_item_stars _gold">
                    <i class="material-icons">star</i>
                    <i class="material-icons">star</i>
                    <i class="material-icons">star</i>
                    <i class="material-icons">star</i>
                    <i class="material-icons">star</i>
                </div>
                <div class="qroom-quests_item_title">
                    <span>
                    <a onclick="qroom.analytics.track('quest', 'game_click', { label: 'from_gamelist_item_title' });" href="/pobeg-iz-turmi.php">Приключенческий квест &#171;Побег из Тюрьмы&#187;</a>
                    </span>
                </div>
                <div class="qroom-quests_item_hover">
                    <a onclick="qroom.analytics.track('quest', 'game_click', { label: 'from_gamelist_hover_panel' });" href="/pobeg-iz-turmi.php" class="qroom-quests_item_hover_link"></a>
                    <div class="qroom-quests_item_hover_inner">
                        <div class="qroom-quests_item_level">
                            <i class="material-icons _lock _active">lock_outline</i>
                            <i class="material-icons _lock _active">lock_outline</i>
                            <i class="material-icons _lock _active">lock_outline</i>
                            <i class="material-icons _lock _active">lock_outline</i>
                            <i class="material-icons _lock">lock_outline</i>
                        </div>
                        <div class="qroom-quests_item_infos">
                            <div class="qroom-quests_item_info">
                                <i class="material-icons">person_outline</i> 2-6 игроков
                            </div>
                            <div class="qroom-quests_item_info">
                                <i class="material-icons">place</i> Пирогова 24
                            </div>
                        </div>
                        <div class="qroom-quests_item_btns">
                            <div>
                                <a onclick="qroom.analytics.track('quest', 'game_click', { label: 'from_gamelist_hover_button_big' });" class="qroom-btn _big qr-booking-button" href="/pobeg-iz-turmi.php#booking">Забронировать</a>
                            </div>
                            <a onclick="qroom.analytics.track('quest', 'game_click', { label: 'from_gamelist_hover_about' });" href="/pobeg-iz-turmi.php">Подробнее о квесте</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="qroom-quests_item" id="qroom-quests-list-item-1062" data-filter="">
                <div class="qroom-quests_item_img_cover">
                    <div class="qroom-quests_item_img" style="background-image: url(/wp-content/themes/quest/images/fotolaba0.jpg);"></div>
                </div>
                <div class="qroom-quests_item_stars _gold">
                    <i class="material-icons">star</i>
                    <i class="material-icons">star</i>
                    <i class="material-icons">star</i>
                    <i class="material-icons">star</i>
                    <i class="material-icons">star</i>
                </div>
                <div class="qroom-quests_item_title">
                    <span>
                    <a onclick="qroom.analytics.track('quest', 'game_click', { label: 'from_gamelist_item_title' });" href="/fotolaboratoriya-prizraka.php">Мистический квест &#171;Фотолаборатория Призрака&#187;</a>
                    </span>
                </div>
                <div class="qroom-quests_item_hover">
                    <a onclick="qroom.analytics.track('quest', 'game_click', { label: 'from_gamelist_hover_panel' });" href="/fotolaboratoriya-prizraka.php" class="qroom-quests_item_hover_link"></a>
                    <div class="qroom-quests_item_hover_inner">
                        <div class="qroom-quests_item_level">
                            <i class="material-icons _lock _active">lock_outline</i>
                            <i class="material-icons _lock _active">lock_outline</i>
                            <i class="material-icons _lock _active">lock_outline</i>
                            <i class="material-icons _lock _active">lock_outline</i>
                            <i class="material-icons _lock">lock_outline</i>
                        </div>
                        <div class="qroom-quests_item_infos">
                            <div class="qroom-quests_item_info">
                                <i class="material-icons">person_outline</i> 2-6 игроков
                            </div>
                            <div class="qroom-quests_item_info">
                                <i class="material-icons">place</i> Пирогова 24
                            </div>
                        </div>
                        <div class="qroom-quests_item_btns">
                            <div>
                                <a onclick="qroom.analytics.track('quest', 'game_click', { label: 'from_gamelist_hover_button_big' });" class="qroom-btn _big qr-booking-button" href="/fotolaboratoriya-prizraka.php#booking">Забронировать</a>
                            </div>
                            <a onclick="qroom.analytics.track('quest', 'game_click', { label: 'from_gamelist_hover_about' });" href="/fotolaboratoriya-prizraka.php">Подробнее о квесте</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="qroom-quests_filter_holder">
                <div class="qroom-quests_filter">
                </div>
            </div>
        </div>
    </div>
    <div class="qroom-booking" id="booking">
        <div class="qroom-booking_header">
            <div class="qroom-content_inner">
                <div class="qroom-booking_title">
                    Календарь бронирования
                </div>
                <div class="qroom-booking_desc">
                    Чтобы записаться на игру -  выберите любое доступное время в одном из квестов. После нажатия на плитку со временем Вы попадете на страницу бронирования.
                </div>
                <div class="qroom-booking_dates">
                    02 августа &mdash; 22 августа
                </div>
            </div>
        </div>
        <div class="qroom-booking_body">
            <div class="qroom-content_inner">
                <div class="qroom-booking_dates_pick"  data-title="Нажмите на удобную Вам дату, чтобы посмотреть расписание на этот день!" onmouseover="qroom.ttip.show({ el: this })" onmouseout="qroom.ttip.hide(this);">
                    <div class="qroom-booking_date_pick _active _unselectable">
                        <div class="qroom-booking_date_pick_desc">Ср</div>
                        02
                    </div>
                    <div class="qroom-booking_date_pick _unselectable" >
                        <div class="qroom-booking_date_pick_desc">Чт</div>
                        03
                    </div>
                    <div class="qroom-booking_date_pick _unselectable">
                        <div class="qroom-booking_date_pick_desc">Пт</div>
                        04
                    </div>
                    <div class="qroom-booking_date_pick _weekend _unselectable">
                        <div class="qroom-booking_date_pick_desc">Сб</div>
                        05
                    </div>
                    <div class="qroom-booking_date_pick _weekend _unselectable">
                        <div class="qroom-booking_date_pick_desc">Вс</div>
                        06
                    </div>
                    <div class="qroom-booking_date_pick _unselectable">
                        <div class="qroom-booking_date_pick_desc">Пн</div>
                        07
                    </div>
                    <div class="qroom-booking_date_pick _unselectable">
                        <div class="qroom-booking_date_pick_desc">Вт</div>
                        08
                    </div>
                    <div class="qroom-booking_date_pick _unselectable">
                        <div class="qroom-booking_date_pick_desc">Ср</div>
                        09
                    </div>
                    <div class="qroom-booking_date_pick _unselectable">
                        <div class="qroom-booking_date_pick_desc">Чт</div>
                        10
                    </div>
                    <div class="qroom-booking_date_pick _unselectable">
                        <div class="qroom-booking_date_pick_desc">Пт</div>
                        11
                    </div>
                    <div class="qroom-booking_date_pick _weekend _unselectable">
                        <div class="qroom-booking_date_pick_desc">Сб</div>
                        12
                    </div>
                    <div class="qroom-booking_date_pick _weekend _unselectable">
                        <div class="qroom-booking_date_pick_desc">Вс</div>
                        13
                    </div>
                    <div class="qroom-booking_date_pick _unselectable">
                        <div class="qroom-booking_date_pick_desc">Пн</div>
                        14
                    </div>
                    <div class="qroom-booking_date_pick _unselectable">
                        <div class="qroom-booking_date_pick_desc">Вт</div>
                        15
                    </div>
                    <div class="qroom-booking_date_pick _unselectable">
                        <div class="qroom-booking_date_pick_desc">Ср</div>
                        16
                    </div>
                    <div class="qroom-booking_date_pick _unselectable">
                        <div class="qroom-booking_date_pick_desc">Чт</div>
                        17
                    </div>
                    <div class="qroom-booking_date_pick _unselectable">
                        <div class="qroom-booking_date_pick_desc">Пт</div>
                        18
                    </div>
                    <div class="qroom-booking_date_pick _weekend _unselectable">
                        <div class="qroom-booking_date_pick_desc">Сб</div>
                        19
                    </div>
                    <div class="qroom-booking_date_pick _weekend _unselectable">
                        <div class="qroom-booking_date_pick_desc">Вс</div>
                        20
                    </div>
                    <div class="qroom-booking_date_pick _unselectable">
                        <div class="qroom-booking_date_pick_desc">Пн</div>
                        21
                    </div>
                    <div class="qroom-booking_date_pick _unselectable">
                        <div class="qroom-booking_date_pick_desc">Вт</div>
                        22
                    </div>
                </div>
                <div class="qroom-booking_holder" data-title="Нажмите на плитку с удобным временем, чтобы забронировать игру!" onmouseover="qroom.ttip.show({ el: this })" onmouseout="qroom.ttip.hide(this);">
                </div>
                <div class="qroom-booking_holder" data-title="Нажмите на плитку с удобным временем, чтобы забронировать игру!" onmouseover="qroom.ttip.show({ el: this })" onmouseout="qroom.ttip.hide(this);">
                    <div class="hidden booking-template">
                        <div class="qroom-booking_time _booked">Занято</div>
                    </div>
                    <div class="qroom-booking_quest_title">
                        <span>Побег из Тюрьмы</span>
                    </div>
                    <table class="qroom-booking_times">
                        <tbody>
                            <tr>
                                <td>
                                    <div class="qroom-booking_time _booked">Занято</div>
                                </td>
                                <td>
                                    <div class="qroom-booking_time _booked">Занято</div>
                                </td>
                                <td>
                                    <div class="qroom-booking_time _booked">Занято</div>
                                </td>
                                <td>
                                    <div class="qroom-booking_time _booked">Занято</div>
                                </td>
                                <td>
                                    <div class="qroom-booking_time _booked">Занято</div>
                                </td>
                                <td>
                                    <div class="qroom-booking_time _booked">Занято</div>
                                </td>
                                <td>
                                    <div id="qroom-booking_id-638740" class="qroom-booking_time _blue" onclick="qroom.quests.bookingPopup({ qid: 638740, gid: 100 })">19:00</div>
                                </td>
                                <td>
                                    <div id="qroom-booking_id-638741" class="qroom-booking_time _blue" onclick="qroom.quests.bookingPopup({ qid: 638741, gid: 1032 })">20:15</div>
                                </td>
                                <td>
                                    <div id="qroom-booking_id-638742" class="qroom-booking_time _blue" onclick="qroom.quests.bookingPopup({ qid: 638742, gid: 1032 })">21:30</div>
                                </td>
                                <td>
                                    <div id="qroom-booking_id-638743" class="qroom-booking_time _blue" onclick="qroom.quests.bookingPopup({ qid: 638743, gid: 1032 })">22:45</div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="qroom-booking_quest_title">
                        <span>Фотолаборатория Призрака</span>
                    </div>
                    <table class="qroom-booking_times">
                        <tbody>
                            <tr>
                                <td>
                                    <div class="qroom-booking_time _booked">Занято</div>
                                </td>
                                <td>
                                    <div class="qroom-booking_time _booked">Занято</div>
                                </td>
                                <td>
                                    <div class="qroom-booking_time _booked">Занято</div>
                                </td>
                                <td>
                                    <div class="qroom-booking_time _booked">Занято</div>
                                </td>
                                <td>
                                    <div class="qroom-booking_time _booked">Занято</div>
                                </td>
                                <td>
                                    <div id="qroom-booking_id-638749" class="qroom-booking_time _turquoise" onclick="qroom.quests.bookingPopup({ qid: 638749, gid: 1062 })">18:00</div>
                                </td>
                                <td>
                                    <div id="qroom-booking_id-638750" class="qroom-booking_time _blue" onclick="qroom.quests.bookingPopup({ qid: 638750, gid: 1062 })">19:15</div>
                                </td>
                                <td>
                                    <div id="qroom-booking_id-638751" class="qroom-booking_time _blue" onclick="qroom.quests.bookingPopup({ qid: 638751, gid: 1062 })">20:30</div>
                                </td>
                                <td>
                                    <div id="qroom-booking_id-638752" class="qroom-booking_time _blue" onclick="qroom.quests.bookingPopup({ qid: 638752, gid: 1062 })">21:45</div>
                                </td>
                                <td>
                                    <div id="qroom-booking_id-638753" class="qroom-booking_time _blue" onclick="qroom.quests.bookingPopup({ qid: 638753, gid: 1062 })">23:00</div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="qroom-booking_prices">
                    <div class="qroom-booking_prices_title">
                        <span>Цена за команду</span>
                    </div>
                    <div class="qroom-booking_prices_desc">
                        Стоимость игры любой категории не зависит от количества человек в команде. Число игроков может варьироваться от 2 до 6.
                    </div>
                    <div class="_nclear">
                        <table class="qroom-booking_prices_info _count-3 _price-type-1 _turquoise" data-title="" onmouseover="qroom.ttip.show({ el: this, side: 'top', hoverable: true, width: 350 })" onmouseout="qroom.ttip.hide(this);">
                            <tr>
                                <td>
                                    <b>1&#160;500</b>
                                </td>
                            </tr>
                        </table>
                        <table class="qroom-booking_prices_info _count-3 _price-type-1 _blue" data-title="" onmouseover="qroom.ttip.show({ el: this, side: 'top', hoverable: true, width: 350 })" onmouseout="qroom.ttip.hide(this);">
                            <tr>
                                <td>
                                    <b>2&#160;000</b>
                                </td>
                            </tr>
                        </table>
                        <table class="qroom-booking_prices_info _count-3 _price-type-1 _pink" data-title="" onmouseover="qroom.ttip.show({ el: this, side: 'top', hoverable: true, width: 350 })" onmouseout="qroom.ttip.hide(this);">
                            <tr>
                                <td>
                                    <b>2&#160;500</b>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="qroom-booking_prices_variants" onclick="qroom.quests.pricesTypesPopup();">
                    <span class="qroom-js_link">Способы оплаты</span>
                </div>
                <div class="_ta-c">
                    Бронирование открыто на 21 день вперед. Если Вас интересует более поздняя дата, то позвоните нам, мы внесем вас в предварительное бронирование. Телефон <span class="ya-phone"> 8-918-758-6258 </span>.
                </div>
                <div class="hidden" id="qroom-prices_popup">
                    <div class="qroom-location_popup_title">
                        Способы оплаты
                    </div>
                    <div class="qroom-popup_text">
                        <p>Вы можете оплатить наши услуги следующими способами:</p>
                        <ul>
                            <li>Наличными перед началом квеста;</li>
                            <li>Банковской картой перед началом квеста;<br/><img src="/wp-content/themes/quest/images/cards_accepted.jpg" style="padding-top:3px;"/></li>
                            <li>Корпоративным клиентам мы готовы выставить счет для безналичной оплаты. Для получения счета свяжитесь, пожалуйста, с нашим менеджером по работе с корпоративными клиентами по телефону 8 (918) 758-62-58 или по почте <a class="qroom-dark-link" href="mailto:stavropol@questrooms.com">stavropol@questrooms.com</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>



<?php get_footer(); ?>
