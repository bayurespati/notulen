<template>


    <!--=========================================================================================
        M A K E   T H E   B A C K G R O U N D   C L I C K A B L E   T O   C L O S E   T H E
        M O D A L
        ==========================================================================================-->
    <div>


        <!--=========================================================================================
            M O D A L   W R A P P E R
            ==========================================================================================-->
        <div class="modal-container modal-effect-9"
             :class="hideOrShowModal">
            <div class="modal-content"
                 @click.stop>


                <!--=========================================================================================
                    M O D A L   H E A D E R
                    ==========================================================================================-->
                <div class="modal-header pb-2">


                    <!--=========================================================================================
                        C L O S E   M O D A L   B U T T O N
                        ==========================================================================================-->
                    <button @click="cancel"
                            aria-hidden="true" class="close modal-close"><span class="s7-close"></span>
                    </button>
                </div>


                <!--=========================================================================================
                    M O D A L   B O D Y
                    ==========================================================================================-->
                <div class="modal-body">


                    <!--=========================================================================================
                        M O D A L   C O N T E N T
                        ==========================================================================================-->
                    <div class="text-center">
                        <div class="row mr-0 ml-0 pt-3 pb-3 bg-grey">
                            <div class="col-sm-12 d-flex justify-content-center mb-5 mt-3" >
                                <h3 class="title">Ubah Data <strong class="font-weight-bold">{{ editedData.name }} </strong></h3>
                            </div>

                            <div class="col-sm-12 d-flex justify-content-around form-group">
                                <div class="col-sm-4 text-right">
                                    <label for="user_name"
                                    class="form-control-label panel-font-small">
                                        <strong class="font-weight-bold">
                                            Nama
                                        </strong>
                                    </label>
                                </div>

                                <div class="col-sm-8 text-left">
                                    {{ editedData.name }}
                                </div>
                            </div>

                            <div class="col-sm-12 d-flex justify-content-around form-group"
                            :class="errors.company ? 'has-danger' : ''">
                                <div class="col-sm-4 text-right">
                                    <label for="user_company"
                                    class="form-control-label panel-font-small mb-0 mt-2">
                                        <strong class="font-weight-bold">
                                            Perusahaan
                                        </strong>
                                    </label>
                                </div>

                                <div class="col-sm-8 text-left">
                                    <select v-model="userData.company"
                                    @keyup.enter="editUser"
                                    class="form-control form-control-xs custom-select">

                                        <template v-for="value in companyArray">
                                            <option :value="value">{{ value }}</option>
                                        </template>
                                    </select>

                                    <form-error v-if="errors.company"
                                    :error="errors.company"
                                    ></form-error>
                                </div>
                            </div>

                            <div class="col-sm-12 d-flex justify-content-around form-group">
                                <div class="col-sm-4 text-right">
                                    <label for="user_address"
                                    class="form-control-label panel-font-small">
                                        <strong class="font-weight-bold">
                                            Alamat
                                        </strong>
                                    </label>
                                </div>

                                <div class="col-sm-8 text-left">
                                    {{ editedData.address }}
                                </div>
                            </div>

                            <div class="col-sm-12 d-flex justify-content-around form-group">
                                <div class="col-sm-4 text-right">
                                    <label for="user_email"
                                    class="form-control-label panel-font-small">
                                        <strong class="font-weight-bold">
                                            Email
                                        </strong>
                                    </label>
                                </div>

                                <div class="col-sm-8 text-left">
                                    {{ editedData.email }}
                                </div>
                            </div>

                            <div class="col-sm-12 d-flex justify-content-around form-group">
                                <div class="col-sm-4 text-right">
                                    <label for="user_current_position"
                                    class="form-control-label panel-font-small">
                                        <strong class="font-weight-bold">
                                            Jabatan
                                        </strong>
                                    </label>
                                </div>

                                <div class="col-sm-8 text-left">
                                    {{ editedData.currentPosition }}
                                </div>
                            </div>

                            <div class="col-sm-12 d-flex justify-content-around form-group">
                                <div class="col-sm-4 text-right">
                                    <label for="user_primary_contact"
                                    class="form-control-label panel-font-small">
                                        <strong class="font-weight-bold">
                                            Kontak Utama
                                        </strong>
                                    </label>
                                </div>

                                <div class="col-sm-8 text-left">
                                    {{ editedData.primary_contact  }}
                                </div>
                            </div>

                            <div class="col-sm-12 d-flex justify-content-around form-group">
                                <div class="col-sm-4 text-right">
                                    <label for="user_secondary_contact"
                                    class="form-control-label panel-font-small">
                                        <strong class="font-weight-bold">
                                            Kontak Sekunder
                                        </strong>
                                    </label>
                                </div>

                                <div class="col-sm-8 text-left">
                                    {{ editedData.secondary_contact }}
                                </div>
                            </div>

                            <div class="col-sm-12 d-flex justify-content-around form-group"
                            :class="errors.isActive ? 'has-danger' : ''">
                                <div class="col-sm-4 text-right">
                                    <label for="user_status"
                                    class="form-control-label panel-font-small mb-0 mt-2">
                                        <strong class="font-weight-bold">
                                            Status
                                        </strong>
                                    </label>
                                </div>

                                <div class="col-sm-8 text-left form-check mt-2 panel-font-small">
                                    <label class="custom-control custom-radio">
                                        <input type="radio"
                                        name="radio-inline-2"
                                        class="custom-control-input"
                                        value="true"
                                        v-model="userData.isActive">
                                        <span class="custom-control-indicator"></span>
                                        <span class="custom-control-description">Aktif</span>
                                    </label>

                                    <label class="custom-control custom-radio panel-font-small">
                                        <input type="radio"
                                        name="radio-inline-2"
                                        class="custom-control-input"
                                        value="false"
                                        v-model="userData.isActive">
                                        <span class="custom-control-indicator"></span>
                                        <span class="custom-control-description">Nonaktif</span>
                                    </label>

                                    <form-error v-if="errors.isActive"
                                    :error="errors.isActive"
                                    ></form-error>
                                </div>
                            </div>

                            <!-- <div class="col-sm-12 d-flex justify-content-around form-group"> -->
                                <!-- <div class="col-sm-3 text-right"> -->
                                    <!-- <label for="user_password" -->
                                    <!-- class="form-control-label panel-font-small"> -->
                                        <!-- Password (Auto-generated) -->
                                    <!-- </label> -->
                                <!-- </div> -->

                                <!-- <div class="col-sm-9"> -->
                                    <!-- <input id="user_password" -->
                                    <!-- type="password" -->
                                    <!-- class="form-control form-control-sm" -->
                                    <!-- disabled -->
                                    <!-- v-model="userData.password" -->
                                    <!-- @keyup.enter="editUser"> -->
                                <!-- </div> -->
                            <!-- </div> -->
                        </div>


                        <!--=========================================================================================
                            A C T I O N   B U T T O N S
                            ==========================================================================================-->
                        <div class="mt-3">


                            <!--=========================================================================================
                                C L O S E   M O D A L   B U T T O N
                                ==========================================================================================-->
                            <button class="btn btn-sm btn-space btn-secondary modal-close"
                                    @click="cancel">Batal
                            </button>


                            <!--=========================================================================================
                                C O N T I N U E   D E A C T I V A T I N G   T H E   U S E R
                                ==========================================================================================-->
                            <button class="btn btn-sm btn-space btn-success modal-close"
                                    :disabled="isInputAndDefaultTheSame"
                                    @click="editUser">
                                Simpan
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal-overlay"
             :class="hideOrShowModal">
        </div>
    </div>
