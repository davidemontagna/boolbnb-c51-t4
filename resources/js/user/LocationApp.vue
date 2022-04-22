<template>
<div id="location-app">
  <label for="address" class="form-label">Indirizzo:</label>
  <div class="input-group mb-3">
    <input type="text" class="form-control" id="address" name="address" @keydown.prevent.enter="getAddresses" placeholder="Inserisci l'indirizzo da cercare" v-model.trim="addressQuery">
    <div class="input-group-append">
      <button class="btn btn-outline-secondary" type="button" @click.prevent="getAddresses">Cerca</button>
    </div>
    <select class="form-control" id="address_obj" name="address_obj" v-model="selected">
      <option>Seleziona un indirizzo</option>
      <option :value="stringObj(index)" v-for="(address, index) in setOption" :key="index">{{address.address.freeformAddress + ', ' + address.address.country}}</option>
    </select>
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
            oldQuery: '',
            apiKey: 'LmxBM8DrAJjBA1BQPufxlrTGrO4c4Byh',
            selected: '',
        }
    },
  methods: {
      getAddresses: function() {
          if (this.addressQuery != '' && this.addressQuery != this.oldQuery) {
            this.oldQuery = this.addressQuery;
            const apiUrl = 'https://api.tomtom.com/search/2/search/' + this.addressQuery + '.json?minFuzzyLevel=1&maxFuzzyLevel=2&view=Unified&relatedPois=off&key=' + this.apiKey;
            axios.get(apiUrl, {transformRequest: (data, headers) => {
                delete headers.common['X-Requested-With'];
              } 
            })
            .then(apiResponse => {
                this.addressesList = apiResponse.data.results;
                // console.log(this.addressList);
                })
            .catch(() => {
                console.log('error catch api');
            });
          }
      },
      stringObj: function(index) {
          return JSON.stringify(this.addressesList[index]);
      },  
  },
  computed: {
    setOption() {
      console.log(this.addressesList);
      return this.addressesList;
    }
  }
}
</script>

<style lang="scss">

</style>
