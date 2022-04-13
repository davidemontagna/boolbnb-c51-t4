<template>
<section>
    <div class="cards-container">
        <div class="card" v-for="(apartment, index) in apartments" :key="index">
            <h3>Titolo: {{apartment.title}}</h3>
            <p>Id: {{apartment.id}}</p>
            <p>Numero di stanze: {{apartment.num_rooms}}</p>
            <!-- <router-link :to="{name: 'single-apartment', params:{slug: post.slug}}">Visualizza Appartamento</router-link> -->
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

.cards-container {
    display: flex;
    flex-direction: column;
}

.card {
    display: flex;
    flex-direction: column;
    align-items: center;
    border: 1px solid rgb(218, 218, 218);
    padding: 20px;
    margin: 20px;
}

.img-container {
    width: 200px;
    height: 200px;
    background: rgb(218, 218, 218);
    img {
        width: 100%;
        height: 100%;
    }
}

</style>