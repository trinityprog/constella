<template>
  <div>
    <div class="vizard__title">Создайте свой браслет!</div>
    <div class="vizard__pretext">В нашем конструкторе вы можете создать уникальный браслет</div>
      <div class="vizard__pretext">
          «Сначала добавьте первый кулон и потом дополните браслет по желанию <br>другими фигурками»
      </div>
      <br>
    <div class="vizard__grid">
      <div class="vizard__grid-item">
        <div class="vizard__grid-item_image-container">
          <img src="../../assets/vizard_step1_block_1.svg" class="vizard__grid-item_image">
        </div>
        <div class="vizard__grid-item_text">Выбрать вид и количество кулонов</div>
      </div>
      <div class="vizard__grid-item">
        <div class="vizard__grid-item_image-container">
          <img src="../../assets/vizard_step1_block_2.svg" class="vizard__grid-item_image">
        </div>
        <div class="vizard__grid-item_text">Выбрать цвет золота, количество камней, покрытие эмалью</div>
      </div>
      <div class="vizard__grid-item">
        <div class="vizard__grid-item_image-container">
          <img src="../../assets/vizard_step1_block_3.svg" class="vizard__grid-item_image">
        </div>
        <div class="vizard__grid-item_text">Создать свой единственный в мире браслет</div>
      </div>
      <div class="vizard__grid-item">
        <div class="vizard__grid-item_image-container">
          <img src="../../assets/vizard_step1_block_4.svg" class="vizard__grid-item_image">
        </div>
        <div class="vizard__grid-item_text">Нанести гравировку — имя и дату рождения ребенка</div>
      </div>
    </div>
    <button class="vizard__button" @click="setStep(2)">Начать</button>
  </div>
</template>


<script>

import { mapMutations } from 'vuex';

export default {
  name: 'Step1',
  methods: {
    ...mapMutations('figures', ['setCurrentStep', 'initNewOrder']),
    setStep(s) {
      this.initNewOrder();
      this.setCurrentStep(s);
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
    padding-right 25%
    &-item
      display block
      width 35%
      margin-bottom 44px
      margin-right 5%
      &_image
        display block
        width 34px
        height auto
        &-container
          display block
          width 40px
          height 40px
          margin-bottom 4px
      &_text
        display block
        font-size 1rem
        font-weight 300
        line-height 17px
        max-width 160px
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

@media screen and (max-width: 800px)
  .vizard__grid
    justify-content space-around

</style>
