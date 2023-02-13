<template>
  <div>
    <div class="vizard__title">Кулон #{{orderNum}}</div>
    <div class="vizard__pretext">Выберите тип фигурки <Hint title="Выберите тип фигурки" text="Конструктор дает возможность самостоятельно создать браслет с желаемым количеством фигурок и их дизайном" pos="right" /></div>
    <div class="vizard__grid">
      <div v-for="item, k in stepData" :key="('itm_' + k)" :class="{'vizard__grid-item_active': item.active}" class="vizard__grid-item" @click="setActive(item.id)">
        <div v-if="item.active" class="vizard__grid-item_mark" />
        <div class="vizard__grid-item_icon-container">
          <img :src="item.icon" class="vizard__grid-item_icon">
        </div>
        <div class="vizard__grid-item_title">{{item.title}}</div>
      </div>
    </div>
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

import { DATA } from '../../data.js';
import Hint from '../../components/Hint.vue';

export default {
  name: 'Step2',
  components: {
    Hint,
  },
  computed: {
    ...mapGetters('figures', ['currentOrder', 'orderNum']),
    currentItemID() {
      return this.currentOrder.id;
    },
    stepData: {
      get() {
        const result = DATA.map(el => ({
          active: (el.id == this.currentOrder.step2Value),
          id: el.id,
          title: el.title,
          icon: ((this.currentOrder.step3Value == 'g') ? el.step2.icons.g : el.step2.icons.s),
          image: el.step2.image,
        }));

        return result;
      },
      set() { },
    },
    hasSelect() {
      return !!(this.stepData.find(el => el.active));
    },
  },
  data() {
    return {
      nextStep: -1,
    };
  },
  methods: {
    ...mapMutations('figures', ['setStep2Value', 'setCurrentStep', 'setCurrentImage']),
    setActive(id) {
      this.stepData = this.stepData.map((el) => {
        if (el.id == id) {
          el.active = true;
          this.setStep2Value(id);
          this.nextStep = DATA.find(el => el.id == id).step2.next;

          this.setCurrentImage(DATA.find(e => (e.id == id)).step3.images[this.currentOrder.step3Value]);
        } else {
          el.active = false;
        }

        return el;
      });

      /** Scroll to bottom */
      setTimeout(() => {
        const scrollContainer = document.querySelector('.scroll-container');
        scrollContainer.scrollTo(0, scrollContainer.scrollHeight * 2);
      }, 120);
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
        margin-top 8px
        font-size 1rem
        line-height 17px
        text-align center
  &__button
    display block
    width 204px
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
    width 120px
</style>
