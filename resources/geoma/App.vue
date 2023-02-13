<template>
  <div id="app" class="app">
    <div class="app-container">
      <Logo class="app__logo" />
      <div class="app-container__left">
        <div class="scroll-container">
          <Viewer @show-more="showMore"/>
        </div>
        <PreViewer />
        <div class="show-more__button" @click="showMore" v-if="isVisibleMoreButton">
          <svg width="14" height="9" viewBox="0 0 14 9" fill="none" xmlns="http://www.w3.org/2000/svg">
            <mask id="path-1-inside-1" fill="white">
              <path d="M-5.24219e-05 4.42497C0.486698 2.96472 3.00878 -2.56014e-05 6.90278 -2.56014e-05C10.7968 -2.56014e-05 13.1422 2.96472 13.629 4.42497C13.1422 5.88522 10.7968 8.84997 6.90278 8.84997C3.00878 8.84997 0.486698 5.88522 -5.24219e-05 4.42497Z" />
            </mask>
            <path d="M-5.24219e-05 4.42497L-0.948736 4.10875L-1.05414 4.42497L-0.948736 4.7412L-5.24219e-05 4.42497ZM13.629 4.42497L14.5776 4.7412L14.683 4.42497L14.5776 4.10875L13.629 4.42497ZM6.90278 -1.00003C4.69081 -1.00003 2.87532 -0.156011 1.55662 0.877933C0.263565 1.89178 -0.629223 3.15021 -0.948736 4.10875L0.948631 4.7412C1.11587 4.23949 1.72749 3.28542 2.79066 2.45183C3.8282 1.63833 5.22074 0.999974 6.90278 0.999974V-1.00003ZM6.90278 0.999974C8.58114 0.999974 9.92411 1.63545 10.912 2.4402C11.9225 3.26332 12.5059 4.21797 12.6803 4.7412L14.5776 4.10875C14.2653 3.17172 13.4326 1.91388 12.1752 0.889565C10.8952 -0.153126 9.11841 -1.00003 6.90278 -1.00003V0.999974ZM6.90278 7.84997C5.22074 7.84997 3.8282 7.21161 2.79066 6.39812C1.72749 5.56453 1.11587 4.61046 0.948631 4.10875L-0.948736 4.7412C-0.629223 5.69974 0.263565 6.95817 1.55662 7.97202C2.87532 9.00596 4.69081 9.84997 6.90278 9.84997V7.84997ZM6.90278 9.84997C9.11841 9.84997 10.8952 9.00307 12.1752 7.96038C13.4326 6.93607 14.2653 5.67822 14.5776 4.7412L12.6803 4.10875C12.5059 4.63197 11.9225 5.58663 10.912 6.40975C9.92411 7.2145 8.58114 7.84997 6.90278 7.84997V9.84997Z" fill="#333333" mask="url(#path-1-inside-1)" />
            <path d="M8.62324 4.4231C8.62324 5.33437 7.88451 6.0731 6.97324 6.0731C6.06197 6.0731 5.32324 5.33437 5.32324 4.4231C5.32324 3.51183 6.06197 2.7731 6.97324 2.7731C7.88451 2.7731 8.62324 3.51183 8.62324 4.4231Z" fill="#333333" />
          </svg>
          <span>Просмотреть браслет</span>
        </div>
        <div class="show-more__button show-more__button_start" @click="start" v-if="!isVisibleMoreButton && this.currentStep === 1">
          <span>Начать</span>
        </div>

      </div>
      <div class="app-container__right">
        <Vizard />
      </div>
      <ModalOverlay :active="isModalActive" @close="hideMore" />
      <Modal :active="isModalActive" @close="hideMore" />
    </div>
  </div>
</template>

<script>

import { mapGetters, mapMutations } from 'vuex';

import Logo from './components/Logo.vue';
import Viewer from './components/Viewer.vue';
import PreViewer from './components/PreViewer.vue';
import Vizard from './components/Vizard.vue';
import Modal from './components/Modal.vue';
import ModalOverlay from './components/ModalOverlay.vue';

export default {
  name: 'App',
  components: {
    Logo,
    Viewer,
    Vizard,
    PreViewer,
    Modal,
    ModalOverlay,
  },
  computed: {
    ...mapGetters('figures', ['figures', 'currentStep']),
    isVisibleMoreButton() {
      return this.currentStep > 1 && this.figures.filter(el => el.image).length;
    },
  },
  data() {
    return {
      isModalActive: false,
    };
  },
  watch: {
    'currentStep' () {
      const vz = document.querySelector('.app-container__right .vizard');
      vz.scrollTop = 0;
    },
  },
  methods: {
    ...mapMutations('figures', ['setCurrentStep', 'initNewOrder']),
    showMore() {
      if (!this.isVisibleMoreButton) return;
      this.isModalActive = true;
    },
    hideMore() {
      this.isModalActive = false;
    },
    start() {
      this.initNewOrder();
      this.setCurrentStep(2);
    },
  },
};
</script>


<style lang="stylus">
@import './styles/fonts.styl';
@import './styles/demens.styl';

.app
  display block
  position relative
  font-family "Font", 'Arial'
  font-weight 400
  color color_black
  margin 0
  padding 0
  font-size 12px
  &__logo
    display block
    position absolute
    z-index 100
    top 16px
    left 50%
    transform translateX(-50%)
  &-container
    position fixed
    left 16px
    top 16px
    right 16px
    bottom 16px
    display flex
    border 2px solid rgba(color_gray, 1)
    border-radius 4px
    &__left
      display flex
      position relative
      align-items center
      overflow hidden
      justify-content center
      width 50%
      background-color color_white
    &__right
      position relative
      display flex
      overflow hidden
      align-items center
      justify-content center
      width 50%
      background-color color_gray
      border-left 1px solid rgba(color_black, .2)
.scroll-container
  display block
  flex-direction column
  justify-content center
  position absolute
  top 5%
  left 5%
  bottom 5%
  right -10%
  padding-right 15%
  max-height 90%
  overflow-y scroll
.show-more__button
  display block
  position absolute
  z-index 200
  width 90%
  max-width 250px
  padding 10px
  font-size 14px
  line-height 1em
  color #000
  font-weight 200
  background #fff
  border 1px solid #e6e6e6
  border-radius 2px
  left 50%
  transform translateX(-40%)
  bottom 32px
  text-align center
  cursor pointer
  &_start
    display none
  & > svg
    margin 3px
    display inline-block
    vertical-align bottom
@media screen and (max-width: 800px)
  .app
    &__logo
      top 6px
      width 90px !important
    &-container
      flex-direction column
      &__left
        width auto
        height 70%
      &__right
        width auto
        height 30%
  .show-more__button
    display block
    left 5%
    bottom 40px
    max-width 100%
    width auto
    right 5%
    transform none//translateX(-50%)
  .show-more__button_start
    display block
    left 5%
    bottom 40px
    max-width 100%
    width auto
    right 5%
    transform none//translateX(-50%)
  .scroll-container
    top 40px
    left 5%
    bottom 76px
    max-height 90%
</style>
