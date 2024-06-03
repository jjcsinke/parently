export default [
    {
        path: '',
        name: 'dashboard',
        component: () =>
            import("@/views/Portal/Dashboards/Dashboard.vue")
    },
    {
        path: 'account',
        name: 'account',
        component: () =>
            import("@/views/Portal/Account/Index.vue")
    },
    {
        path: 'cities',
        name: 'cities',
        component: () =>
            import("@/views/Portal/Cities/Index.vue")
    },
    {
        path: 'cities/:id',
        name: 'cities.show',
        component: () =>
            import("@/views/Portal/Cities/Single.vue")
    },
    {
        path: 'schools',
        name: 'schools',
        component: () =>
            import("@/views/Portal/Schools/Index.vue")
    },
    {
        path: 'schools/:id',
        name: 'schools.show',
        component: () =>
            import("@/views/Portal/Schools/Single.vue")
    },
    {
        path: 'parents',
        name: 'parents',
        component: () =>
            import("@/views/Portal/Parents/Index.vue")
    },
    {
        path: 'parents/:id',
        name: 'parents.show',
        component: () =>
            import("@/views/Portal/Parents/Single.vue")
    },
    {
        path: 'children',
        children: [
            {
                path: '',
                name: 'children',
                component: () =>
                    import("@/views/Portal/Children/Index.vue")
            },
            {
                path: ':id',
                name: 'children.show',
                component: () =>
                    import("@/views/Portal/Children/Single.vue")
            },
            {
                path: ':id/edit',
                name: 'children.edit',
                component: () =>
                    import("@/views/Portal/Children/Single.vue")
            },
            {
                path: 'create',
                name: 'children.create',
                component: () =>
                    import("@/views/Portal/Children/Create.vue")
            }
        ]
    }
]
