<template>
<main>
    <div class="ms_container">
        <div class="title">
            In evidenza
        </div>
        <div class="subtitle">
            Lasciati guidare dalla curiosità
        </div>
        *appartamenti sponsorizzaati*


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
@import '../../../../sass/variables.scss';

main{
    background-color: $primary-light;
}
.ms_container {
    width: 90vw;
    margin: 0 auto;

    .title{
        font-size: 30px;
        font-weight: bold;
    };

    .subtitle{
        font-size: 20px;
    }
}
</style>