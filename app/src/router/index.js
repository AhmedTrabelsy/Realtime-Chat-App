import { createRouter, createWebHistory } from "vue-router";
import login from "../views/login-page.vue";
import signup from "../views/signup-page.vue";
import terms from "../views/terms-page.vue";
import chat from "../views/chat-page.vue";

const routes = [
  {
    path: "/",
    name: "home",
  },
  {
    path: "/login",
    name: "login",
    component: login,
  },
  {
    path: "/signup",
    name: "signup",
    component: signup,
  },
  {
    path: "/terms&conditions",
    name: "terms&conditions",
    component: terms,
  },
  {
    path: "/chat",
    name: "chat",
    component: chat,
  },
];

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes,
});

export default router;
