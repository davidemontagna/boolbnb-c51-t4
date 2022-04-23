<template>
    <section>
        <div class="container">
            <h2>In evidenza</h2>
            <h4>Lasciati guidare dalla curiosità</h4>
            <div class="ms_container position-relative">
                <div class="main position-absolute top-50 start-50 translate-middle d-flex" @mouseover="timerStop" @mouseleave="timer">
                    <div class="text-end">
                        <div v-for="(apartment, index) in apartments" :key="index" class="items_container position-relative center" :class="immagineCorrente(index)">
                            <div class="ms_card">
                                <div class="ms_img mx-auto position-relative">
                                    <img :src="'../storage/'+apartment.preview" alt="">
                                    <div class="ms_shadow position-absolute"></div>
                                    <div class="ms_sponsor position-absolute">I nostri preferiti</div>
                                    <div class="ms_description position-absolute">
                                        <p class="ms_beds mx-2">Numero di letti: {{apartment.num_beds}}</p>
                                    </div>
                                </div>
                                <div class="ms_text">
                                    <h2 class="ms_title my-2">{{apartment.title}}</h2>
                                    <h4 class="ms_city mt-3">{{apartment.location.city}}</h4>
                                    <p class="ms_address">{{apartment.location.address}}</p>
                                    <div class="ms_description2 d-flex justify-content-between mt-3">
                                        <p class="ms_rooms">Stanze: {{apartment.num_rooms}}</p>
                                        <p class="ms_bath">Bagni: {{apartment.num_bath}}</p>
                                        <p class="ms_square">Mq: {{apartment.square_footage}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                        <div class="arrows">
                            <div @click="indietro" class="prev  text-center"><i class="fa-solid fa-chevron-left"></i></div>
                            <div @click="avanti" class="next text-center"><i class="fa-solid fa-chevron-right"></i></div>
                        </div>

                </div>
            </div>



            <!-- <carousel v-bind:per-page-custom=[[0,1],[576,2],[992,3]]>
                <div v-for="(apartment, index) in apartments" :key="index">
                    <div class="ms_card">
                        <div class="ms_img mx-auto position-relative">
                            <img :src="apartment.preview" alt="">
                            <div class="ms_shadow position-absolute"></div>
                            <div class="ms_sponsor position-absolute">I nostri preferiti</div>
                            <div class="ms_description position-absolute">
                                <p class="ms_beds mx-2">Numero di letti: {{apartment.num_beds}}</p>
                            </div>
                        </div>
                        <div class="ms_text">
                            <h2 class="ms_title my-2">{{apartment.title}}</h2>
                            <h4 class="ms_city mt-3">{{apartment.location.city}}</h4>
                            <p class="ms_address">{{apartment.location.address}}</p>
                            <div class="ms_description2 d-flex justify-content-between mt-3">
                                <p class="ms_rooms">Stanze: {{apartment.num_rooms}}</p>
                                <p class="ms_bath">Bagni: {{apartment.num_bath}}</p>
                                <p class="ms_square">Mq: {{apartment.square_footage}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </carousel> -->
        </div>
    </section>
</template>

<script>

import { Carousel, Slide } from 'vue-carousel';
export default {
        name: 'SponsoredApartment',
    components: {
        Carousel,
        Slide
    },
    data() {
        return {
            apartments: [],
            corrente: 0,
        }
    },
    methods: {
        getApartments: function() {
            const dataLatLon = {
                lat : null,
                lon : null,
                range: 20,
            };
            axios.get('/api/apartments',
            {
                params: {
                    query: dataLatLon,
            }
            })
            axios.get('/api/apartments')
            .then(apiResponse => {
                this.apartments = apiResponse.data;
                })
            .catch(() => {
                console.log('error');
            });
        },
        
        

        immagineCorrente: function(indiceimmagine){
            if(indiceimmagine == this.corrente){
                return "active";
            }
            return "none";
        },
        avanti: function(){
            this.corrente ++;
            if(this.corrente == this.apartments.length){
                this.corrente = 0; 
            }
        },
        indietro: function(){
            this.corrente --;
            if(this.corrente < 0){
                this.corrente = this.apartments.length - 1;
            }
        },
        thumb: function(attivaIndex){
            this.corrente= attivaIndex
        },
        timer: function(){
            let start = this;
            this.tempo = setInterval (function(){
            start.avanti();
        },1000);
        },
        timerStop: function(){
            clearInterval(this.tempo);
        }
    },
    created() {
        this.getApartments();
        this.timer();
    }
};

</script>

<style lang="scss" scoped>
@import '../../../../sass/variables.scss';

.container{
    .ms_card{
        max-width: 500px;
        border: 1px solid $primary-grey;
        border-radius: 10px;
        padding: 1rem;
        box-shadow: 2px 2px 3px $primary-light;
        background-color: $primary-light;
    }

    .ms_img{
        width: 100%;
        height: 20vw;
        overflow: hidden;
        border-radius: 10px;
        object-fit: contain;

        

        &:hover{
                cursor: pointer;
            }
        &:hover .ms_shadow{
                display: none;  
            }

        img{
            transition: transform .2s;
            width: 100%;
            height: 100%;
            

            &:hover{
                transform: scale(1.5);
            }
        }
        
        .ms_sponsor{
            top: 10px;
            left: 10px;
            background-color: $primary-red;
            color: $primary-light;
            border-radius: 5px;
            padding: 2px 5px;
            cursor: default;
        }
    }

    .ms_shadow{
        border-radius: 0px 0px 10px 10px;
        width: 100%;
        height: 50%;
        background-image: linear-gradient(to bottom, rgba(0, 0, 0, 0), rgb(0, 0, 0))
    }

    .ms_description, .ms_shadow{
    left: 0;
    bottom: 0;
    }

    .ms_beds{
    font-size: 20px;
    color: $primary-light;
    cursor: default;
    }

    .ms_title{
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis; 

        &:hover{
                cursor: pointer;
            }
    }
    .ms_address, .ms_description2{
        color: $primary-grey;
    }
}




.ms_container{
    height: 500px;
    display: flex;
    justify-content: center;
}

.none{
    display: none;
}

.prev, .next{
    
}
.arrows{
    display: flex;
    align-items: center;
    justify-content: space-between;
    width: 100%;
    font-size: 4rem;
    position: absolute;
    top: 50%;
}
.main{
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100%;
    flex-direction: column;
    position: relative;
}
</style>