<template>
    <section>
        <div class="container-fluid">
            <h2>Le nostre strutture</h2>
            <div class="row row-cols-xs-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-3 mx-auto">
                <div class="col my-3" v-for="(apartment, index) in apartments" :key="index">
                    <router-link :to="{name: 'single-apartment', params:{slug: apartment.slug}}" class="router-link">
                    <div class="ms_card">
                        <div class="ms_img mx-auto position-relative">
                                <img :src="apartment.preview" alt="">
                                <div class="ms_shadow position-absolute"></div>
                            <div class="ms_description position-absolute">
                                <p class="ms_beds mx-2">Numero di letti: {{apartment.num_beds}}</p>
                            </div>
                        </div>
                        <div class="ms_text">
                            <h2 class="ms_title mt-3">{{apartment.title}}</h2>
                            <h4 class="ms_city mt-3">{{apartment.location.city}}</h4>
                            <p class="ms_address">{{apartment.location.address}}</p>
                            <div class="ms_description2 d-flex justify-content-between mt-3">
                                <p class="ms_rooms">Stanze: {{apartment.num_rooms}}</p>
                                <p class="ms_bath">Bagni: {{apartment.num_bath}}</p>
                                <p class="ms_square">Mq: {{apartment.square_footage}}</p>
                            </div>
                        </div>
                    </div>
                    </router-link>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
export default {
    name: 'Apartments',
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
}
</script>

<style lang="scss" scoped>
@import '../../../../sass/variables.scss';

.container-fluid{
    .ms_card{
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
            display: block;
            margin: auto;
            

            &:hover{
                transform: scale(1.5);
            }
        }
    }

    .ms_shadow{
        border-radius: 0px 0px 10px 10px;
        width: 100%;
        height: 30%;
        opacity: 1;
        background-image: linear-gradient(to bottom, rgba(0, 0, 0, 0), rgb(0, 0, 0));
        
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

    .ms_text{
        height: 45%;

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
}

@media (max-width: 576px) {
    .ms_img{
        height: 200px!important;
    }
}
@media (max-width: 768px){
    .ms_img{
        height: 200px!important;
    }
}

.router-link{
    color: black;
    text-decoration: none;
}
</style>