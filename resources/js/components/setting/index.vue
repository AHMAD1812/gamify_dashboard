<template>
  <div class="sa4d25">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12">
              <h2 class="st_title"><i class="uil uil-cog"></i> Setting</h2>
              <div class="setting_tabs">
                <ul class="nav nav-pills my-3" id="pills-tab" role="tablist">
                  <li class="nav-item">
                    <a
                      class="nav-link active"
                      id="pills-account-tab"
                      data-toggle="pill"
                      href="#pills-account"
                      role="tab"
                      aria-selected="true"
                      >Account</a
                    >
                  </li>
                  <li class="nav-item">
                    <a
                      class="nav-link"
                      id="pills-notification-tab"
                      data-toggle="pill"
                      href="#pills-notification"
                      role="tab"
                      aria-selected="false"
                      >Notification</a
                    >
                  </li>
                  <li class="nav-item">
                    <a
                      class="nav-link"
                      id="pills-privacy-tab"
                      data-toggle="pill"
                      href="#pills-privacy"
                      role="tab"
                      aria-selected="false"
                      >Privacy</a
                    >
                  </li>
                  <li class="nav-item">
                    <a
                      class="nav-link"
                      id="pills-closeaccount-tab"
                      data-toggle="pill"
                      href="#pills-closeaccount"
                      role="tab"
                      aria-selected="false"
                      >Close Account</a
                    >
                  </li>
                </ul>
              </div>
              <div class="tab-content setting-content" id="pills-tabContent">
                <div
                  class="tab-pane fade show active"
                  id="pills-account"
                  role="tabpanel"
                  aria-labelledby="pills-account-tab"
                >
                  <div class="account_setting">
                    <h4>Your Gamify Account</h4>
                    <p>
                      This is your public presence on Gamify US.
                    </p>
                    <div class="basic_profile">
                      <div class="basic_ptitle">
                        <h4>Basic Profile</h4>
                        <p>Add information about yourself</p>
                      </div>
                      <div class="basic_form">
                        <div class="row">
                          <div class="col-lg-8">
                              <div class="avatar-upload">
                                  <div class="avatar-edit">
                                      <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" @change="onImageSelected"/>
                                      <label for="imageUpload">
                                        <i class="uil uil-edit-alt"></i>
                                      </label>
                                  </div>
                                  <div class="avatar-preview">
                                      <img v-if="file==null" :src="image==null?`${globalAssetUrl}images/avatar.png`:`${globalAssetUrl}${image}`"/>
                                      <img v-else :src="image"/>
                                  </div>
                              </div>
                          </div>
                          <div class="col-lg-8">
                            <div class="row">
                              <div class="col-lg-12">
                                <div class="ui search focus mt-30">
                                  <div class="ui left icon input swdh11 swdh19">
                                    <input
                                      class="prompt srch_explore"
                                      type="text"
                                      name="name"
                                      placeholder="First Name"
                                      v-model="full_name"
                                    />
                                  </div>
                                </div>
                              </div>
                              <div class="col-lg-12">
                                <div class="ui search focus mt-30">
                                  <div class="ui left icon input swdh11 swdh19">
                                    <input
                                      class="prompt srch_explore"
                                      type="email"
                                      name="email"
                                      value="Joginder"
                                      placeholder="Email"
                                      v-model="email"
                                      readonly
                                    />
                                  </div>
                                </div>
                              </div>
                              <div class="col-lg-12">
                                <div class="ui search focus mt-30">
                                  <div class="ui form swdh30">
                                    <div class="field">
                                      <textarea
                                        rows="3"
                                        name="description"
                                        id="id_about"
                                        v-model="bio"
                                        placeholder="Write a little description about you..."
                                      ></textarea>
                                    </div>
                                  </div>
                                  <div class="help-block">
                                    Links and coupon codes are not permitted in
                                    this section.
                                  </div>
                                </div>
                              </div>
                              <div class="col-lg-12">
                                <div class="divider-1"></div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="basic_profile1">
                      <div class="basic_ptitle">
                        <h4>Profile Links</h4>
                      </div>
                      <div class="basic_form">
                        <div class="row">
                          <div class="col-lg-8">
                            <div class="row">
                              <div class="col-lg-12">
                                <div class="ui search focus mt-30">
                                  <div
                                    class="ui left icon labeled input swdh11 swdh31"
                                  >
                                    <div class="ui label lb12">
                                      http://facebook.com/
                                    </div>
                                    <input
                                      class="prompt srch_explore"
                                      type="text"
                                      name="facebooklink"
                                      placeholder="Facebook Profile"
                                      v-model="facebook"
                                    />
                                  </div>
                                  <div class="help-block">
                                    Add your Facebook username
                                  </div>
                                </div>
                              </div>
                              <div class="col-lg-12">
                                <div class="ui search focus mt-30">
                                  <div
                                    class="ui left icon labeled input swdh11 swdh31"
                                  >
                                    <div class="ui label lb12">
                                      http://www.linkedin.com/
                                    </div>
                                    <input
                                      class="prompt srch_explore"
                                      type="text"
                                      name="linkedinlink"
                                      placeholder="Linkedin Profile"
                                      v-model="linkedin"
                                    />
                                  </div>
                                  <div class="help-block">
                                    Input your LinkedIn resource id.
                                  </div>
                                </div>
                              </div>
                              <div class="col-lg-12">
                                <div class="ui search focus mt-30">
                                  <div
                                    class="ui left icon labeled input swdh11 swdh31"
                                  >
                                    <div class="ui label lb12">
                                      http://www.youtube.com/
                                    </div>
                                    <input
                                      class="prompt srch_explore"
                                      type="text"
                                      name="youtubelink"
                                      placeholder="Youtube Profile"
                                      v-model="youtube"
                                    />
                                  </div>
                                  <div class="help-block">
                                    Input your Youtube username.
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <button class="save_btn" type="button" @click="updateProfile">Save Changes</button>
                  </div>
                </div>
                <div
                  class="tab-pane fade"
                  id="pills-notification"
                  role="tabpanel"
                  aria-labelledby="pills-notification-tab"
                >
                  <div class="account_setting">
                    <h4>Notifications - Choose when and how to be notified</h4>
                    <p>
                      Select push and email notifications you'd like to receive
                    </p>
                    <div class="basic_profile">
                      <div class="basic_form">
                        <div class="nstting_content">
                          <div class="basic_ptitle">
                            <h4>Choose when and how to be notified</h4>
                          </div>
                          <div class="checkbox _1457s2">
                            <sui-checkbox label="Subscriptions" toggle />
                            <p class="ml5">
                              Notify me about activity from the profiles I'm
                              subscribed to
                            </p>
                          </div>
                          <div class=" checkbox _1457s2">
                            <sui-checkbox label="Recommended Courses" toggle />
                            <p class="ml5">
                              Notify me of courses I might like based on what I
                              watch
                            </p>
                          </div>
                          <div class=" checkbox _1457s2">
                            <sui-checkbox label="Activity on my comments" toggle />
                            <p class="ml5">
                              Notify me about activity on my comments on others’
                              courses
                            </p>
                          </div>
                          <div class=" checkbox _1457s2">
                            <sui-checkbox label="Replies to my comments" toggle />
                            <p class="ml5">
                              Notify me about replies to my comments
                            </p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="divider-1 mb-50"></div>
                    <div class="basic_profile">
                      <div class="basic_form">
                        <div class="nstting_content">
                          <div class="basic_ptitle">
                            <h4>Email notifications</h4>
                            <p>
                              Your emails are sent to
                              <a
                                href="https://gambolthemes.net/cdn-cgi/l/email-protection"
                                class="__cf_email__"
                                data-cfemail="15727478777a792c2126557278747c793b767a783b"
                                >[email&#160;protected]</a
                              >
                              To unsubscribe from an email, click the
                              "Unsubscribe" link at the bottom of it.
                              <a href="#">Learn more</a> about emails from
                              Edututs+.
                            </p>
                          </div>
                          <div class="checkbox _1457s2">
                            <sui-checkbox label="Send me emails about my Cursus activity and updates I requested" toggle />
                            <p class="ml5">
                              If this setting is turned off, Cursus may still
                              send you messages regarding your account, required
                              service announcements, legal notifications, and
                              privacy matters
                            </p>
                          </div>
                          <div class="checkbox _1457s2">
                            <sui-checkbox label="Promotions, course recommendations, and helpful resources from Cursus." toggle />
                          </div>
                          <div class="checkbox _1457s2">
                            <sui-checkbox label="Announcements from instructors whose course(s)
                              I’m enrolled in." toggle />
                            <p class="ml5">
                              To adjust this preference by course, leave this
                              box checked and go to the course dashboard and
                              click on "Options" to opt in or out of specific
                              announcements.
                            </p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <button class="save_btn" type="submit">Save Changes</button>
                  </div>
                </div>
                <div
                  class="tab-pane fade"
                  id="pills-privacy"
                  role="tabpanel"
                  aria-labelledby="pills-privacy-tab"
                >
                  <div class="account_setting">
                    <h4>Privacy</h4>
                    <p>Modify your privacy settings here.</p>
                    <div class="basic_profile">
                      <div class="basic_form">
                        <div class="nstting_content">
                          <div class="basic_ptitle">
                            <h4>Profile page settings</h4>
                          </div>
                          <div class="checkbox _1457s2">
                            <input type="checkbox" name="stream_ss8" checked />
                            <label>Show your profile on search engines</label>
                          </div>
                          <div class="checkbox _1457s2">
                            <input type="checkbox" name="stream_ss9" />
                            <label
                              >Show courses you're taking on your profile
                              page</label
                            >
                          </div>
                        </div>
                      </div>
                    </div>
                    <button class="save_btn" type="submit">Save Changes</button>
                  </div>
                </div>
                <div
                  class="tab-pane fade"
                  id="pills-closeaccount"
                  role="tabpanel"
                  aria-labelledby="pills-closeaccount-tab"
                >
                  <div class="account_setting">
                    <h4>Close account</h4>
                    <p>
                      <strong>Warning:</strong> If you close your account, you
                      will be unsubscribed from all your 5 courses, and will
                      lose access forever.
                    </p>
                  </div>
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="ui search focus mt-30">
                        <div class="ui left icon input swdh11 swdh19">
                          <input
                            class="prompt srch_explore"
                            type="password"
                            name="yourassword"
                            id="id_yourpassword"
                            required=""
                            maxlength="64"
                            placeholder="Enter Your Password"
                          />
                        </div>
                        <div class="help-block">
                          Are you sure you want to close your account?
                        </div>
                      </div>
                      <button class="save_payout_btn mbs20" type="submit">
                        Close Account
                      </button>
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
export default {
    name:"Setting",
    data(){
      return{
        user:{},
        full_name:"",
        email:"",
        bio:"",
        facebook:"",
        linkedin:"",
        youtube:"",
        image:null,
        file:null,
      }
    },
    async mounted(){
      try{
          this.$emit('toggle-loader');
          let response = await axios.get(`${globalBaseUrl}instructor/user_profile`);
          let user = response.data.data;
          this.user=user;
          this.full_name = user.full_name;
          this.email = user.email;
          this.bio = user.biography;
          this.facebook=user.facebook==null?"":user.facebook;
          this.youtube=user.youtube == null ? "" : user.youtube;
          this.linkedin=user.linkedin == null ? "" : user.linkedin;
          this.image=user.profile_img;
          this.$emit('toggle-loader');
        }catch(e){
          this.$emit('toggle-loader');
          console.log(e);
        }
    },
    methods:{
      updateProfile(){
        if(this.validateInput()){
          try{
            this.$emit("toggle-loader");
            let formData=new FormData();
            formData.append('full_name',this.full_name);
            formData.append('biography',this.bio);
            if(this.facebook!=""){
              formData.append('facebook',this.facebook);
            }
            if(this.linkedin!=""){
              formData.append('linkedin',this.linkedin);
            }
            if(this.youtube!=""){
              formData.append('youtube',this.youtube);
            }
            if(this.file != null){
              formData.append('profile_image',this.file);
            }
            axios
            .post(`${globalBaseUrl}instructor/update_profile`,formData)
            .then((response) => {
                if (response.data.status == 200) {
                    Vue.$toast.open({
                      message: response.data.message,
                      type: "success",
                      position: "top-right",
                    });
                    this.$emit("profile-updated",response.data.data)
                }
                if (response.data.status == 400) {
                    Vue.$toast.open({
                        message: response.data.message,
                        type: "warning",
                        position: "top-right",
                    });
                }
                this.$emit("toggle-loader");
            })
            .catch((e) => {
                this.$emit("toggle-loader");
                Vue.$toast.open({
                    message: "Something Went Wrong",
                    type: "error",
                    position: "top-right",
                });
                console.log(e);
            });
          }catch(e){
            this.$emit('toogle-loader');
            console.log(e);
          }
        }
      },
      onImageSelected(e){
        this.file=e.target.files[0];
        this.image=URL.createObjectURL(this.file);
      },
      validateInput(){
        if(this.full_name==""){
          this.errorToast('Name is Required');
          return false;
        }else if(this.bio == ""){
          this.errorToast("Bio is required")
          return false;
        }
        return true;
      },
      errorToast(message){
        Vue.$toast.open({
          type:'error',
          message:message,
          position:'top-right'
        })
      }
    }
}
</script>

<style>

</style>