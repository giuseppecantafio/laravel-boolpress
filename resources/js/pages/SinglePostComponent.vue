<template>
    <div>
        <h1 v-if="post">
            {{ post.title }}
        </h1>
        <h3 v-html="post.content"></h3>
        <div v-if="post.tags">
            <h6>Tags</h6>
            <div v-for="tag in post.tags" :key="tag.id">
                {{ tag.name }}
            </div>
        </div>
        <form @submit.prevent="addComment()">
            <label for="username">Inserisci l'username</label>
            <input v-model="formData.username" type="text" />
            <label for="content">Inserisci il commento</label>
            <input v-model="formData.content" type="text" />
            <button type="submit">Invia</button>
        </form>
        <div v-if="post.comments.length > 0">
            <h6>Commenti</h6>
            <div v-for="comment in post.comments" :key="comment">
                {{ comment.content }}
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
            formData: {
                username: "",
                content: "",
                post_id: "",
            },
        };
    },
    methods: {
        addComment() {
            axios.post("/api/comments", this.formData).then((response) => {
                console.log(response);
                this.post.comments.push(response.data);
            });
        },
    },
    mounted() {
        const slug = this.$route.params.slug;
        axios
            .get(`/api/posts/${slug}`)
            .then((response) => {
                this.post = response.data;
                this.formData.post_id = this.post.id;
            })
            .catch((error) => {
                this.$router.push({ name: "page-404" });
            });
    },
};
</script>
<style lang="scss"></style>
