<template>
<div class="container-fluid">
        <!-- <p>Category: {{apartment.category ? apartment.category.name : '-'}}</p> -->
    <div class="title">
        <div>{{apartment.title}}</div>
        <div>{{apartment.location.city}}</div>
    </div>
    <div class="apartment-img">
        <img :src="'../storage/'+apartment.preview" alt="Missing Preview">
    </div>
    <div class="structure row row-cols-3 text-center border-top border-bottom">
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
        <div class="apartment-description my-3">
            <h3 class="my-3">
                Descrizione
            </h3>
            {{apartment.description}}
        </div>
        <div class="apartment-description-button my-3">
            <i class="fa-solid fa-chevron-down  a-d-button" @click="descriptionFunc()"></i>
        </div>
    </section>
    <div class="services">
        Cosa troverai
        <div class="row row-cols-3 mx-3">
            <div class="my-3" v-for="(service, index) in apartment.services" :key="index">
                <i :class="service.icon"></i>
                {{service.name}}
            </div>
        </div>
    </div>
    <section>
        <h3>Contatta l'Host</h3>
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
        </form>
        <div v-show="commentSent">
            Messaggio inviato! Grazie!
        </div>
    </section>
</div>
</template>

<script>

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
                formErrors: {}
        }
    },
    methods: {
        getApartment: function() {
            axios.get(`/api/apartments/${this.$route.params.slug}`)
            .then(apiResponse => {
                this.apartment = apiResponse.data;
                this.formData.apartment_id = this.apartment.id;
                console.log(this.apartment)
                })
            .catch(() => {
                console.log('error');
                this.$router.push({name: 'page-404'});
            });
        },
        descriptionFunc: function(){
            let aDescription = document.querySelector(".apartment-description");
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
        }
    },
    created() {
        this.getApartment();
    }
}
</script>

<style lang="scss" scoped>
@import '../../../sass/variables.scss';


.title{
    & div:first-child{
        font-size: 4vw;
    }
    & div:nth-child(2){
        font-size: 2vw;
        margin-bottom: 1rem;
    }
}

.structure{
    background-color: $primary-lightgrey;
    padding: 2rem;
}

.apartment-img{
    width: 100%;
    height: 70vh;
    margin-bottom: 1rem;
    border-radius: 3vw;
    overflow: hidden;

    img{
        object-fit:cover;
        width: 100%;
        height: 100%;
    }
}

.description-section{
    background-color: $primary-light;
    display: flex;
    align-items: flex-end;

    .fa-chevron-up{
        display: none;
    }
    .apartment-description{
        position: relative;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        width: 90%;


        &::after{
            content: "";
            position: absolute;
            width: 100%;
            height: 2px;
            background-color: rgba(0, 0, 0, .2);
            bottom: -1rem;
            left: 0;
        }
    }

    .apartment-description.show{
        position: relative;
        white-space: normal;
        overflow: none;
        text-overflow: none;
        width: 100%;
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
        }
    }
}

.form{
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
        padding: 0 1.1rem;
        filter: brightness(1.2);
        box-shadow: 0px 2px 6px 1px rgba(0,0,0,.3);
    }
}
}
</style>
