import "bootstrap-icons/font/bootstrap-icons.css";
import "bootstrap/dist/css/bootstrap.min.css";
import "sweetalert2/dist/sweetalert2.min.css";
import { createApp } from "vue";
import VueSweetalert2 from "vue-sweetalert2";
import Vue3Lottie from "vue3-lottie";
import App from "./App.vue";
import router from "./router";

createApp(App).use(VueSweetalert2).use(Vue3Lottie).use(router).mount("#app");
