import Vue from "vue";
import Vuex from "vuex";
import files from './modules/files';
import auth from './modules/auth';
import patients from './modules/patients';

Vue.use(Vuex);

export default new Vuex.Store({
  modules: {
    files,
    auth,
    patients
  }
});

