<template>
<div>
    <Apartments/>
    <SponsoredApartment/>
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

</style>
