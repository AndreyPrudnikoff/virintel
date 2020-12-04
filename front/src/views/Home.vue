<template>
  <div class="home">
    <!--    <OuterHeader />-->
    <section class="home-banner">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-6">
            <div><h1>
              Coronavirus Immunity Diagnostics
            </h1></div>
            <div>
              <span class="banner-descr">
                VirIntel LLC is a diagnostics startup with a leading scientific concept
                in the definition of COVID- 19 testing. In addition, we are utilizing
                a computing data platform to support the search for the vaccine.</span>
            </div>
            <div>
              <button class="banner-btn">Order a test</button>
            </div>
          </div>
        </div>
      </div>
    </section>
    <main class="container info-about--wrapper">
      <div class="row">
        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 info-about">
          <h4>Our Test</h4>
          <img src="../assets/img/our_test.png" alt="">
          <span>
                      VirIntel bioinformatics experts are working to perfect
                      a serological test which will tell if someone's immune
                      system has learned to create antibodies that fight a
                      particular infection. Our test is a quantitative
                      assay which will detect and measure anti-SARS-CoV-2
                      antibodies in a patients' bloodstream.
                  </span>
        </div>
        <div class="d-none d-md-block col-md-4 col-lg-4 col-xl-4 info-about hidden-class">
          <h4>Patients</h4>
          <img src="../assets/img/patients.png" alt="">
          <span>
                      We are recruiting volunteers who have recovered from
                      COVID-19 to donate a small sample of blood .
                      This will make it possible to see who has already
                      gone through the infection and doesn't need
                      to worry about getting sick or spreading the disease anymore.</span>
        </div>
        <div class="d-none d-md-block col-sm-4 info-about hidden-class">
          <h4>Physicians</h4>
          <img src="../assets/img/physicians.png" alt="">
          <span>
                      Do you have patients who have recovered from COVID-19?
                      We are asking you to support our initiative
                      and refer your patients to our study.</span>
        </div>
        <div>
          <label for="read_more_btn_tests" class="read_more_label_tests d-md-none">
            <i class="arrow_down arrow down"></i>
            <router-link to="/about" id="read_more_btn_tests">Read more</router-link>
          </label>
        </div>
      </div>
    </main>
    <div class="news--wrapper">
      <article class="container">
        <div class="row">
          <nav class="news">
            <h4 class="news-title">Last updates</h4>
            <ul class="news-list">
              <li class="news-item">
                <img src="../assets/img/news1.png" alt="">
                <div class="news-item-text--wrapper">
                  <h5 class="news-item--title">Does the Common Cold Protect You from COVID-19?</h5>
                  <span class="news-item--date">Chris Baraniuk | Aug 4, 2020</span>
                  <span class="news-item--descr">There are emerging signs that some people might have
                                    heightened protection against SARS-CoV-2, perhaps
                                    thanks to recent infection by other coronaviruses.</span></div>
              </li>
              <li class="news-item d-none d-md-flex d-lg-flex d-xl-flex">
                <img src="../assets/img/news2.png" alt="">
                <div class="news-item-text--wrapper">
                  <h5 class="news-item--title">Does the Common Cold Protect You from COVID-19?</h5>
                  <span class="news-item--date">Chris Baraniuk | Aug 4, 2020</span>
                  <span class="news-item--descr">There are emerging signs that some people might have
                                    heightened protection against SARS-CoV-2, perhaps
                                    thanks to recent infection by other coronaviruses.</span></div>
              </li>
              <li class="news-item d-none d-md-flex d-lg-flex d-xl-flex">
                <img src="../assets/img/news3.png" alt="">
                <div class="news-item-text--wrapper">
                  <h5 class="news-item--title">Does the Common Cold Protect You from COVID-19?</h5>
                  <span class="news-item--date">Chris Baraniuk | Aug 4, 2020</span>
                  <span class="news-item--descr">There are emerging signs that some people might have
                                    heightened protection against SARS-CoV-2, perhaps
                                    thanks to recent infection by other coronaviruses.</span></div>
              </li>
              <li>

                <label for="read_more_btn_upd" class="read_more_label_upd">
                  <i class="arrow_down arrow down"></i>
                  <router-link to="/news" id="read_more_btn_upd">Read more</router-link>
                </label>
              </li>
            </ul>
          </nav>
        </div>
      </article>
    </div>
    <section id="contactUs" class="contact-us--wrapper container">
      <div class="row">
        <div class="contact-us">
          <h5 class="contact-us--title">Contact us</h5>
          <span class="contact-us--descr">Are you a physician who would like to refer recovered patients
                      or someone who has conquered COVID-19 and would like to help development
                      of the antibody test and possible vaccine? If so, please reach out to us!
                  </span>
          <span class="contact-us--email">
                        info@virintel.com
                  </span><br/>
          <span class="contact-us--tel">
                        (240) 608-4504
                  </span>
        </div>
      </div>
    </section>
  </div>
