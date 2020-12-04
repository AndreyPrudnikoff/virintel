<template>
    <div>
        <div class="btn-back"><router-link
                to="/patient/tests"><span class="back-icon"></span>
            <span class="back-ref"></span> </router-link></div>

        <table class="table">

            <tbody>
            <tr>
                <td aria-label="ID" scope="row" >123456</td>
                <td aria-label="Date">28/07/2020 </td>
                <td aria-label="Name">John Smith</td>
                <td aria-label="Laboratory" >Laboratory DGFHFJ</td>
                <td aria-label="Healthcare Provider">Anjelina Jolie </td>
                <td aria-label="Status">Done</td>
            </tr>

            </tbody>
        </table>
        <h5 class="caption">Commentary from the healthcare provider.</h5>
        <p>
            Coronaviruses are a group of related RNA viruses that cause diseases in mammals and birds.
            In humans, these viruses cause respiratory tract infections that can range from mild to lethal.
            Mild illnesses include some cases of the common cold (which is also caused by other viruses,
            predominantly rhinoviruses), while more lethal varieties can cause SARS, MERS, and COVID-19.
            Symptoms in other species vary: in chickens, they cause an upper respiratory tract disease,
            while in cows and pigs they cause diarrhea. There are as yet no vaccines or antiviral drugs
            to prevent or treat human coronavirus infections.
        </p>
    </div>
</template>

<script>
export default {
    name: "TestView",
    data() {
        return {
            activeRoute: ''
        }
    },
    created() {
        this.activeRoute = this.$route.path;
        this.$emit('routeFromChild', this.activeRoute)

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
    padding: 0 30px;
    content: 'Back';
    position: absolute;
    font-weight: 600;
    font-size: 15px;
    color: #15416B;
    top: 20px;
    left: 15px;
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
.th-title {
    font-weight: 600;
    font-size: 15px;
    color: #C1C1C1;
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
.table td, .table th {
    border-top: 0 !important;
}
.table {
    border: 1px solid #C1C1C1;
}
textarea {
    resize: none;
    width: 100%;
    border: 1px solid #C1C1C1;
}
.comment-sbmt-btn {
    margin: 25px 0;
    background: #15416B;
    border-radius: 20px;
    padding: 0 20px;
    border: 1px solid #15416B;
    color: #fff;
    cursor: pointer;
}
.comment-sbmt-btn:hover {
    background: transparent;
    color: #000;
    /*border: 1px solid #15416B;*/
}
</style>