<template>
    <div>
        <h1>{{ category.name }}</h1>
        <ul v-if="category && category.posts.length > 0">
            <li v-for="(post, index) in category.posts" :key="post.id">
                {{ index }} - {{ post.title }}
                <router-link
                    :to="{ name: 'single-post', params: { slug: post.slug } }"
                    >Visualizza post</router-link
                >
            </li>
        </ul>
    </div>
</template>
<script>
export default {
    name: "CategoryComponent",
    data() {
        return {
            category: null,
        };
    },
    mounted() {
        const slug = this.$route.params.slug;
        axios
            .get(`/api/categories/${slug}`)
            .then((response) => {
                this.category = response.data;
            })
            .catch((error) => {
                this.$router.push({ name: "page-404" });
            });
    },
};
</script>
<style lang="scss"></style>
