<link rel="stylesheet" href="/css/app.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<div class="navbar bg-base-100 sticky top-0 z-50">
    <div class="navbar-start">
        <div class="dropdown">
        <label tabindex="0" class="btn btn-ghost lg:hidden">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" /></svg>
        </label>
        <ul tabindex="0" class="menu menu-compact dropdown-content mt-3 p-2 shadow bg-base-100 rounded-box w-52">
            <li><a>Item 1</a></li>
            <li tabindex="0">
            <a class="justify-between">
                Parent
                <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M8.59,16.58L13.17,12L8.59,7.41L10,6L16,12L10,18L8.59,16.58Z"/></svg>
            </a>
            <ul class="p-2">
                <li><a>Submenu 1</a></li>
                <li><a>Submenu 2</a></li>
            </ul>
            </li>
            <li><a>Item 3</a></li>
        </ul>
        </div>
        <a class="btn btn-ghost normal-case text-xl">daisyUI</a>
    </div>
    <div class="navbar-center hidden lg:flex">
        <ul class="menu menu-horizontal px-1">
        <li><a>Item 1</a></li>
        <li tabindex="0">
            <a>
            Parent
            <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path d="M7.41,8.58L12,13.17L16.59,8.58L18,10L12,16L6,10L7.41,8.58Z"/></svg>
            </a>
            <ul class="p-2">
            <li><a>Submenu 1</a></li>
            <li><a>Submenu 2</a></li>
            </ul>
        </li>
        <li><a>Item 3</a></li>
        </ul>
    </div>
    <div class="navbar-end">
        <?php if($session->has('logged_in') == TRUE){ ?>
            <h5 class="pe-3 text-light">Welcome, <?= $_SESSION['username']?></h5>
            <div class="dropdown dropdown-end">
                <label tabindex="0" class="btn btn-ghost btn-circle avatar">
                    <div class="w-10 rounded-full">
                    <img src="img/profile.png" />
                    </div>
                </label>
                <ul tabindex="0" class="menu menu-compact dropdown-content mt-4 p-2 shadow-xl bg-base-100 rounded-box w-max">
                    <li><a><i class="fa-solid fa-user"></i>Profile</a></li>
                    <li><a href="<?= base_url()?>logout"><i class="fa-solid fa-right-from-bracket"></i>Logout</a></li>
                    <?php if($_SESSION['role'] == 'admin'){ ?>
                        <li><a href="<?= base_url()?>admin"><i class="fa-solid fa-chart-line"></i>Dashboard</a></li>
                    <?php } ?> 
                </ul>
            </div>
        <?php } else { ?>
            <a class="btn bg-slate-800 text-white hover:bg-secondary hover:text-primary" href="<?= base_url()?>login">Login</a>
        <?php } ?>
    </div>
</div>