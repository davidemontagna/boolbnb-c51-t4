<template>
<div id="location-app">
  <div class="mb-3">
    <label for="address" class="form-label">Indirizzo:</label>
    <input type="text" class="form-control" id="address" name="address" placeholder="Inserisci l'indirizzo da cercare" :value="addresQuery">
    <button class="btn btn-primary" @click="getAddress">Cerca</button>     
  </div>
</div>
</template>

<script>

export default {
  name: 'LocationApp',
  data() {
        return {
            addressList: [],
            addresQuery: '',
        }
    },
    methods: {
        getAddress: function() {
            axios.get('API DI TOM TOM',
            {
              params: {
                api_key: 'KEY TOM TOM',
                query: this.addresQuery,
              }
            })
            .then(apiResponse => {
                this.addressList = apiResponse.data;
                })
            .catch(() => {
                console.log('error');
            });
        }  
    },
}
</script>

<style lang="scss">

</style>
