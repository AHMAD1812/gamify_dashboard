<template>
    <div class="sa4d25">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="st_title">
                        <i class="uil uil-comment-info-alt"></i> Send Feedback
                    </h2>
                    <div class="row">
                        <div class="col-lg-6 col-md-8">
                            <div class="ui search focus">
                                <div class="ui left icon input swdh11 swdh19">
                                    <input
                                        class="prompt srch_explore"
                                        type="text"
                                        value=""
                                        maxlength="64"
                                        placeholder="Title"
                                        v-model="title"
                                    />
                                </div>
                            </div>
                            <div class="ui search focus mt-30">
                                <div class="ui form swdh30">
                                    <div class="field">
                                        <textarea
                                            rows="6"
                                            name="description"
                                            id="id_about"
                                            placeholder="Describe your issue or share your ideas"
                                            v-model="description"
                                        ></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group1 mt-30">
                                <label for="file5">Add Screenshots</label>
                                <div class="image-upload-wrap">
                                    <input
                                        class="file-upload-input"
                                        id="file5"
                                        type="file"
                                        @change="addFile"
                                        accept="image/*"
                                    />
                                    <div class="drag-text">
                                        <i class="fas fa-cloud-upload-alt"></i>
                                        <h4>Select screenshots to upload</h4>
                                    </div>
                                    <div class="text-success text-center my-3">
                                        File Added
                                    </div>
                                </div>
                            </div>
                            <button class="save_btn" type="button" @click="addFeedback">
                                Send Feedback
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name:'Feedback',
    data(){
        return {
            title:"",
            description:"",
            file:null,
        }
    },
    methods:{
        addFile(e){
            this.file = e.target.files[0];
        },
        addFeedback() {
            if(this.title == "" || this.description == ""){
                Vue.$toast.open({
                    message: "Title & Description Required",
                    type: "error",
                    position: "top-right",
                });
                return;
            }
            this.$store.dispatch('toggleLoader',true);
            const config = {
                headers: {
                    "Content-Type": "multipart/form-data",
                },
            };

            let formData = new FormData();
            formData.append('title',this.title);
            formData.append('description',this.description);
            if(this.file){
                formData.append('file',this.file);
            }
            axios
                .post(`${globalBaseUrl}instructor/add_feedback`, formData, config)
                .then((response) => {
                    this.$store.dispatch('toggleLoader',false);
                    if (response.data.status == 200) {
                        Vue.$toast.open({
                            message: 'Feedback Added',
                            type: "success",
                            position: "top-right",
                        });
                        this.title = "";
                        this.description = "";
                        this.file = null;
                    }
                    if (response.data.status == 400) {
                        Vue.$toast.open({
                            message: response.data.message,
                            type: "warning",
                            position: "top-right",
                        });
                    }
                })
                .catch((e) => {
                    this.$store.dispatch('toggleLoader',false);
                    Vue.$toast.open({
                        message: "Something Went Wrong",
                        type: "error",
                        position: "top-right",
                    });
                    console.log(e);
                });
        },
    }
};
</script>

<style></style>
