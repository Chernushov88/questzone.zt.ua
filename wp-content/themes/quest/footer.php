<?php
/**
 * The template for displaying the footer
 */
?>
<?php
$thumb_id = get_post_thumbnail_id();
$thumb_url = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);
?>
<!-- HotLog -->
<span id="hotlog_counter" style="opacity: 0;position: absolute;z-index: 9;"></span>
<span id="hotlog_dyn"></span>
<script type="text/javascript"> var hot_s = document.createElement('script');
    hot_s.type = 'text/javascript';
    hot_s.async = true;
    hot_s.src = 'http://js.hotlog.ru/dcounter/2569627.js';
    hot_d = document.getElementById('hotlog_dyn');
    hot_d.appendChild(hot_s);
</script>
<noscript>
  <a href="http://click.hotlog.ru/?2569627" target="_blank">
    <img src="http://hit20.hotlog.ru/cgi-bin/hotlog/count?s=2569627&im=43" border="0"
         title="HotLog" alt="HotLog"></a>
</noscript>
<!-- /HotLog -->
<div class="qroom-footer">
  <div class="qroom-footer_middle">
    <div class="qroom-content_inner _nclear">
      <div class="qroom-footer_list footer_list-logo">

        <a href="/">
          <!-- <img src="/wp-content/themes/quest/images/logo-icon.png" class="logo-icon">
          <img src="/wp-content/themes/quest/images/logo.png"> -->
          <img src="/wp-content/themes/quest/images/new-logo.jpg" style="width: 150px;" alt='Логотип'/>
        </a>
        <div class="_ta-c">
          <div class="qroom-btn _big qr-booking-site" onclick="qroom.scrollToBooking();">Забронировать</div>
        </div>

      </div>
      <div class="qroom-footer_list _contacts">
        <div class="qroom-footer_list_title">
          Контакты
        </div>
        <div class="qroom-footer_list_item">
          Житомир
          <div class="material-icons">place</div>
          ул. Победы 3
        </div>
        <div class="qroom-footer_list_item">
          <div class="material-icons">phone</div>
          Тел.: <span>
    <a style="font-size: 22px; font-family: Roboto, sans-serif; color: #BDDF01;"
       href="tel:+380971514542">097-15-14-542</a>
        </span>
        </div>
        <span>Мы в соцсетях<span>
      </div>

      <div class="qroom-footer_list _contacts">

        <div class="qroom-footer_list_item" style="line-height: 1.25;margin-bottom: 0; float:left; ">

          <a href="https://www.facebook.com/QuestZoneZt/" target="_blank"><span><div class="material-icons"
                                                                                     style="color: #aaabb5;"><i
                    class="fa fa-facebook fa-3x" aria-hidden="true"></i></div></span></a>
        </div>
        <div class="qroom-footer_list_item" style="float:left;margin-left:10px;">

          <a href="https://www.instagram.com/quest_zone_zhytomyr/" target="_blank"><span><div class="material-icons"
                                                                                              style="color: #aaabb5;"><i
                    class="fa fa-instagram fa-3x" aria-hidden="true"></i></div></span></a>
        </div>
      </div>

    </div>
    <!-- <div class="_ta-c">
      <div class="qroom-btn _big qr-booking-site" onclick="qroom.scrollToBooking();">Забронировать</div>
    </div> -->
  </div>
  <!-- <div class="qroom-footer_bottom">
    <div class="qroom-content_inner">
        <div class="qroom-copyright">
            &copy; &mdash; 2017 <a href="/">http://quest-game.com</a>. Разработка от <a href="http://korshuqb.beget.tech/">Sergey</a>
        </div>
    </div>
    </div> -->
</div>
</div>
</div>

<div type="button" class="callback-bt">
  <a href="tel:+380971514542" class="text-call">
    <i class="fa fa-phone"></i>
    <span>Звонок</span>
  </a>
