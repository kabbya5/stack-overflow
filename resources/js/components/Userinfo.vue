<template>
    <div>
        <span color="text-muted">{{postDate }}</span> <br>
        <a :href=" user.url"  style="float: left">
            <img :src=" user.avatar" alt="">

        </a>
        <div class="media-body">
            <a :href="user.url"> {{ user.name }}</a>
        </div>
    </div>
</template>
<script>
    export default{
        props:['model', 'label'],
        computed:{
            postDate(){
                return this.label + " " + this.model.created_date;            }
        },
        data(){
            return{
                user: this.model.user
            }
        }
    }
</script>
