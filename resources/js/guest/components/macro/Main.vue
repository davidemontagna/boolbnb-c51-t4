<template>
<main>
    <h1>ciao</h1>
    <div class="container">
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
@import '../../../../sass/global.scss';

.container {
    width: 95%;
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