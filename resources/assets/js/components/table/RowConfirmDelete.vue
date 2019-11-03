<template>
    <tr class="bg-red">
        <td :colspan="span" class="pt-3 pb-3 text-center text-white">
            <span class="text-white mr-2">{{ message }}</span>
            <button class="btn btn-xs btn-success" @click="deleteFromRootArray">Hapus</button>
            <button class="btn btn-xs btn-secondary" @click="cancel" autofocus>Batalkan</button>
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
            },

            apiPath: {
                type: String,
                default: ''
            },
        },

        data: function () {
            return {
                message: this.msg,
            }
        },

        methods: {
            deleteFromRootArray(){
                if(this.apiPath == 'insert api path here'){
                    this.setToData();
                    this.$emit('delete-from-root-array', ['delete', this.id]);
                    flash('Entri telah berhasil dihapus');
                }
                else {
                    const vm = this;

                    axios.delete('/api/' + this.apiPath + '/' + this.id)
                    .then(function () {
                        vm.$emit('delete-from-root-array', ['delete', vm.id]);
                        flash('Entri telah berhasil dihapus');
                    })
                    .catch(function (error) {

                        console.log(error);

                        flash('Ups, terjadi masalah!', 'danger');
                    });;
                }
            },

            cancel(){
                this.setToData();
            },

            setToData(){
                this.$emit('set-to-data', 'data');
            }
        }
    };
</script>