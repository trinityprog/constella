<template>
  <div>
    <div class="vizard__title">Оформление заявки</div>

    <div class="vizard__pretext"> Предварительная стоимость: $<span v-html="price"></span> </div>
    <div class="vizard__pretext"> Для расчета точной стоимости браслета необходимо оформить заявку. После поступления заказа с Вами свяжется наш менеджер для согласования сроков и условий доставки, а также итоговой суммы заказа.</div>

    <div class="vizard__pretext"> Персональные данные <Hint title="Персональные данные" pos="right" /></div>
    <div class="vizard__input-block">
      <label class="vizard__input-label" for="name">Имя<sup>*</sup></label>
      <input id="name" v-model="name" type="text" class="vizard__input-text">
    </div>
    <div class="vizard__input-block">
      <label class="vizard__input-label" for="surname">Фамилия<sup>*</sup></label>
      <input id="surname" v-model="surname" type="text" class="vizard__input-text">
    </div>
    <div class="vizard__input-block">
      <label class="vizard__input-label" for="city">Город<sup>*</sup></label>
      <input id="city" v-model="city" type="text" class="vizard__input-text">
    </div>
    <div class="vizard__input-block">
      <label class="vizard__input-label" for="email">E-mail<sup>*</sup></label>
      <input id="email" v-model="email" type="text" class="vizard__input-text">
    </div>
    <div class="vizard__input-block">
      <label class="vizard__input-label" for="phone">Телефон<sup>*</sup></label>
      <input id="phone" v-model="phone" type="text" class="vizard__input-text">
    </div>
    <div class="vizard__input-block">
        <label class="vizard__input-label" for="phone">Как с вами связаться<sup>*</sup></label>
        <div class="connection" style="display: flex; align-items: center; justify-content: flex-start; gap: 30px; margin-top: 10px;">
            <label style="text-align: center;" class="vizard__input-label" for="call"><input type="radio" id="call" value="Звонок" v-model="connection"> <br/>Звонок</label>
            <label style="text-align: center;" class="vizard__input-label" for="telegram"><input type="radio" id="telegram" value="Telegram" v-model="connection"> <br/>Telegram</label>
            <label style="text-align: center;" class="vizard__input-label" for="whatsapp"><input type="radio" id="whatsapp" value="Whatsapp" v-model="connection"> <br/>Whatsapp</label>
            <label style="text-align: center;" class="vizard__input-label" for="viber"><input type="radio" id="viber" value="Viber" v-model="connection"> <br/>Viber</label>
        </div>
    </div>
    <div class="vizard__input-block">
      <input type="checkbox" :checked="isAgree" @change="checkboxState"> Я принимаю условия по обработке персональных данных. <sup>*</sup>
    </div>

    <div>Проверьте, пожалуйста, правильность ввода Ваших данных, чтобы мы могли с Вами связаться</div>

    <button class="vizard__button vizard__button_back" @click="back">
      <svg width="16" height="7" viewBox="0 0 16 7" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M16 3.5H1M1 3.5L4 1M1 3.5L4 6" stroke="#333333" />
      </svg>
      Назад
    </button>
    <button :class="{'vizard__button_disabled': !hasSelect}" class="vizard__button" @click="setStep">
      Отправить
    </button>
  </div>
</template>

<script>
import axios from 'axios';
import {mapGetters, mapMutations} from 'vuex';
import {TheMask} from 'vue-the-mask';

import Hint from '../../components/Hint.vue';
import {DATA, prices} from '../../data.js';

