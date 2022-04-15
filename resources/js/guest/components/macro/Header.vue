<template>
<header>
    <div class="wrapper">
    </div>
    <nav class="fixed-top">
        <div class="container">
            <div class="row">
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
        <form>
            <input type="text" name="search" id="search" placeholder="Search">
            <select name="services" id="services">
                <option value="" hidden aria-hidden>Services</option>
                <option value="service1">service-1</option>
                <option value="service2">service-2</option>
                <option value="service3">service-3</option>
                <option value="service4">service-4</option>
            </select>
            <label for="beds">Beds:</label>
            <input type="number" name="beds" id="beds" value="1" min="1" max="10">

            <input type="submit" value="Submit">
        </form>
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
header{
    height: 500px;
    background-image: url("https://images.pexels.com/photos/3278215/pexels-photo-3278215.jpeg?auto=compress&cs=tinysrgb&dpr=3&h=750&w=1260");
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    position: relative;
    margin-bottom: 3rem;
}

.main-searchbar{
    width: 100%;
    position: absolute;
    bottom: 0;
    transform: translateY(50%);

    & form{
    }
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

</style>