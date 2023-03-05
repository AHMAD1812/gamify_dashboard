<template>
    <div class="sa4d25">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="st_title">
                        <i class="uil uil-comments"></i> Messages
                    </h2>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="all_msg_bg">
                        <div class="row no-gutters">
                            <div class="col-xl-4 col-lg-5 col-md-12">
                                <div class="msg_search">
                                    <div class="ui search focus">
                                        <div
                                            class="ui left icon input swdh11 swdh15"
                                        >
                                            <input
                                                class="prompt srch_explore"
                                                type="text"
                                                placeholder="Search Messages..."
                                            />
                                            <i
                                                class="uil uil-search-alt icon icon8"
                                            ></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="simplebar-content-wrapper">
                                    <div class="group_messages" v-if="chats.length != 0">
                                        <chatCard
                                            v-for="(chat, key) in chats"
                                            :key="`chat_card_${key}`"
                                            :chat="chat"
                                            :is_active="current_chat.id == chat.id ? true : false"
                                            @getChat="currentChatMessages"
                                        >
                                        </chatCard>
                                    </div>
                                    <div class="mt-3" v-if="chat_loading">
                                        <SpinnerLoader :loading="true" color="#3D54b4"></SpinnerLoader>
                                    </div>

                                </div>
                            </div>
                            <div class="col-xl-8 col-lg-7 col-md-12">
                                <div class="chatbox_right">
                                    <div class="chat_header">
                                        <div class="user-status">
                                            <div class="user-avatar">
                                                <img
                                                    :src="`${globalBaseUrl}${
                                                        current_chat_user.profile_img
                                                            ? current_chat_user.profile_img
                                                            : 'images/left-imgs/img-1.jpg'
                                                    }`"
                                                    alt=""
                                                />
                                            </div>
                                            <p class="user-status-title">
                                                <span class="bold">{{
                                                    current_chat_user.full_name
                                                }}</span>
                                            </p>
                                            <p class="user-status-tag">
                                                {{
                                                    current_chat_user.biography
                                                        ? current_chat_user
                                                              .biography
                                                              .length > 25
                                                            ? current_chat_user.biography.substr(
                                                                  0,
                                                                  24
                                                              )
                                                            : current_chat_user.biography
                                                        : "No bio added"
                                                }}
                                            </p>
                                            <div
                                                class="user-status-time floaty eps_dots eps_dots5 more_dropdown"
                                            >
                                                <a href="#"
                                                    ><i
                                                        class="uil uil-ellipsis-h"
                                                    ></i
                                                ></a>
                                                <div class="dropdown-content">
                                                    <span
                                                        ><i
                                                            class="uil uil-trash-alt"
                                                        ></i
                                                        >Delete</span
                                                    >
                                                    <span
                                                        ><i
                                                            class="uil uil-ban"
                                                        ></i
                                                        >Block</span
                                                    >
                                                    <span
                                                        ><i
                                                            class="uil uil-windsock"
                                                        ></i
                                                        >Report</span
                                                    >
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="messages-line simplebar-content-wrapper2 scrollstyle_4"
                                        :class="messages.length != 0 && !message_loading ? 'scroll-bottom' : ''"
                                    >
                                        <ul v-if="messages.length != 0 && !message_loading">
                                            <div
                                                v-for="(
                                                    message, key
                                                ) in messages"
                                                :key="`message-${key}`"
                                                class="main-message-box"
                                                :class="
                                                    message.sender.id == user.id
                                                        ? 'ta-right'
                                                        : 'st3'
                                                "
                                            >
                                                <div
                                                    class="message-dt"
                                                    :class="
                                                        message.sender.id !=
                                                        user.id
                                                            ? 'st3'
                                                            : ' '
                                                    "
                                                >
                                                    <div
                                                        class="message-inner-dt"
                                                    >
                                                        <div class="box">
                                                            {{
                                                                message.message
                                                            }}
                                                        </div>
                                                        <div>
                                                            {{$moment(String(message.created_at)).fromNow()}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- <div class="main-message-box st3">
                                                <div class="message-dt st3">
                                                    <div
                                                        class="message-inner-dt"
                                                    >
                                                        <p>....</p>
                                                    </div>
                                                    <span>Typing...</span>
                                                </div>
                                            </div> -->
                                        </ul>
                                        <div class="mt-5" v-if="message_loading">
                                            <SpinnerLoader :loading="true" color="#3D54b4"></SpinnerLoader>
                                        </div>
                                    </div>
                                    <div class="message-send-area">
                                        <form @submit="addMessage">
                                            <div class="mf-field">
                                                <div
                                                    class="ui search focus input__msg"
                                                >
                                                    <div
                                                        class="ui left icon input swdh19"
                                                    >
                                                        <input
                                                            class="prompt srch_explore"
                                                            type="text"
                                                            name="chat_widget_message_text_2"
                                                            placeholder="Write a message..."
                                                            v-model="
                                                                text_message
                                                            "
                                                        />
                                                    </div>
                                                </div>
                                                <div v-if="sending">
                                                    <SpinnerLoader :loading="true" color="#3D54b4"></SpinnerLoader>
                                                </div>
                                                <button
                                                    class="add_msg"
                                                    type="submit"
                                                    v-else
                                                >
                                                    <i
                                                        class="uil uil-message"
                                                    ></i>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
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
import chatCard from "./components/chatCard.vue";
export default {
    name: "Chat",
    components: {
        chatCard,
    },
    data() {
        return {
            chats: [],
            current_chat_user: {},
            current_chat: {},
            messages: [],
            text_message: "",
            chat_loading:true,
            message_loading:true,
            sending:false,
        };
    },
    mounted() {
       this.getCurrentChats(true);
        socket.on("message_send", (data) => {
            console.log(data);
            if (data.data.chat.id == this.current_chat.id) {
                this.getCurrentChats(false);
                this.messages.push(data.data.message);
            }
        });
    },
    methods: {
        getCurrentChats(message){
            axios
            .post(`${globalBaseUrl}instructor/get_current_chats`, {
                type: "current",
            })
            .then((response) => {
                if (response.data.status == 200) {
                    this.chats = response.data.data.data;
                    if (this.chats.length > 0 && message) {
                        this.currentChatMessages(this.chats[0]);
                    }
                } else {
                    Vue.$toast.open({
                        message: "Error Occured",
                        type: "warning",
                        position: "top-right",
                    });
                }
                this.chat_loading = false;
            })
            .catch((e) => {
                console.log(e);
                Vue.$toast.open({
                    message: "Someting went wrong",
                    type: "error",
                    position: "top-right",
                });
                this.chat_loading = false;
            });
        },
        currentChatMessages(chat) { 
            this.current_chat_user =
                            this.user.id == chat.sender.id
                                ? chat.receiver
                                : chat.sender;
            
            this.current_chat = chat;                                
            let chat_id = chat.id;                                
            this.message_loading = true;
            axios
                .post(`${globalBaseUrl}instructor/get_chat`, {
                    chat_id: chat_id,
                })
                .then((response) => {
                    if (response.data.status == 200) {
                        response = response.data.data;
                        this.messages = response.message.data;
                    } else {
                        Vue.$toast.open({
                            message: "Error Occured",
                            type: "warning",
                            position: "top-right",
                        });
                    }
                    this.message_loading = false;
                })
                .catch((e) => {
                    this.message_loading = false;
                    console.log(e);
                    Vue.$toast.open({
                        message: "Someting went wrong",
                        type: "warning",
                        position: "top-right",
                    });
                });
        },
        addMessage(e) {
            e.preventDefault();
            if (this.text_message == "") {
                Vue.$toast.open({
                    message: "Message Required",
                    type: "error",
                    position: "top-right",
                });
                return;
            }
            this.sending = true;
            axios
                .post(`${globalBaseUrl}instructor/add_message`, {
                    chat_id: this.current_chat.id,
                    type: "text",
                    message: this.text_message,
                })
                .then((response) => {
                    if (response.data.status == 200) {
                        this.text_message = "";
                        socket.emit("message_send", response.data.data);
                        // this.messages.push(response.message);
                    } else {
                        Vue.$toast.open({
                            message: "Error Occured",
                            type: "warning",
                            position: "top-right",
                        });
                    }
                    this.sending = false;
                })
                .catch((e) => {
                    console.log(e);
                    Vue.$toast.open({
                        message: "Someting went wrong",
                        type: "warning",
                        position: "top-right",
                    });
                    this.sending = false;
                });
        },
    },
    computed: {
        user() {
            return this.$store.state.user;
        },
    },
};
</script>

<style></style>
