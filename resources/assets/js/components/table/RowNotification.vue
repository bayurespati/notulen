<template>
    <tr class="bg-success">
        <td :colspan="span" class="pt-3 pb-3 text-center text-white">{{ message }}</td>
    </tr>
</template>

<script>
    export default {
        props: {
            message: {
                type: String,
                default: ''
            },

            span: {
                type: Number,
                default: 0
            }
        }
    }
</script>