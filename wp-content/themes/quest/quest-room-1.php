<?php
/*
Template Name: КВЕСТ КОМНАТА 1
*/
get_header(); ?>
<script>
  var ajaxurl = '<?php echo site_url() ?>/wp-admin/admin-ajax.php';
  var true_posts = '<?php echo serialize($wp_query->query_vars); ?>';
  var current_page = <?php echo (get_query_var('paged')) ? get_query_var('paged') : 1; ?>;
  var max_pages = '<?php echo $wp_query->max_num_pages; ?>';
</script>
<?php
  $thumb_id = get_post_thumbnail_id();
  $thumb_url = wp_get_attachment_image_src($thumb_id,'thumbnail-size', true);
?>
<div class="qroom-content ">
  <div class="qroom-page_top_box qroom-quest_top qroom-box_page" style="background-image: url(<?php echo $thumb_url[0]; ?>)">
    <div class="qroom-box_linear_mask"></div>
    <div class="qroom-box_pattern_mask"></div>
    <div class="qroom-quest_top_selector">
      <div class="qroom-quest_top_selector_inner">
        <h1 class="data-title"><?php echo get_the_title(); ?></h1>
        <i class="material-icons">arrow_drop_down</i>
        <div class="qroom-quest_choice_ttip qroom-ttip">
          <div class="qroom-ttip_inner">
            <a onclick="qroom.analytics.track('quest','game_click',{label:'from_game_header'}); " href="/kvest-komnata-2/" class="qroom-quest_choice_item"  onclick="return false">Пятый элемент</a>
          </div>
        </div>
      </div>
    </div>
  11  <div class="qroom-quest_options">
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
    </div>22
    <i class="material-icons qroom-about_arrow_bottom">arrow_downward</i>
    <div class="qroom-content_inner">
      <div class="qroom-quest_top_desc">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
          <?php the_content() ?>
        <?php endwhile; ?>
        <!-- post navigation -->
        <?php else: ?>
        <!-- no posts found -->
        <?php endif; ?>
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
          <i class="fa fa-users" aria-hidden="true"></i>&nbsp;&nbsp;2-4 игроков
        </div>
        <div class="qroom-quest_top_info">
          <i class="material-icons">timer</i>60 минут
        </div>
        <div class="qroom-quest_top_info">
          <i class="material-icons">place</i>ул. Победы 3
        </div>
        <div class="qroom-quest_top_info">
          <i class="material-icons">person_outline</i>Возраст 13+
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
    <a rel="group" class="qroom-quest_photo" style="background-image: url(/wp-content/uploads/2018/06/2.jpg)" href="/wp-content/uploads/2018/06/2.jpg">
      <div class="material-icons">add</div>
    </a>
    <a rel="group" class="qroom-quest_photo" style="background-image: url(/wp-content/uploads/2018/06/3.jpg)" href="/wp-content/uploads/2018/06/3.jpg">
      <div class="material-icons">add</div>
    </a>
    <a rel="group" class="qroom-quest_photo" style="background-image: url(/wp-content/uploads/2018/06/8.jpg);" href="/wp-content/uploads/2018/06/8.jpg">
      <div class="material-icons">add</div>
    </a>




    <!-- <a rel="group" class="qroom-quest_photo" style="background-image: url(/wp-content/themes/quest/images/prison/3-s.jpg)" href="/wp-content/themes/quest/images/prison/3.jpg">
      <div class="material-icons">add</div>
    </a> -->
  </div>
  <div class="qroom-video" style="padding-top: 50px;">
    <div class="qroom-content_inner">
      <div class="qroom-video-in" style="padding-top: 56%;position: relative;">
  <iframe style="width: 100%;height: 100%;position: absolute;top: 0;" src="https://www.youtube-nocookie.com/embed/ANEIeCzB4hk?rel=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
        <!-- <iframe style="width: 100%;height: 100%;position: absolute;top: 0;" src="https://www.youtube.com/embed/ANEIeCzB4hk?rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe> -->
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
        <div class="qroom-booking_phone">
          Или запишитесь по телефону
          <b class="ya-phone">097-15-14-542</b>
        </div>
        <div class="qroom-booking_selector_quest qroom-font_rbc _weight_bold _font_size_36">
          <div class="qroom-booking_selector_quest_inner" data-title="<?php echo get_the_title(); ?>">
            <?php echo get_the_title(); ?><i class="material-icons">arrow_drop_down</i>
            <div class="qroom-quest_choice_ttip qroom-ttip">
              <div class="qroom-ttip_inner">
                <a onclick="qroom.analytics.track('quest', 'game_click', { label: 'from_game_timetable' });" href="/kvest-komnata-2/#booking" class="qroom-quest_choice_item"  onclick="return false">Пятый элемент</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="hidden">
    	Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim, vel et. Veniam ex a accusamus eum animi, vitae ab reiciendis rem debitis maiores laudantium, perspiciatis beatae fugiat alias optio modi?
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
              <?php echo do_shortcode('[jt-calendar-level-3 room="Тайны да Винчи" date="'.$data_date.'"]') ; ?>
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
              <?php echo do_shortcode('[jt-calendar-level-3 room="Тайны да Винчи" date="'.$data_date.'"]') ; ?>
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
              <?php echo do_shortcode('[jt-calendar-level-3 room="Тайны да Винчи" date="'.$data_date.'"]') ; ?>
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
                <?php echo do_shortcode('[jt-calendar-level-3 room="Тайны да Винчи" date="'.$data_date.'"]') ; ?>
              </table>
            </div>
            <?php
              $date->modify('+ 1 day');
              if ( in_array('Сб.',$days_w ) ) {
                }
            }
          ?>







        <!-- <div class="qroom-booking_link_more"> -->


      <div class="qroom-booking_prices">
        <div class="qroom-booking_prices_title">
          <span>Цена за команду</span>
        </div>
        <div class="qroom-booking_prices_desc">
          Стоимость игры любой категории не зависит от количества человек в команде. Число игроков может варьироваться от 2 до 4*.
        </div>
        <div class="_nclear">
          <!-- <table class="qroom-booking_prices_info _count-3 _price-type-1 _turquoise" onmouseover="qroom.ttip.show({ el: this, side: 'top', hoverable: true, width: 350 })" onmouseout="qroom.ttip.hide(this);">
            <tr>
              <td>
                <b>400</b>
              </td>
            </tr>
          </table> -->
          <table class="qroom-booking_prices_info _count-3 _price-type-1 _blue" onmouseover="qroom.ttip.show({ el: this, side: 'top', hoverable: true, width: 350 })" onmouseout="qroom.ttip.hide(this);">
            <tr>
              <td>
                <b>500</b>
              </td>
            </tr>
          </table>
          <!-- <table class="qroom-booking_prices_info _count-3 _price-type-1 _pink" onmouseover="qroom.ttip.show({ el: this, side: 'top', hoverable: true, width: 350 })" onmouseout="qroom.ttip.hide(this);">
            <tr>
              <td>
                <b>договорная</b>
              </td>
            </tr>
          </table> -->
          <!-- <table class="qroom-booking_prices_info _count-3 _price-type-1 _pink" onmouseover="qroom.ttip.show({ el: this, side: 'top', hoverable: true, width: 350 })" onmouseout="qroom.ttip.hide(this);">
            <tr>
              <td>
                <b>600</b>
              </td>
            </tr>
          </table> -->
        </div>
      </div>
      <div class="qroom-booking_prices_variants" onclick="pricesTypesPopup();">
        <span class="qroom-js_link">Способы оплаты</span>
      </div>
      <div class="_ta-c">
        Бронирование открыто на 21 день вперед. Если Вас интересует более поздняя дата, то позвоните нам, мы внесем вас в предварительное бронирование. <br>Телефон <span class="ya-phone"> 097-15-14-542</span>.
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
          <i class="material-icons">phone</i><span class="ya-phone"> 097-15-14-542</span>
        </div>
        <div class="qroom-contacts_box_info">
          <i class="material-icons">place</i>Житомир ул. Победы 3
        </div>
      </div>
    </div>
  </div>




  <div class="qroom-contacts_box_map">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2550.9303999873473!2d28.657009464014713!3d50.255882785994!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x472c649381ee9a93%3A0x3bfaa4cdc9e46dce!2z0LLRg9C70LjRhtGPINCf0LXRgNC10LzQvtCz0LgsIDMsINCW0LjRgtC-0LzQuNGALCDQltC40YLQvtC80LjRgNGB0YzQutCwINC-0LHQu9Cw0YHRgtGMLCDQo9C60YDQsNGX0L3QsA!5e0!3m2!1suk!2sru!4v1507286021021" height="450" frameborder="0" style="width: 100%;border:0" allowfullscreen></iframe>

     <div id="contact-outside">
      <div class="block-contact">
        <div class="block-img">
          <img src="/wp-content/uploads/2017/08/3.jpg" alt='Тайны да Винчи'>
        </div>
        <div class="moduletable">
          <div class="h3">Квест комнаты</div>
          <div class="custom">
            <div class="b-email"><a href="mailto:info@tascal.ru">questzt@i.ua</a></div>
          <div class="b-telef">Тел.: 097-15-14-542</div>
          <div class="b-text">Житомир, ул. Победы 3</div></div>
        </div>
      </div>
    </div>
