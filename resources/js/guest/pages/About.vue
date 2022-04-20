<template>
<div class="about-container">
    <div class="container">
    <h1>ECCO CHI SIAMO</h1>
        <div class="row row-cols-2 row-cols-md-1">
            <div class="col-12 col-md-6  d-flex justify-content-center align-items-center">
                <div class="name-section row row-cols-5 row-cols-md-1">
                    <div class="founder col-2 m-2 col-md-12 m-md-0 selected" @click="founderSelect(0)"><span>D</span>avide Montagna</div>
                    <div class="founder col-2 m-2 col-md-12 m-md-0" @click="founderSelect(1)"><span>D</span>avide Masa</div>
                    <div class="founder col-2 m-2 col-md-12 m-md-0" @click="founderSelect(2)"><span>M</span>aurizio Mosiello</div>
                    <div class="founder col-2 m-2 col-md-12 m-md-0" @click="founderSelect(3)"><span>S</span>alvatore Milone</div>
                    <div class="founder col-2 m-2 col-md-12 m-md-0" @click="founderSelect(4)"><span>A</span>lessio Tomei</div>
                </div>
            </div>
            <div class="img-section col-12 col-md-6 d-flex justify-content-center align-items-center">
                <img class="about-img show" draggable="false" src="https://free3dicon.com/wp-content/uploads/2022/04/function-300x300.png.webp">
                <img class="about-img hidden" draggable="false" src="https://free3dicon.com/wp-content/uploads/2022/04/improvement-300x300.png.webp">
                <img class="about-img hidden" draggable="false" src="https://free3dicon.com/wp-content/uploads/2022/03/administration-300x300.png.webp">
                <img class="about-img hidden" draggable="false" src="https://free3dicon.com/wp-content/uploads/2022/03/impliment-300x300.png.webp">
                <img class="about-img hidden" draggable="false" src="https://free3dicon.com/wp-content/uploads/2022/04/establishment-300x300.png.webp">
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

.img-section{
    min-height: 300px;
    -moz-user-select: none;
    -webkit-user-select: none;
    user-select: none;
    pointer-events: none;

    img{
        width: 30%;
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
        transform: rotate(30deg);
    }
    100%{
        opacity: 1;
        width: 50%;
        transform: rotate(0deg);
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
