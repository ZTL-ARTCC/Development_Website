/*
 *  Document   : be_tables_datatables.js
 *  Author     : pixelcave
 *  Description: Custom JS code used in Tables Datatables Page
 */

var BeTableDatatables = function() {
    // Override a few DataTable defaults, for more examples you can check out https://www.datatables.net/
    var exDataTable = function() {
        jQuery.extend( jQuery.fn.dataTable.ext.classes, {
            sWrapper: "dataTables_wrapper dt-bootstrap4"
        });
    };

    // Init full DataTable, for more examples you can check out https://www.datatables.net/
    var initDataTableFull = function() {
        jQuery('.js-dataTable-full').dataTable({
            columnDefs: [ { orderable: false, targets: [ 4 ] } ],
            pageLength: 8,
            lengthMenu: [[5, 8, 15, 20], [5, 8, 15, 20]],
            autoWidth: false
        });
    };

    // Init full extra DataTable, for more examples you can check out https://www.datatables.net/
    var initDataTableFullPagination = function() {
        jQuery('.js-dataTable-full-pagination').dataTable({
            pagingType: "simple_numbers",
            columnDefs: [ { orderable: false, targets: [ 3 ] } ],
            pageLength: 15,
            lengthMenu: [[15, 20, 25, 30], [15, 20, 25, 30]],
            autoWidth: false
        });
    };
	
	// Init full extra DataTable, for more examples you can check out https://www.datatables.net/
    var initDataTableRosterAdmin = function() {
        jQuery('.js-dataTable-rosteradmin').dataTable({
            pagingType: "simple_numbers",
            columnDefs: [ { orderable: false, targets: [ 6 ] } ],
            pageLength: 15,
            lengthMenu: [[15, 20, 25, 30], [15, 20, 25, 30]],
            autoWidth: false
        });
    };
	
	// Init full extra DataTable, for more examples you can check out https://www.datatables.net/
    var initDataTableActivityTable = function() {
        jQuery('.js-dataTable-activitytable').dataTable({
            pagingType: "simple_numbers",
			order: [],
            pageLength: 20,
            lengthMenu: [[20, 30, 40, 50, 60, 70, 80, 90, 100], [20, 30, 40, 50, 60, 70, 80, 90, 100]],
            autoWidth: false
        });
    };
	
	// Init full extra DataTable, for more examples you can check out https://www.datatables.net/
    var initDataTableFullFeedback = function() {
        jQuery('.js-dataTable-full-feedback').dataTable({
            pagingType: "simple_numbers",
			order: [ 0, 'desc' ],
            columnDefs: [ { orderable: false, targets: [ 5 ] } ],
            pageLength: 15,
            lengthMenu: [[15, 20, 25, 30], [15, 20, 25, 30]],
            autoWidth: false
        });
    };

    // Init simple DataTable, for more examples you can check out https://www.datatables.net/
    var initDataTableSimple = function() {
        jQuery('.js-dataTable-simple').dataTable({
            columnDefs: [ { orderable: false, targets: [ 4 ] } ],
            pageLength: 8,
            lengthMenu: [[5, 8, 15, 20], [5, 8, 15, 20]],
            autoWidth: false,
            searching: false,
            oLanguage: {
                sLengthMenu: ""
            },
            dom: "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-6'i><'col-sm-6'p>>"
        });
    };
	
	// Init simple DataTable, for more examples you can check out https://www.datatables.net/
    var initDataTableProfile = function() {
        jQuery('.js-dataTable-profile').dataTable({
            pageLength: 10,
            lengthMenu: [[10, 15, 20, 25], [10, 15, 20, 25]],
            autoWidth: false,
            searching: false,
			pagingType: "simple",
			order: [],
			ordering: false,
            oLanguage: {
                sLengthMenu: ""
            },
            dom: "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-6'i><'col-sm-6'p>>"
        });
    };

    return {
        init: function() {
            // Override a few DataTable defaults
            exDataTable();

            // Init Datatables
            initDataTableSimple();
            initDataTableFull();
            initDataTableFullPagination();
            initDataTableFullFeedback();
            initDataTableProfile();
            initDataTableRosterAdmin();
            initDataTableActivityTable();
        }
    };
}();

// Initialize when page loads
jQuery(function(){ BeTableDatatables.init(); });