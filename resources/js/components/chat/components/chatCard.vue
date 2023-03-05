<template>
    <div class="chat__message__dt" :class="[is_active ? 'active' : '']"
        @click="$emit('getChat',chat)">
        <div class="user-status">
            <div class="user-avatar">
                <img
                    :src="`${globalBaseUrl}${chat.receiver.profile_img ? chat.receiver.profile_img : 'images/left-imgs/img-1.jpg'}`"
                    v-if="user.id == chat.sender.id"
                />
                <img
                    :src="`${globalBaseUrl}${chat.sender.profile_img ? chat.sender.profile_img : 'images/left-imgs/img-1.jpg'}`"
                    v-else
                />
                <div class="msg__badge">{{ chat.get_messages_count }}</div>
            </div>
            <p class="user-status-title">
                <span class="bold">
                    {{ user.id == chat.sender.id ? chat.receiver.full_name : chat.sender.full_name}}</span>
            </p>
            <p class="user-status-text">
                {{ chat.last_message ? chat.last_message.message : '' }}
            </p>
            <p class="user-status-time floaty">{{$moment(String(chat.updated_at)).fromNow()}}</p>
        </div>
    </div>
</template>

<script>
export default {
    name: "chatCard",
    props:['chat','is_active'],
    computed:{
      user() {
        return this.$store.state.user;
      }
    }
};
</script>

<style></style>
