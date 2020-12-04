<template>
  <div>
    <section class="main">
      <div class="container">
        <div class="row">
          <AsideTabs v-bind:route="this.activeRoute"/>
          <main class="main-content col-sm-10">
            <div v-if="this.$route.path === '/patient/tests'">
              <AllTests/>
            </div>
            <div v-else-if="this.$route.path === '/patient/test/id'">
              <TestView @routeFromChild='setChildRoute($event)'/>
            </div>
          </main>
        </div>
      </div>
    </section>
  </div>
</template>

<script>
// import { Emit, Component, Vue } from 'vue-property-decorator';
import AsideTabs from "@/components/AsideTabs-Patient.vue";
import AllTests from "@/components/AllTests-Patient.vue";
import TestView from "@/components/TestView-Patient.vue";

export default {
  name: 'Tests',
  components: {
    AsideTabs,
    AllTests,
    TestView
  },
  data() {
    return {
      activeRoute: ''
    }
  },
  methods: {
    setChildRoute(data) { // need to paint aside nav
      this.activeRoute = data;
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
  text-align: left;
}

</style>