<template>
<div class="container-fluid">
        <!-- <p>Category: {{apartment.category ? apartment.category.name : '-'}}</p> -->
    <div class="py-3">
        <h2>{{apartment.title}}</h2>
        <div class="row row-cols-1 row-cols-md-2">
            <div class="col">
                <h3>{{apartment.location.city}}</h3>
            </div>
            <div class="col">
                <h5>{{apartment.location.address}}</h5>
            </div>
        </div>
    </div>
    <div class="row row-cols-1 row-cols-lg-2">
        <div class="col">
            <div class="apartment-img">
                <img :src="'../storage/'+apartment.preview" alt="Missing Preview">
            </div>       
        </div>
        <div class="col">
            <div id="map" class="dm-map-style"></div>
        </div>
    </div>
    
    <div class="structure row row-cols-3 text-center border-top border-bottom mt-5">
        <div class="room col">
            <div>
                <i class="fas fa-couch"></i>
            </div>
            <div>
                Stanze
            </div>
            {{apartment.num_rooms}}
        </div>
        <div class="bath col">
            <div>
                <i class="fas fa-bath"></i>
            </div>
            <div>
                Bagni
            </div>
            {{apartment.num_bath}}
        </div>
        <div class="squarefootage col">
            <div>
                <i class="fas fa-ruler"></i>
            </div>
            <div>
                Mq
            </div>
            {{apartment.square_footage}}
        </div>
    </div>
    <section class="description-section">
        <div class="apartment-description mb-4">
            <h3 class="my-3">
                Descrizione
            </h3>
            {{apartment.description}}
        </div>
    </section>
    <div class="services">
        Cosa troverai
        <div class="row row-cols-3 mx-3">
            <div class="col my-3" v-for="(service, index) in apartment.services" :key="index">
                <i :class="service.icon"></i>
                <div>
                    {{service.name}}
                </div>
            </div>
        </div>
    </div>
    <section class="form-section pb-3">
        <h3 class="d-flex mt-5">Contatta l'Host
            <div class="apartment-description-button">
                <i class="fa-solid fa-chevron-down  a-d-button ml-3" @click="descriptionFunc()"></i>
            </div>
        </h3>
        
        <form @submit.prevent="sendMessage()" class="form">
            <input type="text" id="sender_name" placeholder="Inserisci il tuo nome" v-model="formData.sender_name">
            <input type="email" id="sender_email" placeholder="Inserisci il tuo indirizzo mail" v-model="formData.sender_email">
            <textarea id="content" cols="30" rows="10" placeholder="Inserisci i dettagli" v-model="formData.content"></textarea>

            <div v-if="formErrors.content">
                <ul>
                    <li v-for="(error, index) in formErrors.content" :key="index">
                        {{error}}
                    </li>
                </ul>
            </div>

            <button type="submit" class="button">Invia messaggio</button>
            <div v-show="commentSent">
                <div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
                    <strong>Messaggio inviato!</strong>
                    <hr>
                    <p class="mb-0">Grazie, il tuo messaggio è stato inviato correttamente.</p>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </form>
    </section>
</div>
</template>

<script>
import tt from '@tomtom-international/web-sdk-maps'
export default {
    name: 'SingleApartment',
    data() {
        return {
            apartment: {},
            formData: {
                    sender_name: "",
                    content: "",
                    sender_email: "",
                    apartment_id: null,
                },
            commentSent: false,
            formErrors: {},
            lat: "",
            lon: "",
            apiKey: 'LmxBM8DrAJjBA1BQPufxlrTGrO4c4Byh',                
        }
    },
    methods: {
        getApartment: function() {
            axios.get(`/api/apartments/${this.$route.params.slug}`)
            .then(apiResponse => {
                this.apartment = apiResponse.data;
                this.formData.apartment_id = this.apartment.id;
                this.lat = this.apartment.location.lat;
                this.lon = this.apartment.location.lon;
                
                })
            .catch(() => {
                console.log('error');
                this.$router.push({name: 'page-404'});
            });
        },
        descriptionFunc: function(){
            let aDescription = document.querySelector(".form");
            let button = document.querySelector(".a-d-button");

            if(aDescription.classList.contains("show")){
                aDescription.classList.remove("show")
                button.classList.remove("active")
            }else{
                aDescription.classList.add("show")
                button.classList.add("active")
            }
        },
        sendMessage() {
            axios
            .post(`/api/messages/`, this.formData)
            .then((response)=> {
                this.formData.sender_name = "";
                this.formData.sender_email = "";
                this.formData.content = "";
                this.commentSent = true; 
            })
            .catch( (error) => {
                this.formErrors = error.response.data.errors;
                console.log(error.response);
            })
        },
        mapSearch() {        
            let position = [this.lon,this.lat]; 

            let map= tt.map({
                key: this.apiKey,
                container: "map",
                center: position,
                zoom: 18
            })  
                        
            new tt.Marker().setLngLat(position).addTo(map);           
        }
    },
    created() {
        this.getApartment();
    },
    updated(){
        this.mapSearch();
    },
}
</script>

<style lang="scss" scoped>
@import '../../../sass/variables.scss';
.structure{
    background-color: $primary-lightgrey;
    padding: 2rem;
}

.apartment-img{
    width: 100%;
    height: 300px;
    margin-bottom: 1rem;
    overflow: hidden;

    img{
        border-radius: 2rem;
        object-fit:cover;
        width: 100%;
        height: 100%;
    }
}

.fa-chevron-up{
        display: none;
    }
    .apartment-description-button{
        width: 10%;
        font-size: 2rem;
        
        display: flex;
        align-items: center;
        justify-content: center;

        .a-d-button{
            transition: all 250ms ease;
            cursor: pointer;
        }
        .a-d-button:hover, .a-d-button:active{
            opacity: .6;
        }
        .a-d-button.active{
            transform: rotate(180deg);
            color: $primary-red;
        }
    }
.form-section{
    margin-bottom: 10rem;
}
.form{
    display: none;
}
.form.show{
    display: block;
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
    input, textarea{
        width: 100%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        margin-top: 6px;
        margin-bottom: 16px;
        resize: vertical;
    }

    .button{
    background-color: $primary-red;
    padding: 0 1rem;
    border: none;
    border-radius: 2rem;
    transition: all 250ms ease-in-out;
    margin-left: 10px;
    height: 3rem;
    color: white;

    &:hover, &:active{
        
        filter: brightness(1.2);
        box-shadow: 0px 2px 6px 1px rgba(0,0,0,.3);
    }
}
}

.dm-map-style{
    width: 100%;
    height: 300px;
    overflow: hidden;
}
#map{
    border-radius: 15px;
}

</style>
