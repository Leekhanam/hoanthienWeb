$(document).ready(function(){
        $('#keywords').keyup(function(e){

            e.preventDefault();

            var form = $('#hdTutoForm').serialize();
            $.ajax({

                type: 'POST',

                url: 'admin/data/search.php',

                data: form,

                dataType: 'json',

                success: function(response){

                    if(response.error){
                        $('#spinner').hide();
                        $('#hdTuto_search').hide();
                    }
                    else{
                        setTimeout(function(){
                           $('#spinner').show();
                           $('#hdTuto_search').show().html(response.data);
                        }, 800);
                    }

                }

            });

        });
        $('body').click(function(){
            $('#spinner').hide(10);
        });
});