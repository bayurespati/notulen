<template>
    <transition enterActiveClass="fade-in-down"
                leaveActiveClass="fade-out-up"
                mode="out-in"
    >
        <div v-if="tambahFlag" class="row mr-0 ml-0 mt-5 mb-4 pt-3 pb-3 bg-grey">
            <div class="col-sm-12 d-flex justify-content-center mb-5">
                <span class="title">Tambah <strong class="font-weight-bold">Perusahaan </strong> Baru</span>
            </div>

            <div class="col-sm-12 d-flex justify-content-around form-group" :class="errors.title ? 'has-danger' : ''">
                <div class="col-sm-3 text-right">
                    <label for="company_title"
                           class="form-control-label panel-font-small">
                        Nama
                    </label>
                </div>
                <div class="col-sm-9">
                    <input id="company_title"
                           type="text"
                           class="form-control form-control-sm"
                           placeholder="Masukkan Nama Perusahaan"
                           v-model="perusahaanData.name"
                           @keyup.enter="addCompany"
                    >

                    <form-error v-if="errors.name"
                                :error="errors.name"
                    ></form-error>
                </div>
            </div>

            <div class="col-sm-12 d-flex justify-content-around form-group">
                <div class="col-sm-3 text-right">
                    <label for="company_city"
                           class="form-control-label panel-font-small">
                        Kota
                    </label>
                </div>
                <div class="col-sm-9">
                    <input id="company_city"
                           type="text"
                           class="form-control form-control-sm"
                           placeholder="Masukkan Kota Perusahaan"
                           v-model="perusahaanData.city"
                           @keyup.enter="addCompany"
                    >
                </div>
            </div>

            <div class="col-sm-12 d-flex justify-content-around form-group">
                <div class="col-sm-3 text-right">
                    <label for="company_address"
                           class="form-control-label panel-font-small">
                        Alamat
                    </label>
                </div>
                <div class="col-sm-9">
                    <input id="company_address"
                           type="text"
                           class="form-control form-control-sm"
                           placeholder="Masukkan Alamat Perusahaan"
                           v-model="perusahaanData.address"
                           @keyup.enter="addCompany"
                    >
                </div>
            </div>

            <div class="col-sm-12 d-flex justify-content-around form-group">
                <div class="col-sm-3 text-right">
                    <label for="company_email"
                           class="form-control-label panel-font-small">
                        Email
                    </label>
                </div>
                <div class="col-sm-9">
                    <input id="company_email"
                           type="text"
                           class="form-control form-control-sm"
                           placeholder="Masukkan Email Perusahaan"
                           v-model="perusahaanData.email"
                           @keyup.enter="addCompany"
                    >
                </div>
            </div>

            <div class="col-sm-12 d-flex justify-content-around form-group">
                <div class="col-sm-3 text-right">
                    <label for="company_primary_contact"
                           class="form-control-label panel-font-small">
                        Kontak Utama
                    </label>
                </div>
                <div class="col-sm-9">
                    <input id="company_primary_contact"
                           type="text"
                           class="form-control form-control-sm"
                           placeholder="Masukkan Kontak Utama Perusahaan"
                           v-model="perusahaanData.primary_contact"
                           @keyup.enter="addCompany"
                    >
                </div>
            </div>

            <div class="col-sm-12 d-flex justify-content-around form-group">
                <div class="col-sm-3 text-right">
                    <label for="company_secondary_contact"
                           class="form-control-label panel-font-small">
                        Kontak Sekunder
                    </label>
                </div>
                <div class="col-sm-9">
                    <input id="company_secondary_contact"
                           type="text"
                           class="form-control form-control-sm"
                           placeholder="Masukkan Kontak Sekunder Perusahaan"
                           v-model="perusahaanData.secondary_contact"
                           @keyup.enter="addCompany"
                    >
                </div>
            </div>

            <div class="col-sm-4 offset-3 d-flex justify-content-around mt-3">
                <div class="col-sm-6">
                    <button class="full-width btn btn-success btn-block btn-sm"
                            @click="addCompany"
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
                perusahaanData: {
                    name: '',
                    city: '',
                    address: '',
                    email: '',
                    primary_contact: '',
                    secondary_contact: ''
                },
                errors: {
                    name: '',
                    city: '',
                    address: '',
                    email: '',
                    primary_contact: '',
                }
            }
        },

        props: {
            tambahFlag: {
                type: Boolean,
                default: false
            }
        },

        methods: {
            addCompany(){
                const vm = this;

                // axios.post('/api/..', {
                //     
                // })
                //     .then(function (response) {
                //         vm.resetForm();
                //         vm.$emit('set-alert-flag', [true, response]);
                //     })
                //     .catch(function (error) {
                //         vm.emptyErrorsState();
                //         vm.setErrors(error);
                //     })
            },

            emptyErrorsState(){
                let vm = this;

                Object.keys(this.errors).map(function (variable) {
                    vm.errors[variable] = '';
                });
            },

            setErrors(error){
                let errors = error.response.data;

                let keys = Object.keys(errors).map(function (key) {
                    return key;
                });

                if(keys.includes('name')) {
                    this.errors.name = 'Nama perusahaan harus diisi'
                }

                if(keys.includes('city')) {
                    this.errors.city = 'Kota perusahaan harus diisi'
                }

                if(keys.includes('address')) {
                    this.errors.address = 'Alamat perusahaan harus diisi'
                }

                if(keys.includes('email')) {
                    this.errors.email = 'Email perusahaan harus diisi'
                }

                if(keys.includes('primary_contact')) {
                    this.errors.primary_contact = 'Kontak utama perusahaan harus diisi'
                }
            },

            resetForm(){
                this.perusahaanData.name = '';
                this.perusahaanData.city = '';
                this.perusahaanData.address = '';
                this.perusahaanData.email = '';
                this.perusahaanData.primary_contact = '';
                this.perusahaanData.secondary_contact = '';

                this.errors.name = '';
                this.errors.city = '';
                this.errors.address = '';
                this.errors.email = '';
                this.errors.primary_contact = '';
                this.errors.secondary_contact = '';
            },

            setTambahFlag(){
                this.$emit('set-tambah-flag', false);
            }
        }
    };
</script>