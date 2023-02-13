<template>
  <div>
    <div class="vizard__title">Кулон #{{orderNum}}</div>
    <div class="vizard__pretext">Тип фигурки <Hint title="Тип фигурки" text="Выберите тип фигурки" pos="right" /></div>
    <div class="vizard__grid">
      <div v-for="item, k in stepData" :key="('itm_' + k)" :class="{'vizard__grid-item_active': item.active}" class="vizard__grid-item" @click="setActive(item.id)">
        <div v-if="item.active" class="vizard__grid-item_mark" />
        <div class="vizard__grid-item_icon-container">
          <img :src="item.icon" class="vizard__grid-item_icon">
        </div>
        <div class="vizard__grid-item_title">{{item.title}}</div>
      </div>
    </div>
    <button class="vizard__button vizard__button_back" @click="back">
      <svg width="16" height="7" viewBox="0 0 16 7" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M16 3.5H1M1 3.5L4 1M1 3.5L4 6" stroke="#333333" />
      </svg>
      Назад
    </button>
    <button :class="{'vizard__button_disabled': !hasSelect}" class="vizard__button" @click="setStep">
      Дальше
      <svg width="16" height="7" viewBox="0 0 16 7" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M0 3.5H15M15 3.5L12 1M15 3.5L12 6" stroke="white" />
      </svg>
    </button>
  </div>
</template>


<script>

import { mapGetters, mapMutations } from 'vuex';

import Hint from '../../components/Hint.vue';
import { DATA } from '../../data.js';

export default {
  name: 'Step4',
  components: {
    Hint,
  },
  computed: {
    ...mapGetters('figures', ['currentOrder', 'figures', 'orderNum']),
    hasSelect() {
      return !!(this.stepData.find(el => el.active));
    },
    stepData: {
      get() {
        return DATA.find(e => (e.id == this.currentOrder.step2Value)).step4.data.map(el => ({
          id: el.id,
          icon: el.icon,
          title: el.title,
          active: (el.id == this.currentOrder.step4Value),
          image: ((this.currentOrder.step3Value == 's') ? el.types.s.image : el.types.g.image),
          price: ((this.currentOrder.step3Value == 's') ? el.types.s.price : el.types.g.price),
        }));
      },
      set() {
      },
    },
  },
  mounted() {
    this.nextStep = DATA.find(el => el.id == this.currentOrder.step2Value).step4.next;
    this.prevStep = DATA.find(el => el.id == this.currentOrder.step2Value).step4.prev;
  },
  data() {
    return {
      activeID: -1,
      nextStep: 0,
      prevStep: 0,
    };
  },
  methods: {
    ...mapMutations('figures', ['setCurrentStep', 'setStep4Value', 'setStep5Value', 'setCurrentImage']),
    setActive(id) {
      this.setStep4Value(id);
      if (id === 1) {
      this.setStep5Value(0);
      }
      this.setCurrentImage(this.stepData.find(el => (el.id == id)).image);
    },
    back() {
      if (this.figures.length > 1) {
        this.setCurrentStep(2);
      } else {
        this.setCurrentStep(this.prevStep);
      }
    },
    setStep() {
      if (this.hasSelect) {
        this.setCurrentStep(this.nextStep);
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
    font-size 1.1rem
    letter-spacing 0.12px
    line-height 1.2
    margin-bottom 34px
    font-weight 600
  &__grid
    display flex
    flex-wrap wrap
    align-items stretch
    justify-content flex-start
    &-item
      display block
      position relative
      margin-bottom 44px
      margin-right 5%
      align-self flex-start
      background color_white
      padding 28px 0
      width 160px
      box-shadow 0 3px 8px 0 rgba(51, 51, 51, 0.15)
      border-radius 2px
      cursor pointer
      border 1px solid rgba(color_white, 1)
      &_mark
        position absolute
        top 16px
        right 16px
        width 16px
        height 16px
        border-radius 50%
        background-image url(/assets/ic-selected.svg)
        background-repeat no-repeat
      &_active
        border 1px solid rgba(color_black, .5)
      &_icon
        display block
        width 34px
        height auto
        &-container
          display block
          width 40px
          height 40px
          margin 0 auto 4px
      &_title
        display block
        margin-top 12px
        font-size 1rem
        height 32px
        line-height 17px
        text-align center
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
  &__price
    display block
    font-weight 600
    font-size 16px
    color color_black

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
