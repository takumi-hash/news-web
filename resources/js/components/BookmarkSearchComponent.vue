<template>
    <div>
        <input type="text" v-model="keyword">
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
                axios.get('/api/search?title=' + this.keyword)
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