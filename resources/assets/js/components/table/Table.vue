<template>
    <div class="panel-body">

        <table-header-notification
                :alert-flag="alertFlag"
                :alert-type="alertType"
                :alert-msg="alertMsg"
                @set-flag-back="alertToDefault">
        </table-header-notification>

        <!-- BEGIN TABLE -->
        <div class="table-responsive noSwipe">
            <div class="mai-datatable-body">
                <div class="col-sm-12 pb-3">
                    <table class="table table-hover table-striped">
                        <thead>
                        <template>
                            <table-header
                                    :table-columns="tableColumns"
                                    :sort-by="sortKey"
                                    @set-sort-key="sortBasedOn"
                            >
                            </table-header>
                        </template>
                        </thead>
                        <tbody>
                        <template v-if="totalDisplayed > 0" >
                            <template v-for="result in displayedResults" v-cloak>
                                <row :row-data="result"
                                     :table-columns="tableColumns"
                                     :current-page="currentPage"
                                     :span="colspan"
                                     :api-path="apiPath"
                                     @show-modal="showModal"
                                     @edit-root-array="editRootArray"
                                >
                                </row>
                            </template>
                        </template>

                        <template v-else>
                            <no-record :span="colspan"></no-record>
                        </template>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- END OF TABLE -->

    </div>
</template>

