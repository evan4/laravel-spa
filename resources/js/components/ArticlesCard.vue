<template>
    <div :class="'col-sm-'+sm || '6'">
        <div class="card">
            <img class="card-img-top" :src="image" alt="Card image cap">
            <div class="card-body">
                <small>{{data}} - {{author}}</small>
                <h5 class="card-title">{{title}}</h5>
                <p class="card-text">{{description}}</p>
                <a :href="link" class="btn btn-primary">read more</a>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['title', 'description', 'link', 'image', 'data', 'author', 'sm'],
}
</script>

<style>

</style>
