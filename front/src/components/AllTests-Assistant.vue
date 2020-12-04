<template>
  <div>
    <div class="d-flex flex-row justify-content-around mb-5 mt-3">
      <h5 v-show="isShow" class="caption">Requests</h5>
      <input v-show="isShow" id="search" class="form-control" placeholder="Search" v-model="search" type="text">
    </div>

    <div class="wrapper_table">
      <div v-show="!isShow" @click="isShow = !isShow; results = ''" class="back-icon"></div>
      <table v-if="!results" class="table one_table">
        <thead>
        <tr class="border-bottom">
          <th @click="go({key: 'id', compare: compare})" scope="col"
              class="th-title"><span :class="{up: compare, down: !compare}">File ID</span>
          </th>
          <th @click="go({key: 'file_name', compare: compare})" scope="col"
              class="th-title"><span :class="{up: compare, down: !compare}">Name</span>
          </th>
          <th @click="go({key: '', compare: compare})" scope="col"
              class="th-title ml-5"><span :class="{up: compare, down: !compare}">Action</span>
          </th>
          <th @click="go({key: 'status', compare: compare})" scope="col"
              class="th-title"><span :class="{up: compare, down: !compare}">Quality Controls</span>
          </th>
          <th @click="go({key: 'report', compare: compare})" scope="col"
              class="th-title"><span :class="{up: compare, down: !compare}">Reports</span>
          </th>
        </tr>
        </thead>
        <tr v-for="file in filteredUsers.slice(0, index)" :key="file.id"
            class="border-bottom">
          <td aria-label="id">{{ file.id }}</td>
          <td aria-label="File Name">{{ file.file_name }}</td>
          <td  class="d-flex flex-wrap justify-content-between"  aria-label="Action" v-if="file.status === 'Normal'">
            <p id="action" class="d-flex flex-wrap">
              <button class="btn btn-sm  btn-success" @click="getResults(file.id)">Show</button>
              <button @click="generatePdf(file.id)" class="btn btn-sm btn-info">{{ file.report ? 'View Report' : 'Generate PDF' }}</button>
            </p>
          </td>
          <td aria-label="Action" v-else>
            <button class="btn btn-sm  btn-danger" @click="getBadResults(file.id)">View control</button>
          </td>
          <td aria-label="Access">
            <span :class="{accept: file.status === 'Normal', denied: file.status === 'Bad'}"></span>
          </td>
          <td aria-label="Report">
            <span :class="{accept: file.report !== 0, denied: file.report !== 1}"></span>
          </td>
        </tr>
      </table>
      <table v-else-if="results === 'normal'" class="table table-bordered ml-5 mt-5">
        <thead>
        <tr v-for="render of 1">
          <th scope="col">№</th>
          <th scope="col">VirintelID</th>
          <th scope="col">{{ isPatients[0].patient_name ? 'Full Name' : 'PDF File Name'}}</th>
          <th v-show="isPatients[0].rbd" scope="col">RBD</th>
          <th v-show="isPatients[0].n" scope="col">N</th>
          <th scope="col">Result</th>
          <th v-show="isPatients[0].pdf_file_name" scope="col">Action</th>

        </tr>
        </thead>
        <tr v-for="(patient, index) in isPatients" :key="index">
          <td>{{ index + 1 }}</td>
          <td>{{ patient.virintel_id }}</td>
          <td>{{ patient.patient_name ? patient.patient_name : patient.pdf_file_name }}</td>
          <td v-show="isPatients[0].rbd">{{ patient.rbd }}</td>
          <td v-show="isPatients[0].n">{{ patient.n }}</td>
          <td>{{ patient.result }}</td>
          <td class="d-flex justify-content-center" v-show="patient.pdf_file_name">
            <button @click="getPdf(patient.id)" class="btn btn-info">Download</button>
          </td>
        </tr>
      </table>
      <table id="control" class="table table-bordered ml-5 mt-5" v-else-if="results === 'bad'">
        <thead>
        <tr>
          <th class="text-center">Quality Controls Rules</th>
        </tr>
        </thead>
        <tr :class="{green: rbdPos(isBadControl), red: !rbdPos(isBadControl)}">
          <td class="pl-5">RBD Pos > Neg*5</td>
        </tr>
        <tr :class="{green: rbdTresh(isBadControl), red: !rbdTresh(isBadControl)}">
          <td class="pl-5">RBD Threshold > Neg*1.7</td>
        </tr>
        <tr :class="{green: nPos(isBadControl), red: !nPos(isBadControl)}">
          <td class="pl-5">N Pos > Neg*5</td>
        </tr>
        <tr :class="{green: nTresh(isBadControl), red: !nTresh(isBadControl)}">
          <td class="pl-5">N Thresh > Neg*1.7</td>
        </tr>
      </table>
    </div>
    <Loader v-if="!loading"/>
    <div :class="{'hide': close}" v-else class="pop-up">
      <div class="d-flex flex-column justify-content-center text-center">
        <h2>{{ pdfDownloaded }}</h2>
        <div class="form-group text-center">
          <button @click="close = !close" class="btn m-3" type="button">OK</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import {mapGetters} from "vuex";
