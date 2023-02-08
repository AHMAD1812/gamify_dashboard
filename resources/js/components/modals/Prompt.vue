<template>
    <div
        class="modal fade"
        id="prompt_modal"
        tabindex="-1"
        role="dialog"
        aria-hidden="true"
    >
        <button type="button" class="d-none show-prompt" data-toggle="modal" data-target="#prompt_modal"></button>
        <div
            class="modal-dialog modal-dialog-centered"
            role="document"
            style="width: 350px;"
        >
            <div class="modal-content" style="border-radius: 20px">
                <form>
                    <div class="modal-body">
                        <div class="text-center member-card p-4">
                            <div class="thumb-lg member-thumb mx-auto">
                                <img
                                    :src="`${globalAssetUrl}files/${type}.png`"
                                    class="rounded-circle"
                                    id="user_image"
                                    alt="profile-image"
                                    width="25%"
                                    height="25%"
                                />
                            </div>
                        </div>
                        <div class="text-center mt-0 mb-3">
                            <h4 class="modal-success-title" v-if="type == 'success'">Success!</h4>
                            <h4 class="modal-warning-title" v-if="type == 'warning'">Warning!</h4>
                            <h4 class="modal-error-title" v-if="type == 'error'">Error!</h4>
                        </div>
                        <div class="text-center my-4">
                            <p>{{ message }}</p>
                        </div>
                        <div class="border-top-0 d-flex justify-content-center">
                            <button
                                type="button"
                                data-dismiss="modal"
                                class="modal-btn"
                                @click="$emit('btn-clicked')"
                                :class="`modal-btn-${type}`"
                            >
                                Ok
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Prompt",
    props:['type','message'],
};
</script>

<style></style>
