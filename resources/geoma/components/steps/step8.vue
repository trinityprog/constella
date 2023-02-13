<template>
  <div>
    <div class="vizard__title">Кулон #{{(orderNum)}} готов!</div>
    <div class="vizard__input-block">
      Оформите заявку или продолжайте создавать браслет, добавляя кулоны.
    </div>

    <button class="vizard__button vizard__button_back" @click="addMore">
      Добавить кулон
      <svg width="9" height="13" viewBox="0 0 9 13" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M6.33371 1.24514C5.216 0.5 4.71923 0.5 4.47085 0.5C4.22247 0.5 3.72571 0.5 2.608 1.24514C1.86286 0.5 1.11771 0.872571 1.11771 1.99028C1.2419 2.23867 1.41577 3.03348 1.11771 4.22571C1.11771 4.59828 1.98705 4.47409 2.608 3.85314C2.85638 3.97733 3.35314 4.30023 3.35314 4.59828C2.98057 4.59828 1.49028 4.97085 0.372571 5.34343V5.716C0.12419 5.716 0 5.86503 0 6.46114C-3.55311e-07 7.05725 0.129857 7.02707 0.565929 7.02707C0.497995 7.02707 0.580306 7.10299 0.717604 7.22056C0.961221 7.42918 1.31045 7.47781 1.61462 7.37607C2.1782 7.18756 2.69151 7.12277 2.98057 6.83371L1.11771 11.3046L1.49028 11.6771C1.49028 12.2981 1.78834 13.1674 2.98057 11.6771H4.47085H5.96114C7.15337 13.1674 7.45142 12.2981 7.45142 11.6771L7.82399 11.3046L5.96114 6.83371C6.25019 7.12277 6.76351 7.18756 7.32709 7.37607C7.63126 7.47781 7.98049 7.42918 8.2241 7.22056C8.3614 7.10299 8.44371 7.02707 8.37578 7.02707C8.81185 7.02707 8.94171 7.05725 8.94171 6.46114C8.94171 5.86503 8.81752 5.716 8.56914 5.716V5.34343C7.45142 4.97085 5.96114 4.59828 5.58857 4.59828C5.58857 4.30023 6.08533 3.97733 6.33371 3.85314C6.95466 4.47409 7.82399 4.59828 7.82399 4.22571C7.52594 3.03348 7.6998 2.23867 7.82399 1.99028C7.82399 0.872571 7.07885 0.5 6.33371 1.24514Z" fill="white" />
      </svg>
      <svg width="10" height="13" viewBox="0 0 10 13" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M2.96154 2.65385C2.96154 0.930769 4.19231 0.5 4.80769 0.5C5.42308 0.5 6.65397 0.930769 6.65397 2.65385C6.65397 2.96154 6.34628 4.19231 5.73089 4.19231L9.11551 5.11538V5.73077C9.52576 6.03846 10.0385 7.02308 8.80773 7.26923C8.50002 6.96154 8.50004 7.57692 8.50004 7.57692L6.96156 6.96154C6.75643 6.96154 6.40772 7.08462 6.65387 7.57692C6.90002 7.82308 8.39746 9.9359 9.11541 10.9615L8.80772 11.2692C8.91028 11.7821 8.80771 12.6846 7.57695 12.1923C7.26925 12.1923 7.26925 12.1923 6.96156 12.5L4.80769 9.11539L2.65394 12.5C2.34625 12.1923 2.34625 12.1923 2.03856 12.1923C0.807791 12.6846 0.705227 11.7821 0.807791 11.2692L0.500099 10.9615C1.21805 9.9359 2.71548 7.82308 2.96164 7.57692C3.20779 7.08462 2.85907 6.96154 2.65394 6.96154L1.11547 7.57692C1.11547 7.57692 1.11548 6.96154 0.807775 7.26923C-0.422994 7.02308 0.0897436 6.03846 0.5 5.73077V5.11538L3.88461 4.19231C3.26923 4.19231 2.96154 2.96154 2.96154 2.65385Z" fill="white" />
      </svg>
    </button>
    <button class="vizard__button" @click="goToForm">
      Отправить заявку
    </button>
  </div>
</template>


<script>

import { mapGetters, mapMutations } from 'vuex';

export default {
  name: 'Step8',
  computed: {
    ...mapGetters('figures', ['currentOrder', 'orderNum']),
  },
  methods: {
    ...mapMutations('figures', ['setCurrentStep', 'initNewOrder']),
    addMore() {
      this.initNewOrder();
      this.setCurrentStep(2);
    },
    goToForm() {
      this.setCurrentStep(9);
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
  &__input
    &-block
      display block
      font-size 1rem
      margin-bottom 24px
  &__button
    display inline-block
    vertical-align middle
    padding 12px 32px
    outline none
    margin-top 11px
    border-radius 4px
    font-weight 400
    font-size 14px
    cursor pointer
    color color_white
    background color_black
    box-shadow 0 3px 8px 0 rgba(51, 51, 51, 0.3)
    transition box-shadow .25s ease-in-out
    & svg
      display inline-block
      vertical-align middle
      margin-top -2px
      margin-left 6px
    &:hover
      box-shadow 0 3px 8px 0 rgba(51, 51, 51, 0.5)
    &_back
      box-shadow 0 3px 8px 0 rgba(51, 51, 51, 0.3)
      margin-right 16px
    &_disabled
      opacity .8
      cursor default


@media screen and (max-width: 800px)
  .vizard__grid
    justify-content space-around
    &-item
      width 120px
      height 140px
      margin-right 0
  .vizard__button
    display block
    vertical-align middle
    margin 0
    width 100%
</style>
