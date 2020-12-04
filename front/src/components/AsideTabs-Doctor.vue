<template>
    <nav>
        <ul class="nav-list">
            <span class="title-menu">MENU</span>
            <li :class="[route === '/doctor/profile' ? activeClass : '', 'nav-item']">
                <router-link to="/doctor/profile" class="nav-link">
                    <span>My Profile</span>
                </router-link>
            </li>
            <li :class="[(route === '/doctor/patients' || route === '/doctor/patient/view')? activeClass : '', 'nav-item']">
                <router-link to="/doctor/patients" class="nav-link">
                    <span>My Patients</span>
                </router-link>
            </li>
            <li :class="[(route === '/doctor/tests' || route === '/doctor/test/id' ) ? activeClass : '', 'nav-item']">
                <router-link to="/doctor/tests" class="nav-link">
                    <span>Tests</span>
                </router-link>
            </li>
<!--            <li :class="[route === '/doctor/messages' ? activeClass : '', 'nav-item']">-->
<!--                <router-link to="/doctor/messages" class="nav-link">-->
<!--                    <span>Messages</span>-->
<!--                </router-link>-->
<!--            </li>-->
        </ul>
    </nav>
</template>

<script>
export default  {
    name: 'AsideTabs',
    props: ['route'],
    data()  {
        return {
            activeClass:  'active'
        }
    }
}

</script>

<style scoped>
.nav-list {
    margin-top: 10px;
}
.nav-aside {
    padding: 0 !important;
}
.nav-aside {
    text-align: left;

}
.active a{
    background-color: #15416B;
    color: #fff;
}
.title-menu {
    margin-left: 15px;
    font-weight: 600;
    font-size: 15px;
    letter-spacing: 0.02em;
    color: #C1C1C1;

}


.nav-link {
    font-weight: 600;
    font-size: 15px;
    color: #000;
}


</style>
