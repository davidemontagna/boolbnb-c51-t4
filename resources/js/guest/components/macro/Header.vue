<template>
<header>
    <div class="wrapper">
    </div>
    <nav class="fixed-top header-scrolled-bg">
        <div class="container">
            <div class="row ">
                <div class="col-6 col-md-4">
                    <h1 class="logo">BBNB</h1>
                </div>
                <div class="header-routes col-4 justify-content-center align-items-center d-none d-md-flex ">
                    <li class="pr-4"><router-link :to="{name: 'home'}" class="text-secondary ruouter-link">HOME</router-link></li>
                    <li><router-link :to="{name: 'about'}" class="text-secondary ruouter-link">CHI SIAMO</router-link></li>
                </div>
                <div class="col-6 col-md-4 d-flex justify-content-end align-items-center">
                        <a class="login" href="http://127.0.0.1:8000/login">
                            <button class="login-btn">
                                <div>Login</div>
                            </button>
                        </a>
                        <a class="login" href="http://127.0.0.1:8000/register">
                            <button class="login-btn">
                                <div>Register</div>
                            </button>
                        </a>
                </div>
            </div>
        </div>
    </nav>

    <div class="main-searchbar d-flex justify-content-center align-item-center">
        <form class="d-flex justify-content-center align-items-center">
            <input type="text" name="text" id="text" placeholder="search">

            <div class="multiselect justify-content-center align-items-center d-none d-sm-flex" id="multiselect">
                <div class="services" @click="services()">Services &#x2193;</div>
                <div class="multiselect-options hidden" id="multiselectOptions">
                    <div>
                        <input type="checkbox" name="checkbox1" id="">
                        <label for="checkbox1">1</label>
                    </div>
                    <div>
                        <input type="checkbox" name="checkbox2" id="">
                        <label for="checkbox2">2</label>
                    </div>
                </div>
            </div>

            <label for="beds" class="d-none d-sm-block">Beds:</label>
            <input type="number" name="beds" id="beds" value="1" min="1" max="10" class="d-none d-sm-block">

            <input type="submit" value="Submit" id="submit">
        </form>
    </div>
</header>
</template>

<script>
export default {
    name: 'Header',
    data(){
        return{

        }
    },
    methods: {
        services(){
            //funzione per far sparire ed apparire le opzioni checkbox

            let multiselectOptions = document.getElementById("multiselectOptions");

            if(multiselectOptions.classList.contains("hidden")){
                multiselectOptions.classList.remove("hidden");
            }else{
                multiselectOptions.classList.add("hidden");
            }
        },
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
    margin-bottom: 3rem;
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
        padding: 0 1.1rem;
        filter: brightness(1.2);
        box-shadow: 0px 2px 6px 1px rgba(0,0,0,.3);
    }
}


.main-searchbar{
    width: 100%;
    position: absolute;
    bottom: 0;
    transform: translateY(50%);

    & form{
        background-color: $primary-red;
        width: fit-content;
        padding: 5px;
        height: 80px;
        border-radius: 3rem;
        overflow: hidden;
        
        & > *{
            border: none;
            background-color: transparent;
            color: white;
        }

        & input#text{ 
            width: 100px;
            padding-left: 10px;
        }
        & .multiselect{
            width: 100px;
            margin: 0 20px;
        }
        & input#beds{
            width: 50px;
            margin: 0 10px;
        }
        & input#submit{
            background-color: white;
            color: black;
            height: 4rem;
            width: 4rem;
            border-radius:50% ;
        }
    }
}

label{
    margin: 0;
}
::placeholder{
    color: white;
}

.multiselect-options{
    position: absolute;
    bottom: -50px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: flex-start;
    width: 100px;
    background-color: white;
    border: 1px solid gray;
    padding: 10px;
    border-radius: 1rem;
    color: $primary-red;
}
.hidden{
    display: none;
}

.header-scrolled-bg.scrolled{
    background-color: #222;
    padding: 10px 0;
}
</style>