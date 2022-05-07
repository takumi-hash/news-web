<template>
    <div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default"><i class="bi-lightning-charge"></i></span>
            <input type="text" class="form-control" v-model="keyword" aria-label="type to search" aria-describedby="inputGroup-sizing-default" placeholder="ブックマークを即時検索できます" autofocus>
        </div>
        <div class="result-view">
            <ul>
                <li v-for="bookmark in bookmarks" :key="bookmark.id" class="py-2">
                    <a :href="bookmark.url" class="text-decoration-none text-reset">{{ bookmark.title }}
                        <br>&mdash;<span class="text-muted small">{{ bookmark.publishedAt }}</span>
                    </a>
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