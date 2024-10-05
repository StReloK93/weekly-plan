import { createVuestic } from "vuestic-ui";
import { createPinia } from 'pinia'
import { createApp } from "vue";
import i18n from "./modules/locale";

import 'vuestic-ui/styles/essential.css';
import 'vuestic-ui/styles/typography.css';
import 'material-icons/iconfont/material-icons.css';
import router from "./router";
import App from './App.vue'
import BaseAlert from "./components/BaseAlert.vue";
import BaseDateInput from "./components/BaseDateInput.vue";
createApp(App)
   .component('BaseAlert', BaseAlert)
   .component('BaseDateInput', BaseDateInput)
   .use(createPinia())
   .use(i18n)
   .use(createVuestic())
   .use(router)
   .mount("#app");
   