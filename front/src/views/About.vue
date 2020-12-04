<template>
  <div>
<!--    <OuterHeader/>-->
    <div class="main">
      <div class="about--wrapper">
        <article class="container">
          <div class="row">
            <nav class="about">
              <ul class="about-list">
                <li><h2 class="about-item--title">About VirIntel</h2></li>
                <li class="about-item">
                  <img src="../assets/img/about_img1.jpg" alt="about">
                  <div class="about-item-text--wrapper">

                    <p class="about-item--descr">VirIntel LLC is a diagnostic and research startup involved in a broad
                      spectrum of projects concerning COVID-19. VirIntel immunology, bioinformatics and assay
                      development
                      experts have designed a dual-parameter serological test with 100% specificity, which allows to
                      determine if a person’s immune system has created antibodies against the SARS-Cov-2.
                      Our other research projects involve broadening the scope of immune response analysis even further,
                      exploring the antibody viral neutralization capabilities and vaccine design collaborations.</p>
                  </div>
                </li>
                <li><h2 class="about-item--title">The VirIntel Mission</h2></li>
                <li class="about-item">

                  <div class="about-item-text--wrapper">

                    <ul class="article_mission">
                      <li>To establish an agile and precise diagnostic testing platform within the
                        area of virology and immunology, using the latest scientific, bioinformatics and collaboration
                        approaches.
                      </li>
                      <li>To empower labs and physicians the ability to offer decisive diagnostics testing results to
                        patients.
                      </li>
                      <li>To continue research on the most essential topics concerning the ongoing pandemic of COVID-19,
                        including immune response analysis, viral neutralization studies, vaccine design and more.
                      </li>
                    </ul>
                  </div>
                  <img src="../assets/img/about_img2.webp" alt="mission">
                </li>
              </ul>
            </nav>
          </div>
        </article>
      </div>
    </div>
  </div>
</template>

<script>
import OuterHeader from "@/components/OuterHeader";

export default {
  name: 'About',
  components: {
    OuterHeader
  }
}
</script>

<style lang="scss" scoped>

.main {
  min-height: calc(100vh - 140px); /*header*/
  margin-top: 60px;
}
h2 {
  font-family: Proxima Nova,sans-serif;
  font-style: normal;
  font-weight: 600;
  font-size: 21px;
  line-height: 18px;
  margin-bottom: 30px;
}
.about-item {
  display: flex;
  align-items: center;
  margin: 50px 0;
}

.about-item-text--wrapper {
  display: flex;
  flex-direction: column;
  text-align: left;
  padding-left: 45px;
}

.about-item--title {
  font-weight: 600;
  font-size: 16px;
  position: relative;

}
.about-item--title:before {
  content: "";
  position: absolute;
  bottom: -20px;
  left: 47.5%;
  width: 5%;
  height: 2px;
  background: #ccc;
}

.about-item--descr {
  font-size: 15px;
  line-height: 2em;
  color: #7D7D7D;
}
.article_mission {
  color: #7D7D7D;
  list-style-type: disc;
  text-align: left;
  li {
    margin: 5px;
  }
}

.about--wrapper {
  padding-top: 60px;
  margin-bottom: 60px;
  position: relative;
}

@media screen and (max-width: 767px) {
  .about-item-text--wrapper {
    padding: 10px;
    text-align: center;
  }

  .about-item img {
    max-width: 200px;
    object-fit: cover;
  }

  .about-item {
    flex-direction: column;
  }

  .about-item img {
    width: 100%;
    max-width: unset;
  }

}

</style>