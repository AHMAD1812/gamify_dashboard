<template>
    <div class="sa4d25" style="min-height: 60vh;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="st_title">
                        <i class="uil uil-bell"></i> Notifications
                    </h2>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <!-- <router-link :to="{name:'Setting'}" class="setting_noti"
                        >Notification Setting</router-link> -->
                    <div class="all_msg_bg">
                        <UnavailableData
                            v-if="notifications.length == 0"
                            :message="'No notifications'"
                        ></UnavailableData>
                        <div class="channel_my item all__noti5"
                        v-for="(notification,key) in notifications"
                        :key="`notification_${key}`">
                            <div class="profile_link">
                                <img v-if="notification.user_to == notification.user_from" :src="`${globalBaseUrl}files/notification.png`" alt="" />
                                <img v-else :src="`${globalBaseUrl}${notification.user.profile_img ? notification.user.profile_img : 'images/left-imgs/img-1.jpg'}`" alt="" />
                                <div class="pd_content">
                                    <h6>{{ notification.user_to == notification.user_from ? 'Application' : notification.user.full_name }}</h6>
                                    <p class="noti__text5">
                                        {{ notification.message }}
                                    </p>
                                    <span class="nm_time">{{$moment(String(notification.created_at)).fromNow()}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import UnavailableData from '../layouts/UnavailableData.vue';

export default {
    name:"Notification",
    components:{
        UnavailableData
    },
    data(){
        return {
            notifications:[],
        }
    },
    async created(){
        try{
            
            this.$store.dispatch('toggleLoader',true);

            let response = await axios.get(`${globalBaseUrl}instructor/get_notifications`);
            this.notifications = response.data.data;

            this.$store.dispatch('toggleLoader',false);
        }catch(e){
            this.$store.dispatch('toggleLoader',false);
            Vue.$toast.open({
                message: "Something went wrong",
                type: "error",
                position: "top-right",
            });
        }

        
        
    }
};
</script>

<style></style>
