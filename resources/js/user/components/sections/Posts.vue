<template>
<section>
    <div class="cards-container">
        <div class="card" v-for="(post, index) in posts" :key="index">
            <div class="img-container">
                <img :src=" '../storage/' + post.image" alt="">
            </div>
            <h3>Titolo: {{post.title}}</h3>
            <p>Content: {{post.content}}</p>
            <p>Category: {{post.category ? post.category.name : '-'}}</p>
            <p v-if="post.tags.length > 0">
                Tags:
                <span v-for="(tag, index) in post.tags" :key="index">{{' - ' + tag.name}}</span>
            </p>
            <p v-else>Tags: - </p>
            <router-link :to="{name: 'single-post', params:{slug: post.slug}}">Visualizza Post</router-link>
        </div>
    </div>
</section>
</template>

<script>
export default {
    name: 'Posts',
    data() {
        return {
            posts: [],
        }
    },
    methods: {
        getPosts: function() {
            axios.get('/api/posts')
            .then(apiResponse => {
                this.posts = apiResponse.data;
                })
            .catch(() => {
                console.log('error');
            });
        }  
    },
    created() {
        this.getPosts();
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