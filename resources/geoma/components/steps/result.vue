<template>
  <div>
    <div class="vizard__title">Заявка отправлена</div>
    <div class="vizard__pretext" />
    <div class="vizard__input-block">
      Благодарим за Вашу заявку! В ближайшее время мы свяжемся с Вами для обсуждения деталей!
    </div>
  </div>
</template>


<script>

import {mapMutations} from 'vuex';

export default {
  name: 'StepResult',
  created() {
    setTimeout(() => {
      location.href = '/';
    }, 3000);
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
  &__input
    &-block
      display block
      font-size 14px
      margin-bottom 12px
</style>
