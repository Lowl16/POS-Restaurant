<link rel="stylesheet" href="/css/app.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<style>
  /* Style for Profile button */
  .button-profile:active {
    background-color: #888888;
  }
  
  /* Style for Logout button */
  .button-logout:active {
    background-color: #888888;
  }
  
  /* Style for Dashboard button */
  .button-dashboard:active {
    background-color: #888888;
  }
</style>

<div class="navbar bg-base-100 sticky top-0 z-50">
    <div class="navbar-start">
        <a class="btn btn-ghost normal-case text-xl"><img class="w-8 h-8 mr-2" src="img/logo.png" alt="Logo">POS Restaurant</a>
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
                    <li><a class="button-profile"><i class="fa-solid fa-user"></i>Profile</a></li>
                    <li><a class="button-logout" href="<?= base_url()?>logout"><i class="fa-solid fa-right-from-bracket"></i>Logout</a></li>
                    <?php if($_SESSION['role'] == 'admin'){ ?>
                        <li><a class="button-dashboard" href="<?= base_url()?>dashboard"><i class="fa-solid fa-chart-line"></i>Dashboard</a></li>
                    <?php } ?> 
                </ul>
            </div>
        <?php } else { ?>
            <a class="btn bg-slate-800 text-white hover:bg-secondary hover:text-primary" href="<?= base_url()?>login">Login</a>
        <?php } ?>
    </div>
</div>
