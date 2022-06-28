<template>
    <section>
        <h1>My posts</h1>
        <ul v-if="posts.length > 0">
            <li v-for="(post, index) in posts" :key="post.id">
                {{ index }} - {{ post.title }}
                <router-link
                    :to="{ name: 'single-post', params: { slug: post.slug } }"
                    >Visualizza post</router-link
                >
            </li>
        </ul>
    </section>
</template>
<script>
export default {
    name: "PostsComponent",
    data() {
        return {
            posts: [],
        };
    },
    created() {
        axios.get("/api/posts").then((response) => {
            this.posts = response.data;
        });
    },
};
</script>
<style lang="scss"></style>
