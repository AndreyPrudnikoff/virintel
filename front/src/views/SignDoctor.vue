<template>
  <div>
    <main class="main">
      <div class="container">
        <div class="row main-content--wrapper">
          <section class="main-content">
            <h1>Welcome!</h1>
            <span class="signup">Sign up</span>
            <form>
              <div class="row">
                <div class="col">
                  <h5>Personal information</h5>
                </div>
              </div>
              <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-xl-6 col-lg-6">
                  <input type="text" class="form-control input-field"
                         placeholder="First name"
                         v-model="name" required>
                  <img class="star" src="../assets/star.svg">
                  <!--                                    <p v-if="$v.name.$invalid" class="error-message">The name field is required</p>-->
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-xl-6 col-lg-6">
                  <input type="text" class="form-control input-field" placeholder="Last name"
                         v-model="lastName" required>
                  <!--                                    <p v-if="$v.lastName.$invalid" class="error-message">The last name field is required</p>-->
                  <img class="star" src="../assets/star.svg">
                </div>
              </div>
              <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-xl-6 col-lg-6">
                  <input type="date"
                         min="1900-01-01" max="2000-12-31"
                         class="form-control input-field"
                         placeholder="Date of birth"
                         v-model="date" required>

                  <!--                                    <p v-if="$v.date.$invalid" class="error-message">The date field is required</p>-->
                  <!--                                    <img class="star" src="../assets/star.svg">-->
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12 col-xl-6 col-lg-6">
                  <select class="form-control select-sex" id="Sex">
                    <option v-for="item in genders" v-bind="gender">{{ item }}</option>
                    <!--                                        <option class="option" disabled selected>Sex</option>-->
                    <!--                                        <option class="option">Male</option>-->
                    <!--                                        <option class="option">Female</option>-->
                  </select>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <h5>Contact information</h5>
                </div>
              </div>
              <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-xl-6 col-lg-6">
                  <input type="number" class="form-control input-field" placeholder="Phone Number" required>
                  <img class="star" src="../assets/star.svg">
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-xl-6 col-lg-6">
                  <input type="text" class="form-control input-field" placeholder="Work Address" required>
                  <img class="star" src="../assets/star.svg">
                </div>
              </div>
              <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-xl-4 col-lg-4">
                  <input type="text" class="form-control input-field" placeholder="City" required>
                  <img class="star" src="../assets/star.svg">
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-xl-4 col-lg-4">
                  <input type="text" class="form-control input-field" placeholder="State" required>
                  <img class="star" src="../assets/star.svg">
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-xl-4 col-lg-4">
                  <input type="text" class="form-control input-field" placeholder="Zip" required>
                  <img class="star" src="../assets/star.svg">
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <h5>Additional information</h5>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <input type="text" class="form-control input-field" placeholder="Specialisation" required>
                  <img class="star" src="../assets/star.svg">
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <input type="text" class="form-control input-field" placeholder="Assistant" required>
                  <img class="star" src="../assets/star.svg">
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <h5>Account information</h5>
                </div>
              </div>
              <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-xl-6 col-lg-6">
                  <input type="text" class="form-control input-field" placeholder="Email"
                         v-model="email" required>
                  <!--                                    <p v-if="$v.email.$invalid" class="error-message">The email field is required</p>-->
                  <img class="star" src="../assets/star.svg">
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-xl-6 col-lg-6">
                  <input id="password-field" type="password"
                         class="form-control input-field" name="password"
                         placeholder="Password" required>
                  <span class="field-icon toggle-password"
                        v-bind:class="{ 'fa fa-eye fa-eye-slash': slash,
                                                                'fa fa-fw fa-eye' : !slash}"
                        v-on:click="slash = !slash"
                        @click="togglePassword">
                                    </span>
                </div>

              </div>
              <input type="submit" value="Continue" @click.stop.prevent="submit()" class="handle-btn-sbm"/>
            </form>
            <span>Already have an account? </span>
            <router-link to="/login" class="already-have-acc"> Log in</router-link>
          </section>
        </div>
      </div>
    </main>
  </div>
</template>

<script>
// import { Component, Vue } from 'vue-property-decorator';
import OuterHeader from '@/components/OuterHeader.vue';
// import { Validation } from "vuelidate";
// import { required, email, between, minValue ,minLength, sameAs, helpers } from "vuelidate/lib/validators";

// @Component({
//     components: {
//         OuterHeader: OuterHeader
//     },
//     validations: {
//         name: { required },
//         lastName: { required },
//         date: { required },
//         email: { required, email },
//         gender: { required },
//         // genders: { required }
//     },
// })
export default {
  name: 'SignDoctor',
  components: {
    OuterHeader
  },
  data() {
    return {
      slash: false,
      name: '',
      lastName: '',
      date: '',
      email: '',
      gender: '',
      genders: ['Male', 'Female']
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
    submit() {
      this.$router.push("/doctor/profile");
    }
  },
  // private slash: boolean = false
  // private name: string = '';
  // private lastName: string = '';
  // private date: string = '';
  // private email: string = '';
  // private gender: string = '';
  // private genders: string [] = ['male', 'female'];
  // validations: object = {
  //     name: required,
  //     age: required
  // }


}
</script>

<style scoped>
.main {
  min-height: calc(100vh - 140px); /*header*/
  margin-top: 60px;
}

.main-content {
  text-align: center;
  font-size: 15px;
  max-width: 550px;
  width: 100%;
}

.main-content--wrapper {
  display: flex;
  justify-content: center;
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

.select-sex {
  margin-left: 5px;
  margin-top: 5px;
  border-top: 0 !important;
  border-left: 0 !important;
  border-right: 0 !important;
  border-radius: 0;
  position: relative;
  width: 100%;
}

input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

select.form-control:not([size]):not([multiple]) {
  height: calc(2.25rem + 1px) !important;
}

.star {
  position: absolute;
  right: 18px;
  top: 15px;
}

.main-content h5 {
  margin-left: 5px;
  margin-top: 20px;
  padding: .375rem .75rem;
  text-align: left;
  font-weight: 600;
  font-size: 15px;
  letter-spacing: 0.02em;
}

.signup {
  display: inline-block;
  margin-bottom: 10px;
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

.handle-btn-sbm {
  width: 163px;
  height: 40px;
  background: #15416B;
  border-radius: 20px;
  align-self: center;
  color: #fff;
  margin: 30px 0 15px 0;
  border-width: 0;
  border-style: unset;
  cursor: pointer;
}

.already-have-acc {
  display: inline-block;
  margin-bottom: 40px;
}

.form-control:focus {
  border-color: #ced4da !important;
  box-shadow: 0 0 0 0 rgba(0, 0, 0, .0) !important;
}

.toggle-password {
  position: absolute;
  right: 18px;
  top: 15px;
}

.row {
  margin-left: 0 !important;
  margin-right: 0 !important;
}
</style>