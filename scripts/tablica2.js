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
    //  ajax: '../dane/dane.json',
    ajax: '../connects/get_from_db.php',
     select: true,
lengthMenu: [[-1],["All"]],
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

//Dodawanie pojedynczego studenta
  $('#dodajStudenta').on('submit', function(e) {
//pobranie danych z formularza
    var imie = $.trim($('#imie').val());
    var nazwisko = $.trim($('#nazwisko').val());
    var grupa = $.trim($('#grupa').val());
    var telefon = $.trim($('#tel').val());

//kontrola bledow, tak by sprawdzic czy imie i nazwisko jest tekstem, a numer liczba
    if ((imie === '')||(nazwisko === '')||(grupa === '')||(telefon === '')){
      alert('Wszystkie pola sa wymagane');
      return false;
    }
    if (isNaN(telefon)){
      alert('Telefon musi być numerem');
      return false;
    }
    if (!isNaN(imie)){
      alert('Imię musi skłądac się z liter');
      return false;
    }

    if (!isNaN(nazwisko)){
      alert('Nazwisko musi skłądac się z liter');
      return false;
    }
    e.preventDefault();
    $('#dodajStudenta').ajaxForm({
      url: '../connects/insert_to_db.php',
      type: 'post'
    });
    $('#dodajStudenta').ajaxSubmit(function() {
      var getPath = '../connects/get_from_db.php?wykladowca_id=' + wykladowca_id;
      console.log(getPath);
      $.get(getPath, function(data) {
        console.log(data);
        table.ajax.reload();
      });
    });
      //  table.ajax.reload();
  $('#dodajStudenta').resetForm();
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
    e.preventDefault();
     var form = this;
     var phoneNumberArray = [];

     // Iterate over all selected checkboxes
     // $('input[type="checkbox"]:checked').parent().parent().children('td:nth-child(5)').html()
     $('#example input[type="checkbox"]:checked').each(function() {
       var number = $(this).parent().parent().children('td:nth-child(5)').html();
       number ? phoneNumberArray.push(number) : 0;
     });

     var finalNumber = "";
     for(var i = 0; i < phoneNumberArray.length; i++) {
       finalNumber += phoneNumberArray[i] + ",";
     }
     if(finalNumber.substring(finalNumber.length-1) == ",") { //jesli na ostatnim miejscu jest przercinek
       finalNumber = finalNumber.substring(0, finalNumber.length-1);//usuñ ostatnie miejsce, ostatni char
     }
     //console.log(finalNumber);
     $('#numer').val(finalNumber);
     zamknij_adresy();
  });


  // DELETE
  $('#trash').on('click', function(e){
      e.preventDefault();
     var DeletePhoneNumberArray = [];

     // Iterate over all selected checkboxes
     // $('input[type="checkbox"]:checked').parent().parent().children('td:nth-child(5)').html()
     $('#example input[type="checkbox"]:checked').each(function() {
       var number = $(this).parent().parent().children('td:nth-child(5)').html();
       number ? DeletePhoneNumberArray.push(number) : 0;
       table.ajax.reload();
     });
    //  console.log(DeletePhoneNumberArray);
     //var jsonString = JSON.stringify(DeletePhoneNumberArray);
   $.ajax({
        // dataType: "json",
        type: "POST",
        url: "../php/usun.php",
        data: {"DeletePhoneNumberArray" : JSON.stringify(DeletePhoneNumberArray)},
        cache: false

        // success: function(data){
        //     alert(DeletePhoneNumberArray);
        // }
    });

  });


});
//*/
