<template>
    <section class="container">
        <div class="row">
            <div class="col-3">
                <nav>
                    <ul>
                        <li v-for="category in categories" :key="category.id">
                            <router-link
                                :to="{
                                    name: 'categories',
                                    params: { slug: category.slug },
                                }"
                                >{{ category.name }}</router-link
                            >
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="col-9"></div>
        </div>
    </section>
</template>
<script>
export default {
    name: "HomeComponent",
    data() {
        return {
            categories: [],
        };
    },
    created() {
        axios
            .get("/api/categories")
            .then((res) => {
                this.categories = res.data;
            })
            .catch((error) => {
                console.log(error);
            });
    },
};
</script>
<style lang="scss"></style>
