<template>
<footer>
    <div class="footer-container">
        <div class="footer-left">© 2022 BoolBnb, Inc.</div>
        <div class="footer-socials">
            <div>F</div>
            <div>I</div>
            <div>T</div>
        </div>
    </div>
</footer>
</template>

<script>
export default {
    name: 'Footer',
}
</script>

<style lang="scss" scoped>
@import '../../../../sass/variables.scss';

footer{
    margin-top: 1rem;
    background: linear-gradient(0deg, rgba(144, 144, 144, 0.5) 0%, rgba(255,255,255,0) 60%);
}
    .footer-container{
        display: flex;
        justify-content: space-between;
        align-items: center;
        height: 3rem;
        width: calc(100% - 2rem);
        padding: 0 1rem;

        .footer-socials{
            display: flex;
            justify-content: space-evenly;
            align-items: center;

            & > *{
                padding: 0 .3rem;
            }
        }
    }
</style>