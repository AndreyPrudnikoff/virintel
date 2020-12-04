<template>
  <div>
    <!--        <OuterHeader/>-->
    <section class="main">
      <div class="container">
        <div class="row">
          <AsideTabs v-bind:route="this.activeRoute"/>
          <main class="main-content col-sm-10">
            <form>
              <div class="row">
                <div class="col">
                  <h5>Personal information</h5>
                </div>
              </div>
              <div class="form-group row">
                <label for="first_name" class="col-sm-2 col-form-label">First Name</label>
                <div class="col-sm-10">
                  <input type="text" id="first_name" class="form-control input-field" placeholder="First name"
                         value="First name"
                         required>
                  <!--                                    <p v-if="$v.name.$invalid" class="error-message">The name field is required</p>-->
                </div>
              </div>
              <div class="form-group row">
                <label for="last_name" class="col-sm-2 col-form-label">Last Name</label>
                <div class="col-sm-10">
                  <input type="text" id="last_name" class="form-control input-field" placeholder="Last name"
                         value="Last name"
                         required>
                  <!--                                    <p v-if="$v.lastName.$invalid" class="error-message">The last name field is required</p>-->
                </div>
              </div>
              <div class="form-group row">
                <label for="date_birth" class="col-sm-2 col-form-label">Date of Birth</label>
                <div class="col-sm-10">
                  <input type="date" id="date_birth"
                         min="1900-01-01" max="2000-12-31"
                         class="form-control input-field" placeholder="Date of birth" value="1900-01-01"
                         required>
                  <!--                                    <p v-if="$v.date.$invalid" class="error-message">The date field is required</p>-->
                </div>
              </div>
              <div class="form-group row">
                <label for="sex" class="col-sm-2 col-form-label">Sex</label>
                <div class="col-sm-10">
                  <select class="form-control select-sex" id="sex">
                    <option v-for="item in genders" v-bind="gender" class="option">{{ item }}</option>
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
              <div class="form-group row">
                <label for="tel" class="col-sm-2 col-form-label">Work Number</label>
                <div class="col-sm-10">
                  <input type="text" id="tel" class="form-control input-field"
                         placeholder="Phone Number" value="+380934686862" required>
                </div>
              </div>
              <div class="form-group row">
                <label for="state" class="col-sm-2 col-form-label">State</label>
                <div class="col-sm-10">
                  <input type="text" id="state" class="form-control input-field"
                         placeholder="Work Address" value="California" required>
                </div>
              </div>
              <div class="form-group row">
                <label for="city" class="col-sm-2 col-form-label">City</label>
                <div class="col-sm-10">
                  <input type="text" id="city" class="form-control input-field"
                         placeholder="City" value="Los Angeles" required>
                </div>
              </div>
              <div class="form-group row">
                <label for="street" class="col-sm-2 col-form-label">Street</label>
                <div class="col-sm-10">
                  <input type="text" id="street" class="form-control input-field"
                         placeholder="State" value="E 1st St" required>
                </div>
              </div>
              <div class="form-group row">
                <label for="zip" class="col-sm-2 col-form-label">Zip</label>
                <div class="col-sm-10">
                  <input type="text" id="zip" class="form-control input-field"
                         placeholder="Zip" value="90012" required>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <h5>Additional information</h5>
                </div>
              </div>
              <div class="form-group row">
                <label for="specialisation" class="col-sm-2 col-form-label">Specialisation</label>
                <div class="col-sm-10">
                  <input type="text" id="specialisation" class="form-control input-field"
                         placeholder="Specialisation" value="Specialisation" required>
                </div>
              </div>
              <div class="form-group row">
                <label for="assistant" class="col-sm-2 col-form-label">Assistant</label>
                <div class="col-sm-10">
                  <input type="text" id="assistant" class="form-control input-field"
                         placeholder="Assistant" value="Assistant" required>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <h5>Account information</h5>
                </div>
              </div>
              <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                  <input type="email" id="email" class="form-control input-field" placeholder="Email"
                         value="johnsmith@gmail.com" required>
                  <!--                                           v-model="email"-->
                  <!--                                    <p v-if="$v.email.$invalid" class="error-message">The email field is required</p>-->
                </div>
              </div>
              <div class="form-group row">
                <label for="password-field" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                  <input id="password-field" type="password" class="form-control input-field"
                         name="password" placeholder="Password" value="qwerty" required>
                  <span class="field-icon toggle-password"
                        v-bind:class="{ 'fa fa-eye fa-eye-slash': !slash,
                                                                'fa fa-fw fa-eye' : slash}"
                        v-on:click="slash = !slash"
                        @click="togglePassword">
                                    </span>
                </div>

              </div>
              <input type="submit" value="Save Changes" @click.stop.prevent="submit()" class="handle-btn-sbm"/>
              <!--                                   -->

            </form>
          </main>
        </div>
      </div>
    </section>
  </div>
</template>

<script>
// import { Prop, Component, Vue } from 'vue-property-decorator';
import OuterHeader from '@/components/OuterHeader.vue';
import AsideTabs from '@/components/AsideTabs-Doctor.vue';
import {mapGetters, mapState} from "vuex";
// import {email, required} from "vuelidate/lib/validators";

// @Component({
//     components: {
//         OuterHeader: OuterHeader,
//         AsideTabs: AsideTabs
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
  name: 'DoctorProfile',
  components: {
    OuterHeader,
    AsideTabs
  },
  data() {
    return {
      slash: false,
      activeRoute: '',
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
    }
  },
  created() {

    this.activeRoute = this.$route.path;

  }
}

</script>

<style scoped>
.main {
  min-height: calc(100vh - 140px); /*header*/
  margin-top: 60px;
}

.main-content {
  border-left: 0.3px solid #C1C1C1;
  min-height: calc(100vh - 70px); /*header*/
}

.main-content h5:first-child {
  margin-top: 10px !important;
}

.main-content h5,
.col-form-label {
  font-size: 16px;
  text-align: left;
}

h5 {
  font-weight: 600;
}

.input-field,
.select-sex {
  color: #A2A2A2;
}

.toggle-password {
  position: absolute;
  right: 25px;
  top: 10px;
}

.handle-btn-sbm {
  width: 163px;
  height: 40px;
  background: #15416B;
  border-radius: 20px;
  align-self: center;
  color: #fff;
  margin: 15px 0;
  border-width: 0;
  border-style: unset;
  cursor: pointer;
}

.form-control {
  border-radius: 0 !important;
}
</style>
