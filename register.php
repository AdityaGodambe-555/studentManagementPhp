<?php 
    include("config.php");
    include("header.php");
?>
<div class="flex items-center justify-center h-full">
    <form action="<?php $_SERVER["PHP_SELF"] ?>" method="post" class="max-w-md mx-auto bg-white p-8 rounded-lg shadow-md">
        <h3 class="text-xl font-semibold text-center mb-6">Registration Page</h3>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="uname">Username:</label>
            <input type="text" name="uname" placeholder="Enter Username" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring focus:ring-blue-300" required>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="upass">Password:</label>
            <input type="password" name="upass" placeholder="Enter Password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring focus:ring-blue-300" required>
        </div>
        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="uconpass">Confirm Password:</label>
            <input type="password" name="uconpass" placeholder="Enter Password Again" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring focus:ring-blue-300" required>
        </div>
        <div class="flex items-center justify-center">
            <input type="submit" name="send" value="Register" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:ring focus:ring-blue-300">
        </div>
    </form>
</div>
<?php 
    if(isset($_POST["send"])){
        if($_POST["upass"]==$_POST['uconpass'])
        {
            $uname=$_POST['uname'];
            $upass=$_POST['upass'];
            $insertq="INSERT INTO users (uname, upass)
            VALUE('$uname','$upass')";
            $res=mysqli_query($conn, $insertq);
            if($res){
                echo"<script>alert('Resgisterd Successfull')</script>";
                echo"<script>window.location.href='login.php'</script>";
            }
        }
        else{
            echo"Password Donot Match";
        }
    }
?>


<?php 
    include("footer.php")
?>