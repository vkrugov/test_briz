<template>
    <div>
        <b-navbar toggleable="lg" class="header">
            <b-navbar-brand>
                <router-link class="navbar-brand" :to="{name: 'home'}">
                        <span class="">
                            <img src="/images/logo.svg" alt="briz-logo">
                        </span>
                </router-link>
            </b-navbar-brand>
        </b-navbar>
    </div>
</template>

<script>

export default {
    name: "Navbar",
};
</script>

<style scoped>
.header {
    background-color: #fff;
}
</style>
