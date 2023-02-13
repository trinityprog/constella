<template>
  <div :class="veiwerClasses" class="viewer" @click="showMore">
    <img v-if="isPlaceholder" src="/assets/viewer_bg_default.png" class="viewer__placeholder" :style="{height: placeholderH}">
    <img
      v-if="!isPlaceholder"
      v-for="(img, k) in imageList"
      :key="k"
      :src="img.image"
      class="viewer__img"
    >
  </div>
</template>


<script>

import { mapGetters } from 'vuex';

export default {
  name: 'Viewer',
  mounted() {
    if (window.innerWidth < 801) {
      this.placeholderH = `${(document.querySelector('.viewer').clientHeight * .7)}px`;
    } else {
      this.placeholderH = 'auto';
    }
  
  },
  computed: {
    ...mapGetters('figures', ['currentStep', 'figures']),
    veiwerClasses() {
      return {
        'viewer-g': (!this.isPlaceholder && this.figures.length && this.figures[0].step3Value === 'g'),
        'viewer-s': (!this.isPlaceholder && this.figures.length && this.figures[0].step3Value !== 'g'),
        'viewerh_modal': this.modal,
      };
    },
    isPlaceholder() {
      //return this.currentStep == 1;
      return this.imageList && this.imageList.length == 0;
    },
    imageList() {
      // console.log(this.figures);
      return (this.figures) ? this.figures.filter(el => el.image) : [];
    },
    itemHeight() {
      return (this.imageList.length) ? 100 / this.imageList.length : 100;
    },
  },
  data() {
    return {
      placeholderH: '0',
    };
  },
  props: {
    isOrderForm: {
      type: Boolean,
      default: false,
    },
    modal: {
      type: Boolean,
      default: false,
    },
  },
  methods: {
    getScaleByType(t) {
      switch (t) {
        case 1:
          return 0.89;
        case 2:
          return 1;
        case 3:
          return (this.figures.filter(el => el.image).length === 1) ? 0.6 : 0.75;
        case 4:
          return (this.figures.filter(el => el.image).length === 1) ? 0.5 : 0.63;
      
        default:
          return 1;
      }
    },
    showMore() {
      if(window.innerWidth < 801) {
        this.$emit('show-more');
      }
    },
  },
};
</script>


<style lang="stylus" scoped>

.viewerh
  display flex
  flex-direction column
  justify-content center
  height 90%
  min-height 95%
  &::after
    content ''
    display block
  &_modal
    height auto
  &__ddd
    display block
    //width 500px
    width auto
    height auto
    // flex-grow 1
    overflow hidden
  &__imgh
    display block
    width 100%
    height 100%
    object-fit contain
  &__imgp
    display block
    position relative
    top 20%

.viewer
  display flex
  position absolute
  top 0
  left 50%
  min-height 95%
  max-height 95%
  min-height 95%
  flex-direction column
  // width 135px
  width 90px
  margin 0 auto
  transform translateX(-65%)
  &-g
    &::before, &::after
      content ''
      display block
      // width 135px
      width 90px
      min-height 80px
      flex-grow 1
      background-repeat repeat-y
      background-size 100% auto
      background-image url('/assets/chain_g.png')
  &-s
    &::before, &::after
      content ''
      display block
      // width 135px
      width 90px
      min-height 80px
      flex-grow 1
      background-repeat repeat-y
      background-size 100% auto
      background-image url('/assets/chain_s.png')
  &__img
    display block
    // width 135px
    width 90px
    // margin 0 auto
    object-fit contain

  &__placeholder
    display block
    position absolute
    left 50%
    top 50%
    transform translate(-60%, -50%)
@media screen and (max-width: 800px)
  .viewer__placeholder
    transform translate(-50%, -60%)
  .viewer
    width 50px
    left 43%
    transform translateX(-50%)
    &__img
      width 50px
    &-g, &-s
      &::before, &::after
        width 50px
</style>
