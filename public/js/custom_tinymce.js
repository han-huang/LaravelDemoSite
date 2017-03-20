function setImageValue(url){
  $('.mce-btn.mce-open').parent().find('.mce-textbox').val(url);
}

$(document).ready(function(){

  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });

  tinymce.init({
    menubar: false,
    selector:'textarea.richTextBox',
    skin: 'voyager',
    plugins: 'link, image, code, youtube, giphy, table, textcolor',
    extended_valid_elements : 'input[onclick|value|style|type]',
    file_browser_callback: function(field_name, url, type, win) {
            if(type =='image'){
              $('#upload_file').trigger('click');
            }
        },
    toolbar: 'styleselect bold italic underline | alignleft aligncenter alignright | bullist numlist outdent indent | link image table youtube giphy | code | forecolor backcolor | fontsizeselect | fontselect',
    fontsize_formats: '8px 10px 11px 12px 14px 16px 18px 20px 22px 24px 36px',
    font_formats: 'Arial=arial,helvetica,sans-serif;Courier New=courier new,courier,monospace;AkrutiKndPadmini=Akpdmi-n;LiHei Pro=微軟正黑體, Arial, Helvetica, sans-serif, 新細明體;',
    forced_root_block : false,
    convert_urls: false,
    image_caption: true,
    image_title: true
  });

});
