import FinishingHeader from '../../../../components/master/item/finishing/FinishingHeader.vue';
import Flash from '../../../../components/global/Flash.vue';
import PersonalisedTable from '../../../../components/table/Table.vue';
import Pagination from '../../../../components/global/Pagination.vue';

new Vue({

    el: '#finishing',

        data: {
    	tableColumns: [
    		{
    			name: 'name',
    			columnName: 'Nama',
    			sortable: true,
    			deleteMsg: true,
    			inputType: 'text',
    			inputValue: false
    		},
    		{
    			name: 'aksi', //action column must have 'aksi' as the name
    			columnName: 'Aksi',
                editType: 'inline', //inline, modal
                extraGoToIcon: false,
    		}
    	],

        nullable: [],

    	initialSort: 'name',
    	apiPath: 'msDescriptiveFinishing',
    	searchKey: '',
    	alertData: [],

    	currentPage: 1,
    	perPage: 20,
    	totalResults: 0
    },

    methods: {
    	pageChanged(page){
    		this.currentPage = page;
    	},

    	setSearch(key){
    		this.searchKey = key;
    		this.pageChanged(1);
    	}
    },

    components: {
        FinishingHeader,
        Flash,
        PersonalisedTable,
        Pagination
    },
});
