import RoomHeader from '../../../components/master/room/RoomHeader.vue';
import PersonalisedTable from '../../../components/table/Table.vue';
import Pagination from '../../../components/global/Pagination.vue';

new Vue({

    el: '#room',

    data: {
    	tableColumns: [
    		{
    			name: 'code',
    			columnName: 'Kode',
    			recordable: true,
    			sortable: true,
    			nullable: false,
    			deleteMsg: true,
    			inputType: 'text',
    			inputValue: false
    		},
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
    			code: 'HV1',
    			name: 'Foyer',
    		}
    	],

    	initialSort: 'code',
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
        RoomHeader,
        PersonalisedTable,
        Pagination
    },
});
