<template>
    <div>
        <h1>Ciao sono il main component</h1>
        <ul>
            <li v-for="(post, index) in posts" :key="index">
                {{ post.title }}
                <a href="#" @click="getDetail(post.slug, index)"
                    >Vedi dettaglio</a
                >
                <span v-if="post.detail">{{ post.detail.slug }}</span>
            </li>
        </ul>
    </div>
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
    methods: {
        getDetail(slug, index) {
            Axios.get("/api/posts/" + slug).then((response) => {
                this.posts[index].detail = response.data;
                console.log(this.posts[index].detail);
            });
        },
    },
    created() {
        Axios.get("/api/posts").then((response) => {
            this.posts = response.data;
            console.log(this.posts);
        });
    },
};
</script>
<style lang="scss"></style>
