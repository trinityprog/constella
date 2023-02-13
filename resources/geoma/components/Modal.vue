<template>
  <div v-if="active" class="modal">
    <div class="modal-close" @click="close">
      <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 12 12" fill="none">
        <rect x="2.70947" y="3.51816" width="1.14286" height="8" transform="rotate(-45 2.70947 3.51816)" fill="#333333" />
        <rect x="8.3667" y="2.71004" width="1.14286" height="8" transform="rotate(45 8.3667 2.71004)" fill="#333333" />
      </svg>
    </div>
    <div id="modal-container" class="modal-container">
      <div
        class="modal-container__chain modal-container__chain_top"
        :style="{width: `${chainWidth}px`}"
        :class="`modal-container__chain_${figureType}`"
      ></div>
      <img
        v-for="(img, k) in imageList"
        :key="k"
        :src="img.image"
        :style="{'max-height': `${itemHeight(img)}%`}"
        class="modal-container__img"
      >
      <div
        class="modal-container__chain modal-container__chain_bottom"
        :style="{width: `${chainWidth}px`}"
        :class="`modal-container__chain_${figureType}`"></div>
    </div>
  </div>
</template>

<script>

import { mapGetters } from 'vuex';

export default {
  name: 'Modal',
  props: {
    active: {
      type: Boolean,
      default: false,
    },
  },
  data() {
    return {
      chainWidth: 0,
    };
  },
  computed: {
    ...mapGetters('figures', ['figures']),
    imageList() {
      const result = [];
      this.figures.forEach(el => {
        if (el.image) {
          result.push({
            image: el.image,
            rate: this.getScaleByType(el.step2Value),
          });
        }
      });
      return result;
    },
    figureType() {
      return (this.figures.length) ? this.figures[0].step3Value : 'g';
    },
  },
  methods: {
    close() {
      this.$emit('close');
    },
    itemHeight(el) {
      return (el.image) ? (100 / this.imageList.length) * el.rate : 100;
    },
    getScaleByType(t) {
      switch (t) {
        case 1:
          return 0.89;
        case 2:
          return 1;
        case 3:
          return 0.6;
        case 4:
          return 0.5;
      
        default:
          return 1;
      }
    },
  },
  watch: {
    active(val) {
      if (!val) return;
      setTimeout(() => {
        const img = document.querySelector('.modal-container__img');
        this.chainWidth = img.clientWidth || 0;
      }, 350);
    },
  },
};
</script>


<style lang="stylus" scoped>
.modal
  display block
  position absolute
  top 40px
  left 50%
  right 5px
  bottom 40px
  padding 0 -150px 0 -50px
  margin 0 auto
  transform translateX(-50%)
  background #fff
  z-index 5500
  width 50%
  min-width 280px
  &::after
    content ''
    display none
    position absolute
    top 50%
    right 0px
    margin-top -24px
    background-image url('/assets/mouse-scroll.svg')
    background-size contain
    background-repeat no-repeat
    width 32px
    height 48px
  &-close
    display block
    position absolute
    z-index 3500
    top 12px
    right 12px
    padding 8px 8px 3px 8px
    border-radius 50%
    border 1px solid #e0e0e0
    cursor pointer
    & > svg
      height 12px
      width 12px
      cursor pointer
  &-container
    display flex
    flex-direction column
    align-items center
    justify-content center
    margin 0 auto
    width 90%
    height 90%
    margin-top 5%
    &__img
      display block
      object-fit contain
      width auto
      max-width 100%
    &__chain
      display block
      flex-grow 1
      background-repeat repeat-y
      background-size 100% auto
      width 100%
      &_top
        background-position center bottom
      &_bottom
        background-position center top
      &_s
        background-image url('/assets/chain_s.png')
      &_g
        background-image url('/assets/chain_g.png')

  &-pre
    /*border 1px solid red*/
    display block
    position absolute
    z-index 3000
    top 2%
    left 50%
    bottom 5%
    margin 0 auto
    overflow hidden
    transform translateX(-45%)
    /*padding-right 50%
    max-height 50%
    /*overflow-y auto*/
    width 100%
    min-height 90%

</style>