</template>

<script>
    import FormError from '../../global/FormError.vue';

    export default {

        components: {
          FormError
        },

        mounted: function () {
            document.addEventListener("keydown", (e) => {
                if (this.showModal && e.keyCode == 27) {
                    this.cancel();
                }
            });
        },

        props: {

            showModal: {
                type: Boolean,
                default: false
            },

            editedData: {
                type: Object,
                default: function () {
                    return {};
                }
            },

            companyArray: {
                type: Array,
                default: function () {
                    return [];
                }
            },

            apiPath: {
                type: String,
                default: ""
            }

        },

        data(){
            return {
                userData: {
                    id: '',
                    name: '',
                    company: '',
                    address: '',
                    email: '',
                    current_position: '',
                    primary_contact: '',
                    secondary_contact: '',
                    // password: '',
                    isActive: true,
                },
                errors: {},
            };
        },

        watch: {

            showModal(){
                if(this.showModal){
                    this.fillInputs();
                }
            },

            'userData.isActive': function (newValue, oldValue){
                if(newValue == true || newValue == "true"){
                    this.userData.isActive = true;
                }
                else {
                    this.userData.isActive = false;
                }
            }

        },

        computed: {

            hideOrShowModal(){
                return this.showModal ? 'modal-show' : '';
            },

            isInputAndDefaultTheSame(){
                let inputCount = 0;
                let defaultCount = 0;
                let vm = this;


                Object.keys(this.editedData).map(function (variable) {
                    defaultCount++;

                    if(vm.editedData[variable] === vm.userData[variable]){
                        inputCount++;
                    }
                });

                return inputCount === defaultCount;
            },

        },

        methods: {

            fillInputs() {
                this.userData.id = this.editedData.id;
                this.userData.name = this.editedData.name;
                this.userData.company = this.editedData.company;
                this.userData.address = this.editedData.address;
                this.userData.email = this.editedData.email;
                this.userData.current_position = this.editedData.current_position;
                this.userData.primary_contact = this.editedData.primary_contact;
                this.userData.secondary_contact = this.editedData.secondary_contact;
                // this.userData.password = this.editedData.password;
                this.userData.isActive = this.editedData.isActive;
            },

            cancel(){
                this.$emit('set-show-edit-inactive-user-modal-to-false');
                this.cleanErrors();
            },

            editUser(){
                const vm = this;

                if(this.apiPath == 'insert api path here'){
                    const testUpdate = {
                        data: {
                            'content': this.userData,
                            'action': 'edit',
                            'type': 'success',
                            'msg': 'Entri telah berhasil diperbarui!'
                        }
                    }
                    this.$emit('set-alert-flag', [true, testUpdate]);
                    flash('Entri telah berhasil diperbarui');
                    this.cancel();
                }
                else {
                    axios.patch('/api/' + this.apiPath + "/" + this.userData.id, this.userData)
                    .then(function (response) {
                        vm.$emit('set-alert-flag', [true, response]);
                        flash('Entri telah berhasil diperbarui');
                        this.cancel();
                    })
                    .catch(function (error) {
                        vm.cleanErrors();
                        vm.fillErrors(error.response.data);
                        flash('Ups, terjadi masalah!', 'danger');
                    });
                }
            },

            cleanErrors(){
                this.hasError = false;
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
                this.hasError = true;
            },

        }
    };

</script>