</div>
<div class="qopup-content qopup-content-payment">
  <div class="qopup-close material-icons" onclick="pricesTypesPopupHide();">close</div>
  <div class="qroom-location_popup_title">
    Способы оплаты
  </div>
  <div class="qroom-popup_text">
    <p>Вы можете оплатить наши услуги следующими способами:</p>
    <ul>
      <li>Наличными перед началом квеста;</li>
      <li>Банковской картой перед началом квеста;<br><img src="/wp-content/themes/quest/images/cards_accepted.jpg"
                                                          style="padding-top:3px;" alt="Карты для оплаты"></li>
      <li>Корпоративным клиентам мы готовы выставить счет для безналичной оплаты. Для получения счета свяжитесь,
        пожалуйста, с нашим менеджером по работе с корпоративными клиентами по телефону 8 (918) 758-62-58 или по почте
        <a class="qroom-dark-link" href="mailto:questzt@i.ua">questzt@i.ua</a></li>
    </ul>
  </div>
</div>


<div id="qroom-node_heap">

  <!-- <div id="qopup-wrap-form" class="qopup-wrap qroom-booking_popup" style="z-index: 1000; background-image: url(<?php echo $thumb_url[0]; ?>);"> -->
  <div id="qopup-wrap-form" class="qopup-wrap qroom-booking_popup" style="z-index: 1000;">
    <div class="qopup-box opened" style="max-width: 100%; margin-top: 125px;">
      <div class="qopup-header"></div>
      <div class="qopup-close material-icons">close</div>
      <div class="qopup-content">
        <div class="qroom-booking_qopup">
          <div class="-qroom-booking_qopup_title qroom-booking_qopup_title-home">Название комнаты</div>
          <div class="qroom-booking_qopup_desc">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
              <?php the_content() ?>
            <?php endwhile; ?>
              <!-- post navigation -->
            <?php else: ?>
              <!-- no posts found -->
            <?php endif; ?>
            <p class="insert"></p>
          </div>
          <div class="qroom-row">
          </div>
          <script></script>
          <form id="myform" action="" class="qroom-form qroom-booking_form" method="post">
            <input type="hidden" name="room" value="" id="room">
            <input type="hidden" name="time" value="" id="time">
            <input type="hidden" name="date" value="" id="date">
            <input type="hidden" name="Name" value="" id="Name">
            <input type="hidden" name="Phone" value="" id="Phone">
            <input type="hidden" name="Email" value="" id="Email">
            <input type="hidden" name="Comment" value="" id="Comment">
            <input type="hidden" name="action" value="action_send_form">
            <div class="qroom-row qroom-row-input">
              <div class="qroom-col-6">
                <div class="qroom-row">
                  <div class="qroom-col-6">
                    <div class="qroom-form_field">
                      <input type="text" class="qroom-input qroom-need_validate" placeholder="Имя *"
                             data-validations="empty,not_null" data-error="Введите ваше имя" name="Name" maxlength="100"
                             minlength="3" required>
                      <div class="qroom-form_field_error"></div>
                    </div>
                  </div>
                  <div class="qroom-col-6">
                    <div class="qroom-form_field">
                      <input type="text" class="qroom-input qroom-need_validate phone" placeholder="Ваш телефон *"
                             data-validations="empty,phone" data-error="Введите ваш телефон" name="Phone" required>
                      <div class="qroom-form_field_error"></div>
                    </div>
                  </div>
                </div>
                <div class="qroom-form_field">
                  <input type="email" class="qroom-input qroom-need_validate" placeholder="Email" data-validations=""
                         data-error="E-mail*" name="Email">
                  <div class="qroom-form_field_error"></div>
                </div>
              </div>
              <div class="qroom-col-6">
                <div class="qroom-form_field">
                  <textarea class="qroom-textarea" data-title="Комментарий" placeholder="Комментарий"
                            name="Comment"></textarea>
                  <div class="qroom-form_field_error"></div>
                </div>
              </div>
            </div>
            <div class="qroom-promo_error_info _ta-c"></div>
            <div class="qroom-booking_qopup_infos">
              <table>
                <tbody>
                <tr>
                  <td>
                    <i class="material-icons">event</i><span class="data-date">01 августа, Пт</span>
                  </td>
                  <td>
                    <i class="material-icons">access_time</i><span class="data-time">23:00</span>
                  </td>
                  <td>
                    <i class="material-icons">place</i> ул. Победы 3
                  </td>
                  <td class="qroom-form_price">
                    <div class="qroom-form_old_price">
                      Старая цена <span class="currency rub"></span>
                    </div>
                    <div class="qroom-form_price_now">
                      <i class="material-icons">account_balance_wallet</i>Цена: <span
                          class="qroom-booking_qopup_cost_holder currency rub">2&nbsp;000</span>
                    </div>
                  </td>
                </tr>
                </tbody>
              </table>
            </div>
            <div class="_ta-c">
              <div class="qroom-form_btns">
                <button class="qroom-btn _big qr-booking-finish">
                  Забронировать игру
                </button>
              </div>
              <!-- <div class="relative">
                <div class="" onclick="applyNow()">
                    <input type="submit" value="Оставить заявку">
                </div>
                <div id="result"></div>
                </div> -->
            </div>
            <div class="qroom-form_additional">
              * Обязательные пункты для заполнения
            </div>
            <div class="qroom-booking_terms">
              <div class="qroom-checkbox _checked" onclick="qroom.checkbox(this);">
                <input type="checkbox" checked="" name="Agree">
                <i class="material-icons qroom-checkbox_icn _outline">check_box_outline_blank</i>
                <i class="material-icons qroom-checkbox_icn _check_icn">check_box</i>
                Я согласен получать рассылку о новых квестах и акциях не чаще одного раза в две недели
              </div>
              <div class="qroom-checkbox _checked" onclick="qroom.checkbox(this);">
                <input type="checkbox" class="qroom-need_validate" data-validations="checked" data-error="Подтвердите"
                       name="Privacy">
                <i class="material-icons qroom-checkbox_icn _outline">check_box_outline_blank</i>
                <i class="material-icons qroom-checkbox_icn _check_icn">check_box</i>
                Я ознакомлен с<a href="/files/politika_konfidentsialnosti.pdf" target="_blank"> политикой
                  конфиденциальности</a>
                <div class="qroom-form_field_error"></div>
              </div>
            </div>
          </form>
        </div>
        <script type="text/javascript">
            // if ($("#qroomPromoCode").val()) {
            //     qroom.quests.checkPromo();
            // }
        </script>
      </div>
    </div>
    <div class="qroom-popup_linear_mask"></div>
    <div class="qroom-booking_popup_bg"></div>
  </div>
