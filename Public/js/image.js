$(function () {
    $('#file_upload').uploadify({
        'swf':SCRIPT.ajax_upload_swf,
        'uploader' :SCRIPT.ajax_upload_url,
        'buttonText' : '上传图片',
        'fileTypeDesc' : 'Image Files',
        'fileObjName' : 'file',
        'onUploadSuccess':function(file,data,response){
            if(response){
                var obj = JSON.parse(data);
                $('#' + file.id).find('.data').html(' 上传完毕');
                $("#upload_img").attr("src",obj.date);
                $("#thumb").attr('value',obj.date);
                $("#upload_img").show();
            }else{
                alert('上传失败');
            }
        }
    })
})