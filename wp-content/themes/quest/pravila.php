<?php
  /*
  Template Name: Правила 
  */    
  get_header(); ?> 

<div class="qroom-content">
  <div class="container">
    <div class="row">

      <div class="qroom-corporate_service">
        <h1 class="qroom-font_rbc _font_size_36 _weight_bold _ta-c qroom-corporate_service_title">Основные правила:</h1>
        <div class="qroom-corporate_service_item">
          <div class="qroom-content_inner">
            <h4 class="qroom-title_with_border">
              <span>Что такое квест-комната?</span>
            </h4>
              <p>Это игра, где вы оказываетесь в закрытом помещении, из которого нужно выбраться.</p>
              <p>Для этого вам понадобятся логика и смекалка, а также предметы, которые вы найдете в процессе игры.</p> 
          </div>
        </div>
        <div class="qroom-corporate_service_item">
          <div class="qroom-content_inner">
            <h4 class="qroom-title_with_border">
              <span>Сколько участников должно быть в команде?</span>
            </h4>
            <p>
              Как правило, игра рассчитана на 2-4 игрока. Но в некоторых комнатах могут быть свои ограничения, <br>
              которые указаны у нас на сайте. Обращайте на них внимание при бронировании.</p>
          </div>
        </div>
        <div class="qroom-corporate_service_item">
          <div class="qroom-content_inner">
            <h4 class="qroom-title_with_border">
              <span>Есть ли возрастные ограничения?</span>
            </h4>
            <p>
              Игроки до <strong>12 лет</strong> должны быть с родителями. Некоторые комнаты имеют возрастные ограничения 18+,
              которые указаны у нас на сайте.
            </p>
          </div>
        </div>
        <div class="qroom-corporate_service_item">
          <div class="qroom-content_inner">
            <h4 class="qroom-title_with_border">
              <span>Что если мы застрянем в комнате?</span>
            </h4>
            <p>
              В любой момент можно обратиться за подсказкой к оператору,
              который следит за ходом игры и вашей безопасностью. 
            </p>
          </div>
        </div>
        <div class="qroom-corporate_service_item">
          <div class="qroom-content_inner">
            <h4 class="qroom-title_with_border">
              <span>Сколько времени длится игра?</span>
            </h4>
            <p>
              В большинстве комнат – <strong>60 минут</strong>. Однако,
              существуют квест-комнаты и с другими временными ограничениями, которые указаны у нас на сайте.
            </p>
          </div>
        </div>
        <div class="qroom-corporate_service_item">
          <div class="qroom-content_inner">
            <h4 class="qroom-title_with_border">
              <span>Сколько стоит игра?</span>
            </h4>
            <p>
              Цена зависит от дня недели и времени. На странице каждой комнаты вы найдете подробное расписание сеансов с ценами.
            </p>
          </div>
        </div>
        <div class="qroom-corporate_service_item">
          <div class="qroom-content_inner">
            <h4 class="qroom-title_with_border">
              <span>Можно ли подарить игру?</span>
            </h4>
            <p>
              Конечно! Для этого достаточно приобрести подарочный сертификат.
              Получатель сертификата сможет сам выбрать понравившуюся комнату и удобное время для игры.
            </p>
          </div>
        </div>
      </div>    
      <div class="qroom-corporate_contact">
        <div class="qroom-content_inner">
          <div class="_nclear">
            <form id="myform5" class="qroom-form" action="javascript:send('/forma-5.php','myform5','result5');" method="post">
                <div class="qroom-form_field">
                  <input type="text" class="qroom-input qroom-need_validate phone" placeholder="Ваш телефон *" name="phone">
                </div>
                 <div class="relative">
                  <div class="" onclick="sendForm5()">
                    <input type="submit" class="qroom-btn _big _green" value="Заказать звонок">
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
    </div>
  </div>
</div>



<?php get_footer(); 

  
  ?>