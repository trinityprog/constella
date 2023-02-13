<template>
  <div class="previewer">
    <div class="previewer__total">
      <img
        v-for="item, k in items.filter(el => el.removable)"
        :key="k + '_preicon'"
        :src="item.image"
        :style="{height: `${Math.round(100 / items.length)}%`}"
        class="previewer__total-img"
      >
      <div class="previewer__item-label">Браслет</div>
    </div>
    <div class="previewer__dd">
      <div v-for="item, k in items.filter(el => el.removable)" :key="k + '_icon'" class="previewer__item">
        <div class="previewer__remove" @click="removeItem(item.id)">
          <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
            <rect x="2.70947" y="3.51816" width="1.14286" height="8" transform="rotate(-45 2.70947 3.51816)" fill="#333333" />
            <rect x="8.3667" y="2.71004" width="1.14286" height="8" transform="rotate(45 8.3667 2.71004)" fill="#333333" />
          </svg>
        </div>
        <img class="previewer__image" :src="item.image">
        <div class="previewer__item-label previewer__item-label_kulon">Кулон #{{k + 1}}</div>
      </div>
    </div>
    <div v-for="item, k in items.filter(el => !el.removable)" :key="k + '_icon'" class="previewer__item previewer__item_active">
      <img class="previewer__image" :src="item.image">
    </div>
  </div>
</template>


<script>

import { mapGetters, mapMutations } from 'vuex';

export default {
  name: 'PreViewerFlex',
  computed: {
    ...mapGetters('figures', ['figures', 'currentOrderId']),
    items: {
      get() {
        return this.figures.filter(el => el.image).map(el => ({
          ...el,
          removable: (el.id != this.currentOrderId),
        }));
      },
      set(value) {
        this.setFigures(value);
      },
    },
  },
  methods: {
    ...mapMutations('figures', ['setCurrentStep', 'removeOrderById', 'setFigures']),
    removeItem(id) {
      this.removeOrderById(id);
      if(this.figures.filter(el => el.image).length === 0) {
        this.setCurrentStep(1);
      }
    },
  },
    props: {
        isFlexRow: {
            type: Boolean,
            default: false,
        }
    }
};
</script>


<style lang="stylus" scoped>
@import '../styles/demens.styl';
@import '../styles/fonts.styl';

.previewer
  position absolute
  right 16px
  top 50%
  display flex
  flex-direction column
  align-items center
  justify-content flex-start
  transform translateY(-50%)
  &__total
    display block
    position relative
    margin-bottom 7px
    width 45px
    max-width 45px
    min-width 45px
    height 45px
    max-height 45px
    min-height 45px
    margin-right 24px
    margin-bottom 16px
    margin-top 16px
    border-radius 50%
    background-color color_white
    border 1px solid #c7c7c7
    transition transform .1s ease-in-out
    // overflow hidden
    &::before
      content '='
      position absolute
      z-index 100
      display block
      right -16px
      bottom 10px
      font-size 18px
      background white
      color #333333
    &-img
      display block
      // min-height 30%
      margin 0 auto
      width auto
  &__item-label
    display block
    position absolute
    z-index 200
    bottom -16px
    left 50%
    font-size 12px
    white-space nowrap
    transform translateX(-50%)
    &_kulon
      bottom -22px
  &__dd
    position relative
    display flex
    flex-wrap wrap
    flex-direction row
    .previewer__item
      margin-right 24px
      margin-bottom 16px
      margin-top 16px
      &:hover::before
        display none
      &::after
        content '+'
        left 100%
        margin-left 10px
        bottom 15px
        font-size 18px
        background white
        color #333333
        /*height 2px*/
        /*width 11px*/
      &:last-child::after
        content ''

  &__item
    display block
    position relative
    width 36px
    height 36px
    border-radius 50%
    background-color color_white
    border 1px solid #c7c7c7
    margin-bottom 10px
    transition transform .1s ease-in-out
    &:hover
      transform scale(1) !important
    &::after
      content ''
      display block
      position absolute
      left 50%
      margin-left -1px
      bottom -11px
      height 10px
      border 0
      background-color #c7c7c7
      width 2px
    &_active
      display block
      width 44px
      height 44px
      border-radius 22px
      box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.15)
      &::after
        display none
  &__image
    display block
    position absolute
    left 50%
    top 50%
    max-height 24px
    max-width 24px
    transform translate(-50%, -50%)
    ^[0]__item_active &
      max-height 30px
      max-width 30px
  &__remove
    display block
    position absolute
    top -8px
    right -8px
    z-index 200
    padding 2px
    height 12px
    width 12px
    cursor pointer
    border-radius 50%
    background-color color_white
    border 1px solid #c7c7c7

</style>
