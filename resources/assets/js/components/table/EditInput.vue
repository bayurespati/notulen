<template>

   <span class="form-group" :class="errorMessage ? 'has-danger' : ''">
       <template v-if="column.inputType === 'text'">
           <input type="text"
                  class="form-control form-control-sm"
                  :placeholder="columnValue"
                  v-model="input"
                  @keyup.enter="commenceEdit"
           >
       </template>

       <template v-else-if="column.inputType === 'textArea'">
          <textarea rows="4" 
                    cols="50"
                    class="form-control form-control-sm"
                    v-model="input">
          </textarea>
       </template>

       <template v-else-if="column.inputType === 'number'">
           <input type="number"
                  class="form-control form-control-sm"
                  :placeholder="columnValue"
                  v-model="input"
                  @keyup.enter="commenceEdit"
           >
       </template>

       <template v-else-if="column.inputType === 'radio'">
           <div class="col-sm-12 d-flex justify-content-around form-check mt-2 panel-font-small">
               <label class="custom-control custom-radio" v-for="value in column.inputValue">
                   <input type="radio"
                          :name="'radio-inline-' + id"
                          class="custom-control-input"
                          :value="value"
                          v-model="input"
                   >
                   <span class="custom-control-indicator"></span>
                   <span class="custom-control-description">{{ value }}</span>
               </label>
           </div>
       </template>

       <template v-else-if="column.inputType === 'select'">
           <select v-model="input"
                   @keyup.enter="commenceEdit"
                   class="form-control form-control-xs custom-select"
           >
               <template v-for="value in column.inputValue">
                   <option :value="value">{{ value }}</option>
               </template>
           </select>
       </template>
   </span>

</template>

<script>
    export default {
        props: {
            column: {
                type: Object,
                default: function () {
                    return {}
                }
            },

            columnValue: {
                type: [String, Number],
                default: 0
            },

            id: {
                type: Number,
                default: 0
            },

            errorMessage: {
              type: String,
              default: ""
            }
        },

        data() {
            return {
                input: this.columnValue,
            };
        },

        watch: {
            input() {
                this.$emit('set-input', this.input);
            }
        },

        methods: {
            commenceEdit(){
                this.$emit('commence-edit');
            },
        }
    };
</script>