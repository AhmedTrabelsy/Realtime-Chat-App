import { createRouter, createWebHistory } from "vue-router";
import login from "../views/loginView.vue";
import signup from "../views/signupView.vue";
import terms from "../components/terms-page.vue";

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
];

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes,
});

export default router;
