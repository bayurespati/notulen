<template>
    <transition enterActiveClass="fade-in-down"
                leaveActiveClass="fade-out-up">
        <span class="help-block ">
            {{ error }}
        </span>
    </transition>
</template>

<script>
    export default {
        props: {
            error: {
                type: String,
                default: ''
            }
        }
    }
</script>

<style scoped>
    span::first-letter {
        text-transform: uppercase !important;
    }
</style>