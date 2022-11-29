<template>
    <header class="header clearfix">
        <button type="button" id="toggleMenu" class="toggle_menu">
            <i class="uil uil-bars"></i>
        </button>
        <button id="collapse_menu" class="collapse_menu">
            <i class="uil uil-bars collapse_menu--icon"></i>
            <span class="collapse_menu--label"></span>
        </button>
        <div class="main_logo" id="logo">
            <img :src="`${globalBaseUrl}images/gamify-logo-text.png`" alt="logo" height="70" />
        </div>
        <div class="top-category">
            <div class="ui compact menu cate-dpdwn">
                <div class="ui simple dropdown item">
                    <a href="#" class="option_links p-0" title="categories"
                        ><i class="uil uil-apps"></i
                    ></a>
                    <div class="menu dropdown_category5">
                        <a href="#" class="item channel_item">Development</a>
                        <a href="#" class="item channel_item">Business</a>
                        <a href="#" class="item channel_item"
                            >Finance & Accounting</a
                        >
                        <a href="#" class="item channel_item">IT & Software</a>
                        <a href="#" class="item channel_item"
                            >Office Productivity</a
                        >
                        <a href="#" class="item channel_item"
                            >Personal Development</a
                        >
                        <a href="#" class="item channel_item">Design</a>
                        <a href="#" class="item channel_item">Marketing</a>
                        <a href="#" class="item channel_item">Lifestyle</a>
                        <a href="#" class="item channel_item">Photography</a>
                        <a href="#" class="item channel_item"
                            >Health & Fitness</a
                        >
                        <a href="#" class="item channel_item">Music</a>
                        <a href="#" class="item channel_item"
                            >Teaching & Academics</a
                        >
                    </div>
                </div>
            </div>
        </div>
        <div class="search120">
            <div class="ui search">
                <div class="ui left icon input swdh10">
                    <input
                        class="prompt srch10"
                        type="text"
                        placeholder="Search for Tuts Videos, Tutors, Tests and more.."
                    />
                    <i class="uil uil-search-alt icon icon1"></i>
                </div>
            </div>
        </div>
        <div class="header_right">
            <ul>
                <li>
                    <router-link :to="{name : 'CreateVideo'}"
                        class="upload_btn"
                        title="Create New Course"
                        >Create New Video</router-link>
                </li>
                <li class="ui dropdown">
                    <a href="#" class="option_links notification-dropdown" title="Notifications"
                        ><i class="uil uil-bell"></i
                        ><span class="noti_count">3</span></a
                    >
                    <div class="menu dropdown_mn left visible" @click="closeDropdown()">
                        <a href="#" class="channel_my item">
                            <div class="profile_link">
                                <img :src="`${globalBaseUrl}images/left-imgs/img-1.jpg`" alt="" />
                                <div class="pd_content">
                                    <h6>Rock William</h6>
                                    <p>
                                        Like Your Comment On Video
                                        <strong
                                            >How to create sidebar menu</strong
                                        >.
                                    </p>
                                    <span class="nm_time">2 min ago</span>
                                </div>
                            </div>
                        </a>
                        <a href="#" class="channel_my item">
                            <div class="profile_link">
                                <img :src="`${globalBaseUrl}images/left-imgs/img-2.jpg`" alt="" />
                                <div class="pd_content">
                                    <h6>Jassica Smith</h6>
                                    <p>
                                        Added New Review In Video
                                        <strong>Full Stack PHP Developer</strong
                                        >.
                                    </p>
                                    <span class="nm_time">12 min ago</span>
                                </div>
                            </div>
                        </a>
                        <a href="#" class="channel_my item">
                            <div class="profile_link">
                                <img :src="`${globalBaseUrl}images/left-imgs/img-9.jpg`" alt="" />
                                <div class="pd_content">
                                    <p>
                                        Your Membership Approved
                                        <strong>Upload Video</strong>.
                                    </p>
                                    <span class="nm_time">20 min ago</span>
                                </div>
                            </div>
                        </a>
                        <router-link :to="{name : 'Notification'}" class="vbm_btn"
                            >View All <i class="uil uil-arrow-right"></i
                        ></router-link>
                    </div>
                </li>
                <li class="ui dropdown">
                    <div class="opts_account new-dropdown" title="Account">
                        <img :src="`${globalBaseUrl}images/hd_dp.jpg`" alt="" />
                    </div>
                    <div class="menu dropdown_account left visible" @click="closeDropdown()">
                        <div class="channel_my">
                            <div class="profile_link justify-content-center">
                                <img :src="`${globalBaseUrl}images/hd_dp.jpg`" alt="" />
                            </div>
                            <div class="rhte85 mt-2 justify-content-center">
                                <h6>{{user.full_name}}</h6>
                                <div class="mef78" title="Verify">
                                    <i class="uil uil-check-circle"></i>
                                </div>
                            </div>
                           <router-link :to="{name : 'Profile'}"
                                class="dp_link_12 mt-2 text-center"
                                >View Instructor Profile</router-link>
                        </div>
                        <router-link :to="{name : 'Dashboard'}"
                            class="item channel_item"
                            >Dashboard</router-link
                        >
                        <router-link :to="{name : 'Setting'}" class="item channel_item">
                            Setting
                        </router-link>
                        <a href="help.html" class="item channel_item">Help</a>
                        <a href="feedback.html" class="item channel_item"
                            >Send Feedback</a
                        >
                        <div class="item channel_item" @click="signOut()">
                            Sign Out
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </header>
</template>

