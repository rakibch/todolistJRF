<!DOCTYPE html>
<html>
<head>
<title>TodList</title>
<link rel="stylesheet" href="{{asset('/css/main.css')}}">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300&display=swap" rel="stylesheet">
</head>
<body>
<div class="container">
  <form action="/action_page.php">
    <div class="row">
            <div class="col-25">
                <h2>TO DO LIST</h2>
            </div>
    </div>
    <div class="row">
            <div class="col-25">
            <label for="lname">Last Name</label>
            </div>
            <div class="col-75">
            <input type="text" id="lname" name="lastname" placeholder="Your last name..">
            </div>
    </div>
    <div class="row">
            <div class="col-25">
                <label for="country">Country</label>
            </div>
            <div class="col-75">
                <select id="country" name="country">
                    <option value="australia">Australia</option>
                    <option value="canada">Canada</option>
                    <option value="usa">USA</option>
                </select>
            </div>
    </div>
    <div class="row">
        <div class="col-25">
        <label for="subject">Subject</label>
        </div>
        <div class="col-75">
        <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px"></textarea>
        </div>
    </div>
  <br>
    <div class="row">
        <input type="submit" value="Submit">
    </div>
  </form>
</div>

</body>
</html>
