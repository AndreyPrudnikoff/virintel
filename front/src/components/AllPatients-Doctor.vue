<template>
    <div>
    <h5>All Patients</h5>
    <table class="table">
        <thead>
        <tr>
            <th scope="col" class="col-title">Name</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th scope="row">John Smith<router-link to="/doctor/patient/view"><span class="details">Details</span></router-link></th>
        </tr>
        <tr>
            <th scope="row">Smith John <router-link to="/doctor/patient/view"><span class="details">Details</span></router-link></th>
        </tr>
        <tr>
            <th scope="row">Not a John Smith<router-link to="/doctor/patient/view"><span class="details">Details</span></router-link></th>
        </tr>
        <tr>
            <th scope="row">Not a Smith but John<router-link to="/doctor/patient/view"><span class="details">Details</span></router-link></th>
        </tr>
        </tbody>
    </table>
    </div>
</template>

<script>
// import { Emit, Component, Vue } from 'vue-property-decorator';
// import OuterHeader from '@/components/OuterHeader.vue';
// import AsideTabs from "@/components/AsideTabs-Doctor.vue";

// @Component({
//     components: {
//         // OuterHeader: OuterHeader,
//         // AsideTabs: AsideTabs
//     },
// })
export default {
    name: 'AllPatients',
    data() {
        return {
            active: ''
        }
    },
    created() {
        this.active = this.$route.path;
    }
}

</script>

<style scoped>
h5 {
    font-weight: 600;
    font-size: 15px;
}
.details {
    position: absolute;
    right: 15px;
    color: #15416B;
}
thead th {
    border: 0 !important;
    padding-left: 0 !important;

}
.col-title {
    color: #C1C1C1;
}
/*.table th {*/
/*    padding: 0.5rem !important;*/
/*}*/
.main-content h5:first-child {
    margin-top: 10px!important;
}
</style>