<div class="row">    
    <ul style="list-style-type: none;">
    @foreach($getToDoList as $key=>$value)
        <li>
        <div class="col-75">
            <input type="checkbox"  name="vehicle1" value="" class="chk">
            <label for="todoTaskList" id="strikethrough" class="strikethrough">{{$value->todoTask}}</label>
        </div>
        <div class="col-25">
            <label class="delete-button"> X</label>
        </div>
        </li>
    @endforeach
    </ul>
</div>

<!-- <script type="text/javascript">
    $(document).ready(function() {
    $('.chk').on('change', function() {
        
    });
    
  });
</script> -->
