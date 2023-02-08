<template>
    <span>
        <Header></Header>
        <Sidebar></Sidebar>
        <div class="wrapper">
            <Dashboard v-if="$route.name == 'Dashboard'"></Dashboard>
            <Courses v-if="$route.name == 'Courses'"></Courses>
            <CreateVideo v-if="$route.name == 'CreateVideo'"></CreateVideo>
            <Chat v-if="$route.name == 'Messages'"></Chat>
            <Notification v-if="$route.name == 'Notification'"></Notification>
            <Review v-if="$route.name == 'Review'"></Review>
            <Setting
                v-if="$route.name == 'Setting'"
            >
            </Setting>
            <Profile v-if="$route.name == 'Profile'"></Profile>
            <CourseDetail v-if="$route.name == 'CourseDetail'"></CourseDetail>
            <Feedback v-if="$route.name == 'Feedback'"></Feedback>
            <Footer></Footer>
        </div>
    </span>
</template>

<script>
import Header from "./HeaderComponent.vue";
import Sidebar from "./SidebarComponent.vue";
import Footer from "./FooterComponent.vue";
import Dashboard from "../dashboard/index.vue";
import Courses from "../courses/index.vue";
import CreateVideo from "../createVideo/index.vue";
import Chat from "../chat/index.vue";
import Notification from "../notification/index.vue";
import Review from "../review/index.vue";
import Setting from "../setting/index.vue";
import Profile from "../profile/index.vue";
import CourseDetail from "../courses/detail.vue";
import Feedback from "../feedback/index.vue";

export default {
    name: "Body",
    components: {
        Sidebar,
        Header,
        Footer,
        Dashboard,
        Courses,
        CreateVideo,
        Chat,
        Notification,
        Review,
        Setting,
        Profile,
        CourseDetail,
        Feedback
    },
    data() {
        return {
            user: [],
        };
    },
    async mounted() {
        this.loading = true;
        this.getUser();
    },
    methods: {
        async getUser() {
            try {
                let response = await axios.get(
                    `${globalBaseUrl}instructor/user_profile`
                );
                // this.user = response.data.data;
                this.$store.dispatch('setUser',response.data.data);
                this.loading = false;
            } catch (e) {
                this.loading = false;
                console.log(e);
            }
        },
    },
};
</script>

<style></style>
