<template>
    <nav class="vertical_nav">
        <div class="left_section menu_left" id="js-menu">
            <div class="left_section">
                <ul>
                    <li class="menu--item">
                        <router-link :to="{name:'Dashboard'}"
                            class="menu--link"
                            title="Dashboard"
                        >
                            <i class="uil uil-apps menu--icon"></i>
                            <span class="menu--label">Dashboard</span>
                        </router-link>
                    </li>
                    <li class="menu--item">
                        <router-link :to="{name:'Courses'}"
                            class="menu--link"
                            title="Courses"
                        >
                            <i class="uil uil-book-alt menu--icon"></i>
                            <span class="menu--label">Courses</span>
                        </router-link>
                    </li>
                    <li class="menu--item">
                        <router-link :to="{name:'CreateVideo'}"
                            class="menu--link"
                            title="Create Video"
                        >
                            <i class="uil uil-plus-circle menu--icon"></i>
                            <span class="menu--label">Create Video</span>
                        </router-link>
                    </li>
                    <li class="menu--item">
                        <router-link :to="{name:'Messages'}"
                            class="menu--link"
                            title="Messages"
                        >
                            <i class="uil uil-comments menu--icon"></i>
                            <span class="menu--label">Messages</span>
                        </router-link>
                    </li>
                    <li class="menu--item">
                        <router-link :to="{name:'Notification'}"
                            class="menu--link"
                            title="Notifications"
                        >
                            <i class="uil uil-bell menu--icon"></i>
                            <span class="menu--label">Notifications</span>
                        </router-link>
                    </li>
                    <li class="menu--item">
                        <router-link :to="{name:'Review'}"
                            class="menu--link"
                            title="Reviews"
                        >
                            <i class="uil uil-star menu--icon"></i>
                            <span class="menu--label">Reviews</span>
                        </router-link>
                    </li>
                    <li class="menu--item">
                        <router-link :to="{name:'Setting'}"
                            class="menu--link"
                            title="Setting"
                        >
                            <i class="uil uil-cog menu--icon"></i>
                            <span class="menu--label">Setting</span>
                        </router-link>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</template>

<script>
export default {
    name:"Sidebar"
};
</script>

<style></style>