<script>
    import TableHeaderNotification from './TableHeaderNotification.vue';
    import TableHeader from './TableHeader.vue';
    import Row from './TableRow.vue';
    import NoRecord from './RowNoRecord.vue';

    export default {
        components: {
            TableHeaderNotification,
            TableHeader,
            Row,
            NoRecord,
        },
        
        props: {
            tableColumns: {
                type: Array,
                default: function () {
                    return []
                }
            },
            testArray: {
                type: Array,
                default: function () {
                    return []
                }
            },
            initialSort: {
                type: String,
                default: ''
            },
            apiPath: {
                type: String,
                default: ''
            },
            searchKey: {
                type: String,
                default: ''
            },
            alertData: {
                type: Array,
                default: function () {
                    return []
                }
            },
            nullable: {
                type: Array,
                default: function () {
                    return []
                }
            },
            initialPage: {
                type: Number,
                default: 1
            },
            perPage: {
                type: Number,
                default: 20
            },
        },

        data() {
            return {
                rootArray: [],
                searchResults: [],
                displayedResults: [],

                totalResults: 0,
                totalDisplayed: 1,

                alertFlag: false,
                alertType: '',
                alertMsg: '',

                sortKey: this.initialSort,
            }
        },

        mounted() {
            this.fetchForRootArray();
        },

        computed: {
            columns(){
                let array = [];

                this.tableColumns.map(function (column) {
                    if(column.name !== 'aksi'){
                        array.push(column.name);
                    }
                });

                return array;
            },

            colspan(){
                return this.tableColumns.length;
            },

            currentPage: {
                set(value) {
                    return this.initialPage = value;
                },
                get() {
                    return this.initialPage;
                }
            }
        },

        watch: {
            alertData(){
                this.setAlert(this.alertData);
            },

            searchKey(){
                this.currentPage = 1;

                this.sortBasedOn(this.sortKey);
            },

            currentPage(){
                this.fetchForDisplay(this.currentPage);
            },

            totalResults(){
                this.$emit('total-results-changed', this.totalResults);
            },

            columns() {
                this.sortBasedOn(this.sortKey);
            }
        },

        methods: {
            fetchForRootArray() {
                let vm = this;

                // for testing purpose
                if(this.apiPath == 'insert api path here'){
                    this.rootArray = this.testArray.map(function (item) {
                        return vm.nullable.length > 0
                            ? vm.checkForNulls(item)
                            : item;
                        });

                    this.sortBasedOn(this.sortKey);
                }
                else
                {
                    axios.get('/api/' + this.apiPath)
                    .then(response => {
                        this.rootArray = response.data.map(function (item) {
                            return vm.nullable.length > 0
                                ? vm.checkForNulls(item)
                                : item;
                        });

                        this.sortBasedOn(this.sortKey);
                    });
                }
            },

            sortBasedOn(key){
                this.sortKey = key;

                this.rootArray.sort(function (a, b) {
                    let itemA = typeof a[key] === 'string' ? a[key].toLowerCase() : a[key];
                    let itemB = typeof b[key] === 'string' ? b[key].toLowerCase() : b[key];

                    if (itemA < itemB) {
                        return -1;
                    }
                    else if (itemA > itemB) {
                        return 1;
                    } else {
                        return 0;
                    }
                });

                this.fetchForSearchedResults(this.searchKey);
            },

            fetchForSearchedResults(value){
                this.searchResults.length = 0;
                let vm = this;

                this.searchResults = this.rootArray.filter(function (item) {
                    // if (vm.searchKey.length > 0) {
                        // for (let i = 0; i < vm.columns.length; i++) {
                            // if(Array.isArray(item[vm.columns[i]])){
                                // return item[vm.columns[i]].count;
                            // } 
                            // else {
                                // if (item[vm.columns[i]].toLowerCase().includes(value.toLowerCase())) {
                                    // return item;
                                // }
                            // }
                        // }
                    // } 
                    // else {
                        // return item;
                    // }

                    for (let i = 0; i < vm.columns.length; i++) {
                        if(Array.isArray(item[vm.columns[i]])){
                            let matchCount = 0;

                            item[vm.columns[i]].forEach(function (arrayItem, arrayIndex){
                                if(arrayItem.toLowerCase().includes(value.toLowerCase())){
                                    matchCount++;
                                }
                            })

                            if(matchCount > 0){
                                return item;
                            }
                        } 
                        else {
                            if (item[vm.columns[i]].toLowerCase().includes(value.toLowerCase())) {
                                return item;
                            }
                        }
                    }
                });

                this.totalResults = this.searchResults.length;

                this.fetchForDisplay(this.currentPage);
            },

            fetchForDisplay(page){
                this.displayedResults.length = 0;
                this.currentPage = page;

                let itemsIndex = ((this.perPage * page) - this.perPage);

                for (let i = 0; i < this.perPage; i++) {

                    if (itemsIndex === this.searchResults.length)
                        break;

                    this.displayedResults.push(this.searchResults[itemsIndex++]);
                }

                this.totalDisplayed = this.displayedResults.length;
            },

            setAlert(alertData){
                this.alertFlag = alertData[0];
                this.alertType = alertData[1].data.type;
                this.alertMsg = alertData[1].data.msg;

                this.editRootArray([alertData[1].data.action, alertData[1].data.content]);
            },

            editRootArray(response){
                let action = response[0];
                let data = this.nullable.length > 0
                    ? this.checkForNulls(response[1])
                    : response[1];

                if (action === 'edit') {
                    this.editARowInRootArray(data);
                }
                else if (action === 'delete') {
                    this.deleteARowInRootArray(data);
                }
                else if (action === 'add') {
                    this.rootArray.push(data);
                }

                this.sortBasedOn(this.sortKey);
            },

            editARowInRootArray(data){
                for(let i = 0; i < this.rootArray.length; i++) {
                    let item = this.rootArray[i];

                    if(item.id === data.id){
                        Object.keys(item).forEach(function (variable) {
                            item[variable] = data[variable];
                        });

                        break;
                    }
                }
            },

            deleteARowInRootArray(data){
                for (let i = 0; i < this.rootArray.length; i++) {
                    if (this.rootArray[i].id === data) {
                        this.rootArray.splice(i, 1);

                        break;
                    }
                }
            },

            checkForNulls(item){
                for (let i = 0; i < this.nullable.length; i++) {
                    if (item[this.nullable[i]] === null) {
                        item[this.nullable[i]] = '';
                    }
                }

                return item;
            },

            showModal(data) { //modal name and row data
                this.$emit('set-modal-to-show', data);
            },

            alertToDefault(){
                this.alertFlag = false;
                this.alertType = '';
                this.alertMsg = '';
            }
        },
    };
</script>