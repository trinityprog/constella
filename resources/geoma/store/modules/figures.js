/** State of module */
const state = {
  figures: [],
  currentStep: 1,
  currentOrderId: 0,
  selectedMaterial: 'g',
  defaultOrder: {
    step2Value: -1,
    step3Value: 'g',
    step4Value: -1,
    step51Value: 0,
    step52Value: 0,
    step5Value: -1,
    step61Value: -1,
    step62Value: -1,
    step7Value: {
      name: '',
      date: '',
    },
  },
};

// getters
const getters = {
  figures(state) {
    return state.figures;
  },
  currentStep(state) {
    return state.currentStep;
  },
  currentImage(state) {
    return state.currentImage;
  },
  currentOrderId(state) {
    return state.currentOrderId;
  },
  currentOrder(state) {
    const order = state.figures.find(el => (el.id == state.currentOrderId));
    return (order || state.defaultOrder);
  },
  orderNum(state) {
    // let result = 1;
    // let i = 1;
    // state.figures.forEach(el => {
    //   if (el.id === state.currentOrderId) {
    //     result = i;
    //   }
    //   i++;
    // });

    return state.figures.filter(el => el.image).length || 1;
  }
};

// actions
const actions = {
};


// mutations
const mutations = {
  setFigures(state, figures) {
    state.figures = figures;
  },
  setCurrentStep(state, step) {
    state.currentStep = step;
  },
  setCurrentOrderId(state, id) {
    state.currentOrderId = id;
  },
  setSelectedMaterial(state, m) {
    state.selectedMaterial = m;
  },
  setCurrentImage(state, image) {
    state.figures = state.figures.map((el) => {
      if (el.id == state.currentOrderId) {
        el.image = image;
      }

      return el;
    });
    state.currentImage = image;
  },
  setStep2Value(state, s2v) {
    state.figures = state.figures.map((el) => {
      if (el.id == state.currentOrderId) {
        el.step2Value = s2v;
      }

      return el;
    });
  },
  setStep3Value(state, s3v) {
    state.figures = state.figures.map((el) => {
      if (el.id == state.currentOrderId) {
        el.step3Value = s3v;
      }

      return el;
    });
  },
  setStep4Value(state, s4v) {
    state.figures = state.figures.map((el) => {
      if (el.id == state.currentOrderId) {
        el.step4Value = s4v;
      }

      return el;
    });
  },
  setStep5Value(state, s5v) {
    state.figures = state.figures.map((el) => {
      if (el.id == state.currentOrderId) {
        el.step5Value = s5v;
      }

      return el;
    });
  },
  setStep51Value(state, s51v) {
    state.figures = state.figures.map((el) => {
      if (el.id == state.currentOrderId) {
        el.step51Value = s51v;
      }

      return el;
    });
  },
  setStep52Value(state, s52v) {
    state.figures = state.figures.map((el) => {
      if (el.id == state.currentOrderId) {
        el.step52Value = s52v;
      }

      return el;
    });
  },
  setStep61Value(state, s61v) {
    state.figures = state.figures.map((el) => {
      if (el.id == state.currentOrderId) {
        el.step61Value = s61v;
      }

      return el;
    });
  },
  setStep62Value(state, s62v) {
    state.figures = state.figures.map((el) => {
      if (el.id == state.currentOrderId) {
        el.step62Value = s62v;
      }

      return el;
    });
  },
  setStep7Value(state, s7v) {
    state.figures = state.figures.map((el) => {
      if (el.id == state.currentOrderId) {
        el.step7Value = s7v;
      }

      return el;
    });
  },
  initNewOrder(state) {

    let lastID = state.figures.map(e => e.id).sort((a, b) => (b - a))[0];
    let lastSort = state.figures.map(e => e.sort).sort((a, b) => (b - a))[0];
    // state.figures = state.figures.filter(e => e.image !== '');
    state.figures = state.figures.filter(e => e.image);

    lastID = (!lastID) ? 1 : (lastID + 1);
    lastSort = (!lastSort) ? 1 : (lastSort + 1);

    state.currentOrderId = lastID;
    // console.log(state.figures);
    state.figures.push({
      id: lastID,
      sort: lastSort,
      ...state.defaultOrder,
      step3Value: state.selectedMaterial,
    });
  },
  removeOrderById(state, id) {
    state.figures = state.figures.filter(el => el.id != id);
  },

};

export default {
  namespaced: true,
  state,
  getters,
  actions,
  mutations,
};
