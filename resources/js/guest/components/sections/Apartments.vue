<template>
<section>
        <div class="ms_container">
            <div class="row row-cols-sm-1 row-cols-md-2 row-cols-3 justify-content-between">
                <div class="ms_card col mx-2 my-3 mx-auto" v-for="(apartment, index) in apartments" :key="index">
                    <div class="ms_img mx-auto position-relative">
                        <img src="https://images.pexels.com/photos/276724/pexels-photo-276724.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="">
                        <div class="ms_description position-absolute">
                            <!-- <p class="ms_id mx-2">Id: {{apartment.id}}</p> -->
                            <p class="ms_room mx-2">Numero di stanze: {{apartment.num_rooms}}</p>
                        </div>
                        <div class="ms_hover position-absolute">
                        </div>
                    </div>
                    <div class="ms_text">
                        <h3 class="title">{{apartment.title}}</h3>
                        <!-- <router-link :to="{name: 'single-apartment', params:{slug: post.slug}}">Visualizza Appartamento</router-link> -->
                    </div>
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
.ms_container{
    width: 100%;
    height: 100%;

    .ms_card{
        max-width: 400px;
        width: 400px;
        border: 1px solid rgb(218, 218, 218);
        border-radius: 5px;
        padding: 1rem;
        box-shadow: 1px 1px 2px $primary-light;
        background-color: white;

        &:hover{
            cursor: pointer;
        }

        &:hover .ms_hover{
            display: none;  
        }
    }
}
/* .container-cards {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    width: 100%;
}

.card {
    border: 1px solid rgb(218, 218, 218);
    border-radius: 5px;
    width: calc(50% - 66px);
    padding: 1rem;
    box-shadow: 1px 1px 2px grey;

    &:hover{
        cursor: pointer;
    }
} */
.ms_room{
    font-size: 20px;
    color: white;
}
.ms_img{
    height: 150px;
    width: 300px;
    margin-right: 10px;

    img{
        border-radius: 5px;
        width: 100%;
        height: 100%;
    }
}

.ms_hover{
    border-radius: 0px 0px 5px 5px;
    width: 100%;
    height: 50%;
    box-shadow: inset 0px -50px 50px -30px #000000;
    opacity: 0.5;
}

.ms_description, .ms_hover{
    left: 0;
    bottom: 0;
}

.ms_description{
    text-shadow: 2px 0 0 rgb(0, 0, 0), -2px 0 0 rgb(0, 0, 0), 0 2px 0 rgb(0, 0, 0), 0 -2px 0 rgb(0, 0, 0), 1px 1px rgb(0, 0, 0), -1px -1px 0 rgb(0, 0, 0), 1px -1px 0 rgb(0, 0, 0), -1px 1px 0 rgb(0, 0, 0);
}



/* .img-container {
    width: 200px;
    height: 200px;
    background: rgb(218, 218, 218);
    img {
        width: 100%;
        height: 100%;
    }
} */

/* @media screen and (max-width:480px){
    .cards-container{
    background-color: red;
    }

    .card{
        width: calc(100%);
    }
} */
</style>