<template>
    <div>
        <header>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <button
                    class="navbar-toggler"
                    type="button"
                    data-toggle="collapse"
                    data-target="#navbarNav"
                    aria-controls="navbarNav"
                    aria-expanded="false"
                    aria-label="Toggle navigation"
                >
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <div class="navbar-nav">
                        <div v-for="(item, index) in menuItem" :key="index">
                            <router-link
                                :to="{ name: item.routeName }"
                                class="nav-link navbar-brand"
                                >{{ item.label }}</router-link
                            >
                        </div>
                    </div>
                </div>
            </nav>
        </header>
    </div>
</template>
<script>
export default {
    name: "HeaderComponent",
    data() {
        return {
            menuItem: [
                {
                    label: "Home",
                    routeName: "home",
                },
                {
                    label: "Posts",
                    routeName: "posts",
                },
                {
                    label: "Chi siamo",
                    routeName: "about",
                },
                {
                    label: "Contatti",
                    routeName: "contact",
                },
            ],
        };
    },
};
</script>
<style lang="scss" scoped>
router-link-exact-active {
    color: white !important;
}
</style>
