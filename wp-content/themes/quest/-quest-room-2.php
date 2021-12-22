<?php
/*
Template Name: КВЕСТ КОМНАТА 2
*/ 

get_header(); ?>

<script>
    var ajaxurl = '<?php echo site_url() ?>/wp-admin/admin-ajax.php';
    var true_posts = '<?php echo serialize($wp_query->query_vars); ?>';
    var current_page = <?php echo (get_query_var('paged')) ? get_query_var('paged') : 1; ?>;
    var max_pages = '<?php echo $wp_query->max_num_pages; ?>';
</script>
<?php 
function time_add_min( & $time, $min)
    {
        list($h, $m) = explode(':', $time);
        $h = ($h + floor(($m + $min) / 60)) % 24;
        $m = ($m + $min) % 60;
        $time = $h . ':' . $m;
        return str_pad($h, 2, '0', STR_PAD_LEFT).':'.str_pad($m, 2, '0', STR_PAD_LEFT);
    }
 ?>
<div class="qroom-content ">
    <div class="qroom-page_top_box qroom-quest_top qroom-box_page" style="background-image: url(/wp-content/themes/quest/images/0.jpg)">
        <div class="qroom-box_linear_mask"></div>
        <div class="qroom-box_pattern_mask"></div>
        <div class="qroom-quest_top_selector">
            <div class="qroom-quest_top_selector_inner">
                <h1 class="data-title"><?php echo get_the_title(); ?></h1>
                <i class="material-icons">arrow_drop_down</i>
                <div class="qroom-quest_choice_ttip qroom-ttip">
                    <div class="qroom-ttip_inner">
                        <a onclick="qroom.analytics.track('quest','game_click',{label:'from_game_header'}); " href="/kvest-komnata-1/" class="qroom-quest_choice_item">Квест комната 1</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="qroom-quest_options">
            <div class="qroom-quest_option">
                <div class="qroom-icn_quest qroom-icn_quest _handcuffs"></div>
                Все игроки окажутся в настоящих полицейских наручниках
            </div>
            <div class="qroom-quest_option">
                <div class="qroom-icn_quest qroom-icn_quest _event_seat"></div>
                Обстановка максимально приближена к реальной
            </div>
            <div class="qroom-quest_option">
                <div class="qroom-icn_quest qroom-icn_quest _world"></div>
                Самый популярный сюжет в мире
            </div>
            <div class="qroom-quest_option">
                <div class="qroom-icn_quest qroom-icn_quest _face"></div>
                Отличный выбор для новичков
            </div>
        </div>
        <i class="material-icons qroom-about_arrow_bottom">arrow_downward</i>
        <div class="qroom-content_inner">
            <div class="qroom-quest_top_desc">
                Вы заключенный, томящийся в темной тесной камере. Неожиданно охранник падает без сознания - ваша сообщница все подготовила, это отличный шанс на побег! Нужно успеть выбраться из заточения, пока не подоспело подкрепление!
            </div>
            <div class="qroom-quest_top_infos">
                <div class="qroom-quest_top_info">
                    <div class="qroom-quests_item_level">
                        <i class="material-icons _lock _active">lock_outline</i>
                        <i class="material-icons _lock _active">lock_outline</i>
                        <i class="material-icons _lock _active">lock_outline</i>
                        <i class="material-icons _lock _active">lock_outline</i>
                        <i class="material-icons _lock">lock_outline</i>
                    </div>
                </div>
                <div class="qroom-quest_top_info">
                    <i class="material-icons">person_outline</i>2-6 игроков
                </div>
                <div class="qroom-quest_top_info">
                    <i class="material-icons">timer</i>60 минут
                </div>
                <div class="qroom-quest_top_info">
                    <i class="material-icons">place</i>Пирогова 24
                </div>
            </div>
            <div class="_ta-c">
                <span class="qroom-btn _big qr-booking-button" onclick="qroom.navScroll($('.qroom-booking'));">
                Забронировать
                </span>
            </div>
        </div>
    </div>
    <div class="qroom-quest_photos">
        <a rel="group" class="qroom-quest_photo" style="background-image: url(/wp-content/themes/quest/images/prison/0.jpg)" href="/wp-content/themes/quest/images/prison/0.jpg">
            <div class="material-icons">add</div>
        </a>
        <a rel="group" class="qroom-quest_photo" style="background-image: url(/wp-content/themes/quest/images/prison/1-s.jpg)" href="/wp-content/themes/quest/images/prison/1.jpg">
            <div class="material-icons">add</div>
        </a>
        <a rel="group" class="qroom-quest_photo" style="background-image: url(/wp-content/themes/quest/images/prison/2-s.jpg)" href="/wp-content/themes/quest/images/prison/2.jpg">
            <div class="material-icons">add</div>
        </a>
        <a rel="group" class="qroom-quest_photo" style="background-image: url(/wp-content/themes/quest/images/prison/3-s.jpg)" href="/wp-content/themes/quest/images/prison/3.jpg">
            <div class="material-icons">add</div>
        </a>
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
                <div class="qroom-booking_phone">
                    Или запишитесь по телефону
                    <b class="ya-phone">8-918-758-6258</b>
                </div>
                <div class="qroom-booking_selector_quest qroom-font_rbc _weight_bold _font_size_36">
                    <div class="qroom-booking_selector_quest_inner">
                        <?php echo get_the_title(); ?><i class="material-icons">arrow_drop_down</i>
                        <div class="qroom-quest_choice_ttip qroom-ttip">
                            <div class="qroom-ttip_inner">
                                <a onclick="qroom.analytics.track('quest', 'game_click', { label: 'from_game_timetable' });" href="/kvest-komnata-1/#booking" class="qroom-quest_choice_item">Квест комната 1</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="qroom-booking_body _on_quest_page">
      <div class="qroom-content_inner" data-title="Нажмите на плитку с удобным временем, чтобы забронировать игру!">
        <?php 
          $date = new DateTime(date('d.m.Y')); 

        for ($a=0; $a < 7 ; $a++) {
          $start = '6:30';
          $days_M = array(1=>'января',2=>'февраля',3=>'марта',4=>'апрля', 5 =>'мая',6=>'июня',7=>'июля',8=>'августа',9=> 'сентября',10=> 'октября',11=> 'ноября',12=>'декабря');
          $days_w = array('Вс.', 'Пн.', 'Вт.', 'Ср.', 'Чт.', 'Пт.', 'Сб.');   
                
          $data_date = $date->format('d.m.Y');                    
          ?>
          <div class="qroom-booking_times_week-1">
            <div class="qroom-booking_quest_title">
             <span> <?php echo '<strong>'.( $days_w[($date->format('w'))] .'</strong>'.$data_date ); ?></span>
            </div>
            <table class="qroom-booking_times">
              <?php echo do_shortcode('[jt-calendar-level-3 room=" Пятый элемент" date="'.$data_date.'"]') ; ?>
            </table>
          </div> 
          <?php
            $date->modify('+ 1 day');
            if ( in_array('Сб.',$days_w ) ) {
              }
          }             
        ?>        
        <div class="qroom-booking_link_more button-1" onclick="qroom.quests.showMore(2,this,2);">
          Показать еще
        </div>


        <?php        
        for ($a=0; $a < 7 ; $a++) {
          $start = '6:30';
          $days_M = array(1=>'января',2=>'февраля',3=>'марта',4=>'апрля', 5 =>'мая',6=>'июня',7=>'июля',8=>'августа',9=> 'сентября',10=> 'октября',11=> 'ноября',12=>'декабря');
          $days_w = array('Вс.', 'Пн.', 'Вт.', 'Ср.', 'Чт.', 'Пт.', 'Сб.');                
          $data_date = $date->format('d.m.Y');    
          ?>
          <div class="qroom-booking_times_week-2" style="display:none;">
            <div class="qroom-booking_quest_title">
              <span> <?php echo '<strong>'.( $days_w[($date->format('w'))] .'</strong>'.$data_date ); ?></span>
            </div>
            <table class="qroom-booking_times">
              <?php echo do_shortcode('[jt-calendar-level-3 room=" Пятый элемент" date="'.$data_date.'"]') ; ?>
            </table>
          </div>        
          <?php
            $date->modify('+ 1 day'); 
            if ( in_array('Сб.',$days_w ) ) {
              }
          }             
        ?>
        <div class="qroom-booking_link_more button-2" onclick="qroom.quests.showMore(3,this,3);" style="display:none;">
          Показать еще
        </div>


        <?php        
        for ($a=0; $a < 7 ; $a++) {
          $start = '6:30';
          $days_M = array(1=>'января',2=>'февраля',3=>'марта',4=>'апрля', 5 =>'мая',6=>'июня',7=>'июля',8=>'августа',9=> 'сентября',10=> 'октября',11=> 'ноября',12=>'декабря');
          $days_w = array('Вс.', 'Пн.', 'Вт.', 'Ср.', 'Чт.', 'Пт.', 'Сб.'); 
          $data_date = $date->format('d.m.Y');  
          ?>
          <div class="qroom-booking_times_week-3" style="display:none;">
            <div class="qroom-booking_quest_title">
              <span> <?php echo '<strong>'.( $days_w[($date->format('w'))] .'</strong>'.$data_date ); ?></span>
            </div>
            <table class="qroom-booking_times">
              <?php echo do_shortcode('[jt-calendar-level-3 room=" Пятый элемент" date="'.$data_date.'"]') ; ?>
            </table>
          </div>        
          <?php
          $date->modify('+ 1 day'); 
            if ( in_array('Сб.',$days_w ) ) {
                }
            }             
          ?>
          <div class="qroom-booking_link_more button-3" onclick="qroom.quests.showMore(4,this,4);" style="display:none;">
            Показать еще
          </div>

          <?php        
          for ($a=0; $a < 7 ; $a++) {
            $start = '6:30';
            $days_M = array(1=>'января',2=>'февраля',3=>'марта',4=>'апрля', 5 =>'мая',6=>'июня',7=>'июля',8=>'августа',9=> 'сентября',10=> 'октября',11=> 'ноября',12=>'декабря');
            $days_w = array('Вс.', 'Пн.', 'Вт.', 'Ср.', 'Чт.', 'Пт.', 'Сб.');  
            $data_date = $date->format('d.m.Y');    
            ?>
            <div class="qroom-booking_times_week-4" style="display:none;">
              <div class="qroom-booking_quest_title">
                <span> <?php echo '<strong>'.( $days_w[($date->format('w'))] .'</strong>'.$data_date ); ?></span>
              </div>
              <table class="qroom-booking_times">
                <?php echo do_shortcode('[jt-calendar-level-3 room=" Пятый элемент" date="'.$data_date.'"]') ; ?>
              </table>
            </div>        
            <?php
              $date->modify('+ 1 day'); 
              if ( in_array('Сб.',$days_w ) ) {
                }
            }             
          ?>     
      
      <div class="qroom-booking_prices">
        <div class="qroom-booking_prices_title">
          <span>Цена за команду</span>
        </div>
        <div class="qroom-booking_prices_desc">
          Стоимость игры любой категории не зависит от количества человек в команде. Число игроков может варьироваться от 2 до 4.
        </div>
        <div class="_nclear">
          <table class="qroom-booking_prices_info _count-3 _price-type-1 _turquoise" onmouseover="qroom.ttip.show({ el: this, side: 'top', hoverable: true, width: 350 })" onmouseout="qroom.ttip.hide(this);">
            <tr>
              <td>
                <b>450</b>
              </td>
            </tr>
          </table>
          <table class="qroom-booking_prices_info _count-3 _price-type-1 _blue" onmouseover="qroom.ttip.show({ el: this, side: 'top', hoverable: true, width: 350 })" onmouseout="qroom.ttip.hide(this);">
            <tr>
              <td>
                <b>500</b>
              </td>
            </tr>
          </table>
          <table class="qroom-booking_prices_info _count-3 _price-type-1 _blue" onmouseover="qroom.ttip.show({ el: this, side: 'top', hoverable: true, width: 350 })" onmouseout="qroom.ttip.hide(this);">
            <tr>
              <td>
                <b>550</b>
              </td>
            </tr>
          </table>
          <table class="qroom-booking_prices_info _count-3 _price-type-1 _pink" onmouseover="qroom.ttip.show({ el: this, side: 'top', hoverable: true, width: 350 })" onmouseout="qroom.ttip.hide(this);">
            <tr>
              <td>
                <b>600</b>
              </td>
            </tr>
          </table>
        </div>
      </div>
      <div class="qroom-booking_prices_variants" onclick="pricesTypesPopup();">
        <span class="qroom-js_link">Способы оплаты</span>
      </div>
      <div class="_ta-c">
        Бронирование открыто на 21 день вперед. Если Вас интересует более поздняя дата, то позвоните нам, мы внесем вас в предварительное бронирование. Телефон <span class="ya-phone"> 097-15-14-542,  073-135-16-17</span>.
      </div>
      <div class="hidden" id="qroom-prices_popup">
        <div class="qroom-location_popup_title">
          Способы оплаты
        </div>
        <div class="qroom-popup_text">
          <p>Вы можете оплатить наши услуги следующими способами:</p>
          <ul>
            <li>Наличными перед началом квеста;</li>
            <li>Банковской картой перед началом квеста;<br/><img src="/wp-content/themes/quest/images/cards_accepted.jpg" style="padding-top:3px;" alt='Карты для оплаты'/></li>
            <li>Корпоративным клиентам мы готовы выставить счет для безналичной оплаты. Для получения счета свяжитесь, пожалуйста, с нашим менеджером по работе с корпоративными клиентами по телефону 8 (918) 758-62-58 или по почте <a class="qroom-dark-link" href="mailto:questzt@i.ua">questzt@i.ua</a></li>
          </ul>
        </div>
      </div>
    </div>
    </div>
    <div class="qroom-contacts_box">
        <div class="qroom-content_inner">
            <div class="qroom-contacts_box_title qroom-font_rbc _font_size_36 _weight_bold">
                КАК НАС НАЙТИ
            </div>
            <div class="qroom-contacts_box_text">
            </div>
            <div class="qroom-contacts_box_infos">
                <div class="qroom-contacts_box_infos_inner">
                    <div class="qroom-contacts_box_info">
                        <i class="material-icons">phone</i><span class="ya-phone">8-918-758-6258</span>
                    </div>
                    <div class="qroom-contacts_box_info">
                        <i class="material-icons">place</i>Пирогова 24
                    </div>
                </div>
            </div>
        </div>
        <div class="qroom-contacts_box_map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2145.1364784772295!2d28.658074457115333!3d50.25436833074964!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x472c64a32bfa355d%3A0xf14ad2a3d9b9e229!2z0JbQuNGC0L7QvNC40YAsINCW0LjRgtC-0LzQuNGA0YHQutCw0Y8g0L7QsdC70LDRgdGC0YwsINCj0LrRgNCw0LjQvdCw!5e0!3m2!1sru!2sru!4v1501828266299"  height="350" frameborder="0" style="border:0; width: 100%;" allowfullscreen></iframe>
        </div>
    </div>



<?php get_footer(); ?>
