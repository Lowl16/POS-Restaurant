<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="/css/app.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
                <a class="flex items-center text-xl mb-7" style="color: #0d6efd;" href="<?= base_url() ?>">
                    <i class="fa-solid fa-angle-left mr-2"></i> Back to Home
                </a>
				<span class="mb-3 text-4xl font-bold">Login</span>
				<span class="font-light text-black mb-4">
					Please enter your information
				</span>
				<form action="<?= base_url(); ?>/login/process" method="POST" id="create-form">
					<div class="py-4">
						<label class="mb-2 text-md mr-24" for="email">Email</span>
						<input type="text" class="w-full p-2 border border-gray-300 rounded-md placeholder:font-light placeholder:text-gray-500" name="email" id="email" required/>
						<?php if (!empty(session()->getFlashdata('erroremail'))) : ?>
							<span class="text-red-500"><i class="fa-solid fa-circle-exclamation"></i>
								<?php echo session()->getFlashdata('erroremail'); ?>
							</span>
                    	<?php endif; ?>
					</div>
					<div class="py-4">
						<label class="mb-2 text-md" for="password">Password</label>
						<input type="password" name="password" id="password" required class="w-full p-2 border border-gray-300 rounded-md placeholder:font-light placeholder:text-gray-500"/>
						<?php if (!empty(session()->getFlashdata('errorpassword'))) : ?>
							<p class="text-red-500"><i class="fa-solid fa-circle-exclamation"></i>
								<?php echo session()->getFlashdata('errorpassword'); ?>
							</>
                    	<?php endif; ?>
					</div>
					<div class="check flex justify-between mt-3 mb-3">
						<div class="checkbox-input">
							<input type="checkbox" name="remember" id="check" />
							<label for="check">Remember me</label>
						</div>
					</div>
					<button class="w-full bg-blue-500 text-white p-2 mt-3 rounded-lg mb-6 border hover:bg-secondary hover:text-primary hover:border-gray-300">Sign in</button>
				</form>
				
				<div class="text-center">
					Don't have an account? <a href="<?php echo base_url('register'); ?>" class="text-blue-500 underline">Sign up for free</a>
				</div>
			</div>
		</div>
	</div>
</body>
</html>