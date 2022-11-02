import Auth from '../components/Auth/index.vue';
import Body from '../components/layouts/BodyComponent.vue';

const routes = [{
        path: "/register",
        component: Auth,
        name: "Register",
    },
    {
        path: "/login",
        component: Auth,
        name: "Login",
    },
    {
        path: "/forgot_password",
        component: Auth,
        name: "ForgotPassword",
    },
    {
        path: "/",
        component: Body,
        name: "Dashboard",
    },
    {
        path: "/courses",
        component: Body,
        name: "Courses",
    },
    {
        path: "/create_video",
        component: Body,
        name: "CreateVideo",
    },
    {
        path: "/messages",
        component: Body,
        name: "Messages",
    },
    {
        path: "/notification",
        component: Body,
        name: "Notification",
    },
    {
        path: "/reviews",
        component: Body,
        name: "Review",
    },
    {
        path: "/setting",
        component: Body,
        name: "Setting",
    },
    {
        path: "/profile",
        component: Body,
        name: "Profile",
    },
]

export default routes;
