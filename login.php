<?php

require_once "./connection.php";
if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];


$sql = "SELECT * FROM  users where email = ? AND password = ?";
$statement = $pdo->prepare($sql);
$statement->execute([
    $email,
     $password
]);
$result = $statement->fetch();

if(!empty($result)){
   echo "Login sucessful";
}
else{
    echo "login failed";
}

}
?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
      <script src="https://cdn.tailwindcss.com"></script>

</head>
<body class="bg-gray-200 flex justify-center ">
    
<!-- <h1 class="text-4xl text-purple-500 bg-amber-500 w-full lowercase font=bold mr-4 py-4 " >hello world </h1>
<div class="flex gap-2 justify-center items-center h-screen" >
    <div class="p-8 bg-orange-500 rounded-full shadow-2xl text-center" >Box 1</div>
    <div class="p-8 bg-orange-800" >Box 2</div>
</div> -->
<div class="container w-1/2 mt-12">
    <p class="text-center uppercase text-red-500 font-bold text-sm">New Here</p>
    <h1 class="text-center text-3xl font-bold my-2">Login Now</h1>

    <form method= "post" class="form-container bg-white p-8 mt-4 shadow-md">
        <?php if(!empty($errors)){ ?>
       <div class="errors bg-red-200 text-red-700 p-4 my-4">
        <?php foreach($errors as $key => $value){     ?>
            <li><?php echo $value; ?> </li>
            <?php } ?>
        </div>
        <?php } ?>
    
            
            <div class="row flex mt-2">
            <div class="col w-full">
                <label >Email Address</label>
                <input type="text" class="block border-2 border-gray-300 w-full px-4 py-1 mt-2" name="email">   
        </div>

        
        </div>

        <div class="row flex mt-2">
            <div class="col w-full">
                <label >Password</label>
                <input type="password" class="block border-2 border-gray-300 w-full px-4 py-1 mt-2" name="password">   
        </div>

        
        </div>

        <div class="text-center mt-4">
                <button class="bg-red-500 px-12 py-2 text-white mt-2 uppercase hover:bg-red-700" name="login">Login</button>
            </div>
        </div>
    </form>
   

</body>
</html>