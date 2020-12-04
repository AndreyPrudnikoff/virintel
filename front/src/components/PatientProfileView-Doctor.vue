<template>
    <div>
        <div class="btn-back"><router-link
                to="/doctor/patients"><span class="back-icon"></span>
            <span class="back-ref"></span></router-link> </div>
        <h5 class="caption">Profile</h5>
        <table class="table">
            <tbody>
            <tr>
                <th scope="row">
                    <span class="title-field">Name </span>
                    <span class="details">John Smith </span>
                </th>
            </tr>
            <tr>
                <th scope="row">
                    <span class="title-field">Date of birth </span>
                    <span class="details">28/07/1998 </span>
                </th>
            </tr>
            <tr>
                <th scope="row">
                    <span class="title-field">Sex </span>
                    <span class="details">Male </span>
                </th>

            </tr>
            <hr class="divider">
            <tr>
                <th scope="row">
                    <span class="title-field">Phone number </span>
                    <span class="details">+12136809130 </span>
                </th>
            </tr>
            <tr>
                <th scope="row">
                    <span class="title-field">State </span>
                    <span class="details">California </span>
                </th>
            </tr>
            <tr>
                <th scope="row">
                    <span class="title-field">City </span>
                    <span class="details">Los Angeles </span>
                </th>
            </tr>
            <tr>
                <th scope="row">
                    <span class="title-field">Street </span>
                    <span class="details">E 1st St </span>
                </th>
            </tr>
            <tr>
                <th scope="row">
                    <span class="title-field">Zip </span>
                    <span class="details">90012 </span>
                </th>
            </tr>
            <hr class="divider">
            <tr>
                <th scope="row">
                    <span class="title-field">Insuranse </span>
                    <span class="details">Insuranse </span>
                </th>
            </tr>
            <tr>
                <th scope="row">
                    <span class="title-field">Medical conditions </span>
                    <span class="details">Information on chronic diseases </span>
                </th>
            </tr>
            <hr class="divider">
            <tr>
                <th scope="row">
                    <span class="title-field">E-mail </span>
                    <span class="details">johnsmith@gmail.com </span>
                </th>
            </tr>
            </tbody>
        </table>
        <h5 class="caption">Requests</h5>
        <table class="table">
            <thead>
            <tr>
                <th scope="col" class="th-title">ID</th>
                <th scope="col" class="th-title">Date</th>
                <th scope="col" class="th-title">Patient</th>
                <th scope="col" class="th-title">Status</th>
                <th scope="col" class="th-title">Access</th>
            </tr>
            </thead>
            <tbody>
            <tr style="border-bottom: 0.3px solid #d8d8d8;">
                <td aria-label="ID" scope="row" >123456</td>
                <td aria-label="Date">28/07/2020 </td>
                <td aria-label="Patient">John Smith</td>
                <td aria-label="Status" class="status-new">New</td>
                <td aria-label="Access"><span class="accept"></span> <span class="denied"></span></td>
            </tr>

            <tr style="border-bottom: 0.3px solid #d8d8d8;">


                <td aria-label="ID" scope="row">123456</td>
                <td aria-label="Date">28/07/2020 </td>
                <td aria-label="Patient">John Smith</td>
                <td aria-label="Status" class="status-assigned">Assigned</td>
                <router-link to="/doctor/test/id"><td aria-label="Access">More</td></router-link>
            </tr>
            <tr style="border-bottom: 0.3px solid #d8d8d8;">
                <td aria-label="ID" scope="row">123456</td>
                <td aria-label="Date">28/07/2020 </td>
                <td aria-label="Patient">John Smith</td>
                <td aria-label="Status" class="status-process">In Process</td>
                <router-link to="/doctor/test/id"><td aria-label="Access">More</td></router-link>
            </tr>
            <tr>
                <td aria-label="ID" scope="row">123456</td>
                <td aria-label="Date">28/07/2020 </td>
                <td aria-label="Patient">John Smith</td>
                <td aria-label="Status" class="status-done">Done</td>
                <router-link to="/doctor/test/id"><td aria-label="Access" >More</td></router-link>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    name: 'PatientProfileView',
    data() {
        return {
            activeRoute: ''
        }
    },
    created() {
        this.activeRoute = this.$route.path;
        this.$emit('routeFromChild', this.activeRoute)

        // console.log('test child');
        // this.testEmit();
    }
}
</script>

<style scoped>
.btn-back {
    position: relative;
    padding: 40px 0;
}
.back-icon:before {
    position: absolute;
    content: url("../assets/img/back_btn.svg");
    left: 10px;
    top: 20px;
}
.back-icon:after {
    content: 'Back';
    position: absolute;
    font-weight: 600;
    font-size: 15px;
    color: #15416B;
    top: 20px;
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
    padding-left: 10px;
}
.title-field {
    display: inline-block;
    width: 200px;
    font-weight: 300;
    font-size: 15px;
}
.details {
    font-weight: 300;
    font-size: 15px;
    color: #A2A2A2;
}
.table td, .table th {
    border: 0 !important;
}
.divider {
    margin-top: 0 !important;
    margin-bottom: 0 !important;
    /*color: #C1C1C1 !important;*/
}
.th-title {
    font-weight: 600;
    font-size: 15px;
    color: #C1C1C1;
}
.accept {
    content: url("../assets/img/access_icon.svg");
    cursor: pointer;
}
.denied {
    content: url("../assets/img/denied_icon.svg");
    cursor: pointer;
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