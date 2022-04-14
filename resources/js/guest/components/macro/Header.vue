<template>
<header>
    <div class="header-container">
        <div>
            <h1 class="logo">BBNB</h1>
        </div>
        <div class="header-routes">
            <li><router-link :to="{name: 'home'}" class="router-link">HOME</router-link></li>
            <li><router-link :to="{name: 'about'}" class="router-link">CHI SIAMO</router-link></li>
        </div>
        <div>
            <button class="login-btn">
                <a class="login" href="http://127.0.0.1:8000/login">
                    <p class="">Login</p>
                </a>
            </button>
            <button class="login-btn">
                <a class="login" href="http://127.0.0.1:8000/register">
                    <p class="">Register</p>
                </a>
            </button>
        </div>
    </div>
    
</header>
</template>

<script>
export default {
    name: 'Header',
}
</script>

<style lang="scss" scoped>
@import '../../../../sass/global.scss';
.logo{
    color: $primary-red;
}
.header-container{
    width: calc(100% - 4rem);
    height: 3rem;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding:0 2rem;
    text-decoration: none;
}

.header-routes{
    display: flex;
    align-items: center;
    justify-content: center;
    list-style: none;
    height: 100%;
    font-size: 1rem;
    & > *{
        padding: 0 10px;
    }

    .router-link{
        color: $primary-dark;
        text-decoration: none;
    }

    .router-link:hover{
        color: $primary-red;
    }
}
.login{
    text-decoration: none;
    color: white;
}
.login-btn{
    background-color: $primary-red;
    padding: .5rem 1rem;
    border: none;
    border-radius: 100px;
    transition: all 250ms ease-in-out;

    &:hover{
        padding: .6rem 1.1rem;
        font-weight: bold;
        background-color: $secondary-3;
    }
}

</style>