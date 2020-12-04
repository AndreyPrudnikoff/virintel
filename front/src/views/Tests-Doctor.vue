<template>
  <div>
    <section class="main">
      <div class="container">
        <div class="row">
          <div class="nav-aside col-sm-2">
            <AsideTabs v-bind:route="this.activeRoute"/>
<!--            <ul class="nav-list">-->
<!--              <li class="nav-link">-->
<!--                <button @click="toggleModal" class="mt-5 btn"><span>Upload</span> results</button>-->
<!--              </li>-->
<!--            </ul>-->
          </div>
          <main class="main-content col-sm-10">
            <div v-if="this.$route.path === '/doctor/tests'">
              <AllTests/>
            </div>
            <div v-else-if="this.$route.path === '/doctor/test/id'">
              <TestView @routeFromChild='setChildRoute($event)'/>
            </div>
          </main>
        </div>
      </div>
    </section>

    <div v-if="showModal" class="pop-up">
      <span @click="toggleModal" id="close"><svg width="35" height="35" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
<path
    d="M10.2388 0.148438C5.0005 0.148438 0.73877 4.34345 0.73877 9.50012C0.73877 14.6568 5.00041 18.8518 10.2388 18.8518C15.477 18.8518 19.7388 14.6567 19.7388 9.50012C19.7388 4.34354 15.4771 0.148438 10.2388 0.148438ZM10.2388 16.9813C6.04812 16.9813 2.63883 13.6252 2.63883 9.50003C2.63883 5.37489 6.04821 2.01874 10.2388 2.01874C14.4294 2.01874 17.8387 5.37489 17.8387 9.50003C17.8387 13.6252 14.4294 16.9813 10.2388 16.9813Z"/>
<path
    d="M13.7608 11.6442L11.5825 9.49991L13.7608 7.35563C14.1318 6.99046 14.1318 6.39826 13.7608 6.03309C13.3899 5.66801 12.7883 5.66801 12.4172 6.03309L10.239 8.17728L8.06081 6.03309C7.68984 5.66801 7.08825 5.66801 6.71719 6.03309C6.34622 6.39826 6.34622 6.99046 6.71719 7.35573L8.89549 9.50001L6.71719 11.6442C6.34622 12.0094 6.34622 12.6016 6.71719 12.9668C6.90277 13.1494 7.14584 13.2407 7.38891 13.2407C7.63197 13.2407 7.87523 13.1493 8.06062 12.9668L10.239 10.8226L12.4173 12.9668C12.6029 13.1494 12.846 13.2407 13.089 13.2407C13.3321 13.2407 13.5754 13.1493 13.7607 12.9668C14.1318 12.6016 14.1318 12.0095 13.7608 11.6442Z"/>
</svg>
</span>
      <form class="d-flex flex-column justify-content-center" method="post"
            action="http://virintel.cp.co.ua/excelSubmit" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="CGYQmZkp67ru9jRzY3TfFelh9SvZKqPTPHFApbei">
        <div class="form-group">
          <label class="font-weight-bold" for="exampleFormControlFile1">Excel file input</label><br>
          <input class="m-2" type="file" name="file" id="exampleFormControlFile1"><br>
          <button class="btn m-3" type="submit">Import</button>
        </div>
      </form>

    </div>
  </div>
</template>

<script>
// import { Emit, Component, Vue } from 'vue-property-decorator';
import AsideTabs from "@/components/AsideTabs-Doctor.vue";
import AllTests from "@/components/AllTests-Doctor.vue";
import TestView from "@/components/TestView-Doctor.vue";

export default {
  name: 'Tests',
  components: {
    AsideTabs,
    AllTests,
    TestView
  },
  data() {
    return {
      activeRoute: '',
      showModal: false
    }
  },
  methods: {
    setChildRoute(data) { // need to paint aside nav
      this.activeRoute = data;
    },
    toggleModal() {
      this.showModal = !this.showModal
    }
  },
  created() {
    this.activeRoute = this.$route.path;
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

.nav-link {
  padding: 0;
}

.main {
  min-height: calc(100vh - 140px); /*header*/
  margin-top: 60px;
}

.main-content {
  border-left: 0.3px solid #C1C1C1;
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
