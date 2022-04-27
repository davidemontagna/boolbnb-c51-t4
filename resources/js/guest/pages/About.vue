<template>
<div class="about-container">
    <div class="container">
    <h1>ECCO CHI SIAMO</h1>
        <div class="row row-cols-2 row-cols-md-1">
            <div class="col-12 col-md-6  d-flex justify-content-center align-items-center">
                <div class="name-section row row-cols-5 row-cols-md-1">
                    <div class="founder d-flex justify-content-between col-2 m-2 col-md-12 m-md-0 selected" @click="founderSelect(0)">Davide Montagna <a href="https://github.com/davidemontagna" target="_blank"><i class="fa-brands fa-github"></i></a></div>
                    <div class="founder d-flex justify-content-between col-2 m-2 col-md-12 m-md-0" @click="founderSelect(1)">Davide Masa <a href="https://github.com/Masadavide" target="_blank"><i class="fa-brands fa-github"></i></a></div>
                    <div class="founder d-flex justify-content-between col-2 m-2 col-md-12 m-md-0" @click="founderSelect(2)">Maurizio Mosiello <a href="https://github.com/Mosi8" target="_blank"><i class="fa-brands fa-github"></i></a></div>
                    <div class="founder d-flex justify-content-between col-2 m-2 col-md-12 m-md-0" @click="founderSelect(3)">Salvatore Milone <a href="https://github.com/SalvatoreMilone" target="_blank"><i class="fa-brands fa-github"></i></a></div>
                    <div class="founder d-flex justify-content-between col-2 m-2 col-md-12 m-md-0" @click="founderSelect(4)">Alessio Tomei <a href="https://github.com/Alessio-Tomei" target="_blank"><i class="fa-brands fa-github"></i></a></div>
                </div>
            </div>
            <div class="img-section col-12 col-md-6 d-flex justify-content-center align-items-center">
                <img class="about-img show" draggable="false" :src="require('/storage/app/public/resources/Montagna.png')">
                <img class="about-img hidden" draggable="false" :src="require('/storage/app/public/resources/Masa.png')">
                <img class="about-img hidden" draggable="false" :src="require('/storage/app/public/resources/Mosiello.png')">
                <img class="about-img hidden" draggable="false" :src="require('/storage/app/public/resources/Milone.png')">
                <img class="about-img hidden" draggable="false" :src="require('/storage/app/public/resources/Tomei.png')">
            </div>
        </div>
    </div>
</div>
</template>

<script>
export default {
    name: 'About',
    name: 'Header',
    data(){
        return{
            img: [],
            founders: [],
        }
    },
    methods: {
        founderSelect(id){
            this.img = document.querySelectorAll(".about-img");
            this.founders = document.querySelectorAll(".founder");

            this.img.forEach(imm => {
                imm.classList.remove("show")
                imm.classList.add("hidden")

                this.img[id].classList.add("show")
            });
             this.founders.forEach(founder => {
                founder.classList.remove("selected")

                this.founders[id].classList.add("selected")
            })
        }
    },
    mounted() {
    }
}
</script>

<style lang="scss" scoped>
@import '../../../sass/variables.scss';
.about-container{
    margin-top: 7rem;
    min-height: 80vh;
}

h1{
    font-weight: 300;
    font-size: 1.5rem;
    letter-spacing: .4rem;
}
a{
    color: $primary-red;
}
.img-section{
    min-height: 300px;
    -moz-user-select: none;
    -webkit-user-select: none;
    user-select: none;
    // pointer-events: none; 

    img{
        width: 50%;
        max-height: 300px;
        object-fit: cover;
        mask-image: url("../../../../storage/app/public/resources/circle-solid.svg");
        mask-repeat: no-repeat;
        mask-position: center;
    }
    img:last-child{
        width: 50%;
        mask-image: url("../../../../storage/app/public/resources/circle-solid.svg");
        mask-repeat: no-repeat;
        mask-position: calc(50% + 20px);
    }
}

.name-section{
    div{
        position: relative;
        transition: all 250ms ease;
        margin-top: 1rem !important;
        font-size: 2rem;
        opacity: .6;
    }
    .selected{
        border-radius: 1rem;
        color: $primary-red;
        font-weight: 900;
        opacity: 1;
        span{
            font-size: 3rem;
        }
    }
    div::after{
        content: "";
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        min-height: 2px;
        border-radius: 2px;
        background-color: rgb(214, 214, 214);
    }
    div:hover::after, div:active::after{
        background-color: $primary-red;
    }
    div.selected::after{
        background-color: $primary-red;
    }
}

.hidden{
    display: none;
    opacity: 0;
}

.show{
    display: block;
    animation: about 1000ms forwards ease-in-out;
}

@keyframes about {
    0%{
        opacity: 0;
    }
    100%{
        opacity: 1;
        width: 60%;
    }
}

@media (max-width: 768px) {
    div{
        font-size: .8rem !important;
    }
    .selected{
        span{
            font-size: 1rem !important;
        }
    }
}
</style>
