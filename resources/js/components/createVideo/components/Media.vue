<template>
    <div>
        <div class="tab-from-content">
            <div class="title-icon">
                <h3 class="title"><i class="uil uil-image"></i>Media</h3>
            </div>
            <div class="lecture-video-dt mb-30">
                <span class="video-info"
                    >Video overview provider type. (.mp4, YouTube)</span
                >
                <div class="video-category">
                    <label
                        ><input
                            type="radio"
                            name="colorRadio"
                            class="d-none"
                            :value="'mp4'"
                            v-model="request.video_type"
                            checked
                        /><span :class="[request.video_type == 'mp4' ? 'selected' : '']"
                            >HTML5(mp4)</span
                        ></label
                    >
                    <label
                        ><input
                            type="radio"
                            class="d-none"
                            name="colorRadio"
                            :value="'url'"
                            v-model="request.video_type"
                        /><span :class="[request.video_type == 'url' ? 'selected' : '']"
                            >External URL</span
                        ></label
                    >
                    <div
                        class="intro-box"
                        :class="[request.video_type == 'mp4' ? 'd-block' : '']"
                    >
                        <div class="row">
                            <div class="col-lg-5 col-md-12">
                                <div class="upload-file-dt mt-30">
                                    <div class="upload-btn">
                                        <input
                                            class="uploadBtn-main-input"
                                            type="file"
                                            @change="addVideo($event)"
                                            accept="video/*"
                                            id="IntroFile__input--source"
                                        />
                                        <label
                                            for="IntroFile__input--source"
                                            title="Zip"
                                            >Upload Video</label
                                        >
                                    </div>
                                    <span class="uploadBtn-main-file"
                                        >File Format: .mp4</span
                                    >
                                    <span class="uploaded-id"
                                        v-if="request.video != null"
                                        >Video Attached
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                        class="intro-box"
                        :class="[request.video_type == 'url' ? 'd-block' : '']"
                    >
                        <div class="new-section">
                            <div class="ui search focus mt-30 lbel25">
                                <label>External URL*</label>
                                <div class="ui left icon input swdh19">
                                    <input
                                        class="prompt srch_explore"
                                        type="text"
                                        placeholder="External Video URL"
                                        v-model="request.video_link"
                                    />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="thumbnail-into">
                <div class="row">
                    <div class="col-lg-5 col-md-6">
                        <label class="label25 text-left"
                            >Course thumbnail*</label
                        >
                        <div class="thumb-item">
                            <img
                                :src="
                                    request.thumbnail == null
                                        ? `${globalBaseUrl}images/thumbnail-demo.jpg`
                                        : request.thumbnail
                                "
                                alt=""
                            />
                            <div class="thumb-dt">
                                <div class="upload-btn">
                                    <input
                                        class="uploadBtn-main-input"
                                        type="file"
                                        @change="onThumbnailSelected"
                                        id="ThumbFile__input--source"
                                    />
                                    <label
                                        for="ThumbFile__input--source"
                                        title="Zip"
                                        >Choose Thumbnail</label
                                    >
                                </div>
                                <span class="uploadBtn-main-file"
                                    >Size: 590x300 pixels. Supports: jpg,jpeg,
                                    or png</span
                                >
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Media",
    data() {
        return {
            request: {
                video_type: "mp4",
                thumbnail: null,
                thumbnail_file: null,
                video: null,
                video_link: "",
            },
        };
    },
    methods: {
        addMedia() {
            if (this.validateData()) {
                this.$emit("add-media", this.request);
            }
        },
        addVideo(e) {
            this.request.video = e.target.files[0];
        },
        onThumbnailSelected(e) {
            const file = e.target.files[0];
            this.request.thumbnail_file = file;
            this.request.thumbnail = URL.createObjectURL(file);
        },
        validateData() {
            if(this.request.video == null && this.request.video_link == "" ){
                this.errorToast("Video required");
                return false;
            }else if(this.request.thumbnail_file == null){
                this.errorToast("Thumbnail required");
                return false;
            }
            return true;
        },
        errorToast(message) {
            Vue.$toast.open({
                message: message,
                type: "error",
                position: "top-right",
            });
        },
    },
};
</script>

<style></style>
