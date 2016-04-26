///*//Wersja 3
// Updates "Select all" control in a data table
//
function updateDataTableSelectAllCtrl(table) {
   var $table = table.table().container();
   var $chkbox_all = $('tbody input[type="checkbox"]', $table);
   var $chkbox_checked = $('tbody input[type="checkbox"]:checked', $table);
   var chkbox_select_all = $('thead input[type="checkbox"]', $table).get(0);

   // If none of the checkboxes are checked
   if ($chkbox_checked.length === 0) {
      chkbox_select_all.checked = false;
      if ('indeterminate' in chkbox_select_all) {
         chkbox_select_all.indeterminate = false;
      }

   // If all of the checkboxes are checked
   } else if ($chkbox_checked.length === $chkbox_all.length) {
      chkbox_select_all.checked = true;
      if ('indeterminate' in chkbox_select_all) {
         chkbox_select_all.indeterminate = false;
      }

   // If some of the checkboxes are checked
   } else {
      chkbox_select_all.checked = true;
      if ('indeterminate' in chkbox_select_all) {
         chkbox_select_all.indeterminate = true;
      }
   }
}

$(document).ready(function() {
   // Initialize the table
   var table = $('#example').DataTable({
      ajax: '../dane/dane.json',
      select: true,
      columnDefs: [
      	{
         	targets: 0,
         	orderable: false,
         	searchable: false,
          width: '1%',
         	className: 'dt-body-center',
         	render: function(data, type, full, meta) {
            	return '<input type="checkbox">';
	         }
   	   }
      ],
      select: {
         style: 'multi'
      },
      order: [[1, 'asc']]
   });

   // Handle row selection event
   $('#example').on('select.dt deselect.dt', function(e, api, type, items) {
      if (e.type === 'select') {
         $('tr.selected input[type="checkbox"]', api.table().container()).prop('checked', true);
      } else {
         $('tr:not(.selected) input[type="checkbox"]', api.table().container()).prop('checked', false);
      }

      // Update state of "Select all" control
      updateDataTableSelectAllCtrl(table);
   });

   // Handle click on "Select all" control
   $('#example thead').on('click', 'input[type="checkbox"]', function(e) {
      if (this.checked) {
         table.rows({ page: 'current' }).select();
      } else {
         table.rows({ page: 'current' }).deselect();
      }

      e.stopPropagation();
   });

   // Handle click on heading containing "Select all" control
   $('thead', table.table().container()).on('click', 'th:first-child', function(e) {
      $('input[type="checkbox"]', this).trigger('click');
   });

   // Handle table draw event
   $('#example').on('draw.dt', function() {
      // Update state of "Select all" control
      updateDataTableSelectAllCtrl(table);
   });

   // Handle form submission event
   $('#frm-example').on('submit', function(e){
      var form = this;

      // Iterate over all selected checkboxes
           $table.rows({ selected: true }).every(function(index){
              // Get row ID
              var rowId = this.data()[0];

              // Create a hidden element
              $(form).append(
                  $('<input>')
                     .attr('type', 'hidden')
                     .attr('name', 'id[]')
                     .val(rowId)
         );
      });

      // FOR DEMONSTRATION ONLY
      // The code below is not needed in production

      // Output form data to a console
      $('#example-console').text($(form).serialize());
      console.log("Submitek", $(form).serialize());

      // Remove added elements
      $('input[name="placek\[\]"]', form).remove();

      // Prevent actual form submission
      e.preventDefault();
   });
});
//*/







