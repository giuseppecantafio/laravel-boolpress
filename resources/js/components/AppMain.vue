<template>
    <div class="text-center">
        <h1>{{ titolo }}</h1>
        <h2>{{ sottotitolo }}</h2>
        <h6>Vai ai <a href="http://127.0.0.1:8000/admin/posts">post</a></h6>
    </div>
</template>
<script>
export default {
    name: "AppMain",
    data() {
        return {
            titolo: "Work in progress",
            sottotitolo: "lavori in corso",
        };
    },
};
</script>
<style lang="scss"></style>
