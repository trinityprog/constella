<template>
  <div>
    <div class="vizard__title">Кулон #{{orderNum}}</div>
    <div class="vizard__pretext">Камни на выбор <Hint title="Камни на выбор" text="Выберите камень для фигурки" pos="right" /></div>
    <div class="vizard__tabs">
      <div v-for="(tab, k) in tabs" :key="k" :class="{'vizard__tab_active': tab.active}" class="vizard__tab" @click="setActiveTab(tab.id)">{{tab.title}}</div>
    </div>
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
  name: 'Step5',
  components: {
    Hint,
  },
  computed: {
    ...mapGetters('figures', ['currentOrder', 'figures', 'orderNum']),
    tabs() {
      return (DATA.find(el => el.id == this.currentOrder.step2Value)) ? DATA.find(el => el.id == this.currentOrder.step2Value).step5[this.currentOrder.step3Value].tabs.map(el => ({
        id: el.id,
        title: el.title,
        active: (el.id == this.activeTab),
      })) : [];
    },
    hasSelect() {
      return !!(this.stepData.find(el => el.active));
    },
    stepData: {
      get() {
        const tab = (DATA.find(el => el.id == this.currentOrder.step2Value)) ? DATA.find(el => el.id == this.currentOrder.step2Value).step5[this.currentOrder.step3Value].tabs.find(el => el.id == this.activeTab) : [];

        return tab ? tab.items.filter(el => el.images.hasOwnProperty(this.currentOrder.step4Value)).map(el => ({
          ...el,
          active: el.id == this.currentOrder.step5Value,
        })) : [];
      },
      set() {
      },
    },
  },
  mounted() {
    this.activeTab = DATA.find(el => el.id == this.currentOrder.step2Value).step5[this.currentOrder.step3Value].tabs[0].id;
    this.nextStep = DATA.find(el => el.id == this.currentOrder.step2Value).step5.next;
    this.prevStep = DATA.find(el => el.id == this.currentOrder.step2Value).step5.prev;
    if (this.currentOrder.step4Value == 1) {
      this.setCurrentStep(this.nextStep);
    }

    if (this.currentOrder.step4Value == 777) {
      this.setCurrentStep(61);
    }
  },
  data() {
    return {
      nextStep: 0,
      prevStep: 0,
      activeTab: -1,
      activeID: -1,
    };
  },
  methods: {
    ...mapMutations('figures', ['setCurrentStep', 'setStep5Value', 'setCurrentImage']),
    setActiveTab(id) {
      this.activeTab = id;
    },
    setActive(id) {
      this.setStep5Value(id);
      this.setCurrentImage(this.stepData.find(el => (el.id == id)).images[this.currentOrder.step4Value]);
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
        const stepValue = this.stepData.find(el => el.active).id;
        this.setCurrentImage(this.stepData.find(el => (el.id == stepValue)).images[this.currentOrder.step4Value]);
        if (
            (
              (this.currentOrder.step2Value == 1 && this.currentOrder.step4Value == 3)
              || (this.currentOrder.step2Value == 2 && this.currentOrder.step4Value == 4)
            )
            && DATA.find(el => el.id == this.currentOrder.step2Value).step51[this.currentOrder.step3Value][this.currentOrder.step5Value]
          ) {
          this.setCurrentStep(51);
        } else if (this.currentOrder.step2Value == 2 && this.currentOrder.step4Value == 3 && DATA.find(el => el.id == this.currentOrder.step2Value).step52[this.currentOrder.step3Value][this.currentOrder.step5Value]) {
          this.setCurrentStep(52);
        } else {
          console.log(this.currentOrder);
          this.setCurrentStep(this.nextStep);
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
    font-size 1.1rem
    letter-spacing 0.12px
    line-height 1.2
    margin-bottom 34px
    font-weight 600
  &__tabs
    display flex
    flex-wrap wrap
    margin-bottom 24px
  &__tab
    display block
    padding 5px 0
    opacity .5
    color color_black
    font-size 14px
    margin-right 24px
    cursor pointer
    border-bottom 2px solid rgba(color_black, 0)
    transition all .25s ease-in-out
    &_active
      font-weight 600
      border-bottom 2px solid color_black
      opacity 1
    &:hover
      border-bottom 2px solid color_black
      opacity 1
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
        margin-top 8px
        font-size 1rem
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
