import DetailHeader from '../../../../components/master/item/detail/DetailHeader.vue';
import PersonalisedTable from '../../../../components/table/Table.vue';
import Pagination from '../../../../components/global/Pagination.vue';


new Vue({

    el: '#detail',

        data: {
    	tableColumns: [
    		{
    			name: 'name',
    			columnName: 'Nama',
    			recordable: true,
    			sortable: true,
    			nullable: false,
    			deleteMsg: true,
    			inputType: 'text',
    			inputValue: false
    		},
    		{
    			name: 'aksi',
    			columnName: 'Aksi',
    			recordable: false,
    			sortable: false,
    			nullable: false,
    			deleteMsg: false,
    			inputType: false,
    			inputValue: false
    		}
    	],

    	testArray: [
    		{
    			id: 1,
    			name: 'Top',
    		}
    	],

    	initialSort: 'name',
    	path: 'insert api path here',
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
        DetailHeader,
        PersonalisedTable,
        Pagination
    },
});
