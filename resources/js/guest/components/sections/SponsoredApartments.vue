<template>
    <section>
        <div class="container-fluid">
            <h2>In evidenza</h2>
            <h4>Lasciati guidare dalla curiosità</h4>
            *appartamenti sponsorizzati*

            
            <carousel class="ml-3" v-bind:per-page-custom=[[0,1],[576,2],[992,3]]>
                <slide class="slide" v-for="(apartment, index) in apartments" :key="index">
                    <div class="ms_card">
                        <div class="ms_img mx-auto position-relative">
                                <img :src="apartment.preview" alt="">
                                <div class="ms_shadow position-absolute"></div>
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
                            <!-- <router-link :to="{name: 'single-apartment', params:{slug: post.slug}}">Visualizza Appartamento</router-link> -->
                        </div>
                    </div>
                </slide>
            </carousel>
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
        }
    },
    methods: {
        getApartments: function() {
            axios.get('/api/apartments')
            .then(apiResponse => {
                this.apartments = apiResponse.data;
                })
            .catch(() => {
                console.log('error');
            });
        }  
    },
    created() {
        this.getApartments();
    }
};

</script>

<style lang="scss" scoped>
@import '../../../../sass/variables.scss';

.container-fluid{
    .ms_card{
        width: 520px;
        height: 510PX;
        /* width: 95%;
        height: 100%; */
        border: 1px solid $primary-grey;
        border-radius: 10px;
        padding: 1rem;
        box-shadow: 2px 2px 3px $primary-light;
        background-color: $primary-light;
    }

    .ms_img{
        margin-right: 10px;
        overflow: hidden;
        border-radius: 10px;
        width: 450px;
        height: 300px;

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
</style>