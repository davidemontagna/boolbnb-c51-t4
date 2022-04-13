<template>
<main>
    <h1>Main</h1>
    <div class="container">
        <router-view :key="$route.path"></router-view>
    </div>    
</main>
</template>

<script>
export default {
    name: 'Main',
}    
</script>

<style lang="scss" scoped>
.container {
    width: 80%;
    margin: 0 auto;
}

</style>