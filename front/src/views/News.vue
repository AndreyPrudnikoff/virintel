<template>
  <div>
    <div class="news--wrapper">
      <article class="container">
        <div class="row">
          <nav class="news">
            <h4 class="news-title">Last updates</h4>
            <ul v-for="article in news.slice(0, index)" class="news-list">
              <li class="news-item">
                <img src="../assets/img/news1.png" alt="">
                <div class="news-item-text--wrapper">
                  <h5 class="news-item--title">{{ article.title }}</h5>
                  <span class="news-item--date">Chris Baraniuk | Aug 4, 2020</span>
                  <span class="news-item--descr">{{ article.body }}</span>
                  <router-link :to="'/news/' + article.id">More...</router-link>
                </div>
              </li>
            </ul>
          </nav>
        </div>
      </article>
    </div>
  </div>
</template>

<script>
import SingleNews from '@/views/SingleNews';
import OuterHeader from '@/components/OuterHeader';

export default {
  name: 'News',
  components: {
    SingleNews,
    OuterHeader
  },
  data() {
    return {
      news: [],
      index: 10
    }
  },
  methods: {
    scroll() {
      window.onscroll = () => {
        let bottomOfWindow = document.documentElement.scrollTop + window.innerHeight === document.documentElement.offsetHeight;
        if (bottomOfWindow) {
          this.index += 10
        }
      }
    }
  },
  mounted() {
    this.scroll()
        fetch('https://jsonplaceholder.typicode.com/posts')
            .then(response => response.json())
            .then(data => this.news = data)
  }
}
</script>

<style scoped>

h1 {
  font-weight: bold;
  font-size: 48px;
  line-height: 52px;
  letter-spacing: 0.02em;
  color: #000;
  margin-bottom: 20px;
}

.info-about h4 {
  font-weight: 600;
  font-size: 18px;
}

.info-about img {
  width: 100%;
  margin: 15px 0;
}

.info-about span {
  font-weight: 300;
  font-size: 15px;
  color: #7D7D7D;
  overflow: hidden;
  display: -webkit-box;
  -webkit-line-clamp: 12;
  -webkit-box-orient: vertical;
  text-align: left;
}

/*News*/
.news-item {
  display: flex;
  margin-bottom: 30px;
}

.news-item-text--wrapper {
  display: flex;
  flex-direction: column;
  text-align: left;
  padding-left: 45px;
}

.news-title {
  font-weight: 600;
  font-size: 18px;
  margin-bottom: 15px;
}

.news-item--title {
  font-weight: 600;
  font-size: 16px;
}

.news-item--date {
  font-size: 14px;
  color: #7D7D7D;
}

.news-item--descr {
  font-size: 15px;
  color: #7D7D7D;
}

.news--wrapper {
  border-top: 0.3px solid #C1C1C1;
  border-bottom: 0.3px solid #C1C1C1;
  padding-top: 60px;
  margin-bottom: 60px;
  position: relative;
}

i {
  border: solid #15416B;
  border-width: 0 1px 1px 0;
  display: inline-block;
  padding: 3px;
}


@media screen and (max-width: 767px) {
  .news-item-text--wrapper,
  .info-about span {
    padding: 10px;
    text-align: center;
  }

  .news-item img {
    max-width: 200px;
    object-fit: cover;
  }

  .news-item {
    flex-direction: column;
  }

  .news-item img,
  .info-about img {
    width: 100%;
    max-width: unset;
  }

  h1 {
    line-height: 36px;
    font-size: 36px;
  }
}

@media screen and (max-width: 480px) {
  h1 {
    font-size: 24px;
  }
}

</style>
