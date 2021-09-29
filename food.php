<!DOCTYPE html>
<html>
    <title>
        Upload image
    </title>
    <body>
        <form action="PHP/upload.php" method="POST" enctype="multipart/form-data">
            <label>Food name:</label><br>
            <input type="text" name="fooditem" required="true" placeholder="Food Name"><br><br>
            <label> Image:</label> <br>
            <input style="color: brown;" type="file"  name="foodimage" id="foodimage" required="true"><br><br>
            <label> Price: </label><br>
            <input type="number" name="price" placeholder=" KES" required="true"><br><br>
            <label>Description </label><br>
            <input type="text" name="description" placeholder="your description" required="false" ><br><br>
            <label>Category: </label><br>
            <input type="text" name="category"placeholder="category" required="true"><br><br>
            <input style="background-color:#0a350d;" type ="submit" name="submitImage" value="Save">
        </form>
        <style>
            body{
                padding: 20px 40px 20px 100px;
                background-image: url('IMG/src.png') ;
                font-family: monospace;
                font-size: 16px;
            }
            form{
                width: 700px;
                height: 500px;
                padding-left: 100px;
                border-radius: 15px;
                filter:drop-shadow(50);
            }
            label{
                padding-left: 30px;
                padding-bottom:10px;
                color:#efc687;
                font-weight: bold;
                font-family:Arial;
                font-size: 16px;
            }
            input{
                border: none;
                height: 50px;
                width: 400px;
                border-radius: 20px;
                justify-content: center;
                align-items: center;
                font-family: monospace;
                font-size: inherit;

            }
        </style>
    </body>
</html>