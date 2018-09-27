<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->  
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->  
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->  
<head>
    <title>{{$setting->website}} | Login Page</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">


    <!-- CSS Global Compulsory -->
    {{HTML::style('front_assets/plugins/bootstrap/css/bootstrap.min.css')}}
    {{HTML::style('front_assets/css/style.css')}}

    <!-- CSS Implementing Plugins -->
    {{HTML::style('front_assets/plugins/line-icons/line-icons.css')}}
    {{HTML::style('front_assets/plugins/font-awesome/css/font-awesome.min.css')}}

    <!-- CSS Page Style -->
    {{HTML::style('front_assets/css/pages/page_log_reg_v2.css')}}

    <!-- CSS Theme -->
    {{HTML::style('front_assets/css/theme-colors/default.css')}}

    <!-- CSS Customization -->
    {{HTML::style('front_assets/css/custom.css')}}
</head> 

<body>
<!--=== Content Part ===-->    
<div class="container">
    <!--Reg Block-->
    {{ Form::open(array('id'=>'login-form')) }}
    <div class="reg-block">
        <div class="reg-block-header">
            <h2>  {{HTML::image("assets/admin/layout/img/logo-big.png",'Logo',array('class'=>'logo-default','height'=>'30px','width'=>'117px'))}}</h2>
            {{--<h2><img src="front_assets/img/logo2-default.png" /></h2>--}}
        </div>
        <div id="alert"></div>
        <div class="input-group margin-bottom-20">
            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
            <input type="email" class="form-control" name="email" placeholder="Email">
        </div>
        <div class="input-group margin-bottom-20">
            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
            <input type="password" class="form-control" name="password" placeholder="Password">
        </div>
        <hr>


        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <button type="submit" class="btn-u btn-block input-group" id="submitbutton" onclick="login();return false;">Log In</button>
            </div>
        </div>
    </div>
    <!--End Reg Block-->
    {{Form::close()}}
</div><!--/container-->
<!--=== End Content Part ===-->
<!-- JS Global Compulsory -->
{{HTML::script('front_assets/plugins/jquery/jquery.min.js')}}
{{HTML::script('front_assets/plugins/jquery/jquery-migrate.min.js')}}
{{HTML::script('front_assets/plugins/bootstrap/js/bootstrap.min.js')}}

<!-- JS Implementing Plugins -->
{{HTML::script('front_assets/plugins/back-to-top.js')}}
{{HTML::script('front_assets/plugins/backstretch/jquery.backstretch.min.js')}}

<script type="text/javascript">
    $.backstretch([
    "{{URL::asset('front_assets/img/bg/5.jpg')}}",
    "{{URL::asset('front_assets/img/bg/4.jpg')}}"

    ], {
        fade: 1000,
        duration: 7000
    });
</script>

<!--[if lt IE 9]>
{{HTML::script('front_assets/plugins/respond.js')}}
{{HTML::script('front_assets/plugins/html5shiv.js')}}
{{HTML::script('front_assets/js/plugins/placeholder-IE-fixes.js')}}


<![endif]-->
<!-- JS Customization -->

<script>
    function login(){

        $('#alert').html('<div class="alert alert-info"><span class="fa fa-info"></span> {{Lang::get('messages.submitting')}}</div>');
        $("#submitbutton").prop('disabled', true);

        $.ajax({
            type: "POST",
            url: " {{ URL::to('/login') }} ",
            dataType: 'json',
            data: $('#login-form').serialize()

        }).done( function( response ) {

            $('#alert').html('');
            if(response.status == "success")
            {
                $('#alert').html('<div class="alert alert-success alert-dismissable"><span class="fa fa-check"></span> '+response.msg+'</div>');
                $('.input-group').remove();
                $('#submitbutton').remove();
                window.location.href= "{{route('dashboard.index')}}";
            }
            else if(response.status == "error")
            {

                var arr = response.msg;
                var alert1 ='';

                $("#submitbutton").prop('disabled', false);

                $.each(arr, function(index, value)
                {
                    if (value.length != 0)
                    {
                        alert1 += '<p>&#10006;  '+ value+ '</p>';

                    }
                });

                $('#alert').html('<div class="alert alert-danger alert-dismissable"> '+alert1+'</div>');

            }

        });
    }

</script>
</body>
</html> 