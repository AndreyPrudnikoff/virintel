<template>
  <div>
    <main class="main">
      <div v-if="!isLoggedIn" class="container ">
        <div class="row main-content--wrapper">
          <section v-if="!forgotPass" class="main-content">
            <h1>Welcome back!</h1>
            <span class="signin">Let's get started!</span>
            <form @submit.prevent="submitHandler" class="login-form">
              <div class="row">
                <div class="col">
                  <input v-model="userData.email" type="email" class="form-control input-field" placeholder="Email"
                         required>
                  <span class="text-danger" v-if="errors.email">{{ errors.email[0] }}</span>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <input v-model="userData.password" id="password-field" type="password"
                         class="form-control input-field"
                         name="password"
                         placeholder="Password" required>
                  <span class="text-danger" v-if="errors.password">{{ errors.password[0] }}</span>
                  <span class="field-icon toggle-password"
                        v-bind:class="{'fa fa-eye fa-eye-slash': !slash, 'fa fa-fw fa-eye' : slash}"
                        v-on:click="slash = !slash"
                        @click="togglePassword"></span>
                </div>
              </div>
              <a id="forgot" @click.prevent="forgotPass = !forgotPass" href="#">Forgot password?</a>
              <input type="submit" value="Sign in" class="handle-btn-sbm"/>
            </form>
            <span>Don’t have an account? </span>
            <router-link to="/sign-up" class="already-have-acc"> Sign up</router-link>

          </section>

          <div v-else class="forgot_wrap">
            <div v-if="!submitedEmail" class="forgot">
              <h2 class="forgot_title">Forgot password?</h2>
              <p class="forgot_body">Please, enter your registered email address. We will get back to you with the
                reset password link.</p>
              <form>
                <input v-model="subEmail" class="form-control input-field" type="email" placeholder="E-mail" required>
                <button @click.prevent="submitEmail" class="handle-btn-sbm">Submit</button>
              </form>
            </div>
            <div v-else class="pop-up-wrapper">
              <div class="pop-up">
                <svg width="48" height="47" viewBox="0 0 48 47" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path
                      d="M46.2559 23.5C46.2559 35.635 36.3071 45.5 24.0003 45.5C11.6935 45.5 1.74463 35.635 1.74463 23.5C1.74463 11.365 11.6935 1.5 24.0003 1.5C36.3071 1.5 46.2559 11.365 46.2559 23.5Z"
                      stroke="#15416B" stroke-width="3"/>
                  <line y1="-1.5" x2="11.7708" y2="-1.5"
                        transform="matrix(0.705014 0.709193 -0.705014 0.709193 11.9136 23.499)" stroke="#15416B"
                        stroke-width="3"/>
                  <line y1="-1.5" x2="22.4738" y2="-1.5"
                        transform="matrix(-0.705859 0.708353 -0.705859 -0.708353 36.0864 15.9189)" stroke="#15416B"
                        stroke-width="3"/>
                </svg>

                <h2>Password has been reset!</h2>
                <button @click.prevent="closeModal" class="handle-btn-sbm">Close</button>
              </div>
            </div>
          </div>

        </div>
      </div>
      <div v-else>
        <ThankYou/>
      </div>
    </main>
  </div>
</template>

<script>
import OuterHeader from '@/components/OuterHeader.vue';
import User from "@/apis/User";
import ThankYou from "@/components/ThankYou";
import { mapGetters } from "vuex";

export default {
  name: 'Login',
  components: {
    ThankYou,
    OuterHeader
  },
  data() {
    return {
      forgotPass: false,
      submitedEmail: false,
      subEmail: '',
      slash: false,
      form: true,
      userData: {
        email: '',
        password: ''
      },
      errors: []
    }
  },
  methods: {
    togglePassword() {
      const passField =
          document.getElementById('password-field');
      if (passField.getAttribute('type') === "password") {
        passField.setAttribute('type', 'text');
      } else {
        passField.setAttribute('type', 'password');
      }
    },
    submitHandler() {
      User.login(this.userData)
          .then(response => {
            this.$store.commit("LOGIN", true);
            localStorage.setItem("token", response.data.access_token);
            this.form = false;
          })
          .catch(error => {
            if (error.response.status === 422) {
              this.errors = error.response.data.errors;
            }
          });
    },
    closeModal() {
      this.submitedEmail =!this.submitedEmail;
      this.forgotPass = !this.forgotPass;
    },
    submitEmail() {
      if (this.subEmail.length >= 3) {
        this.submitedEmail = !this.submitedEmail;
        this.subEmail = '';
      }
    }
  },
  computed: {
    ...mapGetters(["isLoggedIn"])
  },
  mounted() {
    if (this.isLoggedIn) {
      this.$store.dispatch('authUser')
    }
  }
}

</script>
<style scoped>
.forgot {
  text-align: center;
  max-width: 400px;
  margin: 50px 20px 0;
}

.forgot_title {
  font-family: Proxima Nova, sans-serif;
  font-style: normal;
  font-weight: bold;
  font-size: 21px;
  line-height: 26px;
  text-align: center;
}

.forgot_body {
  font-family: Proxima Nova, sans-serif;
  font-style: normal;
  font-weight: normal;
  font-size: 14px;
  line-height: 17px;
  margin: 20px 0;
}

.input-field:invalid {
  border-color: #ae1e1e;
  color: #ae1e1e;
}

.input-field:valid {
  border-color: green;
  color: #7d7d7d;
}

.login-form {
  position: relative;
}

#forgot {
  position: absolute;
  right: 0;
  margin-top: 10px;

}

.pop-up-wrapper {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100vh;
  background-color: rgba(0,0,0,.5);
  z-index: 9998;
  padding: 20px;
}

.pop-up {
  width: 550px;
  height: 245px;
  padding: 20px;
  position: absolute;
  z-index: 9999;
  background-color: #fff;
  border-radius: 12px ;
  position: absolute;
  left: 50%;
  top: 50%;
  transform: translate(-50%, -50%);
}

.main {
  min-height: calc(100vh - 140px); /*header*/
  margin-top: 60px;
}

.main-content {
  text-align: center;
  font-size: 15px;
  max-width: 350px;
  width: 100%;
}

.main-content--wrapper {
  display: flex;
  justify-content: center;
  text-align: center;
}

.signin {
  display: inline-block;
  margin-bottom: 10px;
}

.input-field {
  margin-top: 5px;
  margin-left: 5px;
  border-top: 0 !important;
  border-left: 0 !important;
  border-right: 0 !important;
  border-radius: 0;
  position: relative;
}

.main-content h1 {
  margin: 30px 0 10px 0;
  font-size: 21px;
  font-weight: bold;
}

.handle-btn-sbm {
  width: 163px;
  height: 40px;
  background: #15416B;
  border: 1px solid #15416B;
  border-radius: 20px;
  align-self: center;
  color: #fff;
  margin: 50px 0 30px 12px;
  cursor: pointer;
}

.handle-btn-sbm:hover {
  color: #15416B;
  background-color: #fff;
}

.form-control:focus {
  border-color: #ced4da !important;
  box-shadow: 0 0 0 0 rgba(0, 0, 0, .0) !important;
}

.toggle-password {
  position: absolute;
  right: 8px;
  top: 17px;
}

.main-content span {
  color: #7d7d7d;
}
</style>
