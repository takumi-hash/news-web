<template>
    <div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default">高速検索</span>
            <input type="text" class="form-control" v-model="keyword" aria-label="type to search" aria-describedby="inputGroup-sizing-default" autofocus>
        </div>
        <div class="result-view">
            <ul>
                <li v-for="bookmark in bookmarks" :key="bookmark.id">
                    {{ bookmark.title }}
                </li>
            </ul>
        </div>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                keyword: "",
                bookmarks: {}
            }
        },
        methods: {
            search() {
                axios.get('/api/search?keywords=' + this.keyword)
                    .then(res => {
                        this.bookmarks = res.data;
                    })
                    .catch(error => {
                        console.log('データの取得に失敗しました。');
                    });
            }
        },
        watch: {
            keyword() {
                this.search();
            }
        }
    }
</script>