<template>
  <div v-if="active" class="modal-overlay" @click="close" />
</template>

<script>

export default {
  name: 'ModalOverlay',
  props: {
    active: {
      type: Boolean,
      default: false,
    },
  },
  methods: {
    close() {
      this.$emit('close');
    },
  },
};
</script>


<style lang="stylus">
.modal-overlay
  display block
  position absolute
  top -20px
  left -20px
  right -20px
  bottom -20px
  background rgba(#000, .5)
  z-index 4000

</style>
