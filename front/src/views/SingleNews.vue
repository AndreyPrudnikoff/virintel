<template>
  <div>
    <main class="main">
      <div class="container">
        <h2 class="news-title">{{ news.title }}</h2>
        <p>John Smith | 20.02.2020</p>
        <div class="img">
          <img src="../assets/img/news1.png" alt="">
        </div>
        <div class="news">
          <p>{{ news.body }}</p>
        </div>
      </div>
    </main>
  </div>
</template>

<script>

export default {
  name: 'SingleNews',
  data() {
    return {
      news: ''
    }
  },
  mounted() {
    fetch('https://jsonplaceholder.typicode.com/posts')
        .then(response => response.json())
        .then(data => this.news = data[this.$route.params.id - 1])
  }
}
</script>

<style lang="scss" scoped>
.main {
  min-height: calc(100vh - 140px);
  /*header*/
  margin-top: 60px;

  .container {
    width: 100%;
    padding-top: 30px;

    p {
      margin: 20px 0;
      font-family: Proxima Nova, sans-serif;
      font-style: normal;
      font-weight: 250;
      font-size: 16px;
      line-height: 18px;
      letter-spacing: 0.02em;
      color: #505050;
    }

    .img {
      text-align: center;
      width: 100%;
      margin-top: 20px;

      img {
        width: 100%;
      }

    }

    .news {
      .news-title {
        font-family: Proxima Nova, sans-serif;
        font-style: normal;
        font-weight: 600;
        font-size: 21px;
        line-height: 18px;
        display: flex;
        align-items: center;
        letter-spacing: 0.02em;
        color: #000000;
      }

      div {
        text-align: center;
        display: flex;
        align-items: center;
      }

      p {
        font-family: Proxima Nova, sans-serif;
        font-style: normal;
        font-weight: 300;
        font-size: 16px;
        line-height: 18px;
        margin: 20px 0;
        letter-spacing: 0.02em;
        text-align: left;
        color: #7D7D7D;
      }
    }

  }


}
</style>