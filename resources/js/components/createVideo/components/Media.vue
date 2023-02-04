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
                            v-model="video_type"
                            checked
                        /><span :class="[video_type == 'mp4' ? 'selected' : '']"
                            >HTML5(mp4)</span
                        ></label
                    >
                    <label
                        ><input
                            type="radio"
                            class="d-none"
                            name="colorRadio"
                            :value="'url'"
                            v-model="video_type"
                        /><span :class="[video_type == 'url' ? 'selected' : '']"
                            >External URL</span
                        ></label
                    >
                    <div
                        class="intro-box"
                        :class="[video_type == 'mp4' ? 'd-block' : '']"
                    >
                        <div class="row">
                            <div class="col-lg-5 col-md-12">
                                <div class="upload-file-dt mt-30">
                                    <div class="upload-btn">
                                        <input
                                            class="uploadBtn-main-input"
                                            type="file"
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
                                    <span class="uploaded-id"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                        class="intro-box"
                        :class="[video_type == 'url' ? 'd-block' : '']"
                    >
                        <div class="new-section">
                            <div class="ui search focus mt-30 lbel25">
                                <label>External URL*</label>
                                <div class="ui left icon input swdh19">
                                    <input
                                        class="prompt srch_explore"
                                        type="text"
                                        placeholder="External Video URL"
                                        name=""
                                        id=""
                                        value=""
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
                                    thumbnail == null
                                        ? `${globalBaseUrl}images/thumbnail-demo.jpg`
                                        : thumbnail
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
    name:'Media',
    data(){
        return{
            video_type: "mp4",
            thumbnail:null,
        }
    },
    methods:{
        onThumbnailSelected(e){
            const file = e.target.files[0];
            this.thumbnail = URL.createObjectURL(file);
        }
    }
};
</script>

<style></style>
