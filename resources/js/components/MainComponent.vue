<template>
    <main>
        <router-view> </router-view>
    </main>
</template>
<script>
import Axios from "axios";

export default {
    name: "MainComponent",
    data() {
        return {
            posts: [],
        };
    },
};
</script>
<style lang="scss"></style>
