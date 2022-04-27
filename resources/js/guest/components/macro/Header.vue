<template>
<header>
    <div class="wrapper">
    </div>
    <nav class="fixed-top header-scrolled-bg">
        <div class="container">
            <div class="row ">
                <div class="col-6 col-md-4">
                    <router-link :to="{name: 'home'}" class="text-secondary ruouter-link"> <h1 class="logo">BBNB</h1></router-link>
                </div>
                <div class="header-routes col-4 justify-content-center align-items-center d-none d-md-flex ">
                    <li><router-link :to="{name: 'about'}" class="text-secondary ruouter-link">CHI SIAMO</router-link></li>
                </div>
                <div v-if="setLogin" class="col-6 col-md-4 d-flex justify-content-end align-items-center">
                    <a class="login" href="http://127.0.0.1:8000/user">
                        <button class="login-btn">
                            <div>Area Personale</div>
                        </button>
                    </a>
                </div>
                <div v-else class="col-6 col-md-4 d-flex justify-content-end align-items-center">
                    <a class="login" href="http://127.0.0.1:8000/login">
                        <button class="login-btn">
                            <div>Login</div>
                        </button>
                    </a>
                    <a class="login" href="http://127.0.0.1:8000/register">
                        <button class="login-btn">
                            <div>Diventa un Host</div>
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </nav>
</header>
</template>

<script>
export default {
    name: 'Header',
    data(){
        return{
            loginCheck: false,

        }
    },
    methods: {
        onScroll(e) {
            let headerScr = document.querySelector(".header-scrolled-bg");
            if(window.scrollY > 350){
                headerScr.classList.add("scrolled"); 
            }else if(window.scrollY < 350 && headerScr.classList.contains("scrolled")){
                headerScr.classList.remove("scrolled")
            }
        }
    },
    mounted() {
        window.addEventListener("scroll", this.onScroll, true)
    },
    beforeDestroy() {
        window.removeEventListener("scroll", this.onScroll, true)
    },
    computed: {
        setLogin() {
            let metaLogin = document.getElementById('meta-login');
            if (metaLogin != null) {
                this.loginCheck = metaLogin.content;
            }
            return this.loginCheck;
        }
    }
}
</script>

<style lang="scss" scoped>
@import '../../../../sass/variables.scss';
header{
    height: 500px;
    background-image: url("https://images.pexels.com/photos/3278215/pexels-photo-3278215.jpeg?auto=compress&cs=tinysrgb&dpr=3&h=750&w=1260");
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    position: relative;
}
.wrapper{
    position: absolute;
    width: 100%;
    height: 100%;
    background-color: rgba(#fff,.3);
}
.logo{
    color: $primary-red;
}
.header-routes{
    list-style: none;
}
.ruouter-link{
    text-decoration: none;
}
.login{
    text-decoration: none;
    color: white;
}
.login-btn{
    background-color: $primary-red;
    padding: 0 1rem;
    border: none;
    border-radius: 2rem;
    transition: all 250ms ease-in-out;
    margin-left: 10px;
    height: 3rem;
    color: white;

    &:hover, &:active{
        filter: brightness(1.2);
        box-shadow: 0px 2px 6px 1px rgba(0,0,0,.3);
    }
}

.header-scrolled-bg.scrolled{
    background-color: #222;
    padding: 10px 0;
}
</style>