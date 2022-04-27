<template>
    <section class="section-sponsored pb-5">
        <div class="row mb-3 justify-content-around">
            <h4 class="title">Lasciati guidare dalla curiosità</h4>
        </div>
        <div v-if="loading" class="row justify-content-around"  @mouseover="timerStop" @mouseleave="timer">
            <div class="sm-card-container flex-column col-10 col-md-5 col-xl-3 p-0 ">
                <router-link :to="{name: 'single-apartment', params:{slug: apartments[setIndex(0)].slug}}" class="router-link">
                <div class="sm-card-top" :class="cardColor()">
                    <img :src="'../storage/'+apartments[setIndex(0)].preview">
                </div>
                <div class="sm-card-bottom" :class="cardColor()">
                    <h4>{{apartments[setIndex(0)].title}}</h4>
                    <p>{{apartments[setIndex(0)].location.city}}</p>
                    <p>{{apartments[setIndex(0)].location.address}}</p>
                </div>
                </router-link>
            </div>
            <div class="sm-card-container flex-column d-none d-md-flex col-5 col-xl-3 p-0 ">
                <router-link :to="{name: 'single-apartment', params:{slug: apartments[setIndex(1)].slug}}" class="router-link">
                <div class="sm-card-top" :class="cardColor()">
                    <img :src="'../storage/'+apartments[setIndex(1)].preview">
                </div>
                <div class="sm-card-bottom" :class="cardColor()">
                    <h4>{{apartments[setIndex(1)].title}}</h4>
                    <p>{{apartments[setIndex(1)].location.city}}</p>
                    <p>{{apartments[setIndex(1)].location.address}}</p>
                </div>
                </router-link>
            </div>
            <div class="sm-card-container flex-column d-none d-xl-flex col-3 p-0">
                <router-link :to="{name: 'single-apartment', params:{slug: apartments[setIndex(2)].slug}}" class="router-link">
                <div class="sm-card-top" :class="cardColor()">
                    <img :src="'../storage/'+apartments[setIndex(2)].preview">
                </div>
                <div class="sm-card-bottom" :class="cardColor()">
                    <h4>{{apartments[setIndex(2)].title}}</h4>
                    <p>{{apartments[setIndex(2)].location.city}}</p>
                    <p>{{apartments[setIndex(2)].location.address}}</p>
                </div>
                </router-link>
            </div>
        </div>
        <div class="arrows" @mouseover="timerStop" @mouseleave="timer">
            <div @click="indietro" class="prev  text-center"><i class="fa-solid fa-chevron-left"></i></div>
            <div @click="avanti" class="next text-center"><i class="fa-solid fa-chevron-right"></i></div>
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
            loading: false,
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
                this.loading = true;
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
        },3000);
        },
        timerStop: function(){
            clearInterval(this.tempo);
        },
        cardColor: function(){
            let colors = [
                "bg-secondary1",
                "bg-secondary2",
                "bg-secondary3",
                "bg-secondary4"
            ]
            let rand = Math.floor(Math.random() * 4);

            return colors[rand]
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
@import url('https://fonts.googleapis.com/css2?family=Square+Peg&display=swap');

.section-sponsored{
    min-height: 50vh;
}
.router-link{
    color: white;
    text-decoration: none;
}
.sm-card-container{
    // display: none;
    border-radius: 1rem;
    overflow: hidden;
    color: white;

    .sm-card-top{
        width: 100%;
        height: 200px;
            overflow: hidden;

        img{
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
    }
    .sm-card-bottom{
        padding: 1rem;
        width: 100%;
        min-height: 230px;
        border-radius: 0 0 15px 15px;
    }
}
.sm-card-container.active{
    display: flex;
}

.bg-secondary1{
    background-color: #bc1a6e;
}
.bg-secondary2{
    background-color: #cc2d4a;
}
.bg-secondary3{
    background-color: #de3151;
}
.bg-secondary4{
    background-color: #d93b30;
}

.arrows{
    position: relative;
    width: 100%;
    bottom: 225px;
    transform: translateY(-50%);
    .prev{
        position: absolute;
        left: 0;
    }
    .next{
        position: absolute;
        right: 0;
    }
}

.title{
    font-family: 'Square Peg', cursive;
    font-size: max(4vw, 2.2rem);
    color: $primary-red;
}
</style>