<template>
    <section>

    <div class="main-searchbar d-flex justify-content-center align-item-center">
        <div class="form d-flex justify-content-center align-items-center">
            <!-- <input type="text" name="text" id="text" placeholder="search" v-model.trim="searchInput"> -->
            
            <input type="text" id="address" name="address" @keydown.prevent.enter="getLocations" placeholder="Cerca località" v-model.trim="searchInput">
            <select class="form-control" v-model="selectedLocation">
                <option disabled> Seleziona una località </option>
                <option :value="index" v-for="(location, index) in setOption" :key="index">{{location.address.freeformAddress + ', ' + location.address.country}}</option>
            </select>
            

            <div class="multiselect justify-content-center align-items-center d-sm-flex" id="multiselect">
                <div class="services" @click="services()">Services &#x2193;</div>
                <div class="multiselect-options hidden" id="multiselectOptions">
                    <div v-for="service in allServices" :key="service.id">
                        <input type="checkbox" :name="service.name" :id="service.name" v-model="CheckedServices" :value="service.name" class="checkboxServices">
                        <label for="checkbox1">{{service.name}}</label>
                        <i :class="service.icon"></i>
                    </div>
                </div>
            </div>

            <label for="range" class=""><i class="fa-solid fa-circle-nodes"></i>km: {{inputRange}}</label>
            <input type="range" name="range" id="range" step="20" v-model="inputRange"  min="20" max="200" class="">
            <label for="beds" class=""><i class="fa-solid fa-bed"></i></label>
            <input type="number" name="beds" id="beds" v-model="inputBeds"  min="1" max="10" class="">
            <label for="rooms" class="">Rooms:</label>
            <input type="number" name="rooms" id="rooms" v-model="inputRooms"  min="1" max="10" class="">
            <label for="bath" class=""><i class="fa-solid fa-shower"></i></label>
            <input type="number" name="bath" id="bath" v-model="inputBath"  min="1" max="10" class="">

            <input type="submit" value="Submit" id="submit" @click.prevent="getApartments">
            <!-- <button type="submit" value="Search" id="submit" @click.prevent="search"><i class="fa-solid fa-magnifying-glass"></i></button> -->
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
            window.scrollTo(0,1000)
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


.main-searchbar{
    width: 100%;
    position: relative;
    top: -814px;
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
            transition: all 250ms ease;
            &:active, &:focus{
                width: 200px;
            }
        }
        & .multiselect{
            width: 100px;
            margin: 0 20px;
        }
        & input#beds{
            width: 50px;
            margin: 0 10px;
        }
               & #submit{
            background-color: white;
            color: black;
            height: 4rem;
            min-width: 4rem;
            border-radius:50% ;
            font-size: 1rem;
            color: rgb(183, 183, 183);
            transition: all 250ms ease;

            &:hover{
                background-color: #f2f2f2;
                color: rgb(40, 40, 40);
            }

            &:active{
                font-weight: bold;
                box-shadow: inset 2px 0 5px 1px rgba(0, 0, 0, .5);
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
}
@media (max-width: 576px) {
    
}

#submit:active{

}

</style>