import Loader from "@/components/Loader";

export default {
  name: "AllTests",
  components: {Loader},
  data() {
    return {
      isShow: true,
      results: '',
      loader: false,
      loading: true,
      close: true,
      fil: [],
      compare: false,
      search: '',
      index: 20
    }
  },
  computed: {
    ...mapGetters(["isFiles", "isPatients", "isBadControl", "pdfDownload", "pdfDownloaded"]),
    filteredUsers() {
      const s = this.search.toLowerCase();
      return this.fil.filter(n => {
        return Object.values(n).some(m => {
          if (m) {
            return m.toString().toLowerCase().includes(s);
          }
        })
      });
    }
  },
  methods: {
    async getPdf(id) {
      await this.$store.dispatch("pdfLink", id);
      window.open(this.pdfDownload.data, "_blank");
    },
    scroll() {
      window.onscroll = () => {
        let bottomOfWindow = document.documentElement.scrollTop + window.innerHeight === document.documentElement.offsetHeight;
        if (bottomOfWindow) {
          this.index += 10
        }
      }
    },
    go({key, compare}) {
      this.$store.commit("SORTED_FILES", {key, compare});
      this.fil = this.isFiles;
      this.compare = !this.compare;
    },
    async getResults(id) {
      await this.$store.dispatch("showResults", id);
      this.isShow = !this.isShow;
      this.results = "normal";
    },
    async getBadResults(id) {
      await this.$store.dispatch("showBadResults", id);
      this.isShow = !this.isShow;
      this.results = "bad";
    },
    async generatePdf(id) {
      if (!!this.isFiles[id - 1].report) {
        await this.$store.dispatch("viewReports", id);
        this.isShow = !this.isShow;
        this.results = "normal";
      } else {
        this.loading = !this.loading;
        await this.$store.dispatch("startGenerate", id);
        this.loading = !!this.pdfDownloaded;
        this.close = !this.close;
      }
    },
    rbdPos: function (obj) {
      return Number(obj.RBD_Pos) > (Number(obj.RBD_Negative_Control) * 5);
    },
    rbdTresh: function (obj) {
      return Number(obj.RBD_Threshold) > Number(obj.RBD_Negative_Control) * 1.7;
    },
    nPos: function (obj) {
      return Number(obj.N_Pos) > Number(obj.N_Negative_Control) * 5;
    },
    nTresh: function (obj) {
      let k = Number(obj.N_Negative_Control * 1.7);
      return Number(obj.N_Threshold) > k;
    },
  },
  async mounted() {
    this.scroll();
    await this.$store.dispatch("getFileList");
    this.fil = this.isFiles;
  }
}
</script>

<style scoped>
#action {
  gap: 5px;
}

.border-bottom {
  border-bottom: 1px solid #d8d8d8;
}

#search {
  width: 200px;
}

.down, .up {
  position: relative;
}

