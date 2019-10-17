<template>
    <transition enterActiveClass="fade-in"
                leaveActiveClass="fade-out"
    >
        <ul class="pagination">
            <li class="page-item"> <span class="page-link" v-if="hasPrev" @click="changePage(prevPage)">Back</span></li>
            <li class="page-item" v-if="hasFirst"><span class="page-link" @click="changePage(1)">1</span></li>
            <li class="page-item" v-if="hasFirst"><span class="page-link">...</span></li>
            <li class="page-item" v-for="page in pages " :class="{ active: current === page }"><span class="page-link " @click="changePage(page)"> {{ page }}</span></li>
            <li class="page-item" v-if="hasLast"><span class="page-link">...</span></li>
            <li class="page-item" v-if="hasLast"><span class="page-link" @click="changePage(totalPages)">{{ totalPages }}</span></li>
            <li class="page-item"><span class="page-link" v-if="hasNext" @click="changePage(nextPage)">Next</span></li>
        </ul>
    </transition>
</template>

<style scoped>
    .page-item:hover{
        cursor: pointer;
    }
</style>

<script>
    export default {
        props: {
            current: {
                type: Number,
                default: 1
            },

            total: {
                type: Number,
                default: 0
            },

            perPage: {
                type: Number,
                default: 9
            },

            pageRange: {
                type: Number,
                default: 2
            }
        },

        computed: {
            pages() {
                let pages = [];

                for(let i = this.rangeStart; i <= this.rangeEnd; i++){
                    pages.push(i)
                }

                return pages
            },

            rangeStart() {
                let start = this.current - this.pageRange;

                return (start > 0) ? start : 1
            },

            rangeEnd() {
                let end = this.current + this.pageRange;

                return (end < this.totalPages) ? end : this.totalPages;
            },

            totalPages() {
                return Math.ceil( this.total/this.perPage )
            },

            nextPage() {
                return this.current + 1
            },

            prevPage() {
                return this.current - 1
            },
            hasFirst() {
                return this.rangeStart !== 1
            },

            hasLast() {
                return this.rangeEnd < this.totalPages
            },

            hasPrev() {
                return this.current > 1
            },

            hasNext() {
                return this.current < this.totalPages
            },
        },

        methods: {

            changePage(page) {
                this.$emit('page-changed', page)
            }
        }
    }
</script>
