<template>
    <div>
        <header>
            <ul class="d-flex justify-content-center flex-end">
                <li>
                    <a href="/">Home</a>
                </li>
                <li>
                    <a href="/admin" class="px-4">Area riservata</a>
                </li>
            </ul>
        </header>
    </div>
</template>
<script>
export default {
    name: "HeaderComponent",
};
</script>
<style lang="scss" scoped>
ul {
    list-style-type: none;
}
</style>
