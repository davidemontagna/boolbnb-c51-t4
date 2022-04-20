import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

import Home from "./pages/Home";
import About from "./pages/About";
import SingleApartment from "./pages/SingleApartment";
import PageNotFound from "./pages/PageNotFound";

const router = new VueRouter({
    mode: "history",
    routes: [
        {
            path: "/",
            name: "home",
            component: Home
        },
        {
            path: "/chi-siamo",
            name: "about",
            component: About
        },
        {
            path: "/apartments/:slug",
            name: "single-apartment",
            component: SingleApartment
        },
        {
            path: "*",
            name: "page-404",
            component: PageNotFound
        },
    ]
});

export default router;