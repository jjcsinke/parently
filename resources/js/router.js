import {createRouter, createWebHistory} from 'vue-router'

const routes = [
    {
        path: '/',
        component: () =>
            import("./views/Public.vue"),
        children: [
            {
                path: '',
                name: 'home',
                component: () =>
                    import("./views/Public/Home/Home.vue"),
            },
            {
                path: 'how-it-works',
                name: 'how-it-works',
                component: () =>
                    import("./views/Public/HowItWorks/HowItWorks.vue"),
            },
            {
                path: 'login',
                name: 'login',
                component: () =>
                    import("./views/Auth/Login.vue"),
            },
            {
                path: 'register',
                name: 'register',
                component: () =>
                    import("./views/Auth/Register.vue"),
            },
            {
                path: 'forgot-password',
                name: 'forgot-password',
                component: () =>
                    import("./views/Auth/ForgotPassword.vue"),
            },
            {
                path: 'reset-password',
                name: 'reset-password',
                component: () =>
                    import("./views/Auth/ResetPassword.vue"),
            },
        ]
    },
    {
        path: '/portal',
        component: () =>
            import("./views/Portal.vue"),
        children: [
            {
                path: '',
                name: 'portal',
                component: () =>
                    import("./views/Portal/Dashboards/Dashboard.vue")
            },
            {
                path: 'cities',
                name: 'cities',
                component: () =>
                    import("./views/Portal/Cities/Index.vue")
            },
            {
                path: 'cities/:id',
                name: 'cities.show',
                component: () =>
                    import("./views/Portal/Cities/Single.vue")
            },
            {
                path: 'schools',
                name: 'schools',
                component: () =>
                    import("./views/Portal/Schools/Index.vue")
            },
            {
                path: 'schools/:id',
                name: 'schools.show',
                component: () =>
                    import("./views/Portal/Schools/Single.vue")
            },
            {
                path: 'parents',
                name: 'parents',
                component: () =>
                    import("./views/Portal/Parents/Index.vue")
            },
            {
                path: 'parents/:id',
                name: 'parents.show',
                component: () =>
                    import("./views/Portal/Parents/Single.vue")
            },
            {
                path: 'children',
                name: 'children',
                component: () =>
                    import("./views/Portal/Children/Index.vue")
            },
            {
                path: 'children/:id',
                name: 'children.show',
                component: () =>
                    import("./views/Portal/Children/Single.vue")
            },
            {
                path: 'children/:id/edit',
                name: 'children.edit',
                component: () =>
                    import("./views/Portal/Children/Single.vue")
            }
        ]
    },
];

const router = createRouter({
    history: createWebHistory('/'),
    routes
})

export default router;
