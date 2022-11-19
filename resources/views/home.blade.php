<!DOCTYPE html>
<html>
<head>
<title>TodList</title>
<link rel="stylesheet" href="{{asset('/css/main.css')}}">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300&display=swap" rel="stylesheet">
<meta name="csrf-token" content="{{ csrf_token() }}" />
</head>
<body>
<div class="container">
    <div class="row">
            <div class="col-25">
                <h3>TO DO LIST</h3>
            </div>
    </div>
    <div class="row">
        <div class="col-100">
        <p>Show Category : @foreach($categories as $key=>$value)
            <span id="top-category">{{$value->categoryName}} | </span> 
            @endforeach
            <span id="top-category" id="all-todo-list">All |</span>
        </p>
        </div>
    </div>
    <div class="row">
            <div class="col-75">
                <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                <label for="vehicle1"> I have a bike I have a </label>
            </div>
            <div class="col-25">
                <label class="delete-button"> X</label>
            </div>

            <div class="col-75">
                <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                <label for="vehicle1"> I have a bike I have a ave a bikeI have a</label>
            </div>
            <div class="col-25">
                <label class="delete-button"> X</label>
            </div>
        
    </div>
    <hr>
    
    <div class="row">
        <div class="col-25">
        <label for="subject">ADD TO LIST</label>
        </div>
        <div class="col-100">
        <input type="text" id="todoTask" name="" placeholder="Add a task..."></input>
        </div>
    </div>

    <div class="row">
        <div class="col-25">
            <label for="country">Category</label>
        </div>
        <div class="col-100">
            <div class="col-75">
                <select id="category" name="category">
                    <option value="n/a">Choose a Category</option>
                    @foreach($categories as $key=>$value)
                    <option value="{{$value->id}}">{{$value->categoryName}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-25">
                <input type="submit" id="addTodo" value="ADD TODO" >
            </div>
        </div>
    </div>
  <br>
  <hr class="hr-class">
    <div class="row">
        <div class="col-25">
            <h3>CATEGORIES</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-100">
            <div class="col-75">
                <input type="text" id="categoryName" name="" placeholder="Add Category..."></input>
            </div>
            <div class="col-25">
                <input type="submit" class="categoryAdd" value="ADD CATEGORY" >
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <ul class="no-bullets" id="userMenu">
            @foreach($categories as $key=>$value)
            <li><span class="category-delete" dataid="{{$value->id}}">X</span>{{$value->categoryName}} <input class="hiddenInput" type="hidden" value="{{$value->id}}"></li>
            @endforeach
        </ul>
    </div>
</div>

</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script type="text/javascript">
     $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(".categoryAdd").click(function(e){
    e.preventDefault();
    var categoryName = $("#categoryName").val();
    $.ajax({
            "_token": "{{ csrf_token() }}",
           type:'POST',
           url:"{{ route('addCategory') }}",
           data:{categoryName:categoryName},
           success:function(response){
                if(response.success)
                {
                    location.reload();
                    // toastr.success("{!! Session::get('msg') !!}");
                }
                else
                {
                    toastr.error("Failed to save category data")   
                }
            },
        });

    });

    $("#userMenu").children('li').click( function(e) {
        e.preventDefault();
        var dataid = $(this).children('span').attr('dataid');
        //alert(dataid);
        $.ajax({
            "_token": "{{ csrf_token() }}",
           type:'POST',
           url:"{{ route('deleteCategory') }}",
           data:{categoryId:dataid},
           success:function(response){
                if(response.success)
                {
                    location.reload();
                    // toastr.success("{!! Session::get('msg') !!}");
                }
                else
                {
                    toastr.error("Failed to delete the category")   
                }
            },
        });
    });

    $("#addTodo").click(function(e){
    e.preventDefault();
    var todoTask = $("#todoTask").val();
    var category = $('#category').find(":selected").val();
    $.ajax({
            "_token": "{{ csrf_token() }}",
           type:'POST',
           url:"{{ route('addTodoTask') }}",
           data:{todoTask:todoTask,category:category},
           success:function(response){
                if(response.success)
                {
                    toastr.success("{!! Session::get('msg') !!}");
                    setTimeout(function() {myFunc()}, 5000);
                    function myFunc() {
                        location.reload();
                    }
                    
                }
                else
                {
                    toastr.error("Failed to save category data")   
                }
            },
        });

    });



</script>
</html>
