<template>
<div>
    <SponsoredApartment/>

    <div class="ms_background">
        <Apartments/>
    </div>
</div>
</template>

<script>

import Apartments from '../components/sections/Apartments.vue';
import SponsoredApartment from "../components/sections/SponsoredApartments.vue";

export default {
    name: 'Home',
    components: {
        Apartments, 
        SponsoredApartment,
    },
}
</script>

<style lang="scss" scoped>
@import '../../../sass/variables.scss';
.ms_background{
    background-color: $primary-lightgrey;
}
</style>
