<template>
    <section>
        <div class="row">
                <h4>Lasciati guidare dalla curiosità</h4>
        </div>
        <div class="row"  @mouseover="timerStop" @mouseleave="timer">
                
                <div class="sm-card-container flex-column col-3 p-0 ">
                    
                    <div class="sm-card-top">
                        <img :src="'../storage/'+apartments[setIndex(0)].preview">
                    </div>
                    <div class="sm-card-bottom">
                        <h3>{{apartments[setIndex(0)].title}}</h3>
                        <p>{{apartments[setIndex(0)].location.city}}</p>
                        <p>{{apartments[setIndex(0)].location.address}}</p>
                    </div>
                </div>

                <div class="sm-card-container flex-column col-3 p-0 ">
                
                    <router-link :to="{name: 'single-apartment', params:{slug: apartments[setIndex(1)].slug}}" class="router-link">

                    <div class="sm-card-top">
                        <img :src="'../storage/'+apartments[setIndex(1)].preview">
                    </div>
                    <div class="sm-card-bottom">
                        <h3>{{apartments[setIndex(1)].title}}</h3>
                        <p>{{apartments[setIndex(1)].location.city}}</p>
                        <p>{{apartments[setIndex(1)].location.address}}</p>
                    </div>

                    </router-link>
                    
                </div>

                <div class="sm-card-container flex-column col-3 p-0 ">
                    
                    <div class="sm-card-top">
                        <img :src="'../storage/'+apartments[setIndex(2)].preview">
                    </div>
                    <div class="sm-card-bottom">
                        <h3>{{apartments[setIndex(2)].title}}</h3>
                        <p>{{apartments[setIndex(2)].location.city}}</p>
                        <p>{{apartments[setIndex(2)].location.address}}</p>
                    </div>
                </div>

                <div class="arrows" @mouseover="timerStop" @mouseleave="timer">
                    <div @click="indietro" class="prev  text-center"><i class="fa-solid fa-chevron-left"></i></div>
                    <div @click="avanti" class="next text-center"><i class="fa-solid fa-chevron-right"></i></div>
                </div>

        </div>
                 <!-- 
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
                        <p class="ms_square">Mq: {{apartment.square_footage}}</p> -->
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
                range: null,
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
                this.orderBySponsorized(); 
                })
            .catch(() => {
                console.log('error');
            });
        },
        orderBySponsorized: function() {
            let sponsorized = [];
            const today = new Date();

            this.apartments.forEach(apartment => {
                let first = true;
                apartment.plans.forEach(plan => {
                    if (Date.parse(plan.pivot.date_end) >= Date.parse(today) && first) {
                        first = false;
                        sponsorized.push(apartment);
                    }
                });
            });
            console.log(sponsorized.length);
            this.apartments = sponsorized;
        },
        checkSponsorized: function(apartment){  
            const today = new Date();

            let check = false;

            apartment.plans.forEach(plan => {   
                if (Date.parse(plan.pivot.date_end) >= Date.parse(today)) {
                    check = true;
                }
            });
                    console.log(check)
            return check;
        },
        setIndex: function(position){
            if (this.corrente + position >= this.apartments.length) {
                return position - 1;
            } else {
               return this.corrente + position; 
            }
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
    },
    computed: {
    }
};

</script>

<style lang="scss" scoped>
@import '../../../../sass/variables.scss';
.sm-card-container{
    // display: none;
    border-radius: 1rem;
    overflow: hidden;
    color: white;

    .sm-card-top{
        width: 100%;
        height: 200px;
        background-color: $primary-red;

        img{
            width: 100%;
            object-fit: cover;
        }
    }
    .sm-card-bottom{
        padding: 1rem;
        width: 100%;
        background-color: $primary-red;
        height: 230px;
    }
}
.sm-card-container.active{
    display: flex;
}

</style>