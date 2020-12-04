<template>
    <nav>
        <ul class="nav-list">
            <span class="title-menu">MENU</span>
            <li :class="[route === '/patient/profile' ? activeClass : '', 'nav-item']">
                <router-link to="/patient/profile" class="nav-link">
                    <span>My Profile</span>
                </router-link>
            </li>
            <li :class="[(route === '/patient/tests' || route === '/patient/test/id')? activeClass : '', 'nav-item']">
                <router-link to="/patient/tests" class="nav-link">
                    <span>My Tests</span>
                </router-link>
            </li>
<!--            <li :class="[(route === '/patient/my-doctors' || route === '/patient/my-doctors/id' ) ? activeClass : '', 'nav-item']">-->
<!--                <router-link to="/patient/my-doctors" class="nav-link">-->
<!--                    <span>Healthcare Provider</span>-->
<!--                </router-link>-->
<!--            </li>-->
<!--            <li :class="[route === '/patient/messages' ? activeClass : '', 'nav-item']">-->
<!--                <router-link to="/patient/messages" class="nav-link">-->
<!--                    <span>Messages</span>-->
<!--                </router-link>-->
<!--            </li>-->
            <li :class="[route === '/patient/group' ? activeClass : '', 'nav-item']">
                <router-link to="/patient/group" class="nav-link">
                    <span>Group of Patients</span>
                </router-link>
            </li>
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
