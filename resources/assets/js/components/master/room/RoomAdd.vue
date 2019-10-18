<template>
    <transition enterActiveClass="fade-in-down"
                leaveActiveClass="fade-out-up"
                mode="out-in"
    >
        <div v-if="tambahFlag" class="row mr-0 ml-0 mt-5 mb-4 pt-3 pb-3 bg-grey">
            <div class="col-sm-12 d-flex justify-content-center mb-5">
                <span class="title">Tambah <strong class="font-weight-bold">Ruangan </strong> Baru</span>
            </div>

            <div class="col-sm-12 d-flex justify-content-around form-group">
                <div class="col-sm-3 text-right">
                    <label for="room_code"
                           class="form-control-label panel-font-small">
                        Kode
                    </label>
                </div>
                <div class="col-sm-9">
                    <input id="room_code"
                           type="text"
                           class="form-control form-control-sm"
                           placeholder="Masukkan Kode Ruangan"
                           v-model="ruanganData.code"
                           @keyup.enter="addRoom"
                    >
                </div>
            </div>

            <div class="col-sm-12 d-flex justify-content-around form-group">
                <div class="col-sm-3 text-right">
                    <label for="room_name"
                           class="form-control-label panel-font-small">
                        Nama
                    </label>
                </div>
                <div class="col-sm-9">
                    <input id="room_name"
                           type="text"
                           class="form-control form-control-sm"
                           placeholder="Masukkan Nama Ruangan"
                           v-model="ruanganData.name"
                           @keyup.enter="addRoom"
                    >
                </div>
            </div>

            <div class="col-sm-4 offset-3 d-flex justify-content-around mt-3">
                <div class="col-sm-6">
                    <button class="full-width btn btn-success btn-block btn-sm"
                            @click="addRoom"
                    >
                        <i class="icon icon-left s7-plus"></i> Tambah
                    </button>
                </div>
                <div class="col-sm-6">
                    <button class="full-width btn btn-secondary btn-block btn-sm"
                            @click="setTambahFlag"
                    >
                        <i class="icon icon-left s7-check"></i> Selesai
                    </button>
                </div>
            </div>
        </div>
    </transition>
</template>

<script>
    export default {
        data: function () {
            return {
                ruanganData: {
                    code: '',
                    name: ''
                },
            }
        },

        props: {
            tambahFlag: {
                type: Boolean,
                default: false
            }
        },

        methods: {
            addRoom(){
                const vm = this;

                // axios.post('/api/..', {
                //     
                // })
                //     .then(function (response) {
                //         vm.resetForm();
                //         vm.$emit('set-alert-flag', [true, response]);
                //     })
                //     .catch(function (error) {
                //     })
            },

            resetForm(){
                this.ruanganData.code = '';
                this.ruanganData.name = '';
            },

            setTambahFlag(){
                this.$emit('set-tambah-flag', false);
            }
        }
    };
</script>