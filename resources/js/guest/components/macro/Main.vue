<template>
<main>
    <router-view :key="$route.path"></router-view>   
</main>
</template>

<script>
export default {
    name: 'Main',
}    

</script>

<style lang="scss" scoped>
@import '../../../../sass/variables.scss';
main{
    background-color: $primary-light;
}
</style>