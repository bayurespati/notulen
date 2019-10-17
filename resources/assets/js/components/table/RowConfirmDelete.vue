<template>
    <tr class="bg-red">
        <td :colspan="span" class="pt-3 pb-3 text-center text-white">
            <span class="text-white mr-2">{{ message }}</span>
            <button class="btn btn-xs btn-success" @click="deleteFromRootArray">Hapus</button>
            <button class="btn btn-xs btn-secondary" @click="confirm" autofocus>Batalkan</button>
        </td>
    </tr>
</template>

<script>
    export default {
        props: {
            id: {
                type: Number,
                default: -1
            },

            msg: {
                type: String,
                default: ''
            },

            span: {
                type: Number,
                default: 0
            }
        },

        data: function () {
            return {
                message: this.msg,
            }
        },

        methods: {
            deleteFromRootArray(){
                this.setToData();
                this.$emit('delete-from-root-array', ['delete', this.id]);
            },

            confirm(){
                this.setToData();
            },

            setToData(){
                this.$emit('set-to-data', 'data');
            }
        }
    };
</script>