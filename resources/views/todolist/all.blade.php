<div class="row">    
    <ul style="list-style-type: none;" id="todolistId">
    @foreach($getToDoList as $key=>$value)
        <li>
        <div class="col-75">
            <input type="checkbox"  name="vehicle1" value="" class="chk">
            <label for="todoTaskList" id="strikethrough" class="strikethrough">{{$value->todoTask}}</label>
        </div>
        <span style="display:hidden;" catId="{{$value->id}}"></span>
        <div class="col-25">
            <label class="delete-button" id="categoryID" > X</label>
        </div>
        </li>
    @endforeach
    </ul>
</div>


<script type="text/javascript">
    $("#todolistId").children("li").click( function(e) {
        e.preventDefault();
        var dataid = $(this).children("span").attr("catId");
       
        $.ajax({
           type:'GET',
           url:"{{ route('deleteTodoListbyId') }}",
           data:{todoTaskId:dataid},
           success:function(response){
            if(response.success)
                {
                    toastr.error("{!! Session::get('msg-delete-todo-list') !!}");
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
