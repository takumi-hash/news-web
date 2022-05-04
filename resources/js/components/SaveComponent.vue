<template>
    <button type="button" class="btn btn-success" v-if="btn_flg" @click.prevent="unsave(data)">
        Unsave this
    </button>
    <button type="button" class="btn btn-outline-primary" v-else @click.prevent="save(data)">
        Save this
    </button>
</template>
<script>

export default {
        props: {
            data: {
                type: Object,
                required: true,
            },
            has_saved: {
                type: Boolean
            }
        },

        data: function(){
            return {
                btn_flg: this.has_saved,
            }
        },

        onMounted() {
            this.btn_flg = this.check_saved() ? true : false;
        },

        computed: {
            check_saved() {
                return this.has_saved;
            },
        },

        methods: {
            save(data) {
                let send_data = new FormData;
                send_data.append('url', this.data.url);
                send_data.append('title', this.data.title);
                send_data.append('author', this.data.author);
                send_data.append('publishedAt', this.data.publishedAt);
                send_data.append('source', this.data.source);
                send_data.append('urlToImage', this.data.urlToImage);

                axios({
                    method: 'post',
                    url: '/api/save',
                    data: send_data
                })
                .then(res => {
                    // check if the request is successful
                    this.$emit("post sent");
                    this.btn_flg = true;
                })
                .catch(function (error){
                    console.log(error)
                });
            },

            unsave(data) {
                let send_data = new FormData;
                send_data.append('url', this.data.url);

                axios({
                    method: 'post',
                    url: '/api/remove',
                    data: send_data
                })
                .then(res => {
                    // check if the request is successful
                    this.$emit("delete sent");
                    this.btn_flg = false;
                })
                .catch(function (error){
                    console.log(error)
                });
            }
        }
    }
</script>

