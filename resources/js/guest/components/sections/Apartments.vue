<template>
    <section>
    <div class="main-searchbar d-flex justify-content-center align-item-center">
        <div class="form">
            <!-- <input type="text" name="text" id="text" placeholder="search" v-model.trim="searchInput"> -->
            <div class="d-flex search-main-section">
                <input type="text" id="address" name="address" @keyup.prevent="getLocations" placeholder="Cerca località" v-model.trim="searchInput">
                <select class="form-control" v-model="selectedLocation">
                    <option disabled> Seleziona una località </option>
                    <option :value="index" v-for="(location, index) in setOption" :key="index">{{location.address.freeformAddress + ', ' + location.address.country}}</option>
                </select>
                <p>
                    <button class="btn-filtri" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                        <i class="fa-solid fa-filter"></i>
                    </button>
                </p>
                <button type="submit" value="Submit" id="submit" class="d-flex justify-content-center align-items-center" @click.prevent="getApartments"><i class="fa-solid fa-magnifying-glass"></i></button>
            </div>
            <div class="collapse" id="collapseExample">
                    <div class="card card-body rounded-pill">
                        <div class=" input-item-container d-flex">
                        <div class="multiselect" id="multiselect">
                            <div class="services" @click="services()">Servizi<i class="fa-solid fa-arrow-down"></i></div>
                            <div class="multiselect-options hidden" id="multiselectOptions">
                                <div v-for="service in allServices" :key="service.id">
                                    <input type="checkbox" :name="service.name" :id="service.name" v-model="CheckedServices" :value="service.name" class="checkboxServices">
                                    <label for="checkbox1">{{service.name}}</label>
                                    <i :class="service.icon"></i>
                                </div>
                            </div>
                        </div>
                        <div class="input-item">
                            <label for="range" class="range-label"><i class="fa-solid fa-circle-nodes"></i>km: {{inputRange}}</label>
                            <input type="range" name="range" id="range" step="20" v-model="inputRange"  min="20" max="200" class="">
                        </div>
                        <div class="input-item">
                            <label for="beds" class=""><i class="fa-solid fa-bed"></i></label>
                            <input type="number" name="beds" id="beds" v-model="inputBeds"  min="1" max="10" class="">
                        </div>
                        <div class="input-item">
                            <label for="rooms" class="">Rooms:</label>
                            <input type="number" name="rooms" id="rooms" v-model="inputRooms"  min="1" max="10" class="">
                        </div>
                        <div class="input-item">
                            <label for="bath" class=""><i class="fa-solid fa-shower"></i></label>
                            <input type="number" name="bath" id="bath" v-model="inputBath"  min="1" max="10" class="">
                        </div>

                        <!-- <button type="submit" value="Search" id="submit" @click.prevent="search"><i class="fa-solid fa-magnifying-glass"></i></button> -->
                        </div>
                    </div>
                </div>
        </div>
    </div>
        <div class="container-fluid">
            <h2>Le nostre strutture</h2>
            <div class="row row-cols-xs-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-3 mx-auto">
                <div class="col my-3" v-for="(apartment, index) in setApartments" :key="index">
                    <router-link :to="{name: 'single-apartment', params:{slug: apartment.slug}}" class="router-link">
                    <div class="ms_card" :class="checkSponsorized(apartment) ? 'sponsorized-card' : ''">
                        <div class="sponzorized-tag" :class="checkSponsorized(apartment) ? '' : 'hidden'">Uno dei nostri preferiti <i class="fa-solid fa-crown"></i></div>
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
                            <p v-if="checkSponsorized(apartment)" class="sponsorized-text">Post sponsorizzato</p>
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
            searchResponse: [],
            CheckedServices: [], 
            filteredApartments: [],
            inputBeds: 1,
            inputRooms: 1,           
            inputBath: 1,
            inputRange: 20,           
            searchInput: "",
            oldSearchInput: "",
            selectedLocation: 0,
            locationList: [],
            apiKey: 'LmxBM8DrAJjBA1BQPufxlrTGrO4c4Byh',
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
                })
            .catch(() => {
                console.log('errore chiamata servizi');
                this.$router.push({name: 'page-404'});
            });
        },
        getApartments: function() {
            const dataLatLon = {
                lat : null,
                lon : null,
                range: this.inputRange,
            };

            if (this.locationList.length > 0) {
                dataLatLon.lat = this.locationList[this.selectedLocation].position.lat;
                dataLatLon.lon = this.locationList[this.selectedLocation].position.lon;
            }
            console.log(dataLatLon);
            axios.get('/api/apartments',
            {
                params: {
                    lat: dataLatLon.lat,
                    lon: dataLatLon.lon,
                    range: dataLatLon.range,
            }
            })
            .then(apiResponse => {
                this.apartments = apiResponse.data;
                this.search();
                })
            .catch(() => {
                console.log('errore chiamata agli appartamenti');
            });
        }, 
        search(){
            window.scrollTo(0,1200)
            if(this.CheckedServices == "" && this.inputBeds == 1 && this.inputRooms == 1 && this.inputBath == 1){
                this.filteredApartments = this.apartments;
            }else{                
                this.filteredApartments = this.apartments.filter((apartment) => {                                  
                let count = 0;
                let filterCheck = false;
                apartment.services.forEach(service => {
                    if(this.CheckedServices.includes(service.name)){
                    count++;
                    }                    
                });
                if(count == this.CheckedServices.length && this.inputBeds <= apartment.num_beds && this.inputRooms <= apartment.num_rooms && this.inputBath <= apartment.num_bath){
                    filterCheck = true;
                }
                return filterCheck;              
                })
            }
            this.orderBySponsorized();          
        },
        getLocations: function() {
          if (this.searchInput != '' && this.searchInput != this.oldSearchInput) {
            this.oldSearchInput = this.searchInput;
            const apiUrl = 'https://api.tomtom.com/search/2/search/' + this.searchInput + '.json?typeahead=true&minFuzzyLevel=1&maxFuzzyLevel=2&view=Unified&relatedPois=off&key=' + this.apiKey;
            axios.get(apiUrl, {transformRequest: (data, headers) => {
                delete headers.common['X-Requested-With'];
              } 
            })
            .then(apiResponse => {
                this.locationList = apiResponse.data.results;
                })
            .catch(() => {
                console.log('error api location');
            });
          }
        },
        stringObj: function(index) {
            return JSON.stringify(this.locationList[index]);
        },
        orderBySponsorized: function() {
            let sponsorized = [];
            let notSponsorized = [];

            const today = new Date();

            this.filteredApartments.forEach(apartment => {
                let numSponsorships = apartment.plans.length;
                let first = true;
                apartment.plans.forEach(plan => {
                    if (Date.parse(plan.pivot.date_end) >= Date.parse(today) && first) {
                        first = false;
                        sponsorized.push(apartment);
                    } else {
                        numSponsorships--;
                    }
                });
                if (numSponsorships == 0) {
                    notSponsorized.push(apartment);
                }
            });
            console.log(sponsorized.length, notSponsorized.length);
            this.filteredApartments = sponsorized.concat(notSponsorized);
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
        }
        
    },
    created() {
        this.getServices();
        this.getApartments();
        
    },
    computed:{
        setOption() {
            return this.locationList;
        },
        setApartments(){            
            return this.filteredApartments;
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
        object-fit: cover;

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
*{
    transition: all 250ms ease;
}

    label{
        margin: 0;
    }
.main-searchbar{
    width: fit-content;
    position: relative;
    top: -824px;
    left: 50%;
    transform: translateX(-50%);
    input{
        border: none;

        ::placeholder{
            color: black;
        }
    }
    #submit{
        margin-left: 1rem;
        min-width: 2.5rem;
        min-height: 2.5rem;
        border: none;
        border-radius: 3rem;
        background-color: $primary-red;
        color: white;
        transition: all 300ms ease;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    #submit:active, #submit:focus{
        box-shadow: inset 0 0 5px 1px rgba(0, 0, 0, .4);
        font-size: 1.2rem;
    }
    .btn-filtri{
        margin-left: 1rem;
        min-width: 2.5rem;
        min-height: 2.5rem;
        border: none;
        border-radius: 3rem;
        color: white;
        transition: all 300ms ease;
        background-color: rgb(129, 197, 238);
            display: flex;
        align-items: center;
        justify-content: center;
    }
     .btn-filtri:active, .btn-filtri:focus{
         box-shadow: inset 0 0 5px 1px rgba(0, 0, 0, .4);
        font-size: 1.2rem;
    }
    .search-main-section{
        background-color: white;
        padding: .9rem;
        height: 4rem;
        border-radius: 3rem;
    }
    input#address{
        margin: 0 10px;
        border-bottom: 1px solid rgb(180, 180, 180);
    }
    .collapse{
        .multiselect{
            margin-right: 10px;
        }
        input#range{
            margin-right: 10px;
        }
        .range-label{
            min-width: 80px;
        }
         & .card div> *{
            padding: 3px;
        }
        & .card div> *:hover:not(.multiselect-options){
            background-color: rgb(226, 226, 226);
            border-radius: 2rem;
        }
    }
    .form-control{
        width: 300px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    .input-item{
        display: flex;
        align-items: center;
    }
}


