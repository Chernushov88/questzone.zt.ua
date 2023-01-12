<?php
  /*
  Template Name: Правила 
  */    
  get_header(); ?> 

<div class="qroom-content">
  <div class="container">
    <div class="row">

      <div class="qroom-corporate_service">
        <h1 class="qroom-font_rbc _font_size_36 _weight_bold _ta-c qroom-corporate_service_title">Основні правила:</h1>
        <div class="qroom-corporate_service_item">
          <div class="qroom-content_inner">
            <h4 class="qroom-title_with_border">
              <span>Що таке квест-кімната?</span>
            </h4>
              <p>Це гра, де ви опиняєтеся в закритому приміщенні, з якого потрібно вибратися.</p>
              <p>Для цього вам знадобляться логіка та кмітливість, а також предмети, які ви знайдете в процесі гри.</p>
          </div>
        </div>
        <div class="qroom-corporate_service_item">
          <div class="qroom-content_inner">
            <h4 class="qroom-title_with_border">
              <span>Скільки учасників має бути у команді?</span>
            </h4>
            <p>
                Як правило, гра розрахована на 2-4 гравці. Але в деяких кімнатах можуть бути свої обмеження.
                які вказані у нас на сайті. Звертайте на них увагу під час бронювання.</p>
          </div>
        </div>
        <div class="qroom-corporate_service_item">
          <div class="qroom-content_inner">
            <h4 class="qroom-title_with_border">
              <span>Чи є вікові обмеження?</span>
            </h4>
            <p>
                Гравці віком до <strong>12 років</strong> мають бути з батьками. Деякі кімнати мають вікові обмеження 18+,
                які вказані у нас на сайті.
            </p>
          </div>
        </div>
        <div class="qroom-corporate_service_item">
          <div class="qroom-content_inner">
            <h4 class="qroom-title_with_border">
                <span>Що якщо ми застрягнемо в кімнаті?</span>
            </h4>
              <p>
                  У будь-який момент можна звернутися за підказкою до оператора,
                  який стежить за ходом гри та вашою безпекою.
              </p>
          </div>
        </div>
          <div class="qroom-corporate_service_item">
              <div class="qroom-content_inner">
                  <h4 class="qroom-title_with_border">
                      <span>Скільки часу триває гра?</span>
                  </h4>
                  <p>
                      У більшості кімнат є <strong>60 хвилин</strong>. Однак,
                      існують квест-кімнати та з іншими тимчасовими обмеженнями, які вказані у нас на сайті.
                  </p>
          </div>
        </div>
        <div class="qroom-corporate_service_item">
          <div class="qroom-content_inner">
            <h4 class="qroom-title_with_border">
                <span>Скільки коштує гра?</span>
            </h4>
              <p>
                  Ціна залежить від дня тижня та часу. На сторінці з кожною кімнатою ви знайдете детальний розклад сеансів з цінами.
              </p>
          </div>
        </div>
        <div class="qroom-corporate_service_item">
          <div class="qroom-content_inner">
            <h4 class="qroom-title_with_border">
                <span>Чи можна подарувати гру?</span>
            </h4>
              <p>
                  Звісно! Для цього достатньо придбати подарунковий сертифікат.
                  Отримувач сертифікату зможе сам вибрати кімнату, що сподобалася, і зручний час для гри.
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
                    <input type="submit" class="qroom-btn _big _green" value="Замовити дзвінок">
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