<template>
    <transition enterActiveClass="fade-in-down"
                leaveActiveClass="fade-out-up"
                mode="out-in"
    >
        <div v-if="tambahFlag" class="row mr-0 ml-0 mt-5 mb-4 pt-3 pb-3 bg-grey">
            <div class="col-sm-12 d-flex justify-content-center mb-5">
                <span class="title">Tambah <strong class="font-weight-bold">Ruangan </strong> Baru</span>
            </div>

            <div class="col-sm-12 d-flex justify-content-around form-group"
                :class="errors.code ? 'has-danger' : ''">
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

                    <form-error v-if="errors.code"
                                :error="errors.code"
                    ></form-error>
                </div>
            </div>

            <div class="col-sm-12 d-flex justify-content-around form-group"
                :class="errors.name ? 'has-danger' : ''">
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

                    <form-error v-if="errors.name"
                                :error="errors.name"
                    ></form-error>
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
    import FormError from '../../global/FormError.vue';

    export default {
        components: {
          FormError
        },

        data: function () {
            return {
                ruanganData: {
                    code: '',
                    name: ''
                },
                errors: {}
            }
        },

        props: {
            tambahFlag: {
                type: Boolean,
                default: false
            },

            apiPath: {
                type: String,
                default: ''
            },
        },

        methods: {
            addRoom(){
                const vm = this;

                if(this.apiPath == "insert api path here"){
                    const testAdd = {
                        data: {
                            'content': this.ruanganData,
                            'action': 'add',
                            'type': 'success',
                            'msg': 'Entri telah berhasil ditambah!'
                        }
                    }
        
                    this.$emit('set-alert-flag', [true, testAdd]);
                    this.resetForm();
                    flash('Entri telah berhasil ditambah!');
                }
                else {
                    const vm = this;
                    axios.post('/api/' + this.apiPath, this.ruanganData)
                    .then(function (response) {
                        vm.$emit('set-alert-flag', [true, response]);
                        vm.resetForm();
                        flash('Entri telah berhasil ditambah!');
                    })
                    .catch(function (error) {
                        vm.cleanErrors();
                        vm.fillErrors(error);
                        flash('Ups, terjadi masalah!', 'danger');
                    })
                }
            },

            resetForm(){
                this.ruanganData.code = '';
                this.ruanganData.name = '';

                this.cleanErrors();
            },

            cleanErrors(){
                this.errors = {};
            },

            fillErrors(errorMessages){
                Object.keys(errorMessages).forEach(key => {
                    let message = "";

                    errorMessages[key].forEach(value => {
                        message = message + value + " ";
                    });

                    errorMessages[key] = message;
                });
                this.errors = errorMessages;
            },

            setTambahFlag(){
                this.$emit('set-tambah-flag', false);
                this.resetForm();
            }
        }
    };
</script>