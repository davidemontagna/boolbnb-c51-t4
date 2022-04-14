<template>
<section>
        <div class="cards-container">
            <div class="card" v-for="(apartment, index) in apartments" :key="index">
                <div class="img"></div>
                <div class="text">
                    <h3>Titolo: {{apartment.title}}</h3>
                    <p>Id: {{apartment.id}}</p>
                    <p>Numero di stanze: {{apartment.num_rooms}}</p>
                    <!-- <router-link :to="{name: 'single-apartment', params:{slug: post.slug}}">Visualizza Appartamento</router-link> -->
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
@import '../../../../sass/global.scss';

.cards-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    width: 100%;
}

.card {
    border: 1px solid rgb(218, 218, 218);
    border-radius: 5px;
    width: calc(50% - 66px);
    margin: 1rem;
    padding: 1rem;
    box-shadow: 1px 1px 2px grey;

    &:hover{
        cursor: pointer;
    }
}

.img{
    background-color: $primary-red;
    height: 100px;
    min-width: 100%;
    border-radius: 5px;
    margin-right: 10px;
    display: block;
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