<template>
  <div>
    <main class="main">
      <div class="container">
        <div class="row  selected-main">
          <section v-if="form" class="main-content">
            <h1>Welcome!</h1>
            <span class="signup">Sign up</span>
            <form @submit.prevent="submitHandler" class="login-form">
              <div class="row">
                <div class="col">
                  <input v-model.trim="user.name" @input="testName" type="text" class="form-control input-field"
                         placeholder="Full name"
                         minlength="2"
                         maxlength="255"
                         required>
                  <span v-if="!nameChecked" class="d-block pl-3 check-pass invalid">Enter your first and last name separated by space. Capitalized words. Not numbers</span>
                </div>
              </div>
              <div class="row form-group">
                <div class="col">
                  <input v-model.trim="user.email" type="email" class="form-control input-field"
                         name="email"
                         placeholder="Email"
                         minlength="5"
                         maxlength="255"
                         required>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <input v-model="user.password" @input="testPass1" type="password" class="form-control input-field"
                         id="password-field1"
                         placeholder="Password">
                  <span v-if="!passChecked" class="d-block pl-3 check-pass invalid">Password must contain at least one special character, one capital letter and be at least 12 characters long</span>
                  <span class="field-icon toggle-password"
                        v-bind:class="{'fa fa-eye fa-eye-slash': !slash, 'fa fa-fw fa-eye' : slash}"
                        v-on:click="slash = !slash"
                        @click="togglePassword"></span>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <input v-model="user.password_confirmation" @blur="touchHandler" @input="touchHandler" type="password" class="form-control input-field"
                         id="password-field2"
                         placeholder="Password confirmation">
                  <span class="field-icon toggle-password"
                        v-bind:class="{'fa fa-eye fa-eye-slash': !slash, 'fa fa-fw fa-eye' : slash}"
                        v-on:click="slash = !slash"
                        @click="togglePassword"></span>
                  <span class="invalid" v-show="!passwordConfirmed">Passwords must match</span>
                </div>
              </div>
              <input type="submit" value="Register" class="handle-btn-sbm"/>
            </form>
            <span>Have an account?</span>
            <router-link to="/login" class="already-have-acc"> Sign in</router-link>
          </section>
          <div v-else class="container mt-5">
            <div id="thankyou">Thank you, <p class="userName">{{ user.name }}!</p>
              <!--              <br> Your virintelID-->
              <!--              is-->
              <!--              <h2 id="userId">{{user.id}}</h2>-->
            </div>
            <router-link to="/login" class="already-have-acc"> Sign in</router-link>
          </div>
        </div>
      </div>
    </main>
  </div>
</template>

<script>
import User from "@/apis/User";

export default {
  name: 'Register',
  data() {
    return {
      user: {
        name: '',
        email: '',
        password: '',
        password_confirmation: ''
      },
      form: true,
      passwordConfirmed: true,
      passChecked: true,
      nameChecked: true,
      slash: false
    }
  },
  methods: {
    togglePassword() {
      const passField = document.getElementById('password-field1');
      const passField2 = document.getElementById('password-field2');
      if (passField.getAttribute('type') === "password") {
        passField.setAttribute('type', 'text');
      } else {
        passField.setAttribute('type', 'password');
      }
      if (passField2.getAttribute('type') === "password") {
        passField2.setAttribute('type', 'text');
      } else {
        passField2.setAttribute('type', 'password');
      }
    },
    submitHandler() {
      this.touchHandler()
      this.testPass1()
      this.testName()
      if (this.passwordConfirmed && this.passChecked && this.nameChecked) {
        User.register(this.user)
            .then(() => {
              this.form = false
            })
            .catch(error => {
              if (error.response.status === 422) {
                this.errors = error.response.data.errors;
              }
            });
      }

    },
    touchHandler() {
      this.user.password === this.user.password_confirmation ? this.passwordConfirmed = true : this.passwordConfirmed = false
    },
    testPass1() {
     const mediumRegex = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*,./?<>])(?=.{12,255})")
      this.passChecked = mediumRegex.test(this.user.password)
      return this.passChecked
    },
    testName() {
      const regName = new RegExp("^([a-zA-Z]{1,}\\s[a-zA-Z]{1,}'?-?[a-zA-Z]{1,}\\s?([a-zA-Z]{1,})?)")
      this.nameChecked = regName.test(this.user.name)
      return this.nameChecked
    }
  }
}

</script>

<style scoped>

.row .col span.invalid {
  color: red;
  font-size: 10px;
}
.row .col .check-pass {
  font-size: 10px;
  z-index: 9999;
  color: red;
  width: 200px;
  word-wrap: normal;

}
#thankyou {
  text-align: center;
  font-size: 24pt;
}

.userName {
  color: #15416B;
  font-weight: bold;
  font-size: 34pt;
  margin-bottom: 30px;
}

.main {
  min-height: calc(100vh - 140px); /*header*/
  margin-top: 60px;
}

.selected-main {
  display: flex;
  justify-content: center;
}

.main-content {
  text-align: center;
  font-size: 15px;
}

.signup {
  display: inline-block;
  margin-bottom: 30px;
}

.main-content h1 {
  margin: 30px 0 10px 0;
  font-size: 21px;
  font-weight: bold;
}

.main-content span {
  color: #7d7d7d;
}

.main-content form {
  display: flex;
  flex-direction: column;
  text-align: center;
}

.hidden-checkbox:checked + label {
  border: 1px solid #15416B;
  color: #15416b;
  font-weight: 600;
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
  border-radius: 20px;
  align-self: center;
  color: #fff;
  margin: 30px 0 30px 12px;
  border-width: 0;
  border-style: unset;
  cursor: pointer;
}

.form-control:focus {
  border-color: #ced4da !important;
  box-shadow: 0 0 0 0 rgba(0, 0, 0, .0) !important;
}

.main-content .signup {
  color: #7d7d7d;
}

span.userName {
  font-weight: bold;
  font-family: Georgia, sans-serif;
  font-size: 30pt;
  color: inherit;
}
.toggle-password {
  position: absolute;
  right: 8px;
  top: 17px;
}
</style>
