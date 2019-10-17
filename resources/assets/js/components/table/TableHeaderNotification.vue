<template>
    <transition
            enterActiveClass="fade-in-down"
            leaveActiveClass="fade-out-up"
            mode="out-in">
        <div v-if="alertFlag" class="pr-4 pl-4">
            <div role="alert" class="alert alert-icon alert-icon-colored alert-dismissible" :class="typeAlert">
                <div v-if="alertType === 'success'" class="icon"><span class="s7-check"></span></div>
                <div v-else-if="alertType === 'info'" class="icon"><span class="s7-info"></span></div>
                <div v-else-if="alertType === 'warning'" class="icon"><span class="s7-attention"></span></div>
                <div v-else class="icon"><span class="s7-shield"></span></div>

                <div class="message">
                    <button type="button" data-dismiss="alert" aria-label="Close" class="close" @click="setFlagBack">
                        <span aria-hidden="true" class="s7-close"></span>
                    </button>

                    {{ alertMsg }}
                </div>
            </div>
        </div>
    </transition>
</template>

<script>
    export default {
        props: {
            alertFlag: {
                type: Boolean,
                default: false
            },

            alertType: {
                type: String,
                default: ''
            },

            alertMsg: {
                type: String,
                default: ''
            }
        },

        computed: {
            typeAlert() {
                return 'alert-' + this.alertType;
            }
        },

        watch: {
            alertFlag(){
                this.notificationTimer();
            }
        },

        methods: {
            notificationTimer(){
                let vm = this;

                setTimeout(function () {
                    vm.setFlagBack();
                }, 1500)
            },

            setFlagBack() {
                this.$emit('set-flag-back', false);
            }
        }
    };
</script>