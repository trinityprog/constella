<template>
  <div class="previewer">
    <draggable v-model="items" v-if="!isAdp">
      <transition-group type="transition">
        <div v-for="item, k in items.filter(el => el.removable)" :key="k + '_icon'" class="previewer__item-container">
          <div class="previewer__item">
            <div class="previewer__remove" @click="removeItem(item.id)">
              <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
                <rect x="2.70947" y="3.51816" width="1.14286" height="8" transform="rotate(-45 2.70947 3.51816)" fill="#333333" />
                <rect x="8.3667" y="2.71004" width="1.14286" height="8" transform="rotate(45 8.3667 2.71004)" fill="#333333" />
              </svg>
            </div>
            <img class="previewer__image" :src="item.image">
          </div>
        </div>
      </transition-group>
    </draggable>
    <div v-else v-for="item, k in items.filter(el => el.removable)" :key="k + '_icon'" class="previewer__item">
      <div class="previewer__remove" @click="removeItem(item.id)">
        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
          <rect x="2.70947" y="3.51816" width="1.14286" height="8" transform="rotate(-45 2.70947 3.51816)" fill="#333333" />
          <rect x="8.3667" y="2.71004" width="1.14286" height="8" transform="rotate(45 8.3667 2.71004)" fill="#333333" />
        </svg>
      </div>
      <img class="previewer__image" :src="item.image">
    </div>
    <div v-for="item, k in items.filter(el => !el.removable)" :key="k + '_icon'" class="previewer__item previewer__item_active">
      <img class="previewer__image" :src="item.image">
    </div>
  </div>
</template>


<script>

import { mapGetters, mapMutations } from 'vuex';
import draggable from 'vuedraggable';

export default {
  name: 'PreViewer',
  components: {
    draggable,
  },
  computed: {
    ...mapGetters('figures', ['figures', 'currentOrderId']),
    isAdp() {
      return false;// (document.documentElement.clientWidth < 800);
    },
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


<style lang="stylus">
@import '../styles/demens.styl';
@import '../styles/fonts.styl';

.previewer
  position absolute
  right 16px
  top 50%
  display flex
  flex-direction column
  align-items flex-end
  justify-content center
  transform translateY(-50%)
  &__dd
    display flex
    flex-direction row
    .previewer__item
      margin-right 10px
      &::after
        content '+'
        left 100%
        margin-left 2px
        bottom 15px
        font-size 18px
        background white
        color #333333
        /*height 2px*/
        /*width 11px*/
      &:last-child::after
        content ''

  &__item
    display inline-block
    position relative
    width 30px
    height 30px
    border-radius 50%
    background-color color_white
    border 1px solid #c7c7c7
    margin-bottom 10px
    transition transform .1s ease-in-out
    &-container
      display block
      text-align right
      width 150px
    &:hover
      transform scale(1.4) !important
      &::before
        content ''
        position absolute
        display block
        width 30px
        height 60px
        left -30px
        top 50%
        transform translateY(-40%)
        background-image url('/assets/icon-mouse.svg')
        background-size contain
        background-repeat no-repeat
    &::after
      content ''
      display block
      position absolute
      left 50%
      margin-left -1px
      bottom -17px
      height 16px
      border 0
      background-color #c7c7c7
      width 2px
    &_active
      display block
      width 44px
      height 44px
      border-radius 22px
      box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.15)
      margin-right -6px
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

.sortable-chosen .previewer__item
  transform scale(1.4) !important

/* @media screen and (max-width: 800px)
  .previewer
    right auto
    top auto
    bottom -6px
    left 50%
    flex-direction row
    transform translateX(-50%)
    &__item
      width 24px
      height 24px
      border-radius 50%
      margin-left 4px
      margin-right 4px
      &::after
        left 100%
        margin-left  0
        bottom 50%
        height 2px
        width 10px
    &__image
      object-fit contain
      max-height 16px
      max-width 16px
      transform translate(-50%, -50%)
      ^[0]__item_active &
        max-height 16px
        max-width 16px
*/
// .sortable-chosen
//   &::before
//     background-image none !important

@media screen and (max-width: 800px)
  .previewer__item-container
    width 70px
</style>
