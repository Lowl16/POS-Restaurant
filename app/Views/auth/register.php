<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<div class="flex items-center justify-center min-h-screen bg-gray-100">
      	<div class="relative flex flex-col m-6 space-y-8 bg-white shadow-2xl rounded-2xl md:flex-row md:space-y-0">

            <!-- left side -->
			<div class="relative">
				<img src="img/chef.png" alt="img" class="w-[400px] h-full hidden rounded-r-2xl md:block object-cover transform -scale-x-100"/>
			</div>

			<!-- right side -->
			<div class="flex flex-col justify-center p-8 md:p-14">
				<span class="mb-3 text-4xl font-bold">Registration</span>
				<span class="font-light text-black mb-4">
					Please enter your information
				</span>
                <?php if (!empty(session()->getFlashdata('error'))) : ?>
                    <div role="alert" class="mb-4 mt-4">
                        <div class="bg-red-500 text-white font-bold border-red-400 rounded-t-md px-4 py-2">
                            Registration failed
                        </div>
                        <div class="border border-t-0 border-red-400 rounded-b-md bg-red-100 px-4 py-3 text-red-700">
                            <?php echo session()->getFlashdata('error'); ?>
                        </div>
                    </div>
                <?php endif; ?>
				<form action="<?= base_url(); ?>/register/process" method="POST" id="create-form">
                    <?= csrf_field(); ?>
                    <div class="py-4">
						<span class="mb-2 text-md mr-24">Username</span>
						<input type="text" class="w-full p-2 border border-gray-300 rounded-md placeholder:font-light placeholder:text-gray-500" name="username" id="username" required>
					</div>
					<div class="py-4">
						<span class="mb-2 text-md mr-24">Email</span>
						<input type="email" class="w-full p-2 border border-gray-300 rounded-md placeholder:font-light placeholder:text-gray-500" name="email" id="email" required>
					</div>
					<div class="py-4">
						<span class="mb-2 text-md">Password</span>
						<input type="password" name="password" id="password" class="w-full p-2 border border-gray-300 rounded-md placeholder:font-light placeholder:text-gray-500" required>
					</div>
					
					<button type="submit" class="w-full bg-blue-500 text-white p-2 mt-3 rounded-lg mb-6 border hover:bg-secondary hover:text-primary hover:border-gray-300">Sign up</button>
				</form>
				
				<div class="text-center">
					Already have an account? <a href="<?php echo base_url('login'); ?>" class="text-blue-500 underline">Sign in</a>
				</div>
			</div>
			
		</div>
	</div>
</body>
</html>