<template>
  <div class="main">
<!--    <OuterHeader/>-->
    <div class="container">
      <div class="img">
        <img src="../assets/img/403.svg" alt="page not found">
      </div>
      <h2>Page not found</h2>
      <p class="wrapper">
        <button @click="home" class="btn">Home</button>
        <button @click="previous" class="btn">Previous <span>page</span></button>
      </p>
    </div>
  </div>
</template>

<script>
import OuterHeader from "@/components/OuterHeader";

export default {
  name: "Forbidden",
  components: {
    OuterHeader
  },
  methods: {
    home() {
      this.$router.push('/')
    },
    previous() {
      this.$router.go(-1)
    }
  }
}
</script>

<style lang="scss" scoped>
.main {
  min-height: calc(100vh - 140px); /*header*/
  margin-top: 60px;

  .container {
    text-align: center;
    margin-top: 10vh;

    .img {
      max-width: 404px;
      margin: 100px auto 0;

      img {
        width: 100%;
      }
    }

    h2 {
      font-family: Proxima Nova, sans-serif;
      font-style: normal;
      font-weight: normal;
      font-size: 36px;
      line-height: 44px;
      text-align: center;
      margin: 30px 0;
    }

    .wrapper {
      .btn {
        background: #15416B;
        border-radius: 21.5px;
        border: unset;
        width: 200px;
        height: 45px;
        color: #fff;
        cursor: pointer;
        margin: 0 10px;
      }
      :hover:not(span) {
        background: transparent;
        color: #15416B;
        border: 0.3px solid #15416B;
      }

      }
    }
}
@media screen and (max-width: 467px){
.container {
  padding: 0 10px;
  h2 {
    font-size: 24px!important;
    line-height: 29px;
  }
  .wrapper {
    .btn {
      width: 100px!important;
      font-family: Proxima Nova, sans-serif;
      font-style: normal;
      font-weight: 400;
      font-size: 15px;
      line-height: 18px;
      padding: 5px;
      span {
        display: none;
      }
    }
  }
}
}
</style>