</template>

<script>
// import { Component, Vue } from 'vue-property-decorator';
// import Header from '../components/OuterHeader.vue'; // @ is an alias to /src
import OuterHeader from "@/components/OuterHeader";

export default {
  components: {
    OuterHeader
  }
}
</script>
<style scoped>

.header-nav-item a {
  color: #7D7D7D;
}

.header-nav-item a:hover {
  color: #15416B;
  text-decoration: none;
}

.home-banner {
  display: flex;
  align-items: center;
  text-align: left;
  width: 100%;
  height: 400px;
  background-image: url("../assets/img/main_bg.png");
  background-repeat: no-repeat;
  background-position: center;
  background-size: cover;
  margin-bottom: 50px;
  margin-top: 60px;
}

h1 {
  font-weight: bold;
  font-size: 48px;
  line-height: 52px;
  letter-spacing: 0.02em;
  color: #000;
  margin-bottom: 20px;
}

.banner-descr {
  font-size: 15px;
  line-height: 18px;
  letter-spacing: 0.02em;
  color: #414141;
  margin-bottom: 20px;
  display: inline-block;
}

.banner-btn {
  background: #15416B;
  border-radius: 21.5px;
  border: unset;
  width: 200px;
  height: 45px;
  color: #fff;
  cursor: pointer;
}

.banner-btn:hover {
  background: transparent;
  color: #15416B;
  border: 0.3px solid #15416B;
}

/*info*/
.info-about--wrapper {
  height: 400px;
  /*overflow: hidden;*/
  position: relative;
}

.info-about {
  max-height: 400px;
  text-overflow: ellipsis;
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

a {
  color: #15416B;
}

a:hover {
  text-decoration: none;
}

.read_more_label_tests {
  cursor: pointer;
  position: absolute;
  bottom: -115px;
  left: 50%;
  -ms-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
  background-color: #fff;
  z-index: 999;
  width: 200px;
  padding: 10px 20px;
  border-radius: 21.5px;
  color: #15416B;
  font-weight: 600;
  font-size: 16px;
  border: 0.3px solid transparent;
}

.read_more_label_upd {
  cursor: pointer;
  position: relative;
  bottom: -30px;
  background-color: #fff;
  z-index: 999;
  width: 200px;
  padding: 10px 20px;
  border-radius: 21.5px;
  color: #15416B;
  font-weight: 600;
  font-size: 16px;
  border: 0.3px solid transparent;
}

.read_more_label_upd:hover,
.read_more_label_tests:hover {
  border: 0.3px solid #15416B;
}

i {
  border: solid #15416B;
  border-width: 0 1px 1px 0;
  display: inline-block;
  padding: 3px;
}

.down {
  transform: rotate(45deg);
  -webkit-transform: rotate(45deg);
}

.arrow_down {
  margin: 0 20px 5px 0;
}

/*Contact us*/
.contact-us--title {
  font-weight: 600;
  font-size: 18px;
}

.contact-us--descr {
  font-weight: 300;
  font-size: 16px;
  letter-spacing: 0.02em;
  margin-bottom: 30px;
  display: inline-block;
}

.contact-us--email,
.contact-us--tel {
  font-weight: 600;
  font-size: 26px;
  line-height: 34px;
  letter-spacing: 0.02em;
  display: inline-block;

}

.contact-us--tel {
  margin-bottom: 100px;
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

  .info-about--wrapper {
    height: 450px;
  }

  .read_more_label_tests {
    bottom: -55px;
    z-index: 999;
  }

  .info-about {
    padding: 0 !important;
  }

  .hidden-class {
    display: none !important;
  }

  .news-item {
    flex-direction: column;
  }

  .news-item img,
  .info-about img {
    width: 100%;
    max-width: unset;
  }

  .home-banner {
    text-align: center;
    background-image: unset;
    height: 200px;
    margin-top: 100px;
    margin-bottom: 60px;
  }

  .banner-btn {
    width: 100%;
  }

  h1 {
    line-height: 36px;
    font-size: 36px;
  }

  .contact-us--descr {
    padding: 10px;
  }
}

@media screen and (max-width: 480px) {
  .home-banner {
    margin-top: 110px;
  }

  h1 {
    font-size: 24px;
  }

  .read_more_label_tests {
    /*bottom: -25px;*/
  }
}

</style>