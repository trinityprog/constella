<template>
  <div class="viewerSM">
    <img
      v-for="(img, k) in imageList"
      :key="k"
      :src="img.image"
      :style="{'height': `${itemHeight(img)}%`}"
      class="viewerSM__img"
    >
  </div>
</template>


<script>

import { mapGetters } from 'vuex';

export default {
  name: 'Viewer',
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
  },
  methods: {
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
};
</script>


<style lang="stylus" scoped>
.viewerSM
  display flex
  flex-direction column
  align-items center
  justify-content center
  width 200px
  height 174px
  &__img
    display block
    width auto
    margin 0 auto
</style>