/*
// Wersja 2
//
// Updates "Select all" control in a data table
//
//To jest wersja numer 2 !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
function updateDataTableSelectAllCtrl(table){
   var $table             = table.table().node();
   var $chkbox_all        = $('tbody input[type="checkbox"]', $table);
   var $chkbox_checked    = $('tbody input[type="checkbox"]:checked', $table);
   var chkbox_select_all  = $('thead input[name="select_all"]', $table).get(0);

   // If none of the checkboxes are checked
   if($chkbox_checked.length === 0){
      chkbox_select_all.checked = false;
      if('indeterminate' in chkbox_select_all){
         chkbox_select_all.indeterminate = false;
      }

   // If all of the checkboxes are checked
   } else if ($chkbox_checked.length === $chkbox_all.length){
      chkbox_select_all.checked = true;
      if('indeterminate' in chkbox_select_all){
         chkbox_select_all.indeterminate = false;
      }

   // If some of the checkboxes are checked
   } else {
      chkbox_select_all.checked = true;
      if('indeterminate' in chkbox_select_all){
         chkbox_select_all.indeterminate = true;
      }
   }
}

$(document).ready(function (){
   // Array holding selected row IDs
   var rows_selected = [];
   var table = $('#example').DataTable({
     'ajax': {
        'url': '../dane/dane.json'
     },
      'columnDefs': [{
         'targets': 0,
         'searchable':false,
         'orderable':false,
         'width':'1%',
         'className': 'dt-body-center',
         'render': function (data, type, full, meta){
             return '<input type="checkbox">';
         }
      }],
      'order': [1, 'asc'],
      'rowCallback': function(row, data, dataIndex){
         // Get row ID
         var rowId = data[0];

         // If row ID is in the list of selected row IDs
         if($.inArray(rowId, rows_selected) !== -1){
            $(row).find('input[type="checkbox"]').prop('checked', true);
            $(row).addClass('selected');
         }
      }
   });

   // Handle click on checkbox
   $('#example tbody').on('click', 'input[type="checkbox"]', function(e){
      var $row = $(this).closest('tr');

      // Get row data
      var data = table.row($row).data();

      // Get row ID
      var rowId = data[0];

      // Determine whether row ID is in the list of selected row IDs
      var index = $.inArray(rowId, rows_selected);

      // If checkbox is checked and row ID is not in list of selected row IDs
      if(this.checked && index === -1){
         rows_selected.push(rowId);

      // Otherwise, if checkbox is not checked and row ID is in list of selected row IDs
      } else if (!this.checked && index !== -1){
         rows_selected.splice(index, 1);
      }

      if(this.checked){
         $row.addClass('selected');
      } else {
         $row.removeClass('selected');
      }

      // Update state of "Select all" control
      updateDataTableSelectAllCtrl(table);

      // Prevent click event from propagating to parent
      e.stopPropagation();
   });

   // Handle click on table cells with checkboxes
   $('#example').on('click', 'tbody td, thead th:first-child', function(e){
      $(this).parent().find('input[type="checkbox"]').trigger('click');
   });

   // Handle click on "Select all" control
   $('thead input[name="select_all"]', table.table().container()).on('click', function(e){
      if(this.checked){
         $('#example tbody input[type="checkbox"]:not(:checked)').trigger('click');
      } else {
         $('#example tbody input[type="checkbox"]:checked').trigger('click');
      }

      // Prevent click event from propagating to parent
      e.stopPropagation();
   });

   // Handle table draw event
   table.on('draw', function(){
      // Update state of "Select all" control
      updateDataTableSelectAllCtrl(table);
   });

   // Handle form submission event
   $('#frm-example').on('submit', function(e){
      var form = this;

      // Iterate over all selected checkboxes
      $.each(rows_selected, function(index, rowId){
         // Create a hidden element
         $(form).append(
             $('<input>')
                .attr('type', 'hidden')
                .attr('name', 'id[]')
                .val(rowId)
         );
      });

      // FOR DEMONSTRATION ONLY

      // Output form data to a console
      $('#example-console').text($(form).serialize());
      console.log("Form submission", $(form).serialize());

      // Remove added elements
      $('input[name="id\[\]"]', form).remove();

      // Prevent actual form submission
      e.preventDefault();
   });
});
*/
