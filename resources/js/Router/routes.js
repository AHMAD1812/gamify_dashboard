
import Auth from '../components/Auth/index.vue';
import Dashboard from '../components/dashboard/index.vue';

const routes=[
    {
        path:"/register",
        component:Auth,
        name:"Register",
    },
    {
        path:"/login",
        component:Auth,
        name:"Login",
    },
    {
        path:"/forgot_password",
        component:Auth,
        name:"ForgotPassword",
    },
    {
        path:"/",
        component:Dashboard,
        name:"Dashboard",
    },
]

export default routes;