<template>
  <div>
    <div class="vizard__title">Кулон #{{orderNum}}</div>
    <div class="vizard__pretext">Гравировка <Hint title="Гравировка" text="По желанию вы можете нанести памятную гравировку с именем ребенка и датой рождения" pos="right" /></div>
    <div v-if="isNameOrDateVisible" class="vizard__input-block">
      <label class="vizard__input-label" for="name">Имя ребенка (не обязательно)</label>
      <input id="name" v-model="name" type="text" class="vizard__input-text">
    </div>
    <div v-if="isNameOrDateVisible" class="vizard__input-block">
      <label class="vizard__input-label" for="date">Дата (не обязательно)</label>
      <the-mask :mask="['##.##.####']" :masked="true" id="date" placeholder="__.__.____" v-model="birthDate" type="text" class="vizard__input-text" />
    </div>
    <div v-if="isShortTextVisible" class="vizard__input-block">
      <label class="vizard__input-label" for="shortText">Текст (макс. 7 символов)</label>
      <input id="shortText" v-model="shortText" maxlength="7" type="text" class="vizard__input-text">
    </div>

    <button class="vizard__button vizard__button_back" @click="back">
      <svg width="16" height="7" viewBox="0 0 16 7" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M16 3.5H1M1 3.5L4 1M1 3.5L4 6" stroke="#333333" />
      </svg>
      Назад
    </button>
    <button class="vizard__button" @click="setStep">
      Сохранить
      <svg width="16" height="7" viewBox="0 0 16 7" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M0 3.5H15M15 3.5L12 1M15 3.5L12 6" stroke="white" />
      </svg>
    </button>
  </div>
</template>


<script>

import { mapGetters, mapMutations } from 'vuex';
import { TheMask } from 'vue-the-mask';

import Hint from '../../components/Hint.vue';
import { DATA } from '../../data.js';

export default {
  name: 'Step7',
  components: {
    Hint,
    TheMask,
  },
  computed: {
    ...mapGetters('figures', ['currentOrder', 'orderNum']),
    isNameOrDateVisible() {
      return (this.currentOrder.step2Value == 1 || this.currentOrder.step2Value == 2);
    },
    isShortTextVisible() {
      return (this.currentOrder.step2Value == 3 || this.currentOrder.step2Value == 4);
    },
  },
  mounted() {
    this.nextStep = DATA.find(el => el.id === this.currentOrder.step2Value).step7.next;
    /** get prev step */
    console.log(this.currentOrder);
    if (this.currentOrder.step62Value > 0) {
      this.prevStep = 62;
    } else if (this.currentOrder.step61Value > 0) {
      this.prevStep = 61;
    } else if (this.currentOrder.step52Value > 0) {
      this.prevStep = 52;
    } else if (this.currentOrder.step51Value > 0) {
      this.prevStep = 51;
    } else if (this.currentOrder.step5Value > 0) {
      this.prevStep = 5;
    } else if (this.currentOrder.step4Value > 0) {
      this.prevStep = 4;
    } else {
      this.prevStep = DATA.find(el => el.id === this.currentOrder.step2Value).step7.prev;
    }
  },
  data() {
    return {
      nextStep: 0,
      prevStep: 0,
      name: '',
      birthDate: '',
      shortText: '',
    };
  },
  methods: {
    ...mapMutations('figures', ['setCurrentStep', 'setStep7Value', 'initNewOrder','figures']),
    setStep() {
      this.setStep7Value({
        name: this.name,
        date: this.birthDate,
        shortText: this.shortText,
      });
      this.initNewOrder();
      this.setCurrentStep(this.nextStep);
    },
    back() {
      this.setCurrentStep(this.prevStep);
    },
  },
  watch: {
    birthDate(val) {
      // console.log('Val:', val);
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
    font-size 1.2rem
    margin-bottom 26px
  &__pretext
    display block
    font-family 'Font'
    font-size 16px
    letter-spacing 0.12px
    line-height 1.2
    margin-bottom 34px
    font-weight 600
  &__input
    &-block
      display block
      margin-bottom 24px
    &-label
      display block
      color #808080
      font-size .9rem
    &-text
      display block
      margin-left 1px
      width 294px
      background color_white
      border 0
      box-shadow 0 0 0px 1px #c1c1c1
      color #333
      border-radius 3px
      font-size 1rem
      padding 7px 10px
      outline none
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


@media screen and (max-width: 800px)
  .vizard__grid
    justify-content space-around
    &-item
      width 120px
      height 80px
      margin-right 0
  .vizard__button
    display inline-block
    vertical-align middle
    margin 0
    width 50%
</style>
