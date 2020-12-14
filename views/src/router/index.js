import Vue from "vue";
import VueRouter from "vue-router";
import Home from "../views/Home.vue";

Vue.use(VueRouter);

const routes = [
    {
        path: "/login",
        name: "Login",
        meta: { requireAuth: false },
        component: () =>
            import(/* webpackChunkName: "login" */ "../views/Login.vue"),
    },
    {
        path: "/",
        name: "Home",
        component: Home,
        meta: { requireAuth: true },
        children: [
            {
                path: "/customer",
                name: "CustomerList",
                component: () =>
                    import(
                        /* webpackChunkName: "about" */ "../views/customer/List.vue"
                    ),
            },
            {
                path: "/customerAdd",
                name: "CustomerAdd",
                component: () =>
                    import(
                        /* webpackChunkName: "about" */ "../views/customer/Add.vue"
                    ),
            },
            {
                path: "/customerEdit",
                name: "CustomerEdit",
                component: () =>
                    import(
                        /* webpackChunkName: "about" */ "../views/customer/Edit.vue"
                    ),
            },
            {
                path: "/customerDetail",
                name: "CustomerDetail",
                component: () =>
                    import(
                        /* webpackChunkName: "about" */ "../views/customer/Detail.vue"
                    ),
            },
            {
                path: "/product",
                name: "ProductList",
                component: () =>
                    import(
                        /* webpackChunkName: "about" */ "../views/product/List.vue"
                    ),
            },
            {
                path: "/productAdd",
                name: "ProductAdd",
                component: () =>
                    import(
                        /* webpackChunkName: "about" */ "../views/product/Add.vue"
                    ),
            },
            {
                path: "/tool",
                name: "ToolList",
                component: () =>
                    import(
                        /* webpackChunkName: "AddTool" */ "../views/tool/List.vue"
                    ),
            },
            {
                path: "/addTool",
                name: "AddTool",
                component: () =>
                    import(
                        /* webpackChunkName: "AddTool" */ "../views/tool/Add.vue"
                    ),
            },
            {
                path: "/editTool",
                name: "EditTool",
                component: () =>
                    import(
                        /* webpackChunkName: "AddTool" */ "../views/tool/Edit.vue"
                    ),
            },
            {
                path: "/limitManage",
                name: "LimitManage",
                component: () =>
                    import(
                        /* webpackChunkName: "LimitManage" */ "../views/LimitManage.vue"
                    ),
            },
            {
                path: "/addLevel",
                name: "AddLevel",
                component: () =>
                    import(
                        /* webpackChunkName: "AddLevel" */ "../views/AddLevel.vue"
                    ),
            },
            {
                path: "/incomeGoods",
                name: "IncomeGoods",
                component: () =>
                    import(
                        /* webpackChunkName: "IncomeGoods" */ "../views/IncomeGoods.vue"
                    ),
            },
            {
                path: "/report",
                name: "Report",
                component: () =>
                    import(
                        /* webpackChunkName: "Report" */ "../views/Report.vue"
                    ),
            },
        ],
    },
    {
        path: "*",
        redirect: "/",
    },
];

const router = new VueRouter({
    // mode: "history",
    base: process.env.BASE_URL,
    routes,
});

router.beforeEach((to, from, next) => {
    const isLogin = localStorage.getItem("token") == "ImLogin";
    if (isLogin) {
        next();
    } else {
        if (to.path !== "/login") {
            next("/login");
        } else {
            next();
        }
    }
});
export default router;
