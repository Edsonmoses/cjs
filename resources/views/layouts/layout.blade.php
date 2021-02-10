<!DOCTYPE html>
<html>
<head>
    <title>CJ's - Dashboard</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
</head>
<body>

<div class="container">
    @yield('content')
</div>

</body>
<!-- Bootstrap core JS-->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
<script>
    function previewFile(input){
        var file=$("input[type=file]").get(0).files[0];
        if(file)
        {
            var reader = new FileReader();
            reader.onload = function(){
                $('#previewImg').attr("src",reader.result);
            }
            reader.readAsDataURL(file);
        }
    }

</script>
<style>
    /**.pagination***/
.border{
    border: 1px solid #dee2e6 !important;
}
nav svg{
    height: 20px;
}
svg{
    overflow: hidden;
    vertical-align: middle;
}
.wrap-pagination-info{
    margin-top: 46px;
    border-top: 1px solid #e6e6e6;
    padding-top: 10px;
}
.wrap-pagination-info .hidden{
    display: none !important;

}
.wrap-pagination-info .rounded-l-md{
    margin-right: 5px;

}
.wrap-pagination-info .rounded-r-md{
    margin-left: 5px;

}
</style>
</html>
