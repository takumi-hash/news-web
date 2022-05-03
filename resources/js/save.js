$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

$('i.glyphicon-thumbs-up, i.glyphicon-thumbs-down').click(function(){    
    const name2 = '{{$name}}';


    var url = $(this).parents(".card-body").data('id');
    var cObjId = this.id;
    var cObj = $(this);

    $.ajax({
        type:'POST',
    url:'/api/saved',
    data:{
        url:url,
        title: "title",
    },
    success:function(data){
            if(jQuery.isEmptyObject(data.success.attached)){
                //$('#'+cObjId+'-bs3').html(parseInt(c)-1);
                $(cObj).removeClass("btn-success");
                $(cObj).addClass("btn-outline-primary");
            }else{
                //$('#'+cObjId+'-bs3').html(parseInt(c)+1);
                $(cObj).addClass("btn-success");
                $(cObj).removeClass("btn-outline-primary");
            }
        }
        });

    });

    $(document).delegate('*[class="async"]', 'click', function(event) {
    event.preventDefault();
    });                                        
});
