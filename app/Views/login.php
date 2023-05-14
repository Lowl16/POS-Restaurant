<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <section>
		<div class="">
			<div class="flex justify-center">
				<div class="kiri md:w-1/2 w-full bg-white md:mb-0 pb-20">
					<a href="index.php" class="flex justify-end pt-10 pr-10 font-semibold text-primary">Back To Page</a>

					<!--login-->
					<div id="boxLogin" style="display:flex;" class="justify-center md:mt-20 mt-10">
						<div>
							<div class="mb-5">
								<h1 class="font-semibold text-3xl">Selamat Datang</h1>
								<h3 class="font-semibold text-xl pb-2">VEGAN FRESH SHOP</h3>
								<p>Belum punya akun? <button id="goDaftar" class="bg-lime-400 text-black rounded-full px-2 font-semibold">Daftar yuk!</button></p>
							</div>
							<?php
							if (isset($error)) : ?>
								<p class="text-red-700 font-semibold">Username / password salah</p>
							<?php endif; ?>
							<div class="regis-form">
								<form action="" method="post">
									<div class="flex pb-10">
										<div class="email pr-5">
											<label for="user-email" class="font-semibold text-lg border-b-[2px] border-blue-600 text-primary">Username</label><br>
											<input name="usernameLogin" id="user-name" type="text" placeholder="Enter your username" required="required" class="border-b-[1px] border-black p-2 outline-none w-80" />
										</div>
									</div>
									<div class="flex">
										<div class="pass-regis pr-5 mb-3">
											<label for="user-passregis" class="font-semibold text-lg border-b-[2px] border-blue-600 text-primary">Password</label><br>
											<input type="password" name="passwordLogin" id="user-passregis" placeholder="Enter your Password" required="required" class="border-b-[1px] border-black p-2 outline-none w-80" />
										</div>
									</div>
									<div class="check flex justify-between">
										<div class="checkbox-input">
											<input type="checkbox" name="remember" id="check" />
											<label for="check">Remember me</label>
										</div>
										<a href="">forgot password?</a>
									</div>
									<div class="text-center">
										<button type="submit" name="login" class="regis bg-blue-500 py-1 px-36 rounded-full mt-10 mb-5 text-white hover:bg-secondary hover:text-primary font-semibold">Sign in</button>
									</div>
								</form>
								<div class="text-center">
									<span class="mb-5 font-semibold">Sign Up With</span>
									<div class="flex justify-center mt-5">
										<span><a href=""><img src="img/facebook.png" class="w-10" /></a></span>
										<span><a href=""><img src="img/google.png" class="w-10" /></a></span>
									</div>
								</div>
							</div>
						</div>
					</div>

					<!-- register-->
					<div id="boxRegist" style="display:none;" class="justify-center md:mt-44 mt-10">
						<div>
							<div class="mb-10">
								<h1 class="font-semibold text-3xl">Daftar Akun</h1>
								<h3 class="font-semibold text-xl pb-2">VEGAN FRESH SHOP</h3>
								<p>Sudah punya akun? <button id="goLogin" class="bg-primary text-white rounded-full px-2">Masuk yuk!</button></p>
							</div>
							<div class="regis-form">
								<form action="" method="post">
									<div class="md:flex md:pb-10">
										<div class="full-name pr-5">
											<label for="user-fullname" class="font-semibold text-lg border-b-[2px] border-primary">Nama Lengkap</label><br>
											<input type="text" name="namaLengkap" id="user-fullname" placeholder="Enter your full name" required="required" class="border-b-[1px] border-black p-2 outline-none w-80 md:w-60" />
										</div>
										<div class="email pr-5">
											<label for="user-email" class="font-semibold text-lg border-b-[2px] border-primary">Email</label><br>
											<input type="email" name="email" id="user-email" placeholder="Enter your email" required="required" class="border-b-[1px] border-black p-2 outline-none w-80 md:w-60 " />
										</div>
									</div>
									<div class="md:flex">
										<div class="username pr-5">
											<label for="user-regis" class="font-semibold text-lg border-b-[2px] border-primary">Username</label><br>
											<input type="text" name="username" id="user-regis" placeholder="Enter your username" required="required" class="border-b-[1px] border-black p-2 outline-none w-80 md:w-60 " />
										</div>
										<div class="pass-regis pr-5">
											<label for="user-passregis" class="font-semibold text-lg border-b-[2px] border-primary">Password</label><br>
											<input type="password" name="password" id="user-passregis" placeholder="Enter your Password" required="required" class="border-b-[1px] border-black p-2 outline-none w-80 md:w-60 " />
										</div>
									</div>
									<div class="text-center">
										<button type="submit" name="register" class="regis bg-primary py-2 px-4 rounded-full mt-10 mb-5 text-white hover:bg-secondary hover:text-primary">Register</button>
									</div>
								</form>
								<div class="text-center">
									<span class="mb-5">Sign Up With</span>
									<div class="flex justify-center mt-5">
										<span><a href=""><img src="img/facebook.png" class="w-10" /></a></span>
										<span><a href=""><img src="img/google.png" class="w-10" /></a></span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div id="iconRegLog" class="kanan w-1/2 bg-secondary md:block hidden">
					<img src="img/chef.png" class="p-36">
				</div>
			</div>
		</div>
	</section>
    
</body>
</html>