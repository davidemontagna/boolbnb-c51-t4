<template>
<main>
    <section>
    <SponsoredApartment/>
    </section>
    <router-view :key="$route.path"></router-view>   
</main>
</template>

<script>
import SponsoredApartment from "../sections/SponsoredApartments.vue";
/* import { Carousel, Slide } from 'vue-carousel'; */
export default {
    name: 'Main',
    components: {
    SponsoredApartment,
    },
}    

</script>

<style lang="scss" scoped>
@import '../../../../sass/variables.scss';
main{
    background-color: $primary-light;
}
section{
    background-color: $primary-lightgrey;
}
</style>