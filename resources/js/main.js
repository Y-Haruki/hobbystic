// $(function() {
//   $('#add-category-link').click(function() {
//     $('#add-category-modal').modal('show');
//     return false;
//   });

//   $('#add-category-form').submit(function(e) {
//     e.preventDefault();

//     $.ajax({
//       type: 'POST',
//       url: '{{ route('categories.store') }}',
//       data: $('#add-category-form').serialize(),
//       success: function(response) {
//         $('#add-category-modal').modal('hide');

//         // 新しい要素を選択肢に追加する
//         var newOption = $('<option></option>').val(response.category.id).html(response.category.name);
//         $('select[name="category_id[]"]').append(newOption);
//       },
//       error: function(response) {
//         // エラー処理
//         console.log(response);
//       }
//     });
//   });
// });
