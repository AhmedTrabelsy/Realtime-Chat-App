import "bootstrap-icons/font/bootstrap-icons.css";
import "bootstrap/dist/css/bootstrap.min.css";
import { createApp } from "vue";
import Vue3Lottie from "vue3-lottie";
import App from "./App.vue";
import router from "./router";

createApp(App).use(Vue3Lottie).use(router).mount("#app");
