<?php 
    include('config.php');
    include("header.php");
    
    $rid=$_GET['id'];

    $sql="SELECT * FROM students WHERE id='$rid'";
    $res=mysqli_query($conn,$sql);
    $data=mysqli_fetch_assoc($res);
    // print_r($data);
?>

<div class="flex items-center justify-center h-screen bg-gray-100">
    <form action="<?php $_SERVER["PHP_SELF"] ?>" method="post" class="max-w-md mx-auto bg-white p-8 rounded-lg shadow-md">
        <h3 class="text-xl font-semibold text-center mb-6">Edit Student Details</h3>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="sname">Student Name:</label>
            <input type="text" name="sname" placeholder="Enter Name" value="<?php echo $data['sname'] ?>" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring focus:ring-blue-300" required>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="sclass">Class and Division:</label>
            <input type="text" name="sclass" placeholder="eg. '10/A'" value="<?php echo $data['sclass'] ?>" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring focus:ring-blue-300" required>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="rollno">Roll No.:</label>
            <input type="number" name="rollno" value="<?php echo $data['rollno'] ?>" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring focus:ring-blue-300" required>
        </div>
        <div class="flex items-center justify-center">
            <input type="submit" name="edit" value="Edit Student Details" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:ring focus:ring-blue-300 cursor-pointer">
        </div>
    </form>
</div>

<?php 
    if(isset($_POST['edit'])){
        $upsname=$_POST['sname'];
        $upsclass=$_POST['sclass'];
        $uprollno=$_POST['rollno'];

        $sql="UPDATE students SET sname='$upsname',sclass='$upsclass',rollno='$uprollno' 
                                WHERE id='$rid'";
        $res=mysqli_query($conn,$sql);
        if($res){
            header('Location: index.php ');
        }
        else{
            echo"<script>alert('Fail to Edit')</script>";
            

        }
    }
?>
<?php 
    include("footer.php")
?> 