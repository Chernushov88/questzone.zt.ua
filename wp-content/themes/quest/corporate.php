<?php
/*
Template Name: КОРПОРАТИВНЫМ КЛИЕНТАМ
*/ 

get_header(); ?>

<div class="qroom-content _hidden">
<div class="qroom-page_top_box qroom-corporate_top qroom-box_page" style="background-image: url(/wp-content/themes/quest/images/corporate_top_image.jpg)">
  <div class="qroom-box_linear_mask"></div>
  <div class="qroom-box_pattern_mask"></div>
  <div class="qroom-content_inner">
    <div class="qroom-corporate_form">
      <h1 class="qroom-corporate_form_title">
        Подарите коллегам необычное приключение – корпоративные квесты в Житомире! 
      </h1>
      <h2 class="qroom-corporate_form_desc">
        Квесты – отличный способ организовать корпоратив или тренинг для Вашего коллектива. Корпоративным клиентам мы рады предложить <a href="javascript:;" onclick="qroom.navScroll($('.qroom-corporate_service'));">целый ряд услуг</a>. 
      </h2>
      <div class="qroom-form_outer">
        <div class="qroom-form_contact">
          <div class="qroom-user_ava" style="background-image: url(/wp-content/uploads/2017/10/stavropol.jpg);"></div>
          <div class="qroom-form_contact_manager">
            <div class="qroom-form_contact_manager_name"></div>
            <div class="qroom-form_contact_manager_destiny"></div>
            <div class="qroom-form_contact_manager_phone ya-phone"></div>
          </div>
        </div>
        <form  id="myform4" class="qroom-form"  action="javascript:send('/forma-4.php','myform4','result4');" method="post">
          <div class="qroom-form_field">
            <input type="text" class="qroom-input qroom-need_validate phone" placeholder="Ваш телефон *" name="phone">
          </div>
           <div class="relative">
            <div class="" onClick="sendForm4()">
              <input type="submit"  class="qroom-btn _big"  value="Замовити дзвінок">
            </div>
            <div class="qroom-form_additional">
              <div id="result4"></div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <i class="material-icons qroom-about_arrow_bottom">arrow_downward</i>
</div>
<div class="qroom-corporate_service">
  <h3 class="qroom-font_rbc _font_size_36 _weight_bold _ta-c qroom-corporate_service_title">
    Наши услуги
  </h3>
  <div class="qroom-corporate_service_item">
    <div class="qroom-content_inner">
      <h4 class="qroom-title_with_border">
        <span>Корпоративные праздники</span>
      </h4>
      <!-- <div class="qroom-corporate_service_gallery _pics_3">
        <a class="qroom-corporate_employ qroom-corporate_service_img" style="background-image: url(static/i/about_top_img.jpg)" href="/static/i/about_top_img.jpg"></a>
        <a class="qroom-corporate_employ qroom-corporate_service_img" style="background-image: url(static/i/franchise_top_img.jpg)" href="/static/i/franchise_top_img.jpg"></a>
        <a class="qroom-corporate_employ qroom-corporate_service_img" style="background-image: url(static/i/quest_top_img.jpg)" href="/static/i/quest_top_img.jpg"></a>
        </div> -->
      <p>
        За первый год работы «quest zone» в Житомире организовал более 10 корпоративных праздников. </br>
        На нашей локации на Пирогова 24 могут играть одновременно 12 человек (2 квеста). Также есть возможность устроить турнир и выявить сильнейший отдел или управление вашей компании. </br>
        Если Вас интересует проведение большого корпоратива с участием от 20 до 50 человек – мы готовы организовать Вам праздник с нашими коллегами – партнерами. Позвоните нашему менеджеру и он расскажет Вам о всех наших возможностях. Телефон менеджера: 8 (918) 758 6258.
      </p>
    </div>
  </div>
  <div class="qroom-corporate_service_item">
    <div class="qroom-content_inner">
      <h4 class="qroom-title_with_border">
        <span>Корпоративные подарки</span>
      </h4>
      <p>
        Вы можете подарить сотрудникам компании подарочные сертификаты дающие право бесплатно пройти все наши квесты в «quest zone». </br>
        Мы разработали очень красивые подарочные сертификаты деревянные кубики-головоломки, внутри которых находится подарочный сертификат.</br>
        Подробнее о наших подарках можно почитать <a href="/gift">здесь</a>.</br>
        Мы можем забрендировать одну из сторон подарочного кубика под логотип вашей компании (при заказе от 15 кубиков-головоломок).
      </p>
    </div>
  </div>
</div>
<div class="qroom-corporate_contact">
  <div class="qroom-content_inner">
    <div class="_nclear">
      <form  id="myform5" class="qroom-form"  action="javascript:send('/forma-5.php','myform5','result5');" method="post">
          <div class="qroom-form_field">
            <input type="text" class="qroom-input qroom-need_validate phone" placeholder="Ваш телефон *" name="phone">
          </div>
           <div class="relative">
            <div class="" onClick="sendForm5()">
              <input type="submit"  class="qroom-btn _big _green"  value="Замовити дзвінок">
            </div>
            <div class="qroom-form_additional">
              <div id="result5"></div>
            </div>
          </div>
        </form>
      <div class="qroom-corporate_form_contact">
        <div class="qroom-corporate_manager_cover">
          <div class="qroom-user_ava" style="background-image: url(/wp-content/uploads/2017/10/stavropol.jpg);"></div>
          <div class="qroom-corporate_manager">
            <div class="qroom-corporate_manager_name"></div>
            <div class="qroom-corporate_manager_destiny"></div>
          </div>
        </div>
        <div class="qroom-corporate_manager_phone">
          <div class="material-icons">phone</div>
          <span class="ya-phone"></span>
        </div>
      </div>
    </div>
  </div>
</div>

<?php get_footer(); ?>
