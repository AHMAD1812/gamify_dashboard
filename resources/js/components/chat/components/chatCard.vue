<template>
    <div class="chat__message__dt" :class="[is_active ? 'active' : '']">
        <div class="user-status">
            <div class="user-avatar">
                <img
                    :src="`${globalBaseUrl}images/left-imgs/img-1.jpg`"
                    alt=""
                />
                <div class="msg__badge">2</div>
            </div>
            <p class="user-status-title">
                <span class="bold">John Doe</span>
            </p>
            <p class="user-status-text">
                Hi! Sir, How are you. I ask you one thing please explain it this
                video price.
            </p>
            <p class="user-status-time floaty">7 hours ago</p>
        </div>
    </div>
</template>

<script>
export default {
    name: "chatCard",
    props:['is_active']
};
</script>

<style></style>
