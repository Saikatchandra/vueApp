import dashboard from "./components/dashboard/index"
import test from "./components/test"

export const routes = [
    {
        path: '/',
        name: 'dashboard',
        component: dashboard
    },
    {
        path: '/test',
        name: 'test',
        component: test
    }

]   