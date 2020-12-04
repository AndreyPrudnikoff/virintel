<template>
  <header class="header">
    <div class="container">
      <nav class="row header-nav">
        <div class="header-logo-wrapper">
          <router-link to="/" class="handle_margin_nav">
            <img src="../assets/logo.svg" alt="logo" class="logo">
          </router-link>
        </div>
        <div class="header-nav-reffs-wrapper  d-none d-lg-flex">
          <ul class="header-nav-list">
            <li class="header-nav-item">
              <router-link to="/">Home</router-link>
            </li>
            <li class="header-nav-item">
              <router-link to="/news">News</router-link>
            </li>
            <li class="header-nav-item">
              <router-link to="/about">About us</router-link>
            </li>
            <li class="header-nav-item">
              <a href="#contactUs">Contact us</a>
            </li>
            <li v-if="isLoggedIn" id="profile" class="header-nav-item">
              <router-link title="Profile" :to="path">
                <img src="../assets/img/profile.svg" alt="login" class="icon-login">
              </router-link>
            </li>
            <li class="header-nav-item" v-if="!isLoggedIn">
              <router-link to="/login" class="login" id="login">Log in</router-link>
            </li>
            <li class="header-nav-item" v-else>
              <a @click.prevent="logout" href="#" class="login" id="logout">Log out</a>
            </li>
          </ul>
        </div>
        <div class="burger--wrapper d-lg-none d-xl-none">
          <div class="nav-item dropdown d-lg-none d-xl-none">
            <a class="nav-link dropdown-toggle"
               href="#" id="navbardrop" data-toggle="dropdown">
              <div id="header-nav-burger-icon">
                <span></span>
                <span></span>
                <span></span>
              </div>
            </a>

            <div class="dropdown-menu">
              <p>
                <router-link to="/" class="dropdown-item">Home</router-link>
              </p>
              <p>
                <router-link to="/news" class="dropdown-item">News</router-link>
              </p>
              <p>
                <router-link to="/about" class="dropdown-item">About us</router-link>
              </p>
              <p>
                <a href="#contactUs" class="dropdown-item">Contact us</a>
              </p>
              <div class="dropdown-divider"></div>
              <p v-if="!isLoggedIn">
                <router-link to="/login" class="dropdown-item">Log in</router-link>
              </p>
              <p v-else>
              <p>
                <router-link v-if="isLoggedIn" class="d-flex nowrap dropdown-item" :to="path">
                  <span>Profile</span><img src="../assets/img/profile.svg" alt="login" class="icon-login">
                </router-link>
              </p>
              <p>
                <a v-if="isLoggedIn" @click.prevent="logout" href="#" class="dropdown-item">Log out</a>
              </p>
            </div>
          </div>
        </div>
      </nav>
    </div>
  </header>
</template>

<script>
import { mapGetters } from "vuex";
import User from "@/apis/User";

export default {
  name: "Head",
  methods: {
    logout() {
      User.logout().then(() => {
        localStorage.removeItem("token");
        this.$store.commit("LOGIN", false);
        if (this.$router.currentRoute.name !== "Home") {
          this.$router.push({name: "Home"})
        }
      });
    }
  },
  computed: {
    ...mapGetters(["isLoggedIn", "path"])
  }
}
</script>

<style scoped>
.header {
  box-shadow: 0 4px 10px rgba(234, 234, 234, 0.5);
  background-color: #fff;
  font-size: 15px;
  position: fixed;
  width: 100%;
  top: 0;
  z-index: 999;
}

.header-nav {
  display: flex;
  justify-content: space-between;
  align-items: center;
  height: 60px;
}

.header-nav-list {
  padding: 0;
  margin: 0;
  list-style-type: none;
}

.header-nav-item {
  display: inline-block;
  margin-right: 35px;
}

.header-nav-item a {
  color: #7D7D7D;
}

.header-nav-item a:hover {
  color: #15416B;
  text-decoration: none;
}

#header-nav-burger-icon {
  width: 26px;
  height: 40px;
  position: relative;
  /*margin: 30px auto;*/
  -webkit-transform: rotate(0deg);
  -moz-transform: rotate(0deg);
  -o-transform: rotate(0deg);
  transform: rotate(0deg);
  -webkit-transition: .5s ease-in-out;
  -moz-transition: .5s ease-in-out;
  -o-transition: .5s ease-in-out;
  transition: .5s ease-in-out;
  cursor: pointer;
  color: #fff;
}

#header-nav-burger-icon span {
  display: block;
  position: absolute;
  height: 3px;
  width: 100%;
  background: #15416B;
  border-radius: 9px;
  opacity: 1;
  left: 0;
  -webkit-transform: rotate(0deg);
  -moz-transform: rotate(0deg);
  -o-transform: rotate(0deg);
  transform: rotate(0deg);
  -webkit-transition: .25s ease-in-out;
  -moz-transition: .25s ease-in-out;
  -o-transition: .25s ease-in-out;
  transition: .25s ease-in-out;
}

#header-nav-burger-icon span:nth-child(1) {
  top: 8px;
}

#header-nav-burger-icon span:nth-child(2) {
  top: 17px;
}

#header-nav-burger-icon span:nth-child(3) {
  top: 26px;
}

#header-nav-burger-icon.open span:nth-child(1) {
  top: 18px;
  -webkit-transform: rotate(135deg);
  -moz-transform: rotate(135deg);
  -o-transform: rotate(135deg);
  transform: rotate(135deg);
}

#header-nav-burger-icon.open span:nth-child(2) {
  opacity: 0;
  left: -60px;
}

#header-nav-burger-icon.open span:nth-child(3) {
  top: 18px;
  -webkit-transform: rotate(-135deg);
  -moz-transform: rotate(-135deg);
  -o-transform: rotate(-135deg);
  transform: rotate(-135deg);
}

#header-nav-burger-icon.open span:nth-child(1) {
  top: 18px;
  -webkit-transform: rotate(135deg);
  -moz-transform: rotate(135deg);
  -o-transform: rotate(135deg);
  transform: rotate(135deg);
}

#header-nav-burger-icon.open span:nth-child(2) {
  opacity: 0;
  left: -60px;
}

#header-nav-burger-icon.open span:nth-child(3) {
  top: 18px;
  -webkit-transform: rotate(-135deg);
  -moz-transform: rotate(-135deg);
  -o-transform: rotate(-135deg);
  transform: rotate(-135deg);
  -ms-transform: rotate(-135deg);
}

.dropdown-toggle::after {
  display: none;
}

.burger--wrapper {
  position: relative;
  margin-right: 15px;
}

.icon-login {
  max-width: 33px;
}

#profile {
  margin-right: 0;
  margin-bottom: -10px;
  width: 33px;
}

.icon-login:hover {
  transform: scale(1.05);
}

.icon-login:active {
  transform: scale(1);
}

.header-nav-item a {
  color: #7D7D7D !important;
}

.login {
  margin: 0 0 0 35px;
  background: #15416B;
  border-radius: 15px;
  padding: 5px 30px;
  cursor: pointer;
  color: #fff !important;
  border: 0.3px solid #15416B;
}

.login:hover,
#login:hover, #logout:hover {
  background: transparent;
  color: #15416B !important;
}

.header-nav-item:last-of-type {
  margin-right: 0 !important;
}

#login, #logout {
  color: #fff !important;
}

.nowrap.dropdown-item {
  justify-content: space-between;
}

.nowrap.dropdown-item img {
  width: 25px;
  margin-top: -5px;
}
</style>
