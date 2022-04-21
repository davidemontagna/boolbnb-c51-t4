<template>
    <section>

    <div class="main-searchbar d-flex justify-content-center align-item-center">
        <div class="form d-flex justify-content-center align-items-center">
            <input type="text" name="text" id="text" placeholder="search" v-model="searchInput">

            <div class="multiselect justify-content-center align-items-center d-none d-sm-flex" id="multiselect">
                <div class="services" @click="services()">Services &#x2193;</div>
                <div class="multiselect-options hidden" id="multiselectOptions">
                    <div v-for="service in allServices" :key="service.id">
                        <input type="checkbox" :name="service.name" :id="service.name" v-model="CheckedServices" class="checkboxServices">
                        <label for="checkbox1">{{service.name}}</label>
                        <i :class="service.icon"></i>
                    </div>
                </div>
            </div>

            <label for="beds" class="d-none d-sm-block">Beds:</label>
            <input type="number" name="beds" id="beds" value="1" min="1" max="10" class="d-none d-sm-block">

            <input type="submit" value="Submit" id="submit" @click="Search()">
        </div>
    </div>

        <div class="container-fluid">
            <h2>Le nostre strutture</h2>
            <div class="row row-cols-xs-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-3 mx-auto">
                <div class="col my-3" v-for="(apartment, index) in setApartments" :key="index">
                    <router-link :to="{name: 'single-apartment', params:{slug: apartment.slug}}" class="router-link">
                    <div class="ms_card">
                        <div class="ms_img mx-auto position-relative">
                                <img :src="'../storage/'+apartment.preview" alt="">
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
            allServices: [],
            searchInput: "",
            searchResponse: [],
            CheckedServices: [],
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
        getServices: function() {
            axios.get(`/api/services`)
            .then(apiResponse => {
                this.allServices = apiResponse.data;
                console.log(this.allServices)
                })
            .catch(() => {
                console.log('error');
                this.$router.push({name: 'page-404'});
            });
        },
        getApartments: function() {
            axios.get('/api/apartments')
            .then(apiResponse => {
                this.apartments = apiResponse.data;
                })
            .catch(() => {
                console.log('error');
            });
        }, 
        Search(){
            let allCheckedServices = document.querySelectorAll(".checkboxServices");

            allCheckedServices.forEach(element => {
                if(element.checked == true){
                    this.CheckedServices.push(element.name)
                }
            });
            console.log(this.CheckedServices)
        }
    },
    created() {
        this.getApartments();
        this.getServices();
    },
    computed:{
        setApartments(){
            return this.apartments.filter((apartments) => {
                return apartments.name.includes(this.CheckedServices)
            })
        }
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


.router-link{
    color: black;
    text-decoration: none;
}

// --- search 


.main-searchbar{
    width: 100%;
    position: relative;
    top: -130px;
    transform: translateY(50%);

    & .form{
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
    bottom: -150px;
    display: flex;
    flex-direction: column;
    flex-wrap: wrap;
    justify-content: center;
    align-items: flex-start;
    height: 150px;
    width: 400px;
    background-color: white;
    border: 1px solid gray;
    padding: 10px;
    border-radius: 1rem;
    color: $primary-red;
}
.hidden{
    display: none;
}
</style>