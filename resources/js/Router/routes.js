import Auth from '../components/Auth/index.vue';
import Body from '../components/layouts/BodyComponent.vue';

const routes = [{
        path: "/instructor/register",
        component: Auth,
        name: "Register",
    },
    {
        path: "/instructor/login",
        component: Auth,
        name: "Login",
    },
    {
        path: "/instructor/forgot_password",
        component: Auth,
        name: "ForgotPassword",
    },
    {
        path: "/instructor/dashboard",
        component: Body,
        name: "Dashboard",
    },
    {
        path: "/instructor/courses",
        component: Body,
        name: "Courses",
    },
    {
        path: "/instructor/create_video",
        component: Body,
        name: "CreateVideo",
    },
    {
        path: "/instructor/messages",
        component: Body,
        name: "Messages",
    },
    {
        path: "/instructor/notification",
        component: Body,
        name: "Notification",
    },
    {
        path: "/instructor/reviews",
        component: Body,
        name: "Review",
    },
    {
        path: "/instructor/setting",
        component: Body,
        name: "Setting",
    },
    {
        path: "/instructor/profile",
        component: Body,
        name: "Profile",
    },
]

export default routes;
