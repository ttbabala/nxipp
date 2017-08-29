$(function() {  
    $("#file_upload").uploadify({  
        'swf'             : SCOPE.uploadify_swf,  
        'uploader'        : SCOPE.image_upload,  
        'buttonText'      : '图片上传',  
        'fileTypeDesc'    : 'Image Files',  
        'fileTypeExts'    : '*.gif; *.jpg; *.png',     
        'fileObjName'     : 'file',  
        'onUploadSuccess' : function(file, data, response) {  
                    
        }  
});  