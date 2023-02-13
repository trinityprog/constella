<template>
  <div class="hint">
    i
    <div :class="hintPosition" class="hint__text">
      <div v-if="(title != '')" class="hint__title">{{title}}</div>
      {{text}}
    </div>
  </div>
</template>


<script>
export default {
  name: 'Hint',
  props: {
    pos: {
      type: String,
      default: 'right',
    },
    title: {
      type: String,
      default: '',
    },
    text: {
      type: String,
      default: '',
    },
  },
  computed: {
    hintPosition() {
      switch (this.pos) {
        case 'top':
          return 'hint__position_top';
          break;
        case 'left':
          return 'hint__position_left';
          break;
        case 'right':
          return 'hint__position_right';
          break;
        case 'bottom':
          return 'hint__position_bottom';
          break;
      }
    },
  },
};
</script>


<style lang="stylus" scoped>
.hint
  display inline-block
  position relative
  font-weight 600
  width 20px
  height 20px
  line-height 20px
  text-align center
  color rgba(#fff, .8)
  background-color rgba(#000, .8)
  border-radius 12px
  &:hover ^[0]__text
    display block
  &__title
    display block
    font-weight 600
    font-size 14px
  &__text
    display none
    position absolute
    left 0
    top 0
    z-index 100
    font-size 12px
    line-height 14px
    font-weight 400
    background-color rgba(#000, 1)
    padding 8px
    text-align left
    border-radius 2px
    min-width 250px
    &::after
      content ''
      display block
      position absolute
      width 0
      height 0
      border 8px solid rgba(#000, 0)
  &__position_top
    transform translate(calc(-50% + 8px), calc(-100% - 10px))
    &::after
      bottom -15px
      left calc(50% - 8px)
      border-top 8px solid rgba(#000, 1)
  &__position_left
    transform translate(calc(-100% - 10px), calc(-50% + 8px))
    &::after
      right -15px
      top calc(50% - 8px)
      border-left 8px solid rgba(#000, 1)
  &__position_right
    transform translate(30px, calc(-50% + 8px))
    &::after
      left -15px
      top calc(50% - 8px)
      border-right 8px solid rgba(#000, 1)
  &__position_bottom
    transform translate(calc(-50% + 8px), 30px)
    &::after
      top -15px
      left calc(50% - 8px)
      border-bottom 8px solid rgba(#000, 1)
</style>
