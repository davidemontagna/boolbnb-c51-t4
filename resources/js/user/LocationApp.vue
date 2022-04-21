<template>
<div id="location-app">
  <div class="mb-3">
    <label for="address" class="form-label">Indirizzo:</label>
    <input type="text" class="form-control" id="address" name="address" placeholder="Inserisci l'indirizzo da cercare" v-model="addressQuery">
    <button class="btn btn-primary" @click.prevent="getAddresses">Cerca</button>     
  </div>
</div>
</template>

<script>

export default {
  name: 'LocationApp',
  data() {
        return {
            addressesList: [],
            addressQuery: '',
            apiKey: 'LmxBM8DrAJjBA1BQPufxlrTGrO4c4Byh',
        }
    },
    methods: {
        getAddresses: function() {
            const apiUrl = 'https://api.tomtom.com/search/2/search/' + this.addressQuery + '.json?minFuzzyLevel=1&maxFuzzyLevel=2&view=Unified&relatedPois=off&key=' + this.apiKey;
            axios.get(apiUrl, {transformRequest: (data, headers) => {
                delete headers.common['X-Requested-With'];
              } 
            })
            .then(apiResponse => {
                this.addressList = apiResponse.data.results;
                console.log(this.addressList);
                })
            .catch(() => {
                console.log('error catch api');
            });
        }  
    },
}
</script>

<style lang="scss">

</style>
