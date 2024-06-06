const ApiContentPage = () => import("@/components/layout/ApiContentPage.vue");
const DefaultPage = () => import("@/views/Public/Pages/Default.vue");
export default [
  {
    path: "",
    name: "home",
    component: () => import("@/views/Public/Home/Home.vue"),
  },
  {
    path: "about",
    name: "about",
    component: DefaultPage,
  },
  {
    path: "how-it-works",
    name: "how-it-works",
    component: DefaultPage,
  },
  {
    path: "login",
    name: "login",
    component: () => import("@/views/Auth/Login.vue"),
  },
  {
    path: "register",
    name: "register",
    component: () => import("@/views/Auth/Register.vue"),
  },
  {
    path: "forgot-password",
    name: "forgot-password",
    component: () => import("@/views/Auth/ForgotPassword.vue"),
  },
  {
    path: "reset-password",
    name: "reset-password",
    component: () => import("@/views/Auth/ResetPassword.vue"),
  },
  {
    path: "verify-email",
    name: "verify-email",
    component: () => import("@/views/Auth/VerifyEmail.vue"),
  },
];
