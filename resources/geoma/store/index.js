import Vue from 'vue';
import Vuex from 'vuex';
import createPersistedState from 'vuex-persistedstate';

import figures from './modules/figures';

Vue.use(Vuex);

export default new Vuex.Store({
  // plugins: [
  //   createPersistedState({
  //     paths: [
  //       'figures',
  //     ],
  //   }),
  // ],
  modules: {
    figures,
  },
});
