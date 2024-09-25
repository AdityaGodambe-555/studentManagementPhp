<?php 
    session_start();
    include('config.php');
    include("header.php");
    
    
    $uid=$_SESSION['uid'];
    
    
    $sql="select * from students where uid='$uid'";
    $res=mysqli_query($conn,$sql);
    // $data=mysqli_fetch_assoc($res);
    // print_r($data);
    ?>
    <?php
        if(isset($_SESSION['uid'])){
    
    ?>

<div class="container mx-auto p-6 bg-gray-100">
    <h3 class="text-2xl font-semibold text-center mb-6">
        <a href="addstudent.php" class="text-blue-600 hover:text-blue-800">Add Student Data</a>
    </h3>
    <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-md">
        <thead>
            <tr class="bg-blue-500 text-white">
                <th class="py-3 px-4 text-left">Name</th>
                <th class="py-3 px-4 text-left">Class/Division</th>
                <th class="py-3 px-4 text-left">Roll No.</th>
                <th class="py-3 px-4 text-left">Edit</th>
                <th class="py-3 px-4 text-left">Delete</th>
            </tr>
        </thead>
        <tbody>
        <?php 
if (mysqli_num_rows($res) > 0) {
    while ($data = mysqli_fetch_assoc($res)) {
?>
        <tr class="border-b hover:bg-gray-100">
            <td class="py-3 px-4"><?php echo $data['sname']?></td>
            <td class="py-3 px-4"><?php echo $data['sclass']?></td>
            <td class="py-3 px-4"><?php echo $data['rollno']?></td>
            <td class="py-3 px-4">
                <a href="edit.php?id=<?php echo $data['id'] ?>" class="text-blue-500 hover:text-blue-700">
                    <button class="bg-blue-500 text-white py-1 px-3 rounded hover:bg-blue-600">Edit</button>
                </a>
            </td>
            <td class="py-3 px-4">
                <a href="delete.php?id=<?php echo $data['id'] ?>" class="text-red-500 hover:text-red-700">
                    <button class="bg-red-500 text-white py-1 px-3 rounded hover:bg-red-600">Delete</button>
                </a>
            </td>
        </tr>
<?php
    }
} else {
?>
    <tr>
        <td colspan="5" class="py-3 px-4 text-center text-gray-500">
            No student data
        </td>
    </tr>
<?php
}
?>
        </tbody>
    </table>
</div>

    <?php
        }
        else{
            header('Location: login.php');
        }
    ?>
        
<?php 
    include("footer.php")
?>                           