<!--
  <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
  <script type="text/javascript">

    function initialize() {
      console.log('readyu');
      var styles =[];
      /*var secheltLoc = new google.maps.LatLng(55.776516,37.629512);*/
      var secheltLoc = new google.maps.LatLng(45.022565,38.972572);
      var myMapOptions = {
          zoom:15,
          center:secheltLoc,
          mapTypeId: google.maps.MapTypeId.ROADMAP,
          scrollwheel: true
        };
      var styledMap = new google.maps.StyledMapType(styles, {name: "Styled Map"});
      var theMap = new google.maps.Map(document.getElementById("map-canvas"), myMapOptions);
        theMap.mapTypes.set('map_style', styledMap);
        theMap.setMapTypeId('map_style');
      var image1 = 'http://questzone.zt.ua/wp-content/themes/quest/images/logo-icon.png';
      var image2 = 'http://questzone.zt.ua/wp-content/themes/quest/images/logo-icon.png';


      function makeInfoWin(marker, data) {
        var infowindow = new google.maps.InfoWindow({ content:data});
        google.maps.event.addListener(marker, 'click', function() {
          infowindow.open(theMap,marker);
          });

        }
      // КОНТАКТЫ
      // г. Краснодар ул. Красноармейская, 36 (Д)
      var marker = new google.maps.Marker({
              position: new google.maps.LatLng(45.022565,38.972572),
      icon: image1
        });
      marker.setMap(theMap);
      var contentString = '<div id="content">'+
          '<div id="siteNotice">'+
          '</div>'+
          '<h2 id="firstHeading" class="firstHeading">Фирменный центр продаж «Краснодарский»</h2>'+
          '<div id="bodyborder"></div>'+
          '<div id="bodyContent"><p>г. Краснодар ул. Красноармейская, 36 (Д) </p><sapn>8 800 333 7 111</sapn></div>'+
          '<hr>'+
          '<h2 id="firstHeading" class="firstHeading">Офис продаж</h2>'+
          '<div id="bodyborder"></div>'+
          '<div id="bodyContent"><p>г. Краснодар ул. Красноармейская, 36 (Д) </p><sapn>8 861 267 11 65</sapn></div>'+
          '</div>';
      makeInfoWin(marker, contentString);
      // г. Краснодар ул. Красноармейская, 36 (Д)
      var marker = new google.maps.Marker({
              position: new google.maps.LatLng(45.017185,38.958147),
      icon: image2
        });
      marker.setMap(theMap);
      var contentString = '<div id="content">'+
          '<div id="siteNotice">'+
          '</div>'+
          '<h2 id="firstHeading" class="firstHeading">«Солнечный дом»</h2>'+
          '<div id="bodyborder"></div>'+
          '<div id="bodyContent"><p>ул. Кубанская набережная, 3</p></div>'+
          '</div>';
      makeInfoWin(marker, contentString);

    }
     google.maps.event.addDomListener(window, 'load', initialize);
  </script>
  <style>
  #map-canvas { width  : 100%; height : 895px; border: solid thin #333;position:relative;left:-6px;} .gm-style .gm-style-iw {left: 25px !important;} #firstHeading {text-align: center; font-family: Arial; font-weight: 600; font-size: 12px; color: #656565;} #bodyborder {display: block; width: 32px; height: 4px; margin: 0 auto; background: #ffea00;} #bodyContent p{ font-family: ArialAMU; font-size: 10px; color: #656565; }
  </style>
  <div id="map-canvas"></div>
 -->
  </div>
<?php get_footer(); ?>