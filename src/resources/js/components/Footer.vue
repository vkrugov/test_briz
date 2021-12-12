<template>
    <div class="footer-content">
        <div class="footer-logo">
            <img src="/images/LogoFooter.svg">
        </div>
        <div class="row footer-text">
            <div class="col-md-6">
                <p>© 2021 All rights reserved.</p>
            </div>
            <div class="col-md-6 text-lg-right">
                <p>
                    created by
                    <a target="_blank" class="text-white reset-anchor" href="http://linkedin.com/in/vladimir-krugov">
                        Vladymyr Krugov
                    </a>
                </p>
            </div>
        </div>
    </div>
</template>

<script>

export default {
    name: "Footer",
}
</script>

<style scoped>
.footer-content {
    background-color: #424242;
    color: #fff;
    min-height: 100px;
    font-family: Roboto-Bold,sans-serif;
    padding: 32px;
}
.footer-logo {
    margin-bottom: 20px;
}
</style>