</div>
<div class="loading-block"></div>
<style>
    .country-selector.weglot-default {
        opacity: 0;
    }
</style>
<script src="/wp-content/themes/quest/js/jquery.min.js"></script> <!-- version 1.12 -->
<script src="/wp-content/themes/quest/js/bootstrap/bootstrap.min.js"></script>
<script src="/wp-content/themes/quest/js/underscore.min.js"></script>
<script src="/wp-content/themes/quest/js/questroom.min.js"></script>
<script>
    qroom.init();
</script>
<script src="/wp-content/themes/quest/js/mainpage.js"></script>
<script type="text/javascript">
    qroom.mainpage.init();

</script>
<script src="/wp-content/themes/quest/js/jquery.fancybox/jquery.fancybox.js"></script>
<script src="/wp-content/themes/quest/js/my_script.js"></script>
<!-- maska -->
<script>
    $.browser = {};
    (function () {
        $.browser.msie = false;
        $.browser.version = 0;
        if (navigator.userAgent.match(/MSIE ([0-9]+)\./)) {
            $.browser.msie = true;
            $.browser.version = RegExp.$1;
        }
    })();
</script>
<script src="/wp-content/themes/quest/js/maska/jquery.maskedinput-1.2.2.js"></script>
<script>
    $(function ($) {
        $.mask.definitions['~'] = '[+-]';
        $('.phone').mask('+38-(999) 999-99-99');
    });
</script>
<script src="/wp-content/themes/quest/js/forma.js"></script>


<?php wp_footer(); ?>
</body>
<div class="darken" onclick="pricesTypesPopupHide();"></div>
</html>


 