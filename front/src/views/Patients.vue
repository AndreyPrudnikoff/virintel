<template>
  <div>
    <section class="main">
      <div class="container">
        <div class="row">
          <AsideTabs v-bind:route="this.activeRoute"/>
          <main class="main-content col-sm-10">
            <div v-if="this.$route.path === '/doctor/patients'">
              <AllPatients/>
            </div>
            <div v-else-if="this.$route.path === '/doctor/patient/view'"
            >
              <PatientProfileView @routeFromChild='setChildRoute($event)'/>
            </div>
          </main>
        </div>
      </div>
    </section>
  </div>
</template>

<script>
// import { Prop,Component, Vue } from 'vue-property-decorator';
import OuterHeader from '@/components/OuterHeader.vue';
import AsideTabs from "@/components/AsideTabs-Doctor.vue";
import AllPatients from "@/components/AllPatients-Doctor.vue";
import PatientProfileView from "@/components/PatientProfileView-Doctor.vue";

// @Component({
//     components: {
//         OuterHeader: OuterHeader,
//         AsideTabs: AsideTabs,
//         AllPatients: AllPatients,
//         PatientProfileView: PatientProfileView
//     },
// })
export default {
  name: 'Patients',
  components: {
    OuterHeader,
    AsideTabs,
    AllPatients,
    PatientProfileView
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

.main-content h5:first-child {
  margin-top: 10px !important;
}

.main-content h5 {
  font-size: 16px;

}

</style>