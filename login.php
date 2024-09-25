<?php 
    session_start();
?>
<?php 
    include('config.php');
    include("header.php");
?>
<div class="flex items-center justify-center h-screen bg-gray-100">
    <form action="<?php $_SERVER["PHP_SELF"] ?>" method="post" class="max-w-md mx-auto bg-white p-8 rounded-lg shadow-md">
        <h3 class="text-xl font-semibold text-center mb-6">Login Page</h3>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="uname">Username:</label>
            <input type="text" name="uname" placeholder="Enter Username" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring focus:ring-blue-300" required>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="upass">Password:</label>
            <input type="password" name="upass" placeholder="Enter Password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring focus:ring-blue-300" required>
        </div>
        <div class="flex items-center justify-center">
            <input type="submit" name="send" value="Login" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:ring focus:ring-blue-300">
        </div>
    </form>
</div>

<?php 
    include("footer.php")
?>

<?php 
    if(isset($_POST["send"])){
        $uname=$_POST['uname'];
        $upass=$_POST['upass'];

        $sql="SELECT * FROM users where uname='$uname' and upass='$upass'";

        $res=mysqli_query($conn,$sql);
        // print_r($res);

        $data=mysqli_fetch_assoc($res);
        

        $n=mysqli_num_rows($res);

        if($n){
            $_SESSION['uid']=$data['id'];
            $_SESSION['uname']=$data['uname'];
            header('Location: index.php ');
        }
        else{
            echo"<script>alert('Invaild Username or Password')</script>";
            echo"<script>window.location.herf='login.php'</script>";
        }
    }

?> 