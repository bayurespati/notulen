import ItemHeader from '../../../../components/master/item/item/ItemHeader.vue';
import Flash from '../../../../components/global/Flash.vue';
import PersonalisedTable from '../../../../components/table/Table.vue';
import Pagination from '../../../../components/global/Pagination.vue';
import EditItemModal from '../../../../components/master/item/item/EditItemModal.vue';


new Vue({

    el: '#item',

        data: {
    	tableColumns: [
    		{
    			name: 'code',
    			columnName: 'Kode',
    			sortable: true,
    			deleteMsg: true,
    			inputType: 'text',
    			inputValue: false
    		},
            {
                name: 'name',
                columnName: 'Nama',
                sortable: true,
                deleteMsg: true,
                inputType: 'text',
                inputValue: false
            },
            {
                name: 'alternative_name',
                columnName: 'Nama Alternatif',
                sortable: true,
                deleteMsg: false,
                inputType: 'text',
                inputValue: false
            },
            {
                name: 'type',
                columnName: 'Tipe',
                sortable: true,
                deleteMsg: false,
                inputType: 'select',
                inputValue: ['Kursi', 'Meja', 'Kabinet']
            },
            {
                name: 'detail_count',
                columnName: 'Detail',
                sortable: false,
                deleteMsg: false,
                inputType: 'select',
                inputValue: ['Dudukan', 'Sandaran', 'Kaki']
            },
    		{
    			name: 'aksi', //action column must have 'aksi' as the name
    			columnName: 'Aksi',
                editType: 'modal', //inline, modal
                modalName: 'editItemModal',
                extraGoToIcon: true,
                extraGoToIconName: 's7-photo',
                goToPath: 'details'
    		}
    	],

        nullable: [],

        editItemModal: false,

        typeArray: ['Kursi', 'Meja', 'Kabinet'],
        detailArray: ['Dudukan', 'Sandaran', 'Kaki'],
        finishingArray: ['Marmer Putih', 'Kayu', 'Besi'],

        testArray: [
        	{
        		id: 1,
        		code: '1001',
                name: 'Kursi Test',
                alternative_name: 'Kursi Test dengan beberapa detail tertentu',
                type: 'Kursi',
                detail: ['Sandaran', 'Dudukan', 'Kaki'],
                finishing: ['Marmer Putih'],
                detail_count: 3,
                finishing_count: 1
        	}
        ],

    	initialSort: 'name',
    	apiPath: 'insert api path here',
    	searchKey: '',
    	alertData: [],

    	currentPage: 1,
    	perPage: 20,
    	totalResults: 0,

        editedData: {
            id: '',
            code: '',
            name: '',
            alternative_name: '',
            type: '',
            detail: [],
            finishing: [],
        }
    },

    methods: {
    	pageChanged(page){
    		this.currentPage = page;
    	},

    	setSearch(key){
    		this.searchKey = key;
    		this.pageChanged(1);
    	},

        showModal(data){
            if(this.tableColumns[5].modalName == data[0]){
                this.editItemModal = true;
            }

            this.fillsEditedData(data[1]);
        },

        hideEditItemModal(){
            this.editItemModal = false;
            this.emptyEditedData();
        },

        fillsEditedData(data){
            this.editedData.id = data.id;
            this.editedData.code = data.code;
            this.editedData.name = data.name;
            this.editedData.alternative_name = data.alternative_name;
            this.editedData.type = data.type;

            for (let i = 0; i < data.detail.length; i++) {
                this.editedData.detail.push(data.detail[i]);
            }

            for (let i = 0; i < data.finishing.length; i++) {
                this.editedData.finishing.push(data.finishing[i]);
            }
        },

        emptyEditedData(){
            this.editedData.id = '';
            this.editedData.code = '';
            this.editedData.name = '';
            this.editedData.alternative_name = '';
            this.editedData.type = '';
            this.editedData.detail = [];
            this.editedData.finishing = [];
        }
    },

    components: {
        ItemHeader,
        Flash,
        PersonalisedTable,
        Pagination,
        EditItemModal
    },
});
