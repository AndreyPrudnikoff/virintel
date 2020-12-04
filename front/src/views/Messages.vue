<template>
    <div>
        <section class="main">
            <div class="container">
                <div class="row">
                    <AsideTabs v-bind:route="this.activeRoute" />
                    <main class="main-content col-sm-10">
                        <h1>Doctor Messages</h1>
                    </main>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
// import { Emit, Component, Vue } from 'vue-property-decorator';
import OuterHeader from '@/components/OuterHeader.vue';
import AsideTabs from "@/components/AsideTabs-Doctor.vue";

export default {
    name: 'Messages',
    components: {
        AsideTabs,
        OuterHeader
    },
    data() {
        return {
            activeRoute: ''
        }
    },
    // @Emit()
    // private testEmit() : void {
    //     this.$emit('routFromChild', this.activeRoute);
    //     // console.log(this.activeRoute, ' child all patients')
    // }

    created() {
        this.activeRoute = this.$route.path;
        // this.testEmit();
    }
}
</script>

<style scoped>
.nav-aside {
    padding: 0 !important;
}

.main {
    min-height: calc(100vh - 140px);/*header*/
    margin-top: 60px;
}


</style>