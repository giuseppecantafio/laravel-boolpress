<template>
    <div>
        <h1 v-if="post">
            {{ post.title }}
        </h1>
        <h3>
            {{ post.content }}
        </h3>
        <div v-if="post.tags">
            <div v-for="tag in post.tags" :key="tag.id">
                {{ tag.name }}
            </div>
        </div>
    </div>
</template>
<script>
export default {
    name: "SinglePostComponent",
    data() {
        return {
            post: null,
        };
    },
    mounted() {
        const slug = this.$route.params.slug;
        axios.get(`/api/posts/${slug}`).then((response) => {
            this.post = response.data;
        });
    },
};
</script>
<style lang="scss"></style>
