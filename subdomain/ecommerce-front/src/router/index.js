import { createRouter, createWebHistory } from "vue-router";
import HomeView from "../views/HomeView.vue";
import footerComponent from "@/components/FooterComponent.vue";
import HeaderComponent from "@/components/Header.vue";
import NavBar from "@/components/Navigation.vue";
import RoomCom from "@/views/RegistrationView.vue";
import ProductDetails from "@/views/ProductDetails.vue";
import CheckOut from "@/views/CheckOut.vue";
import ShoppingCart from "@/views/Cart.vue";
import Reviews from "@/components/Reviews.vue";

const routes = [
  {
    path: "/home",
    name: "home",
    component: HomeView,
  },
  {
    path: "/about",
    name: "about",
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: () =>
      import(/* webpackChunkName: "about" */ "../views/AboutView.vue"),
  },
  {
    path: "/footer",
    name: "footerComponent",
    component: footerComponent,
    meta: {
      requiresAuth: true,
    },
    // redirect: "/",
  },
  {
    path: "/header",
    name: "HeaderComponent",
    component: HeaderComponent,
  },
  {
    path: "/nav",
    name: "Nav",
    component: NavBar,
  },
  {
    path: "/",
    name: "RoomCom",
    component: RoomCom,
  },
  {
    path: "/product-details/:id",
    name: "ProductDetails",
    component: ProductDetails,
  },
  {
    path: "/checkout",
    name: "checkout",
    component: CheckOut,
  },
  {
    path: "/cart",
    name: "cart",
    component: ShoppingCart,
  },
  {
    path: "/reviews",
    name: "reviews",
    component: Reviews,
  },
];

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes,
});

export default router;