export default {
  name: 'OrderForm',
  components: {
    Hint,
    TheMask,
  },
  props: {
    order: {
      type: Object,
    },
  },
  data() {
    return {
      name: '',
      surname: '',
      email: '',
      phone: '',
      city: '',
      isAgree: false,
      lockPhoneFilter: false,
      inProgress: false,
      connection: '',
      price: 590,
    };
  },
  mounted() {
    this.lockPhoneFilter = (this.phone.trim() !== '');

    const figures = this.$store.state.figures.figures.map((item) => item.image).filter((item) => !!item);

    const allPrices = prices.map((item) => {
        if (figures.includes(item.image)) {
            return item.price;
        }
    }).filter((item) => !!item);

    let fullPrices = allPrices.reduce((a,b) => a + b, 0);

    if(allPrices.length >= 5) {
        fullPrices += 150;
    }

    this.price = this.price + fullPrices;
  },
  computed: {
    ...mapGetters('figures', ['figures']),
    hasSelect() {
      return (
        this.name.trim()
        && this.surname.trim()
        && this.email.trim()
        && this.phone.trim()
        && this.city.trim()
        && this.connection.trim()
        && this.isAgree
        && !this.inProgress
      );
    },
  },
  methods: {
    ...mapMutations('figures', ['setCurrentStep']),
    checkboxState(st) {
      this.isAgree = !this.isAgree;
    },
    back() {
      this.setCurrentStep(8);
    },
    setStep() {
      const sendData = {
        figures: [],
      };
      if (this.hasSelect) {
        this.figures.filter(f => f.step2Value > 0).forEach((figure) => {
          // console.log('Figure:', figure);
          const orderItem = {};
          // console.log(figure);
          /** Get type */
          orderItem.type = DATA.find(el => el.id == figure.step2Value).title || '';
          /** Gold type */
          orderItem.material = figure.step3Value === 's' ? 'Белое золото' : 'Желтое золото';

          /** decorate type */
          if (figure.step4Value > 0) {
            orderItem.decorate = DATA.find(el => el.id == figure.step2Value).step4.data.find(el => el.id === figure.step4Value).title || '';
          } else {
            orderItem.decorate = '';
          }

          /** stone for decorate */
          if (figure.step5Value > 0) {
            orderItem.decorateStone = DATA.find(el => el.id == figure.step2Value).step5[figure.step3Value].tabs.find(t => t.items.find(itm => itm.id === figure.step5Value)).items.find(itm => itm.id === figure.step5Value).title || '';
          } else {
            orderItem.decorateStone = '';
          }

          /** stone for heart decorate */
          if (figure.step51Value > 0 && figure.step5Value > 0) {
            orderItem.heartStone = DATA.find(el => el.id == figure.step2Value).step51[figure.step3Value][figure.step5Value].find(el => el.id === figure.step51Value).name || '';
          } else {
            orderItem.heartStone = '';
          }

          if (figure.step52Value > 0 && figure.step5Value > 0 && DATA.find(el => el.id === figure.step2Value).step52) {
            orderItem.heartStone = DATA.find(el => el.id === figure.step2Value).step52[figure.step3Value][figure.step5Value].find(el => el.id === figure.step52Value).name || '';
          }

          /** Enamel color */
          if (figure.step61Value > 0) {
            orderItem.enamelColor = DATA.find(el => el.id == figure.step2Value).step6[figure.step3Value].find(c => c.id == figure.step61Value).name || '';
          } else {
            orderItem.enamelColor = '';
          }

          /** Stone in heart if colored */
          if (figure.step62Value > 0 && figure.step61Value > 0) {
            orderItem.heartStone = DATA.find(el => el.id == figure.step2Value).step62[figure.step3Value][figure.step61Value].find(el => el.id === figure.step62Value).name || '';
          }

          orderItem.name = figure.step7Value.name || '';
          orderItem.date = figure.step7Value.date || '';
          orderItem.text = figure.step7Value.shortText || '';
          orderItem.image = figure.image;

          sendData.figures.push(orderItem);
        });

        /** perosn data */
        sendData.name = this.name.trim();
        sendData.surname = this.surname.trim();
        sendData.email = this.email.trim();
        sendData.phone = this.phone.trim();
        sendData.city = this.city.trim();
        sendData.connection = this.connection.trim();
        sendData.price = this.price;

        if (!this.inProgress) {
          this.inProgress = true;
          axios.post('/geoma/consturctor', `json=${JSON.stringify(sendData)}`).then(() => {
            this.setCurrentStep(11);
            this.inProgress = false;
          });
        }
      }
    },
  },
};
</script>

<style lang="stylus" scoped>
@import '../../styles/demens.styl';

.vizard
  &__title
    display block
    font-family 'Times', 'Playfair Display'
    font-style italic
    font-size 28px
    margin-bottom 26px
  &__pretext
    display block
    font-family 'Font'
    font-size 16px
    letter-spacing 0.12px
    line-height 1.2
    margin-bottom 16px
    font-weight 600
  & sup
    color #f00
  &__input
    &-block
      display block
      margin-bottom 12px
    &-label
      display block
      color #808080
      font-size 12px
    &-text
      display block
      margin-left 1px
      width 294px
      background color_white
      border 0
      box-shadow 0 0 0px 1px #c1c1c1
      color #333
      border-radius 3px
      font-size 15px
      padding 7px 10px
      outline none
      &area
        height 160px
  &__button
    display inline-block
    vertical-align middle
    width 150px
    padding 12px 0
    outline none
    margin-top 11px
    border-radius 2px
    font-weight 400
    font-size 13px
    cursor pointer
    color color_white
    background color_black
    box-shadow 0 3px 8px 0 rgba(51, 51, 51, 0.3)
    transition box-shadow .25s ease-in-out
    &:hover
      box-shadow 0 3px 8px 0 rgba(51, 51, 51, 0.5)
    &_back
      box-shadow 0 3px 8px 0 rgba(51, 51, 51, 0.3)
      background-color color_white
      color color_black
      margin-right 16px
    &_disabled
      opacity .8
      cursor default
.scroll-container
  border 1px solid #333333

@media screen and (max-width: 800px)
  .vizard__input-text
    width calc(100% - 22px)
  .vizard__button
    margin-right 0
    width 50%
</style>
