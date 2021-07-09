
      <div class="section questions">
         <div class="questions-wrap">
            <h2>Не знаете что выбрать или просто нескем пообщаться?</h2>
            <div class="questions-inside">
               <form class="questions-form" method="POST">
                  <h4>Заполните форму и мы с Вами свяжемся!</h4>
                  <label for="name">Ваше имя</label>
                  <input type="text" name="name" id="name" placeholder="Джон Снег" required><br>
                  <label for="chooser">Как с Вами связаться</label>
                  <div class="form-choose">
                     <div class="choose-content">
                        <a href="javascript:void(0);" data-value="phone" id="chooser" class="choose-click"><i class="choose-click fas fa-phone"></i> Телефон</a>
                        <div class="choose-row">
                           <a href="javascript:void(0);" class="choose-not-click choose-viber"><i class="choose-not-click choose-viber fab fa-viber"></i> Viber</a>
                           <a href="javascript:void(0);" class="choose-not-click choose-telegram"><i class="choose-not-click choose-telegram fab fa-telegram-plane"></i> Telegram</a>
                           <a href="javascript:void(0);" class="choose-not-click choose-email"><i class="choose-not-click choose-email fas fa-at"></i> E-mail</a>
                        </div>
                     </div>
                  </div>
                  <br>
                  <div class="variant">
                     <label for="tel">Введите телефон:</label>
                     <input type="tel" name="tel" id="tel" placeholder="+38(___)___-__-__" maxlength="18" required>
                  </div>
                  <br>
                  <label for="some">Хотите добавить что-то еще?</label>
                  <textarea rows="3" name="some" id="some" placeholder="...и большую колу, пожалуйста :)"></textarea><br>
                  <button type="submit">Отправить</button>
               </form>
            </div>
         </div>
      </div>
      
      <!-- form success -->
      <div class="success-form-shadow">
         <div class="success-form">
            <h2>Данные успешно отправлены!</h2>
            <h3>С Вами свяжутся в ближайшее время!</h3>
            <i class="fas fa-clipboard-check"></i>
         </div>
      </div>
      <!-- form success END -->