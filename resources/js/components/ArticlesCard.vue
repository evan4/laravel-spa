<template>
    <div :class="'col-sm-'+sm || '6'">
        <div class="card">
            <img class="card-img-top" :src="image" alt="Card image cap">
            <div class="card-body">
                <small>{{data | formatData }} - {{author}}</small>
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
    filters: {
      formatData: function (value) {
        if(!value) return '';
        value = value.toString();
        value = value.split('-');
        return value[2] + '/' + value[1] + '/' + value[0];
      }
    },
}
</script>

<style>

</style>
