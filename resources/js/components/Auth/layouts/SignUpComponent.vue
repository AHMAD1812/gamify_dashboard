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
                            name="fullname"
                            value=""
                            id="id_fullname"
                            required=""
                            maxlength="64"
                            placeholder="Full Name"
                        />
                    </div>
                </div>
                <div class="ui search focus mt-15">
                    <div class="ui left icon input swdh11 swdh19">
                        <input
                            class="prompt srch_explore"
                            type="email"
                            name="emailaddress"
                            value=""
                            id="id_email"
                            required=""
                            maxlength="64"
                            placeholder="Email Address"
                        />
                    </div>
                </div>
                <div class="ui search focus mt-15">
                    <div class="ui left icon input swdh11 swdh19">
                        <input
                            class="prompt srch_explore"
                            type="password"
                            name="password"
                            value=""
                            id="id_password"
                            required=""
                            maxlength="64"
                            placeholder="Password"
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
                            />
                            <label
                                >I’m in for emails with exciting discounts and
                                personalized recommendations</label
                            >
                        </div>
                    </div>
                </div>
                <button class="login-btn" type="button" @click="showStep()">Next</button>
            </form>
            <form v-if="step_2">
                <select class="ui hj145 dropdown cntry152 prompt srch_explore" data-toggle='dropdown'>
                    <option value="">Select Category</option>
                    <option value="1">Development</option>
                    <option value="2">Business</option>
                    <option value="3">Finance & Accounting</option>
                    <option value="4">IT & Software</option>
                    <option value="5">Office Productivity</option>
                    <option value="6">Personal Development</option>
                    <option value="7">Design</option>
                    <option value="8">Marketing</option>
                    <option value="9">Lifestyle</option>
                    <option value="10">Photography</option>
                    <option value="11">Health & Fitness</option>
                    <option value="12">Music</option>
                    <option value="13">Teaching & Academics</option>
                </select>
                <div class="ui search focus mt-15">
                    <div class="ui form swdh30">
                        <div class="field">
                            <textarea
                                rows="3"
                                name="description"
                                id="id_about"
                                placeholder="Write a little description about you..."
                            ></textarea>
                        </div>
                    </div>
                    <div class="help-block">
                        Your biography should have at least 12000 characters.
                    </div>
                </div>
                <router-link :to="{name:'Dashboard'}">
                    <button class="login-btn" type="button">
                        Instructor Register Now
                    </button>
                </router-link>
            </form>
            <p class="sgntrm145">
                By signing up, you agree to our
                <a href="terms_of_use.html">Terms of Use</a> and
                <a href="terms_of_use.html">Privacy Policy</a>.
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
            step_1:true,
            step_2:false,
        }
    },
    mounted() {
        $(".ui.checkbox").checkbox();
        $(".select-dropdown").dropdown();
    },
    methods:{
        showStep(){
            this.step_1=false;
            this.step_2=true;
        }
    }
};
</script>

<style></style>