.multiselect-options{
    position: absolute;
    top: 4rem;
    background-color: white;
    overflow: hidden;
    overflow-y: auto ;
    height: 100px;
    width: 100%;
    left: 0;
    padding: 1rem;
    border: 1px solid #c2c2c2;
}
.hidden{
    display: none;
}
@media (max-width: 650px) {
    .main-searchbar{
    position: relative;
    top: -824px;
    left: 50%;
    transform: translateX(-50%);

    input{
        border: none;

        ::placeholder{
            color: black;
        }
    }
    #submit{
        margin-left: 1rem;
        min-width: 2.5rem;
        min-height: 2.5rem;
        border: none;
        border-radius: 3rem;
        background-color: $primary-red;
        color: white;
        transition: all 300ms ease;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    #submit:active, #submit:focus{
        box-shadow: inset 0 0 5px 1px rgba(0, 0, 0, .4);
        font-size: 1.2rem;
    }
    .btn-filtri{
        margin-left: 1rem;
        min-width: 2.5rem;
        min-height: 2.5rem;
        border: none;
        border-radius: 3rem;
        color: white;
        transition: all 300ms ease;
        background-color: rgb(129, 197, 238);
            display: flex;
        align-items: center;
        justify-content: center;
    }
     .btn-filtri:active, .btn-filtri:focus{
         box-shadow: inset 0 0 5px 1px rgba(0, 0, 0, .4);
        font-size: 1.2rem;
    }
    .search-main-section{
        background-color: white;
        padding: .9rem;
        height: 4rem;
        border-radius: 3rem;
    }
    input#address{
        width: 80px;
        margin: 0 10px;
        border-bottom: 1px solid rgb(180, 180, 180);
    }
    .form-control{
        width: 80px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    .collapse{
        .input-item-container{
        flex-wrap: wrap !important;
        width: 400px !important;
        justify-content: space-between;
        align-items: center;
        }
        .multiselect{
            margin-right: 10px;
        }
        input#range{
            margin-right: 10px;
        }
        .range-label{
            min-width: 80px;
        }
         & .card div> *{
            padding: 3px;
        }
        & .card div> *:hover:not(.multiselect-options){
            background-color: rgb(226, 226, 226);
            border-radius: 2rem;
        }
    }
    .input-item{
        display: flex;
        align-items: center;
    }
}
}

//sponzorized

.ms_card.sponsorized-card{
    border: 3px solid rgb(255, 139, 180);
}

.sponzorized-tag{
    position: absolute;
    font-size: clamp(.7rem, 1vw, 2rem);
    top: 2rem;
    left: 3rem;
    background-color: $primary-red;
    z-index: 3;
    color: white;
    padding: 5px;
    border-radius: 5px;
    font-weight: bold;
}

.sponsorized-text{
    color: $primary-grey;
    font-size: .6rem;
    position: absolute;
    bottom: 0;
    left: 50%;
    transform: translateX(-50%);
}
</style>