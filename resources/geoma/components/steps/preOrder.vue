<template>
  <div id="PreOrder" class="preorder-container" :class="{'mytest': false}">>
    <div class="preorder-overlay"  @click="close"></div>
    <div class="preorder-modal">
      <div class="preorder-modal-close" @click="close">
        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 12 12" fill="none">
          <rect x="2.70947" y="3.51816" width="1.14286" height="8" transform="rotate(-45 2.70947 3.51816)" fill="#333333" />
          <rect x="8.3667" y="2.71004" width="1.14286" height="8" transform="rotate(45 8.3667 2.71004)" fill="#333333" />
        </svg>
      </div>
      <div name="header" class="preorder-modal-header">
        <div>
          <h1>Ваш выбор</h1>
        </div>
        <div>
          <preViewerFlex/>
        </div>
      </div>

      <div name="body" class="preorder-modal-body">
        <div class="preorder-view-big">
            <ViewerSM />
        </div>
        <div class="preorder-view-txt">
          <h1>Браслет</h1>
          Количество кулонов: {{figuresFiltered}}
        </div>

      </div>

      <div name="footer" class="preorder-modal-footer">
        <div class="sbuton">
          <button class="preorder__button" style="color: #333333; background: #fff" @click="showMod">
            Просмотреть
          </button>
        </div>
        <div class="sbuton">
          <button class="preorder__button" @click="goToForm">
            Отправить заявку
          </button>
<!--          <button class="preorder__button" @click="gfig">-->
<!--            Оформить-->
<!--          </button>-->
        </div>
      </div>
    </div>

    <ModalOverlay :active="isHidden" @close="hideMod" />
    <Modal :active="isHidden" @close="hideMod" />
  </div>
</template>


<script>

import {mapMutations, mapGetters} from 'vuex';
import ViewerSM from '../../components/ViewerSM.vue';
import PreViewerFlex from '../../components/PreViewerFlex.vue';
import Modal from '../../components/Modal.vue';
import ModalOverlay from '../../components/ModalOverlay.vue';

export default {
    name: 'PreOrder',
    components: {
        ViewerSM,
        PreViewerFlex,
        Modal,
        ModalOverlay,
    },
    data(){
        return {
            isModalActive: true,
            isHidden: false,
            isFlexRow: true,
        };
    },
    methods: {
      ...mapMutations('figures', ['setCurrentStep']),
        close() {
          this.setCurrentStep(8);
        },
        showMod() {
          this.isHidden = true;
        },
        hideMod() {
          this.isHidden = false;
        },
        goToForm(){
          this.setCurrentStep(10);
        },
    },
    computed: {
      ...mapGetters('figures', ['figures']),
      figuresFiltered() {
        return this.figures.filter(el => el.image).length;
      },
    },
};


</script>

<style scoped lang="stylus">
  @import '../../styles/demens.styl';
  @import '../../styles/fonts.styl';

.preorder
  display block
  &-container
    position fixed
    top 0
    left 0
    right 0
    bottom 0
    z-index 2000
  &-overlay
    position absolute
    top 0
    left 0
    right 0
    bottom 0
    background rgba(#000, .5)
    z-index 2001
  &-modal
    position absolute
    top 20%
    left 50%
    top 50%
    width 40%
    min-width 300px
    height auto
    // max-height 400px
    margin 0 auto
    transform translate(-50%, -50%)
    z-index 3500
    background #fff
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
        height 32px
        width 32px
        cursor pointer
.sbuton
  display block
  width 49%
  text-align center

.preorder
  &__button
    display inline-block
    vertical-align middle
    padding 12px 32px
    outline none
    margin-top 11px
    border-radius 1px
    font-weight 400
    font-size 14px
    cursor pointer
    color color_white
    background color_black
    box-shadow 0 1px 2px 0 rgba(51, 51, 51, 0.3)
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

.preorder-modal-header
  display block
  width 100%
  padding 20px 0 20px 0
  & h1
    padding-left 20px

.preorder-modal-body
  padding 20px 0 20px 0
  display flex
  flex-direction row
  height 160px
  border-top  1px solid #ccc
  border-bottom  1px solid #ccc
  width 100%

.preorder-view-big
  display block
  position relative
  // width 90px
  height auto
  margin-left 32px
  margin-right 42px
  overflow hidden

.preorder-view-txt
  display block
  float right

.preorder-modal-footer
  /*border 1px solid #333333*/
  display flex
  flex-direction row
  width 100%
  height 80px

.viewer
  display block
  position relative
  // width 70%
  // height 10px
  overflow-y scroll
  margin-left 29px
  padding-right 30px

.preload_modalview
  display block
  position fixed
  z-index 9500
  margin 0 auto
  width 50%
  background white
  top 5%
  left 5%
  right 5%
  bottom 5%
.previewer
  position relative
  right 1px
  transform translateY(5px)
  padding-left 40px
  top 0
  display flex
  flex-direction row
  &::before
    display none

@media screen and (max-width: 800px)
  .sbuton
    display block
    width 100%
  .preorder
    display block
    &-modal
      top 50%
      left 50%
      width 40%
      &-close
        top 12px
        right 12px
        padding 6px 6px 1px 6px
        & > svg
          height 12px
          width 12px
    &__button
      display block
      width 96%
      padding 8px 0
      margin 4px 2%
    &-modal-header
      display flex
      flex-direction column
      width 100%
      padding 10px 0
      & h1
        padding-left 10px
      .previewer
        left auto
    &-modal-body
      padding 10px 0
      display flex
      flex-direction column
      height 250px
      width 100%
    &-view-big
      margin 0 auto
      overflow hidden
    &-view-txt
      display block
      float none
      padding 0 10px
    &-modal-footer
      flex-wrap wrap
      height auto
      padding-top 6px
      padding-bottom 6px
</style>
