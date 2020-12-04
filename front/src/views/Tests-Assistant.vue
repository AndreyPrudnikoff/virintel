<template>
  <div>
    <section class="main">
      <div class="container">
        <div class="row">
          <div>
            <AsideTabs v-bind:route="this.activeRoute"/>
            <!--            <ul class="nav-list">-->
            <!--              <li class="nav-link">-->
            <!--                <button @click="toggleModal" class="mt-5 btn"><span>Upload</span> results</button>-->
            <!--              </li>-->
            <!--            </ul>-->
          </div>
          <main class="main-content col-sm-10">
<!--            <div v-if="this.$route.path === '/assistant/tests'">-->
              <AllTests/>
<!--            </div>-->
<!--            <div v-else-if="this.$route.path === '/assistant/test/id'">-->
<!--              <TestView @routeFromChild='setChildRoute($event)'/>-->
<!--            </div>-->
          </main>
        </div>
      </div>
    </section>
  </div>
</template>

<script>
import OuterHeader from '@/components/OuterHeader.vue';
import AsideTabs from "@/components/AsideTabs-Assistant.vue";
import AllTests from "@/components/AllTests-Assistant.vue";
import TestView from "@/components/TestView-Assistant.vue";

export default {
  name: 'Tests',
  components: {
    AsideTabs,
    OuterHeader,
    AllTests,
    TestView
  },
  data() {
    return {
      activeRoute: '',

      form: {}
    }
  },
  methods: {

    setChildRoute(data) { // need to paint aside nav
      this.activeRoute = data;
    }
  }
}
</script>

<style scoped>

.btn {
  background-color: #15416B;
  color: #fff;
  border: 1px solid #15416B;
}

.btn:hover {
  color: #15416B;
  background-color: #fff;
}

.main {
  min-height: calc(100vh - 140px); /*header*/
  margin-top: 60px;
}

.main-content {
  border-left: .3px solid #C1C1C1;
  min-height: calc(100vh - 70px); /*header*/
  text-align: left;
}

.pop-up {
  position: absolute;
  left: 50%;
  top: 50%;
  transform: translate(-50%, -50%);
  padding: 5%;
  background-color: #ccc;
  border-radius: 20px;
  cursor: pointer;
  box-shadow: 0 19px 38px rgba(0,0,0,0.30), 0 15px 12px rgba(0,0,0,0.22);
}

.pop-up .btn {
  width: 200px;
}

#close {
  position: absolute;
  top: 5px;
  right: 5px;
  width: 50px;
  height: 50px;
}

#close svg {
  fill: rgba(255, 0, 0, .7);
}


@media screen and (min-width: 576px) and (max-width: 991px) {
  .btn span {
    display: block;
  }
}

</style>
