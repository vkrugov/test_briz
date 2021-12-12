<template>
    <div id="main-app">
        <app-navbar/>
        <div class="site-content">
            <router-view/>
        </div>
        <app-footer/>
    </div>
</template>
<script>
import Navbar from "./Navbar.vue";
import Footer from "./Footer.vue";

export default {
    name: "App",
    components: {
        "app-navbar": Navbar,
        "app-footer": Footer,
    },
};
</script>

<style scoped>
.site-content {
    background-color: #fbfbfb;
    min-height: 700px;
    padding-top: 20px;
}
</style>