.down:before {
  content: '';
  width: 15px;
  height: 30px;
  background-image: url('../assets/img/sort-amount-down.svg');
  background-repeat: no-repeat;
  position: absolute;
  bottom: -15px;
  right: -20px;
}

.up:before {
  content: '';
  width: 15px;
  height: 30px;
  background-image: url('../assets/img/sort-amount-up.svg');
  background-repeat: no-repeat;
  position: absolute;
  bottom: -15px;
  right: -20px;
}

.th-title {
  cursor: pointer;
}

.hide {
  display: none;
}

h2 {
  text-align: center;
}

.pop-up {
  position: fixed;
  left: 50%;
  top: 50%;
  transform: translate(-50%, -50%);
  padding: 3%;
  background-color: #ccc;
  border-radius: 20px;
  box-shadow: 0 19px 38px rgba(0, 0, 0, 0.30), 0 15px 12px rgba(0, 0, 0, 0.22);
  z-index: 2;
}

.pop-up .btn {
  width: 200px;
  background: #15416B;
  border-radius: 15px;
  cursor: pointer;
  color: #fff;
  border: 0.3px solid #15416B;
}

.pop-up .btn:hover {
  background: #fff;
  color: #15416B;
}

td .btn {
  width: 110px;
}

#control {
  font-weight: bold;
  width: 50%;
  margin: 0 auto;
}

#control thead {
  background-color: #e5e4e4;
  font-size: 15pt;
}

.green {
  color: #27AE60;
}

.red {
  color: #FF4D4D;
}

.table-striped,
.table-striped tr th,
.table-striped tr td {
  border: 1px solid silver;
  border-collapse: collapse;
  padding: 5px;
}

.wrapper_table {
  display: flex;
  flex-direction: row;
  justify-content: space-between;
}

.table {
  text-align: left;
}

td {
  padding-left: 5px;
}

.main-content {
  border-left: 0.3px solid #C1C1C1;
  min-height: calc(100vh - 70px); /*header*/
}

.main-content h5:first-child {
  margin-top: 10px !important;
}

.main-content h5,
.col-form-label {
  font-size: 16px;
  text-align: left;
}

h5 {
  font-weight: 600;
}

.btn-back {
  position: relative;
  padding: 40px 0 40px 0;
  /*line-height: 30px;*/
  /*display: flex;*/
  /*align-items: center;*/
  /*align-content: center;*/
}

.back-icon {
  /*height: 30px;*/
  position: relative;
  padding: 40px 0 40px 0;
  margin-top: 15px;
  cursor: pointer;
}

.back-icon:before {
  position: absolute;
  /*display: ;*/
  content: url("../assets/img/back_btn.svg");
  left: 10px;
  top: 0;
  /*padding-top: 0px;*/
  /*left: 15px;*/
  /*width: 25px;*/
  /*height: 25px;*/
}

.back-icon:after {
  content: 'Back';
  position: absolute;
  font-weight: 600;
  font-size: 15px;
  color: #15416B;
  top: 0;
  left: 35px;

}

.back-ref {
  font-weight: 600;
  font-size: 15px;
  line-height: 18px;
}

.caption {
  font-weight: 600;
  font-size: 15px;
}

.one_table td, .one_table th {
  border: 0 !important;
}

.th-title {
  font-weight: 600;
  font-size: 15px;
  color: #C1C1C1;
}

.accept {
  content: url("../assets/img/access_icon.svg");
}

.denied {
  content: url("../assets/img/denied_icon.svg");
}

.status-assigned {
  color: #C79600;
}

.status-new {
  color: #FF4D4D;
}

.status-done {
  color: #27AE60;
}

.status-process {
  color: #1E86EB;
}

@media screen and (max-width: 768px) {
  .details {
    position: absolute;
    right: 25px;
  }

  .table thead {
    display: none;
  }

  .table tr {
    display: block;
    margin-bottom: 1rem;
    /*border-bottom: 2px solid #e8e9eb;*/
  }

  .table td {
    display: block;
    text-align: right;
  }

  .table td:before {
    content: attr(aria-label);
    float: left;
    font-weight: bold;
    color: #C1C1C1;
  }
}
</style>
