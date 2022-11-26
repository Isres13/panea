<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>{{ config('app.name', 'Laravel') }}</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
        *{
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body{
            min-height: 100vh;
            overflow-x: hidden;
            background: var(--primary-color-light);
        }
        .sidebar{
            position: relative;
            width: 100%;
        }
        .navigation{
            position: fixed;
            width: 300px;
            height: 100%;
            background: var(--sidebar-color);
            border-left: 10px solid var(--sidebar-color);
            Transition: var(--tran-05);
            overflow: hidden;
        }
        .navigation.active{
            width: 90px
        }
        .navigation ul{     
            padding-left: 0.5rem;
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
        }
        .navigation ul li{
            position: relative;
            width: 100%;
            list-style: none;
            border-top-left-radius: 30px;
            border-bottom-left-radius: 30px;
        }
        .navigation ul li:hover,
        .navigation ul li.hovered{
            background: var(--primary-color-light);
        }
        .navigation ul li:nth-child(1){
            margin-bottom: 60;
            pointer-events: none;
            left: -15px;
        }
        .navigation .img{
            width: 60px; 
            height: auto;
        }
        .navigation .text .name{
            font-weight: 700;
            font-size: 30px;
            padding: 14px 40px;
        }
        .navigation ul li a{
            position: relative;
            display: block;
            width: 100%;
            display: flex;
            text-decoration: none;
            color: var(--text-color)
        }
        .navigation ul li:hover a,
        .navigation ul li.hovered a{
            color: var(--text-color-sidebar);
        }
        .navigation ul li a .icon{
            position: relative;
            display: block;
            min-width: 50px;
            height: 5px;
            padding: 13px ;
            text-align: center;
        }
        .navigation ul li a .icon ion-icon{
            font-size: 1.75em;
        }
        .navigation ul li a .title{
            position: relative;
            display: block;
            padding: 0 30px;
            height: 60px;
            line-height: 60px;
            text-align: center;
            white-space: nowrap;
        }
        /*curve outside*/
        .navigation ul li:hover a::before,
        .navigation ul li.hovered a::before{
            content: '';
            position: absolute;
            right: 0px;
            top: -50px;
            width: 50px;
            height: 50px;
            background: transparent;
            border-radius: 50px;
            box-shadow: 35px 35px 0px 10px var(--primary-color-light);
            pointer-events: none;
        }
        .navigation ul li:hover a::after,
        .navigation ul li.hovered a::after{
            content: '';
            position: absolute;
            right: 0px;
            bottom: -50px;
            width: 50px;
            height: 50px;
            background: transparent;
            border-radius: 50px;
            box-shadow: 35px -35px 0px 10px var(--primary-color-light);
            pointer-events: none;
        }
        .navbar-nav{
            position: absolute;
            width: calc(100% - 300px);
            left: 300px;
            background: var(--primary-color-light);
            Transition: var(--tran-05);
        }
        .navbar-nav.active{
            width: calc(100% - 90px);
            left: 90px;
        }
        hr.style{
	        height: 1.2px;
	        border: 0;
            background-color: #8c8b8ba1;
            margin-top: 0;
	        box-shadow: 0px 1.5px 4px 1px  #8c8b8ba1 ;
            
        }
        /*hr{
            margin: 1rem 0;
            color: inherit;
            box-shadow: -1px 0.5rem 2rem 0px rgb(0 0 0 / 14%);
            background-color: #F00;
            border: 0;
            opacity: .25;
        }*/
        
        .topbar{
            display: flex;
            width: 100%;
            height: 60px;
            justify-content: space-between; 
            align-items: center;
            padding: 0 10px ;
        }
        .toggle{
            position: relative;
            top: 0;
            height: auto;
            width: 30px;
            background: var(--body-color);
            display: flex;
            align-items: center;
            justify-content: flex-start;
            color: var( --toggle-color);  
            font-size: 50px;
         }
         .navbar-nav .user{
            margin-top: 15px;
         }
         .navbar-nav ul{
            list-style: none;
         }
        .navbar-nav .nav-link {
            padding-right: 40px; 
            display: block;
            padding: 0.5rem 1rem;
            color: #707070;
         }
        
        :root{
            /*color*/
            --body-color: #F6F5FF ;
            --primary-color: #E4E9F7;
            --sidebar-color: #3C8085; 
            --primary-color-light: #F6F5FF;
            --toggle-color: #3C8085;
            --text-color: #FFF;
            --text-color-sidebar: #707070;

            /*=====Transition=====*/
            --tran-02: all 0.2s ease;
            --tran-03: all 0.3s ease;
            --tran-04: all 0.4s ease;
            --tran-05: all 0.5s ease;        
        }
        

    </style>
</head>
<body>
    <div class="sidebar">
        <div class="navigation">
            <ul>
                <li>
                    <a href="" >
                        <span class="icon">
                            <img class="img" src="/images/Panae (WH).png" id="logo" alt=""  >
                        </span>
                        <div class="text">
                            <span class="title name">Panae</span>
                        </div>
                        
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.home') }}">
                        <span class="icon"><ion-icon name="home-outline"></ion-icon></span>
                        <span class="title">dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('user.index') }}">
                        <span class="icon"><ion-icon name="people-outline"></ion-icon></span>
                        <span class="title">สมาชิก</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('employee.index') }}">
                        <span class="icon"><ion-icon name="person-outline"></ion-icon></span>
                        <span class="title">คณะกรรมการ</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('DWmoney.index') }}">
                        <span class="icon"><ion-icon name="wallet-outline"></ion-icon></span>
                        <span class="title">ฝาก - ถอน</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('sarikatmati.index') }}">
                        <span class="icon"><ion-icon name="pricetags-outline"></ion-icon></ion-icon></span>
                        <span class="title">ซารีกัตมาตี</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('loan.index') }}">
                        <span class="icon"><ion-icon name="card-outline"></ion-icon></span>
                        <span class="title">กองทุน</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('account') }}">
                        <span class="icon"><ion-icon name="cash-outline"></ion-icon></span>
                        <span class="title">บัญชีกองทุน</span>
                    </a>
                </li>
            </ul>
        </div>

        <div class="navbar-nav">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="logo-buffer"></ion-icon>
                </div>
                <div class="user">
                    <ul>
                     @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest

                     </ul>
                </div>
            </div>
            <hr class="style">
            <div class="main">
                <div class="container">
                    @yield('content')
                </div>
            </div>
        </div>
        
        
    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
    <script>
    //menu toggle
        let toggle = document.querySelector('.toggle');
        let navigation = document.querySelector('.navigation');
        let navbar = document.querySelector('.navbar-nav')

        toggle.onclick = function(){
            navigation.classList.toggle('active');
            navbar.classList.toggle('active');
        }


    //add hovered class in selected list item
        let lits = document.querySelectorAll('.navigation li');
        function activeLink(){
            lits.forEach((item) =>
            item.classList.remove('hovered'));
            this.classList.add('hovered');
        }
        lits.forEach((item)=>
        item.addEventListener('onclick', activeLink));
    </script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>