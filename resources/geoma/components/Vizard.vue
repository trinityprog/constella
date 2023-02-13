<template>
  <div class="vizard">
    <component :is="componentName" />
  </div>
</template>


<script>

import { mapGetters } from 'vuex';

import Step1 from '../components/steps/step1.vue';
import Step2 from '../components/steps/step2.vue';
import Step3 from '../components/steps/step3.vue';
import Step4 from '../components/steps/step4.vue';
import Step5 from '../components/steps/step5.vue';
import Step5_1 from '../components/steps/step5_1.vue';
import Step5_2 from '../components/steps/step5_2.vue';
import Step6_1 from '../components/steps/step6_1.vue';
import Step6_2 from '../components/steps/step6_2.vue';
import Step7 from '../components/steps/step7.vue';
import Step8 from '../components/steps/step8.vue';
import OrderForm from '../components/steps/orderForm.vue';
import PreOrder from '../components/steps/preOrder.vue';
import StepResult from '../components/steps/result.vue';

export default {
  name: 'Vizard',
  computed: {
    ...mapGetters('figures', ['currentStep']),
    componentName() {
      switch (this.currentStep) {
        case 1:
          return Step1;
          break;

        case 2:
          return Step2;
          break;

        case 3:
          return Step3;
          break;

        case 4:
          return Step4;
          break;

        case 5:
          return Step5;
          break;

        case 51:
          return Step5_1;
          break;

        case 52:
          return Step5_2;
          break;

        case 7:
          return Step7;
          break;

        case 8:
          return Step8;
          break;

        case 9:
          return PreOrder;
          break;

          case 10:
              return OrderForm;
              break;

        case 11:
          return StepResult;
          break;

        case 61:
          return Step6_1;
          break;

        case 62:
          return Step6_2;
          break;

        default:
          return Step1;
          break;
      }
    },
  },
};
</script>


<style lang="stylus" scoped>

.vizard
  display block
  position absolute
  top 10%
  bottom 2%
  overflow auto
  width auto
  left 5%
  padding-right 15%
  right -10%

</style>
