<template>
<main>
    <div class="main-searchbar d-flex justify-content-center align-item-center">
        <div class="form d-flex justify-content-center align-items-center">
            <input type="text" name="text" id="text" placeholder="search">

            <div class="multiselect justify-content-center align-items-center d-none d-sm-flex" id="multiselect">
                <div class="services" @click="services()">Services &#x2193;</div>
                <div class="multiselect-options hidden" id="multiselectOptions">
                    <div>
                        <input type="checkbox" name="checkbox1" id="">
                        <label for="checkbox1">1</label>
                    </div>
                    <div>
                        <input type="checkbox" name="checkbox2" id="">
                        <label for="checkbox2">2</label>
                    </div>
                </div>
            </div>

            <label for="beds" class="d-none d-sm-block">Beds:</label>
            <input type="number" name="beds" id="beds" value="1" min="1" max="10" class="d-none d-sm-block">

            <input type="submit" value="Submit" id="submit">
        </div>
    </div>
    <router-view :key="$route.path"></router-view>   
</main>
</template>

<script>
export default {
    name: 'Main',
}    

</script>

<style lang="scss" scoped>
@import '../../../../sass/variables.scss';
main{
    background-color: $primary-light;
}

.main-searchbar{
    width: 100%;
    position: relative;
    top: -130px;
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
        }
        & .multiselect{
            width: 100px;
            margin: 0 20px;
        }
        & input#beds{
            width: 50px;
            margin: 0 10px;
        }
        & input#submit{
            background-color: white;
            color: black;
            height: 4rem;
            width: 4rem;
            border-radius:50% ;
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
    bottom: -50px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: flex-start;
    width: 100px;
    background-color: white;
    border: 1px solid gray;
    padding: 10px;
    border-radius: 1rem;
    color: $primary-red;
}
.hidden{
    display: none;
}
</style>