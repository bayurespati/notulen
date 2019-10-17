<template>
    <transition enterActiveClass="fade-in"
                leaveActiveClass="fade-out"
    >
        <tr>
            <td :colspan="span" class="text-center">Data yang anda cari tidak ditemukan</td>
        </tr>
    </transition>
</template>

<script>
    export default {
        props: {
            span: {
                type: Number,
                default: 0
            }
        }
    }
</script>