<script>
export default {
    name: "Header",
    props:[
        'user',
    ],
    mounted() {
        $(".new-dropdown").click(function () {
            if ($(".dropdown_account").css("display") == "none") {
                $(".dropdown_account").show();
            } else {
                $(".dropdown_account").hide();
            }
        });

        $(".notification-dropdown").click(function () {
            if ($(".dropdown_mn").css("display") == "none") {
                $(".dropdown_mn").show();
            } else {
                $(".dropdown_mn").hide();
            }
        });

        
        var tid = setInterval(function () {
            if ("complete" === document.readyState) {
                clearInterval(tid);
                var a = document.querySelector.bind(document),
                    b = document.querySelector(".vertical_nav"),
                    c = document.querySelector(".wrapper"),
                    d = document.getElementById("js-menu"),
                    e = d.querySelectorAll(".menu--item__has_sub_menu");
                (a(".toggle_menu").onclick = function () {
                    b.classList.toggle("vertical_nav__opened"),
                        c.classList.toggle("toggle-content");
                }),
                    (a(".collapse_menu").onclick = function () {
                        b.classList.toggle("vertical_nav__minify"),
                            c.classList.toggle("wrapper__minify");
                        for (var a = 0; a < e.length; a++)
                            e[a].classList.remove("menu--subitens__opened");
                    });
                for (var f = 0; f < e.length; f++)
                    e[f].classList.contains("menu--item__has_sub_menu") &&
                        e[f].querySelector(".menu--link").addEventListener(
                            "click",
                            function (a) {
                                for (var b = 0; b < e.length; b++)
                                    a.target.offsetParent != e[b] &&
                                        e[b].classList.remove(
                                            "menu--subitens__opened"
                                        );
                                a.target.offsetParent.classList.toggle(
                                    "menu--subitens__opened"
                                );
                            },
                            !1
                        );
            }
        }, 100);
    },
    methods:{
        signOut(){
            this.$emit('toggle-loader');
            axios
                .post(`${globalBaseUrl}instructor/logout`)
                .then((response) => {
                    this.$emit('toggle-loader');
                    if (response.data.status == 200) {
                        Vue.$toast.open({
                            message: "Logout",
                            type: "error",
                            position: "top-right",
                        });
                        this.$router.push({
                            name: "Login",
                        });
                    }
                })
                .catch((e) => {
                    this.$emit('toggle-loader');
                    Vue.$toast.open({
                        message: "Something Went Wrong",
                        type: "error",
                        position: "top-right",
                    });
                    console.log(e);
                });
        },
        closeDropdown(){
            $(".dropdown_account").hide();
            $(".dropdown_mn").hide();
        }
    }
};
</script>

<style></style>
