<template>
<div>
    <h1>POST SINGOLO</h1>
    <div class="card">
        <div class="img-container">
            <img :src=" '../storage/' + post.image" alt="">
        </div>
        <h3>Titolo: {{post.title}}</h3>
        <p>Content: {{post.content}}</p>
        <p>Category: {{post.category ? post.category.name : '-'}}</p>
        <p v-if="post.tags && post.tags.length > 0">
            Tags:
            <span v-for="(tag, index) in post.tags" :key="index">{{' - ' + tag.name}}</span>
        </p>
        <p v-else>Tags: - </p>
    </div>
</div>
</template>

<script>

export default {
    name: 'SinglePost',
    data() {
        return {
            post: {},
        }
    },
    methods: {
        getPost: function() {
            axios.get(`/api/posts/${this.$route.params.slug}`)
            .then(apiResponse => {
                this.post = apiResponse.data;
                })
            .catch(() => {
                console.log('error');
                this.$router.push({name: 'page-404'});
            });
        }  
    },
    created() {
        this.getPost();
    }
}
</script>

<style lang="scss" scoped>

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
