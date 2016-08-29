$(function () {
    $('.loginBtn').click(function(){
        var date = $('form').serializeArray();
        var fArry = {};
        var url = '/blog/admin.php/login/index'
        $.each(date,function (i) {
            fArry[this.name] = this.value;
        })
        $.post(url,fArry,function (result) {
            if(result.type === 0){
                return open.error(result.message)
            }else if(result.type === 1){
                open.success(result.message,result.date)
            }
        },'JSON');
        return false;
    })

    $('.bai_ad').click(function () {
        var content = $('.content form').serializeArray();
        var date = {};
        var url = SCRIPT.save_url;
        $.each(content,function(i){
            if(!this.value)return open.error('请全部填起再提交 谢谢')
            date[this.name] = this.value;
        });
        $.post(url,date,function(result){
            if(result.type == 0){
                return open.error(result.message);
            }else{
                return open.success(result.message,result['date']['jump_url']);
            }
        },'JSON')
    })
    $('.del').click(function () {
        var date = {
            'id' : $(this).attr('data-id')
        };
        var url = SCRIPT.delete_url;
        $.post(url,date,function(result){
            if(result.type==1){
                open.success(result.message,result['date']['jump_url']);
            }
            if(typeof result==0){
                open.error(result.message);
            }
        },'JSON')
    });
    $('.changeStatus').click(function () {
        var date = {
            'id' : $(this).attr('data-cId'),
            'status' : $(this).attr('data-status'),
        }
        url = SCRIPT.status_url;
        $.post(url,date,function(result){
            if(result.type==1){
                return open.success(result.message,result['date']['jump_url']);
            }
            if(result.type==0){
                open.error(result.message);
            }
        },'JSON')
    })
})