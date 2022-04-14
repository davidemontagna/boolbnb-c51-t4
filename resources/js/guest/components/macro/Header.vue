<template>
<header>
    <h1>Header</h1>
    <!-- bottone loging che sposteremo nell'header -->
    <button>
        <a class="my_a login" href="http://127.0.0.1:8000/login">
            <p class="my_button">Login</p>
        </a>
    </button>
    <button>
        <a class="my_a login" href="http://127.0.0.1:8000/register">
            <p class="my_button">Register</p>
        </a>
    </button>
    <nav>
        <li><router-link :to="{name: 'home'}">HOME</router-link></li>
        <li><router-link :to="{name: 'about'}">CHI SIAMO</router-link></li>
    </nav>
</header>
</template>

<script>
export default {
    name: 'Header',
}
</script>

<style lang="scss" scoped>
@import '../../../../sass/global.scss';
</style>