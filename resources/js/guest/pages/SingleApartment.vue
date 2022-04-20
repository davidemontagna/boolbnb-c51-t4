<template>
<div class="container">
        <!-- <p>Category: {{apartment.category ? apartment.category.name : '-'}}</p> -->
    <div class="title">
        <div>{{apartment.title}}</div>
        <div>{{apartment.location.city}}</div>
    </div>
    <div class="apartment-img">
        <img :src="'./storage/'+apartment.preview" alt="Missing Preview">
    </div>
    <section class="description-section">
        <div class="apartment-description">
            {{apartment.description}}
        </div>
        <div class="apartment-description-button">
            <i class="fa-solid fa-chevron-down  a-d-button" @click="descriptionFunc()"></i>
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
        }
    },
    methods: {
        getPost: function() {
            axios.get(`/api/apartments/${this.$route.params.slug}`)
            .then(apiResponse => {
                this.apartment = apiResponse.data;
                console.log(this.apartment)
                })
            .catch(() => {
                console.log('error');
                this.$router.push({name: 'page-404'});
            });
        },
        descriptionFunc: function(){
            let aDescription = document.querySelector(".apartment-description");

            if(aDescription.classList.contains("show")){
                aDescription.classList.remove("show")
            }else{
                aDescription.classList.add("show")
            }
        }
    },
    created() {
        this.getPost();
    }
}
</script>

<style lang="scss" scoped>
.title{
    & div:first-child{
        font-size: 4vw;
    }
    & div:nth-child(2){
        font-size: 2vw;
        margin-bottom: 1rem;
    }
}
.apartment-img{
    width: 100%;
    margin-bottom: 1rem;
    border-radius: 3vw;
    overflow: hidden;
    img{
        width: 100%;
    }
}

.description-section{
    display: flex;
    align-items: flex-start;
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
    }
}
</style>
