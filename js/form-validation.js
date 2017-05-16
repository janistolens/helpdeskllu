$(function() {
  // Inicializē formas validāciju priekš jaunas biļetes iesniegšanas formas.
  // Formai ir nosaukuma atribūts "new_ticket"
  $("form[name='new_ticket']").validate({
    // Precizē validācijas likumus
    rules: {
      //formas lauka nosaukumu atribūti nodefinēti kreisajā pusē
      //formas lauka validācijas likumi nodefinēti labjā pusē
      description: {
          required: true,
          minlength: 10,
          maxlength: 2000
      },
      room: {
          required: true,
          number: true,
          maxlength: 3
      },
      inv_type: "required",
      inventory: "required"
    },
    // Validācijas kļūdu paziņojumi
    messages: {
      description: {
          required: "Ievadiet problēmas aprakstu",
          minlength: "Problēmas aprakstam jāsatur vismaz 10 rakstzīmju",
          maxlength: "Problēmas aprakstam jāsatur ne vairāk kā 2000 rakstszīmju"
      },
      room: {
          required: "Norādiet kabinetu",
          number: "Kabinets jānorāda ciparu formātā",
          maxlength: "Kabinets jānorāda līdz 3 cipariem"
      },
      inv_type: "Izvēlieties ierīces veidu",
      inventory: "Izvēlieties ierīci"
    },
    // Nosūta formu, ja validācija noritējusi sekmīgi
    submitHandler: function(form) {
      form.submit();
    }
  });
});