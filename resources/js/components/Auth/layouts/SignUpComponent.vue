<template>
    <span>
        <div class="sign_form" >
            <h2>Welcome to Gamify US</h2>
            <p>Register and Create Interactive Courses!</p>
            <form v-if="step_1">
                <div class="ui search focus">
                    <div class="ui left icon input swdh11 swdh19">
                        <input
                            class="prompt srch_explore"
                            type="text"
                            placeholder="Full Name"
                            v-model="name"
                        />
                    </div>
                </div>
                <div class="ui search focus mt-15">
                    <div class="ui left icon input swdh11 swdh19">
                        <input
                            class="prompt srch_explore"
                            type="email"
                            name="emailaddress"
                            placeholder="Email Address"
                            v-model="email"
                        />
                    </div>
                </div>
                <div class="ui search focus mt-15">
                    <div class="ui left icon input swdh11 swdh19">
                        <input
                            class="prompt srch_explore"
                            type="password"
                            name="password"
                            placeholder="Password"
                            v-model="password"
                        />
                    </div>
                </div>
                <div class="ui search focus mt-15">
                    <div class="ui left icon input swdh11 swdh19">
                        <input
                            class="prompt srch_explore"
                            type="password"
                            name="password"
                            placeholder="Confirm Password"
                            v-model="confirm_password"
                        />
                    </div>
                </div>
                <div class="ui form mt-30 checkbox_sign">
                    <div class="inline field">
                        <div class="ui checkbox mncheck">
                            <input
                                type="checkbox"
                                tabindex="0"
                                class="hidden"
                                v-model="isChecked"
                            />
                            <label
                                >I’m in for emails with exciting discounts and
                                personalized recommendations</label
                            >
                        </div>
                    </div>
                </div>
                <button class="login-btn mt-3" type="button" @click="showStep()">Next</button>
            </form>
            <form v-if="step_2">
                <sui-dropdown
                    multiple
                    fluid
                    placeholder="Select Category"
                    :max-selections="2"
                    class="cntry152 prompt srch_explore"
                    search
                    selection
                    allow-additions
                    :options="categoryOptions"
                    v-model="category"
                />
                <div class="ui search focus mt-15">
                    <div class="ui form swdh30">
                        <div class="field">
                            <textarea
                                rows="3"
                                name="description"
                                placeholder="Write a little description about you..."
                                v-model="bio"
                            ></textarea>
                        </div>
                    </div>
                </div>
                <!-- <router-link :to="{name:'Dashboard'}"> -->
                    <button class="login-btn mt-3" type="button" @click="register()">
                        Instructor Register Now
                    </button>
                <!-- </router-link> -->
            </form>
            <p class="sgntrm145">
                By signing up, you agree to our
                <a href="#">Terms of Use</a> and
                <a href="#">Privacy Policy</a>.
            </p>
            <p class="mb-0 mt-30">
                Already have an account?
                <router-link :to="{ name: 'Login' }">Log In</router-link>
            </p>
        </div>
    </span>
</template>

<script>
export default {
    name: "SignUpComponent",
    data(){
        return{
            name:"",
            email:"",
            password:"",
            confirm_password:"",
            step_1:true,
            step_2:false,
            category:null,
            categoryOptions:[],
            isChecked:false,
            bio:"",
        }
    },
    async mounted() {
        $(".ui.checkbox").checkbox();
        try {
            let response = await axios.get(`${globalBaseUrl}instructor/get_categories`);
            let category = response.data.data;
            this.categoryOptions = category.map((item)=>{
                return {
                    text:item.name,
                    value: item.id
                }
            });
        } catch (error) {
            console.log(error);
        }
    },
    methods:{
        showStep(){
            if(this.validateData('first')){
                this.$emit("toggle-loader");
                axios
                    .post(globalBaseUrl + "instructor/is_email_available", {
                        email: this.email,
                    })
                    .then((response) => {
                        if (response.data.status == 200) {
                            this.step_1=false;
                            this.step_2=true;
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
            }
        },
        register(){
            if(this.validateData('second')){
                this.$emit('toggle-loader');
                let formData = new FormData();
                formData.append('name', this.name);
                formData.append('email', this.email);
                formData.append('password', this.password);
                this.category.forEach((value, index) => {
                    formData.append(`category[${index}]`, value);
                });
                formData.append('bio', this.bio); 
                axios
                    .post(globalBaseUrl+"instructor/register_process",formData)
                    .then((response) => {
                        this.$emit("toggle-loader");
                        if (response.data.status == 200) {
                            Vue.$toast.open({
                                message: response.data.message,
                                type: "success",
                                position: "top-right",
                            });
                            this.$router.push({
                                name: "Login",
                            });
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
                        this.$emit("toggle-loader");
                        Vue.$toast.open({
                            message: "Something Went Wrong",
                            type: "error",
                            position: "top-right",
                        });
                        console.log(e);
                    });
            }
        },
        validateData(type){
            if(type == 'first'){
                if(this.name == ""){
                    this.errorToast("Full Name is required");
                    return false;
                }else if(this.email == ""){
                    this.errorToast("Email is required");
                    return false;
                }else if(this.password == "" || this.confirm_password == ""){
                    this.errorToast("Password are required");
                    return false;
                }else if(this.password != this.confirm_password){
                    this.errorToast("Password are not same");
                    return false;
                }
                return true;
            }else if (type == 'second'){
                if(this.category.length == 0){
                    this.errorToast("You must select atleast 1 category.");
                    return false;
                }else if(this.bio == ""){
                    this.errorToast("Biography is required");
                    return false;
                }
                return true;
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
    }
};
</script>

<style></style>
