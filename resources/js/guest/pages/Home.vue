<template>
<div>
    <h1>Home Page</h1>
    <Apartments/>
</div>
</template>

<script>

import Apartments from '../components/sections/Apartments.vue'

export default {
    name: 'Home',
    components: {
        Apartments, 
    },
}
</script>

<style lang="scss" scoped>

</style>
