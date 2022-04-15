<template>
<div id="app">
  <Header/>
  <Main/>
  <Footer/>
</div>
</template>

<script>

import Header from "./components/macro/Header.vue";
import Main from "./components/macro/Main.vue";
import Footer from "./components/macro/Footer.vue";

export default {
  name: 'App',
  components: {
    Header,
    Main,
    Footer,
  },
}
</script>

<style lang="scss">
@import "~bootstrap/scss/bootstrap";
@import url('https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap');
*{
  margin: 0;
  padding: 0;
  font-family: 'Roboto', sans-serif;
}
</style>
