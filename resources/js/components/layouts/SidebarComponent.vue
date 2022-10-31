<template>
    <nav class="vertical_nav">
        <div class="left_section menu_left" id="js-menu">
            <div class="left_section">
                <ul>
                    <li class="menu--item">
                        <a
                            href="instructor_dashboard.html"
                            class="menu--link active"
                            title="Dashboard"
                        >
                            <i class="uil uil-apps menu--icon"></i>
                            <span class="menu--label">Dashboard</span>
                        </a>
                    </li>
                    <li class="menu--item">
                        <a
                            href="instructor_courses.html"
                            class="menu--link"
                            title="Courses"
                        >
                            <i class="uil uil-book-alt menu--icon"></i>
                            <span class="menu--label">Courses</span>
                        </a>
                    </li>
                    <li class="menu--item">
                        <a
                            href="create_new_course.html"
                            class="menu--link"
                            title="Create Course"
                        >
                            <i class="uil uil-plus-circle menu--icon"></i>
                            <span class="menu--label">Create Video</span>
                        </a>
                    </li>
                    <li class="menu--item">
                        <a
                            href="instructor_messages.html"
                            class="menu--link"
                            title="Messages"
                        >
                            <i class="uil uil-comments menu--icon"></i>
                            <span class="menu--label">Messages</span>
                        </a>
                    </li>
                    <li class="menu--item">
                        <a
                            href="instructor_notifications.html"
                            class="menu--link"
                            title="Notifications"
                        >
                            <i class="uil uil-bell menu--icon"></i>
                            <span class="menu--label">Notifications</span>
                        </a>
                    </li>
                    <li class="menu--item">
                        <a
                            href="instructor_all_reviews.html"
                            class="menu--link"
                            title="Reviews"
                        >
                            <i class="uil uil-star menu--icon"></i>
                            <span class="menu--label">Reviews</span>
                        </a>
                    </li>
                    <li class="menu--item">
                        <a
                            href="setting.html"
                            class="menu--link"
                            title="Setting"
                        >
                            <i class="uil uil-cog menu--icon"></i>
                            <span class="menu--label">Setting</span>
                        </a>
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
